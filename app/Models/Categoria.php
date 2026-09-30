<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}