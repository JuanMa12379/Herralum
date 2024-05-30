<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Categoria extends Model
{
    use HasFactory;
    
    protected $table="categorias";

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, "categoria_id", "id");
    }
}