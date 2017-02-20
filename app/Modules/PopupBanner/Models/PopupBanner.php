<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\PopupBanner\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PopupBanner extends Model {
    use Sortable;
    protected $table = 'popup_banners';
    protected $fillable = ['id','name','storage_location','active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name', 'storage_location'];

}