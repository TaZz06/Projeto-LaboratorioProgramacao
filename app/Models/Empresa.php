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
        $empresa = Empresa::where('id', $empresa_id)->first();
        return $empresa;
    }

    public static function getPhotoByUserId($user_id){
        $empresa= Empresa::getEmpresaById($user_id);
        $id = $empresa->logo_id;
        $photo= Photo::getPhotoById($id);
        return $photo;
    }
}
