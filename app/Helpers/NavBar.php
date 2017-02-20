<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 29/09/2016
 * Time: 9:50
 */
namespace App\Helpers;
use Menu;

class NavBar {
    public static function render() {
        return Menu::make('MyNavBar', function($menu){
            $menu->add('Home');
            $menu->add('About',    'about');
            $menu->add('services', 'services');
            $menu->add('Contact',  'contact');
        });
    }
}