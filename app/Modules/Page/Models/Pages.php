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

class Pages extends Model {
    use Sortable;
    protected $table = 'pages';
    protected $fillable = ['id','name','content','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name'];
	
	public static function recursive($recursive = array(),$data = array()) {
		$pages = self::where("name", "like", "%".(isset($data['name']) ? $data['name'] : '')."%")
		->where('parent_id',isset($data['parent_id']) ? $data['parent_id'] : 0))
        ->sortable()->paginate(isset($data['paginate']) ? $data['paginate'] : 0));
		
		foreach($pages as $key => $page) {
			$recursive[] = array(
				"id" => $page->id,
				"name"   => (isset($data['spacing']) ? $data['spacing'] : '').$page->name,
				"content" =>  $page->content,
				"category_id" => $page->category_id,
				"active" => $page->is_active,
			);	
			
			$recursive = self::recursive($recursive,array(
				'parent_id' => $page->id,
				'name' => (isset($data['name']) ? $data['name'] : ''),
				'paginate' => isset($data['paginate']) ? $data['paginate'] : 0),
				'spacing' => '&nbsp;&nbsp;&rarr;'.isset($data['spacing']) ? $data['spacing'] : '')
			));
			
		}

		return $recursive;	
		
	}

}