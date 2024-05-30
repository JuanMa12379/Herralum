<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(request $request){
        $busqueda = $request -> busqueda;
        $banners = Banner::where('nombre', 'LIKE','%'.$busqueda.'%')
        ->orderBy('orden', 'desc')->Paginate(10);
        return view('admin.banners.lista_banners', compact('banners','busqueda'));
    }

    public function crearbanner(request $request){

        $banners = new Banner();
        if($request->has('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/banners/',$filename);
            $banners->imagen = $filename;
            
        }
        $banners -> nombre = $request -> input('nombre');
        $banners -> title = $request -> input('title');
        $banners -> alt = $request -> input('alt');
        $banners -> orden = $request -> input('orden');
        $banners ->save();

        return redirect('admin/lista_banners')->with('status', "Banner Creado correctamente"); 

    }

    public function editarbanner(request $request){

        $request -> validate ([
            'nombre'=> 'required|max:250|string'
        ]);

        $banners = Banner::findorFail($request->input('id'));
        if($request->has('imagen')){
            $path='uploads/banners/'.$banners->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/banners/',$filename);
            $banners->imagen = $filename;
        }
        $banners -> nombre = $request -> input('nombre');
        $banners -> title = $request -> input('title');
        $banners -> alt = $request -> input('alt');
        $banners -> orden = $request -> input('orden');
        $banners ->save();

        return redirect('admin/lista_banners')->with('status', "Banner Modificado correctamente"); 
    }

    public function eliminarbanner(request $request){
        $banners = Banner::findorFail($request->input('bannerid'));
        if($banners->imagen)
        {
            $path='uploads/banners/'.$banners->imagen;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $banners->delete();
        return redirect('admin/lista_banners')->with('status', "Banner Eliminado correctamente"); 

    }
}
