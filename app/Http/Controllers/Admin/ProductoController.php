<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $categorias = Categoria::orderBy('nombre')->get();
        $productos = Producto::query()
        ->with(['categoria'])
        ->when(request('busqueda'), function($query){
            return $query->where('nombre','LIKE','%'.request('busqueda').'%')
            ->orWhereHas('categoria', function($c){
                $c->where('nombre','LIKE','%'.request('busqueda').'%');
           });
        })
        ->orderBy('id','desc')->Paginate(10)
        ->withQueryString();
        return view('admin.productos.index',compact('categorias','productos'));
        
    }

    public function nuevoproducto(){
        $categorias = Categoria::all();
        return view('admin.productos.nuevo',compact('categorias'));
    }

    public function guardarproducto(request $request){

        $validated = $request->validate([
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'especificaciones' => 'required',
            
        ]);
        
        $productos = new Producto();
        $productos -> categoria_id = $request -> input('categoria_id');
        $productos -> nombre = $request -> input('nombre');
        $productos->slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
        $productos -> descripcion = $request -> input('descripcion');
        $productos -> especificaciones = $request -> input('especificaciones');
        $productos -> meta_title = $request -> input('meta_title');
        $productos -> meta_description = $request -> input('meta_description');
        $productos -> meta_key = $request -> input('meta_key');
        $productos -> tendencia = $request -> input('tendencia')==TRUE? '1':'0';

        if($request->hasFile('catalogo'))
        {
            $file = $request->file('catalogo');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/productos/catalogos/',$filename);
            $productos->catalogo = $filename;
        }

        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/productos/imagenes/',$filename);
            $productos->imagen = $filename;
        }


        $productos -> save();

        return redirect('admin/lista_productos')->with('status', "Producto creado Correctamente");

    }

    public function traerproducto($id){
        $categorias = Categoria::all();
        $productos = Producto::Find($id);

        return view('admin.productos.editar',compact('productos','categorias'));
    }

    public function editarproducto(request $request, $id){
        $productos = Producto::Find($id);
        $productos -> categoria_id = $request -> input('categoria_id');
        $productos -> nombre = $request -> input('nombre');
        $productos -> slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
        $productos -> descripcion = $request -> input('descripcion');
        $productos -> especificaciones = $request -> input('especificaciones');
        $productos -> meta_title = $request -> input('meta_title');
        $productos -> meta_description = $request -> input('meta_description');
        $productos -> meta_key = $request -> input('meta_key');
        $productos -> tendencia = $request -> input('tendencia')==TRUE? '1':'0';

        if($request->has('imagen'))
        {
            $path='uploads/productos/imagenes/'.$productos->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/productos/imagenes/',$filename);
            $productos->imagen = $filename;
        }

        if($request->has('catalogo'))
        {
            $path='uploads/productos/catalogos/'.$productos->catalogo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('catalogo');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/productos/catalogos/',$filename);
            $productos->catalogo = $filename;
        }


        $productos -> update();

        return redirect('admin/lista_productos')->with('status', "Producto Editado Correctamente");

    }

    public function eliminarproducto($id){
        $productos = Producto::Find($id);
        if($productos->imagen)
        {
            $path='uploads/productos/imagenes/'.$productos->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        if($productos->catalogo)
        {
            $path='uploads/productos/catalogos/'.$productos->catalogo;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $productos->delete();
        return redirect('admin/lista_productos')->with('status', "Producto Eliminado Correctamente"); 

    }
}
