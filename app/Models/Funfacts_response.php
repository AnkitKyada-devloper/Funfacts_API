<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funfacts_response extends Model
{
    use HasFactory;
    protected $table = 'funfact_response';
    protected $primarykey = 'id';
    protected $fillable = ['questions_id', 'funfacts_id', 'answer_text'];
}