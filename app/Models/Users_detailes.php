<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_detailes extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $table = 'users_detailes';
    protected $primarykey = 'id';
    protected $fillable = ['id','user_id','question_answer','upload_documents'];

}
