<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nif',
        'logo_id',
    ];

    public static function getEmpresaById($empresa_id)
    {
        return Empresa::where('id', $empresa_id)->first();
    }

    public static function getEmpresaId($user_id){
        return Empresa::where('user_id', $user_id)->first();
    }

    public static function getPhotoByUserId($user_id){
        $empresa= Empresa::getEmpresaById($user_id);
        $id = $empresa->logo_id;
        return Photo::getPhotoById($id);
    }
}
