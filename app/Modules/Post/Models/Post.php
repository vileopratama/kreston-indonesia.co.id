<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model {
    use Sortable;
    protected $table = 'posts';
    protected $fillable = ['id','title','content','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'title','category_name','total_view','created_at'];
	protected $casts = ['grant_all_permissions' => true,];


}