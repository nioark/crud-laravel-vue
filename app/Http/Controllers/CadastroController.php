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
                  ->orWhere('telefone', 'ILIKE', "%{$searchTerm}%")->orderBy('id', 'DESC');
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

            $errors = $e->errors();
            
            if (isset($errors['cpf_cnpj']) && in_array('The cpf cnpj has already been taken.', $errors['cpf_cnpj'])) {
                \Log::info("Returning custom json");
                return response()->json(['message' => 'Este CPF/CNPJ já está cadastrado.'], 422);
            }

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
        $data = $request->all();


        $cadastro = Cadastro::find($id);

        if (!$cadastro) {
            return response()->json(['message' => 'Cadastro não encontrado.'], 404);
        }

        try {

            $validatedData = $request->validate(Cadastro::rules($id));

            $cadastro->update($validatedData);
            
            return response()->json(['message' => 'Cadastro atualizado com sucesso!', 'cadastro' => $cadastro]);
        } catch (ValidationException $e) {

            $errors = $e->errors();

            if (isset($errors['cpf_cnpj']) && in_array('The cpf cnpj has already been taken.', $errors['cpf_cnpj'])) {
                \Log::info("Returning custom json");
                return response()->json(['message' => 'Este CPF/CNPJ já está cadastrado.'], 422);
            }
    
            // Retorna os erros de validação genéricos
            return response()->json(['errors' => $errors], 422);
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
