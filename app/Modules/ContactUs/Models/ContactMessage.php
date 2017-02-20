<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ContactMessage extends Model {
    use Sortable;
    protected $table = 'contact_messages';
    protected $fillable = ['id','name','email','mobile_number','subject','message'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['name','email','mobile_number','subject','message'];

}