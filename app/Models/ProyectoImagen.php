<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoImagen extends Model
{
    use HasFactory;

    protected $table ='proyectos_imagenes';

    protected $fillable = ['proyecto_id','imagen'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
