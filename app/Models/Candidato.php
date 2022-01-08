<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Candidato extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'profissional_area',
        'schooling',
        'professional_experience',
        'skills',
    ];

    public static function getCandidatoById($user_id)
    {
        $candidato = Candidato::where('user_id', $user_id)->first();
        return $candidato;
    }
}
