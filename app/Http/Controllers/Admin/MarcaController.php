<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listamarca(request $request){
        $busqueda = $request -> busqueda;
        $marcas = Marca::where('nombre', 'LIKE','%'.$busqueda.'%')
        ->orderBy('orden', 'desc')->Paginate(10);
        return view('admin.marcas.lista_marcas', compact('marcas','busqueda'));
    }

    public function crearmarca(request $request){

        $marcas = new Marca();
        if($request->has('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/marcas/',$filename);
            $marcas->imagen = $filename;
            
        }
        $marcas -> nombre = $request -> input('nombre');
        $marcas -> title = $request -> input('title');
        $marcas -> alt = $request -> input('alt');
        $marcas -> orden = $request -> input('orden');
        $marcas ->save();

        return redirect('admin/lista_marcas')->with('status', "Marca Creada Correctamente"); 

    }

    public function editarmarca(request $request){

        $request -> validate ([
            'nombre'=> 'required|max:250|string'
        ]);

        $marcas = Marca::findorFail($request->input('id'));
        if($request->has('imagen')){
            $path='uploads/marcas/'.$marcas->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/marcas/',$filename);
            $marcas->imagen = $filename;
        }
        $marcas -> nombre = $request -> input('nombre');
        $marcas -> title = $request -> input('title');
        $marcas -> alt = $request -> input('alt');
        $marcas -> orden = $request -> input('orden');
        $marcas ->save();

        return redirect('admin/lista_marcas')->with('status', "Marca Modificada Correctamente"); 
    }

    public function eliminarmarca(request $request){
        $marcas = Marca::findorFail($request->input('marcaid'));
        if($marcas->imagen)
        {
            $path='uploads/marcas/'.$marcas->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $marcas->delete();
        return redirect('admin/lista_marcas')->with('status', "Marca Eliminada Correctamente"); 

    }
}
