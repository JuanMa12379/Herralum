<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table ='proyectos';

    protected $fillable = ['nombre','slug','descripcion','ubicacion','imagen','imagen2'];

    public function imagenes()
    {
        return $this->hasMany(ProyectoImagen::class);
    }
}
