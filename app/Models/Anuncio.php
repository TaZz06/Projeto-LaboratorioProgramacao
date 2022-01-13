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
        'city',
        'is_highlighted'
    ];

    public static function getAnuncioById($anuncio_id){
        $anuncio = Anuncio::where('id', $anuncio_id)->first();
        return $anuncio;
    }
}
