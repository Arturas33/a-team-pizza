<?php
/**
 * Created by PhpStorm.
 * User: Antanas Kiselis
 * Date: 2017.05.09
 * Time: 13:02
 */

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $table = 'pz_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'password', 'phone', 'address', 'comment'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {

        return $this->belongsToMany(Roles::class, 'pz_connections_users_roles', 'user_id', 'role_id' );
    }
}