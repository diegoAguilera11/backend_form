<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rut',
        'address',
        'province',
        'year_commencement_activities'
    ];
}
