<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Publication\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Publication extends Model {
    use Sortable;
    protected $table = 'publications';
    protected $fillable = ['id','name','storage_location','active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'title', 'storage_location'];

}