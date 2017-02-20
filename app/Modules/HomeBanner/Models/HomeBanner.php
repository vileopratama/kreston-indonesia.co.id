<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\HomeBanner\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class HomeBanner extends Model {
    use Sortable;
    protected $table = 'home_banners';
    protected $fillable = ['id','name','storage_location','active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name', 'storage_location'];

}