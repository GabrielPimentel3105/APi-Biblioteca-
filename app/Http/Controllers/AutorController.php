<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();

        return response()->json($autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor();

        $autor->nome = $request->nome;

        $autor->save();

        return response()->json($autor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Autor::find($id);

        return response()->json($autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);

        $autor->nome = $request->nome;

        $autor->save();

        return response()->json($autor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::find($id);

        $autor->delete();

        return response()->json([
            'mensagem' => 'Autor excluído com sucesso'
        ]);
    }
}
