<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Category\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Category\Models\Category;
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

class CategoryController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Category $home_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('category::app.category'));
        return Theme::view ('category::Administrator.index',array(
            'categories' =>  $home_banner
                ->where("name", "like", "%".Request::get("name")."%")
                ->sortable(['order' => 'asc'])->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('category::app.category'));
        return Theme::view ('category::Administrator.form',array(
            'category' =>  null,
        ));
    }
	
	public function view($id,Category $category) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('category::app.category'));
		$id = Crypt::decrypt($id);
		return Theme::view ('category::Administrator.view',array(
            'category' =>  $category->find($id),
        ));
	}
	
	public function status($id,Category $category) {
		$ids = Crypt::decrypt($id);
		$category = $category->find($ids);
		if($category) {
			if($category->is_active == 1) {
				$is_active = 0;
			} else {
				$is_active = 1;
			}
			$category->is_active = $is_active;
			$category->updated_at = date("Y-m-d H:i:s");
            $category->save();			
		}  
		
		return Redirect::intended ( '/category/administrator/view/'.$id);
	}
	
	public function edit($id,Category $category) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('category::app.category'));
		$id = Crypt::decrypt($id);
		return Theme::view ('category::Administrator.form',array(
            'category' =>  $category->find($id),
        ));
	}

    public function update(Category $category) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
        $slug = Str::slug($name,"-");
		$order = Input::get("order");
        $description = Input::get('description');

        $field = array (
            'name' => $name,
			'order' => $order,
        );

        $rules = array (
            'name' => 'required',
			'order' => 'required',
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
            if(!empty($id)) {
                //update category
                $category = $category->find($id);
                $category->name  = $name;
                $category->slug = $slug;
				$category->order = $order;
				$category->updated_by = Auth::user()->id;
                $category->updated_at = date("Y-m-d H:i:s");
                $category->save();
                $message = Lang::get('category::message.update successfully');
            } else {
                $category->name  = $name;
                $category->slug = $slug;
				$category->order = $order;
                $category->created_at = date("Y-m-d H:i:s");
                $category->created_by = Auth::user()->id;
                $category->updated_at = date("Y-m-d H:i:s");
                $category->updated_by = Auth::user()->id;
                $category->save();
                $message =  Lang::get('category::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/category/administrator/view/'.Crypt::encrypt($category->id));
            $params ['message'] =  $message;
        }
		
		return Response::json($params);
    }
	
	public function delete(Category $category) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $category->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $category->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('category::message.delete successfully');
        }
        return Response::json($params);
    }

}