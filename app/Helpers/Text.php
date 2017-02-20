<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 29/09/2016
 * Time: 9:50
 */
namespace App\Helpers;
use File;
use Setting;
use Theme;

class Text {
    public static function only_text($string) {
		$content = $string;
		$content = preg_replace("/<img[^>]+\>/i", "", $content); 
		return $content;
    }
	
	public static function listThemeBladeTemplate() {
		$template = array();
		$theme = public_path('themes/'.(Setting::get_key('theme') ? Setting::get_key('theme') : Theme::getActive()).'/views');
		$template_files = File::files($theme);
		foreach($template_files as $file) {
			$file = str_replace($theme.'/','',$file);
			$template[$file] = $file;
		}
		
		return $template;
	}
}