<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funfacts extends Model
{
    use HasFactory;
    protected $table = 'funfacts';
    protected $primarykey = 'id';
    protected $fillable = ['full_name','designation','photo','date'];
}