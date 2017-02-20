<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 29/09/2016
 * Time: 9:50
 */
namespace App\Helpers;

use Theme;

class Img {
    public static function extract($string) {
		$matches = array();
		preg_match_all('!http://.+\.(?:jpe?g|png|gif)!Ui' , $string , $matches);
		//preg_match_all('/([-a-z0-9_\/:.]+\.(jpg|jpeg|png))/i', $string, $matches);
		return $matches;
    }
	
	public static function show($string) {
		$img_str = "";
		$img = self::extract($string);
		if($img) {
			foreach($img as $val){
				if(isset($val[0]))
					$img_str = $val[0];
			}
		}
		
		if(empty($img_str))
			$img_str = Theme::asset('img/logo2.png');
		
		return $img_str;
	}
}