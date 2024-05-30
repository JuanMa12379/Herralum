<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ProyectoImagen;
use Illuminate\Support\Facades\File;

class ProyectoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listaproyecto(request $request){
        $busqueda = $request -> busqueda;
        $proyectos = Proyecto::where('nombre', 'LIKE','%'.$busqueda.'%')
        ->orderBy('nombre', 'desc')->Paginate(10);
        return view('admin.proyectos.index', compact('proyectos','busqueda'));
    }
    public function nuevoproyecto(){
        return view('admin.proyectos.nuevo');
    }

    public function guardarproyecto(request $request){

        $validated = $request->validate([
            
            'descripcion' => 'required',
            
        ]);
        
        $proyectos = new Proyecto();
        $proyectos -> nombre = $request -> input('nombre');
        $proyectos-> slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
        $proyectos -> ubicacion = $request -> input('ubicacion');
        $proyectos -> descripcion = $request -> input('descripcion');
        $proyectos -> meta_title = $request -> input('meta_title');
        $proyectos -> meta_description = $request -> input('meta_description');
        $proyectos -> meta_key = $request -> input('meta_key');
        

        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->move('uploads/proyectos/imagenes/',$filename);
            $proyectos->imagen = $filename;
        }


        $proyectos -> save();

        if ($request->hasFile('imagen2')) {
            foreach ($request->file('imagen2') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads/proyectos/imagenes_adicionales/', $filename);
    
                $proyectoImagen = new ProyectoImagen();
                $proyectoImagen->proyecto_id = $proyectos->id;
                $proyectoImagen->imagen = $filename;
                $proyectoImagen->save();
            }
        }

        return redirect('admin/lista_proyectos')->with('status', "Proyecto creado Correctamente");

    }

    public function traerproyecto($id){
        $proyectos = Proyecto::with('imagenes')->findOrFail($id);

        return view('admin.proyectos.editar',compact('proyectos'));
    }

    public function destroyImage($id, $imagenId)
        {
            $proyecto = Proyecto::findOrFail($id);
            $imagen = ProyectoImagen::findOrFail($imagenId);

            // Eliminar el archivo de la imagen del sistema de archivos
            $imagePath = public_path('uploads/proyectos/imagenes_adicionales/') . $imagen->imagen;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Eliminar la entrada de la base de datos
            $imagen->delete();

            return redirect()->back()->with('status', 'Imagen eliminada correctamente.');
        }

public function editarProyecto(Request $request, $id)
{
    $proyectos = Proyecto::find($id);
    $proyectos->nombre = $request->input('nombre');
    $proyectos->slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($request->input('nombre'))));
    $proyectos->ubicacion = $request->input('ubicacion');
    $proyectos->descripcion = $request->input('descripcion');
    $proyectos->meta_title = $request->input('meta_title');
    $proyectos->meta_description = $request->input('meta_description');
    $proyectos->meta_key = $request->input('meta_key');

    if ($request->hasFile('imagen')) {
        $path = 'uploads/proyectos/imagenes/' . $proyectos->imagen;
        if (File::exists($path)) {
            File::delete($path);
        }
        $file = $request->file('imagen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move('uploads/proyectos/imagenes/', $filename);
        $proyectos->imagen = $filename;
    }

    $proyectos->update();

    // Handle additional images
    if ($request->hasFile('imagen2')) {
        foreach ($request->file('imagen2') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/proyectos/imagenes_adicionales/', $filename);

            $proyectoImagen = new ProyectoImagen();
            $proyectoImagen->proyecto_id = $proyectos->id;
            $proyectoImagen->imagen = $filename;
            $proyectoImagen->save();
        }
    }

    // Handle image deletions
    if ($request->delete_images) {
        foreach ($request->delete_images as $imageId) {
            $imagen = ProyectoImagen::find($imageId);
            if ($imagen) {
                $path = 'uploads/proyectos/imagenes_adicionales/' . $imagen->imagen;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $imagen->delete();
            }
        }
    }

    return redirect('admin/lista_proyectos')->with('status', "Proyecto Editado Correctamente");
}

public function eliminarProyecto($id)
{
    $proyecto = Proyecto::find($id);

    // Delete main image
    if ($proyecto->imagen) {
        $path = 'uploads/proyectos/imagenes/' . $proyecto->imagen;
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    // Delete additional images
    foreach ($proyecto->imagenes as $imagen) {
        $path = 'uploads/proyectos/imagenes_adicionales/' . $imagen->imagen;
        if (File::exists($path)) {
            File::delete($path);
        }
        $imagen->delete();
    }

    // Delete project
    $proyecto->delete();

    return redirect('admin/lista_proyectos')->with('status', "Proyecto y sus imágenes eliminados correctamente");
}

}
