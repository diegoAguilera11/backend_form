<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'importance',
        'types',
        'grade',
        'field_id',
        'question_id'
    ];
}
