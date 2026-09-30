<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $livros = Livro::with(['autor', 'categoria'])->get();

        return response()->json($livros);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'autor_id' => $request->autor_id,
            'categoria_id' => $request->categoria_id,
        ]);

        return response()->json(
            $livro->load(['autor', 'categoria']),
            201
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::with(['autor', 'categoria'])->findOrFail($id);

        return response()->json($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro = Livro::findOrFail($id);

        $livro->titulo = $request->titulo;

        $livro->autor_id = $request->autor_id;
        
        $livro->categoria_id = $request->categoria_id;

        $livro->save();

        return response()->json(
            $livro->load(['autor', 'categoria'])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::findOrFail($id);

        $livro->delete();

        return response()->json([
            'mensagem' => 'Livro excluído com sucesso'
        ]);
    }
}