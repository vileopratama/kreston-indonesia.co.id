<?php

/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 10:43
 */
namespace App\Modules\Session\Http\Controllers;

use App\Http\Controllers\Controller;
use Theme;

class AuthController extends Controller {
    public function index() {
        return Theme::view ('login::administrator.index');
    }


}