<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'anuncio_id',
        'comment',
        'pdf_name',
        'pdf_path',
    ];
}
