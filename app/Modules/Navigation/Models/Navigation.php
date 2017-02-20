<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Navigation\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Lang;

class Navigation extends Model {
    use Sortable;
    protected $table = 'navigations';
    protected $fillable = ['id','name','url','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name','url'];
	
	public static function recursive($recursive = array(),$data = array()) {
		$navigations = self::where("name", "like", "%".(isset($data['name']) ? $data['name'] : '')."%")
		->where('parent_id',(isset($data['parent_id']) ? $data['parent_id'] : 0))
		->orderBy("order","asc")
        ->get();
		
		foreach($navigations as $key => $nav) {
			$recursive[] = array(
				"id" => $nav->id,
				"name"   => (isset($data['spacing']) ? $data['spacing'] : '').$nav->name,
				"content" =>  $nav->content,
				"url" =>  $nav->url,
				"post" =>  !$nav->post ? 'Page' : $nav->post,
				"order" =>  (isset($data['spacing']) ? $data['spacing'] : '').$nav->order,
				"is_active" => $nav->is_active,
			);	
			
			$recursive = self::recursive($recursive,array(
				'parent_id' => $nav->id,
				'name' => (isset($data['name']) ? $data['name'] : ''),
				'paginate' => isset($data['paginate']) ? $data['paginate'] : 0,
				'spacing' => '&nbsp;&nbsp;&rarr;'.(isset($data['spacing']) ? $data['spacing'] : ''),
			));
			
		}
		return $recursive;		
	}
	
	public static function dropdown($label = null) {
		$data = array();
		if($label) 
			$data[0] = $label;
		if(self::recursive()) {
			foreach(self::recursive() as $key => $row) {
				$data[$row['id']] = $row['name'];
			}
		}
		return $data;
	}

}