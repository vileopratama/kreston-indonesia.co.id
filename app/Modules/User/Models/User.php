<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 11:52
 */

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Model implements Authenticatable {
    use Sortable;
    protected $table = 'users';
    protected $fillable = ['id','first_name','last_name','email'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public $sortable = ['id', 'first_name', 'email'];

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token for the user.
     *
     * @return string
     */
    public function getRememberToken() {
        return $this->remember_token;
    }

    /**
     * Set the token for the user.
     *
     * @return string
     */
    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    /**
     * Get the Toke Name for the user.
     *
     * @return string
     */
    public function getRememberTokenName() {
        return 'remember_token';
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }
}