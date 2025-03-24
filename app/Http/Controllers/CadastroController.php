<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cadastro::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            \Log::info("Search Term321: " . $searchTerm); 
            $query->where('nome', 'ILIKE', "%{$searchTerm}%") 
                  ->orWhere('email', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('cpf_cnpj', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('telefone', 'ILIKE', "%{$searchTerm}%");
        }


        $cadastros = $query->paginate(10);

        return response()->json($cadastros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate(Cadastro::rules());

            $cadastro = Cadastro::create($validatedData);

            return response()->json(['message' => 'Cadastro criado com sucesso!', 'cadastro' => $cadastro], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cadastro = Cadastro::find($id);

        if (!$cadastro) {
            return response()->json(['message' => 'Cadastro não encontrado.'], 404);
        }

        return response()->json($cadastro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cadastro = Cadastro::find($id);

        if (!$cadastro) {
            return response()->json(['message' => 'Cadastro não encontrado.'], 404);
        }

        try {
            $validatedData = $request->validate(Cadastro::rules());

            $cadastro->update($validatedData);

            return response()->json(['message' => 'Cadastro atualizado com sucesso!', 'cadastro' => $cadastro]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cadastro = Cadastro::find($id);

        if (!$cadastro) {
            return response()->json(['message' => 'Cadastro não encontrado.'], 404);
        }

        $cadastro->delete();

        return response()->json(['message' => 'Cadastro removido com sucesso!']);
    }
}
