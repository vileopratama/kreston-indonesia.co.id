<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Lang;

class Page extends Model {
    use Sortable;
    protected $table = 'pages';
    protected $fillable = ['id','name','content','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name'];
	
	public static function recursive($recursive = array(),$data = array()) {
		$pages = self::where("name", "like", "%".(isset($data['name']) ? $data['name'] : '')."%")
		->where(['is_active' => 1])
		->where('parent_id',(isset($data['parent_id']) ? $data['parent_id'] : 0))
		->orderBy('order','asc')
        ->get();
		
		foreach($pages as $key => $page) {
			$recursive[] = array(
				"id" => $page->id,
				"name"   => (isset($data['spacing']) ? $data['spacing'] : '').$page->name,
				"url"   =>  (isset($data['spacing']) ? $data['spacing'] : '').$page->url,
				"content" =>  $page->content,
				"is_active" => $page->is_active,
				'order' => $page->order,
			);	
			
			$recursive = self::recursive($recursive,array(
				'parent_id' => $page->id,
				'name' => (isset($data['name']) ? $data['name'] : ''),
				'url' => (isset($data['url']) ? $data['url'] : ''),
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
		
		//Lang::get("action.root");
		if(self::recursive()) {
			foreach(self::recursive() as $key => $row) {
				$data[$row['id']] = $row['name'];
			}
		}
		return $data;
	}

}