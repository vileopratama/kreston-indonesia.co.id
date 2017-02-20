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

class ContactUs extends Model {
    use Sortable;
    protected $table = 'contact_us';
    protected $fillable = ['id','name'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name','order'];
	
	public static function dropdown($label = null) {
		$data =array();
		$contacts = self::where('is_active',1)->orderBy('order','asc')->get();
		foreach($contacts as $key => $contact) {
			$data[$contact->id] = $contact->name;
		}
		return $data;
	}
	
	public static function getNavigation() {
		return self::join('people','people.contact_id','=','contact_us.id')->groupBy('contact_us.id')
		->select(['contact_us.slug','contact_us.name','contact_us.id'])
		->where('people.is_active',1)->orderBy('contact_us.order','asc')->get();
	}

}