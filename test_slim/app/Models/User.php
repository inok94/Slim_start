<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.11.2016
 * Time: 23:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model

{

    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'password'

    ];

}