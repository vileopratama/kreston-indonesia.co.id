<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model {
    use Sortable;
    protected $table = 'categories';
    protected $fillable = ['id','name','slug'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name', 'slug','order'];
	
	public static function dropdown($label = null) {
		$data =array();
		$categories = self::where('is_active',1)->orderBy('order','asc')->get();
		foreach($categories as $key => $category) {
			$data[$category->id] = $category->name;
		}
		return $data;
	}

}