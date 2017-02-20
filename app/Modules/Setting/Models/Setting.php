<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\Setting\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Setting extends Model {
    use Sortable;
    protected $table = 'settings';
    protected $fillable = ['id','key','value'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'key','value'];

    public static function get_key($key = null) {
        $setting = self::where(['key' => $key])->first();
        $key_value = '';
        if($setting)
            $key_value = $setting->value;

        return $key_value;
    }

}