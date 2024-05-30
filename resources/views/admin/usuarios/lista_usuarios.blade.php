@extends('admin.layouts.layout') 
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Lista de usuarios </h3>
                <hr>
                @if (Auth::user()->crearr == '1')
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal" >
                  Agregar Nuevo usuario
                </button>
                @endif

                <form action="{{url('admin/lista_usuarios')}}" mmethod="GET">
                <div class="row  justify-content-center ">
                    <div class="col-md-4">
                    <label for=""><strong>Buscar:</strong></label>
                        <div class="row ">
                            <div class="col-md-5">
                            <input type="text" name="busqueda" placeholder="Nombre " class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="form-control">
                                   <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <br>

                <table class="table table-bordered">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th> Id</th>
                            <th> Nombre</th>
                            <th> Correo</th>
                            <th> Acciones</th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($users as $us)
                         <tr>
                            <td> {{$us->id}} </td>
                            <td> {{$us->name}}</td>
                            <td> {{$us->email}}</td>
                            <td>
                            {{ $us->crearr == "1" ? 'Crear' : ''}}
                            {{ $us->editarr == "1" ? '|Editar' : ''}}
                            {{ $us->eliminarr == "1" ? '|Eliminar' : ''}}
                            </td>
                           
                            <td>
                            @if (Auth::user()->editarr == '1')
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editStudentModal{{$us->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endif
                             @if (Auth::user()->eliminarr == '1')
                                <form method="POST" action="{{url('admin/eliminar_usuario')}} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="usuarioid" value="{{$us->id}}">
                                    <button class="btn btn-danger btn-sm deleteItem" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                              @endif
                            </td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table> 
                {{$users->appends(['busqueda'=>$busqueda])}}
            </div>
        </div>
    </div>

    <!-- Add Banner Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST" action=" {{url('admin/nuevo_usuario')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel"> Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name"> Nombre</label>
                            <input type="text" name="name" class="form-control" required autocomplete="off" placeholder="Nombre del Usuario">
                        </div>

                        <div class="form-group">
                            <label for="address">Correo</label>
                            <input type="email" name="email" class="form-control" placeholder="Correo Electronico" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email"> Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                        <label for="email">Opciones del Usuario</label>
                        </div>
                          
                        <div class="row">

                            <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="crearr" >
                              <label class="form-check-label" for="flexSwitchCheckDefault">Crear Registros</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="editarr" >
                              <label class="form-check-label" for="flexSwitchCheckDefault"> Editar Registros</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="eliminarr" >
                              <label class="form-check-label" for="flexSwitchCheckDefault"> Eliminar Registros</label>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Banner Modal  -->
    @foreach($users as $us)
    <div class="modal fade" id="editStudentModal{{$us->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editStudentModalLabel{{$us->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST" action=" {{url('admin/editar_usuario')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel{{$us->id}} "><i class="fas fa-edit"></i> Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="id" value="{{$us->id}} ">
                        <div class="form-group">
                            <label for="name"> Nombre</label>
                            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{$us->name}}">
                        </div>

                        <div class="form-group">
                            <label for="address">Correo</label>
                            <input type="email" name="email" class="form-control" value="{{$us->email}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="email"> Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Solo escribir en caso de modificar">
                            <div class="alert alert-danger">Solo modificar en caso de cambiar la contrseña</div>
                        </div>
                        <div class="form-group">
                        <label for="email">Opciones del Usuario</label>
                        </div>
                          
                        <div class="row">

                        <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="crearr" {{ $us->crearr == "1" ? 'checked' : ''}} >
                              <label class="form-check-label" for="flexSwitchCheckDefault">Crear Registros</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="editarr" {{ $us->editarr == "1" ? 'checked' : ''}}>
                              <label class="form-check-label" for="flexSwitchCheckDefault">Editar Registros</label>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="eliminarr" {{ $us->eliminarr == "1" ? 'checked' : ''}}>
                              <label class="form-check-label" for="flexSwitchCheckDefault">Eliminar Registros</label>
                            </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @endforeach
</div>
</div>
  <!-- /.content-wrapper -->
@endsection

@section('js')

<!--SweetAlrt-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.deleteItem').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        swal.fire({
            title: "¿Estás seguro?",
            text: "Se borrará de forma permanente.",
            icon: "warning",
            showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
    
        }).then((result) => {
           if(result.value){
            form.submit(); // Envía el formulario si se confirma
           }
            
        });
    });
</script>

@endsection