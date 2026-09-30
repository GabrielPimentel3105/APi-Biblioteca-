<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
use App\Models\Categoria;

class Livro extends Model
{
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor_id',
        'categoria_id',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}