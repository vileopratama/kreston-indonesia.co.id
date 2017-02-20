<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Gallery\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class GalleryEvent extends Model {
    use Sortable;
    protected $table = 'gallery_events';
    protected $fillable = ['id','name','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name'];

}