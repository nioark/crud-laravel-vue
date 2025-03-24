<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Cadastro extends Model
{
    protected $table = 'cadastros';

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'tipo',
        'telefone',
        'email',
    ];


    // Método para validação dos dados 
    public static function rules($id = null)
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf_cnpj' => [
                'required',
                'string',
                'unique:cadastros,cpf_cnpj',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$|^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/',
                Rule::unique('cadastros', 'cpf_cnpj')->ignore($id)
            ],
            'tipo' => 'required|in:cpf,cnpj',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ];
    }
}