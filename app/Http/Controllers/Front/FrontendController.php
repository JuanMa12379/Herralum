<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tip;
use App\Models\Proyecto;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function inicio(){
        $categorias = Categoria::with('productos')->get();
        $ultimosproyectos = Proyecto::latest()->take(3)->get();
        $banners = Banner::orderBy('orden', 'asc')->get();
        $marcas = Marca::orderBy('orden', 'asc')->get();
        $productos_ten = Producto::where('tendencia', '1')->take(5)->get();
        $tips = Tip::all();
        return view('front.home',compact('banners','marcas','categorias','productos_ten','tips','ultimosproyectos'));
    }

    public function categorias($slug)
    {
       $categorias = Categoria::all();
       $categoria = Categoria::where('slug',$slug)->first();
       $productos = Producto::where('categoria_id', $categoria->id)->get();
       return view('front.categorias',compact('categoria','productos','categorias'));
    }

    public function detalleproducto($cate_slug, $pro_slug){
        $categorias = Categoria::all();
        $productos = Producto::where('slug', $pro_slug)->first();
        return view('front.detalle_producto',compact('categorias','productos'));
    }

    public function contacto(){
        $categorias = Categoria::all();
        return view('front.contacto',compact('categorias'));
    }

    public function proyectos(){
        $proyectos = Proyecto::all();
        $categorias = Categoria::all();
        return view('front.proyectos', compact('categorias','proyectos'));
    }

    public function detalleproyecto($slug){
        $categorias = Categoria::all();
        $proyectos = Proyecto::with('imagenes')->where('slug', $slug)->first();
        return view('front.detalle_proyecto', compact('categorias','proyectos'));
    }
}
