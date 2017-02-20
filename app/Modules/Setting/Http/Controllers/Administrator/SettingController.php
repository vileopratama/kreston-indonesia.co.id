<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Setting\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Setting\Models\Setting;
use Auth;
use Config;
use Crypt;
use Lang;
use Redirect;
use Request;
use Response;
use SEOMeta;
use Theme;
use Validator;

class SettingController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Setting $setting) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('setting::app.setting'));
        return Theme::view ('setting::Administrator.form',array(
            'setting' =>  null,
        ));
    }

    public function update(Setting $setting) {
        $settings = $setting->get();
        foreach ($settings as $key => $content) {
            $key = $content->key;
            $value = Input::get($key);
            $setting->where(array('key' => $key))->update(array('value' => $value));
        }
        $params ['success'] =  true;
        $params ['message'] =  Lang::get('setting::message.update successfully');

        return Response::json($params);
    }



}