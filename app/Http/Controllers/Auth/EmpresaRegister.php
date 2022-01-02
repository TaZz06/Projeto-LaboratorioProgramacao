<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class EmpresaRegister extends Controller
{
    use RegistersUsers;
    protected function create(array $data)
    {
        $newEmpresa = Empresa::create([
            'user_id' => auth()->user()->id,
            'nif' => $data['nif'],
        ]);
    }
}
