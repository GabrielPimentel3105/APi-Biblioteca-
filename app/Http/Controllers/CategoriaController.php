<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();

        $categoria->nome = $request->nome;

        $categoria->save();

        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        return response()->json($categoria);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->nome = $request->nome;

        $categoria->save();

        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return response()->json([
            'mensagem' => 'Categoria excluída com sucesso'
        ]);
    }
}
