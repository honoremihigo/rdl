<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $primaryKey = 'adminId';
    protected $fillable = ['adminName','password'];

    // public function getAuthPassword()
    // {
    //     return $this->Password;
    // }
}
