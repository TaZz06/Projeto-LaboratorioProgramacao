<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'empresa_id',
        'workspace',
        'job_description',
        'desired_skills',
        'salary',
        'type',
        'address',
        'candidates',
    ];
}
