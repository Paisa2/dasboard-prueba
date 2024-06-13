<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'name',
        'slog',
        'descripcion',
        'image',
        'meta_title',
        'meta_descripcion',
        'meta_keyword',
        'navbar_status',
        'status',
    ];
}
