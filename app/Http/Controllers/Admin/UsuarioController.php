<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(request $request){
        $busqueda = $request -> busqueda;
        $users = User::where('name', 'LIKE', '%'.$busqueda.'%')
        ->orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.usuarios.lista_usuarios', compact('users','busqueda'));
    }

    public function nuevousuario(request $request){
        
        $users = new User();
        $users -> name = $request -> input('name');
        $users -> email = $request -> input('email');
        $users-> password = bcrypt($request->input('password'));
        $users -> crearr = $request -> input('crearr')==TRUE? '1':'0';
        $users -> editarr = $request -> input('editarr')==TRUE? '1':'0';
        $users -> eliminarr = $request -> input('eliminarr')==TRUE? '1':'0';
        $users->save();
        return redirect('admin/lista_usuarios')->with('status', 'Usuario creado correctamente' );

    }

    public function editarusuarios(request $request){

        $users = User::findorFail($request->input('id'));
        $data = $request->only(
        'name',
        'email',
        $users -> crearr = $request -> input('crearr')==TRUE? '1':'0',
        $users -> editarr = $request -> input('editarr')==TRUE? '1':'0',
        $users -> eliminarr = $request -> input('eliminarr')==TRUE? '1':'0'
        );
        if(trim($request->password)==''){
            $data=$request->except('password');
        }else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $users->update($data);
        return redirect('admin/lista_usuarios')->with('status', 'Usuario Editado correctamente' );
        
    }

    public function eliminarusuario(request $request){
        $users = User::findorFail($request->input('usuarioid'));
        $users->delete();
        return redirect('admin/lista_usuarios')->with('status', 'Usuario Eliminado correctamente' );
    }

}
