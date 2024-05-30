<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table='productos';
    protected $fillable =[
        'categoria_id',
        'nombre',
        'slug',
        'descripcion',
        'especificaciones',
        'catalogo',
        'imagen',
        'meta_title',
        'meta_descripction',
        'meta_key',
        'tendencia',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}

