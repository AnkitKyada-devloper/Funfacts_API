<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [ 'first_name','last_name','phone_number', 'gender'];

    
}
