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

    public static function getApplicationByUserIdAnuncioId($user_id, $anuncio_id)
    {
        return Application::where('user_id', $user_id)->where('anuncio_id', $anuncio_id)->first();
    }
    public static function getAllApplicationByUserId($user_id)
    {
        return Application::where('user_id', $user_id)->get();
    }
}
