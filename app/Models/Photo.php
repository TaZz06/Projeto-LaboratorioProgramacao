<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    public static function getPhotoById($photo_id)
    {
        return Photo::where('id', $photo_id)->first();
    }
}
