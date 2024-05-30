<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\File;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(request $request){
        $busqueda = $request->busqueda;
        $categorias = Categoria::where('nombre','LIKE','%'.$busqueda.'%')
        ->orderBy('nombre', 'asc')->Paginate(10);
        return view('admin.categorias.lista_categorias', compact('categorias','busqueda'));
    }
    public function nuevacategoria(request $request){
        $request -> validate ([
            'nombre'=> 'required|max:250|string'
        ]);

        $categorias = new Categoria();
        if($request->has('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/categorias/',$filename);
            $categorias->imagen = $filename;
            
        }
        $categorias -> nombre = $request -> input('nombre');
        $categorias -> slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
        $categorias -> descripcion = $request -> input('descripcion');
        $categorias ->save();

        return redirect('admin/lista_categorias')->with('status', "Categoria Creada correctamente"); 
    }

    public function editarcategoria(request $request){

        $request -> validate ([
            'nombre'=> 'required|max:250|string'
        ]);

        $categorias = Categoria::findorFail($request->input('id'));
        if($request->has('imagen')){
            $path='uploads/categorias/'.$categorias->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/categorias/',$filename);
            $categorias->imagen = $filename;
        }
        $categorias -> nombre = $request -> input('nombre');
        $categorias -> slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
        $categorias -> descripcion = $request -> input('descripcion');
        $categorias ->save();

        return redirect('admin/lista_categorias')->with('status', "Categoria Editada Correctamente"); 

    }

    public function eliminarcategoria(request $request){

        $categoriaid = $request ->input('categoriaid');
        Categoria::destroy($categoriaid);
        return redirect('admin/lista_categorias')->with('status', "Categoria Eliminada Correctamente");

    }

}
