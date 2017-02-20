<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\JobVacancy\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class JobVacancy extends Model {
    use Sortable;
    protected $table = 'job_vacancies';
    protected $fillable = ['id','name','due_date','position','location','requirements','responsibilities','is_active'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $sortable = ['id', 'name','due_date','location','position'];

}