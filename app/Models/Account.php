<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable 
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $primaryKey = 'username';
    public $incrementing = false;

    protected $fillable = [
        'username',
        'password',
        'name',
        'role',
    ];
}
