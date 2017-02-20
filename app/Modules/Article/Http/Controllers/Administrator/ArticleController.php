<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */

namespace App\Modules\Article\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Category\Models\Category;
use App\Modules\Post\Models\Post;
use Auth;
use Config;
use Crypt;
use Lang;
use Redirect;
use Request;
use Response;
use SEOMeta;
use Setting;
use Str;
use Theme;
use Validator;

class ArticleController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Post $post) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('article::app.article'));
        return Theme::view ('article::Administrator.index',array(
            'posts' =>  $post->where('type','Article')
				->select(["posts.*","categories.name as category_name"])
				->leftJoin("categories","categories.id","=","posts.category_id")
                ->where("title", "like", "%".Request::get("title")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create(Category $category) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('article::app.article'));
        return Theme::view ('article::Administrator.form',array(
			'category_dropdown' => $category->dropdown(Lang::get("article::app.please select category")),
            'post' =>  null,
        ));
    }

    public function view($id,Post $post) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('article::app.article'));
        $id = Crypt::decrypt($id);
        return Theme::view ('article::Administrator.view',array(
            'post' =>  $post->select(["posts.*","categories.name"])->leftJoin('categories','categories.id','=','posts.category_id')->find($id),
        ));
    }

    public function status($id,Post $post) {
        $ids = Crypt::decrypt($id);
        $post = $post->find($ids);
        if($post) {
            if($post->is_active == 1) {
                $is_active = 0;
            } else {
                $is_active = 1;
            }
            $post->is_active = $is_active;
            $post->updated_at = date("Y-m-d H:i:s");
            $post->save();
        }

        return Redirect::intended ( '/article/administrator/view/'.$id);
    }

    public function edit($id,Post $post,Category $category) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('article::app.article'));
        $id = Crypt::decrypt($id);
        return Theme::view ('article::Administrator.form',array(
            'post' =>  $post->select(["posts.*"])->find($id),
			'category_dropdown' => $category->dropdown(Lang::get("article::app.please select category")),
        ));
    }

    public function update(Post $post) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $title = Input::get("title");
        $category_id = Input::get("category_id");
        $type = "Article";
        $total_view = 0;
        $content = Input::get("content");

        $field = array (
            'title' => $title,
            //'content' => $content,
        );

        $rules = array (
            'title' => 'required',
            //'content' => "required",
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
            if(!empty($id)) {
                //update news
                $post = $post->find($id);
                $post->title  = $title;
				$post->slug  = Str::slug($title,'-');
				$post->type = 'Article';
                $post->category_id = $category_id;
                $post->content = $content;
                $post->updated_at = date("Y-m-d H:i:s");
				$post->updated_by = Auth::user()->id;
                $post->save();
                $message = Lang::get('article::message.update successfully');
            } else {
                $post->title  = $title;
				$post->slug  = Str::slug($title,'-');
                $post->type = 'Article';
                $post->category_id = $category_id;
                $post->content = $content;
                $post->total_view  = 0;
                $post->created_at = date("Y-m-d H:i:s");
                $post->created_by = Auth::user()->id;
                $post->updated_at = date("Y-m-d H:i:s");
                $post->updated_by = Auth::user()->id;
                $post->save();
                $message =  Lang::get('article::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/article/administrator/view/'.Crypt::encrypt($post->id));
            $params ['message'] =  $message;
        }

        return Response::json($params);
    }

    public function delete(Post $post) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $post->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $post->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('article::message.delete successfully');
        }
        return Response::json($params);
    }

}