<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tip;
use Illuminate\Support\Facades\File;

class TipController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(request $request){
        $busqueda = $request->busqueda;
        $tips = Tip::where('titulo','LIKE','%'.$busqueda.'%')
        ->orderBy('titulo', 'asc')->Paginate(10);
        return view('admin.tips.lista_tips', compact('tips','busqueda'));
    }
    public function nuevotip(request $request){

        $tips = new Tip();
        $tips -> titulo = $request -> input('titulo');
        $tips -> descripcion = $request -> input('descripcion');
        if($request->has('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/tips/',$filename);
            $tips->imagen = $filename;
            
        }
        $tips ->save();

        return redirect('admin/lista_tips')->with('status', "Tip Creado Correctamente"); 
    }

    public function editartip(request $request){

        $tips = Tip::findorFail($request->input('id'));
        $tips -> titulo = $request -> input('titulo');
        $tips -> descripcion = $request -> input('descripcion');
        if($request->has('imagen')){
            $path='uploads/tips/'.$tips->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/tips/',$filename);
            $tips->imagen = $filename;
        }
        $tips ->save();

        return redirect('admin/lista_tips')->with('status', "Tip Editado Correctamente"); 

    }

    public function eliminartip(request $request){

        $tipid = $request ->input('tipid');
        Tip::destroy($tipid);
        return redirect('admin/lista_tips')->with('status', "Tip Eliminadp Correctamente");

    }
}
