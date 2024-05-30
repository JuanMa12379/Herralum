@extends('admin.layouts.layout') 
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Lista de Categorias </h3>
                <hr>
                @if (Auth::user()->crearr == '1')
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                  Agregar Nueva Categoria
                </button>
                @endif
                <form action="{{url('admin/lista_categorias')}}" mmethod="GET">
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
                            <th> Descripción</th>
                            <th> Imagen</th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($categorias as $cat)
                         <tr>
                            <td> {{$cat->id}} </td>
                            <td> {{$cat->nombre}}</td>
                            <td> {{$cat->descripcion}}</td>
                            <td> <img src="{{asset('uploads/categorias/'.$cat->imagen)}}" width="50px" height="50px"></td>
                            <td>
                            @if (Auth::user()->editarr == '1')
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editStudentModal{{$cat->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endif
                                @if (Auth::user()->eliminarr == '1')
                                <form method="POST" action="{{url('admin/eliminar_categoria')}} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="categoriaid" value="{{$cat->id}}">
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
                {{$categorias->appends(['busqueda'=>$busqueda])}}
            </div>
        </div>
    </div>

    <!-- Add Marca Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{url('admin/nueva_categoria')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel"> Agregar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required autocomplete="off" placeholder="Nombre de la Categoria">
                        </div>
                        <div class="form-group">
                            <label for="name">Descripcion</label>
                            <textarea type="text" name="descripcion" class="form-control" required autocomplete="off" placeholder="Descripcion de la Categoria"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"> Imagen</label><label style="font-size: 16px; margin: 0; background-color: #FFB353;">600px X 400px</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*" required autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Marca Modal (for each student) -->
    @foreach($categorias as $cat)
    <div class="modal fade" id="editStudentModal{{$cat->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editStudentModalLabel{{$cat->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{url('admin/editar_categoria')}} " enctype="multipart/form-data">>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel{{$cat->id}} "><i class="fas fa-edit"></i> Editar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{$cat->id}} ">
                        <div class="form-group">
                            <label for="name"> Nombre</label>
                            <input type="text" name="nombre"  class="form-control" value="{{$cat->nombre}} " required>
                        </div>
                        <div class="form-group">
                            <label for="name">Descripcion</label>
                            <textarea type="text" name="descripcion" class="form-control">{{$cat->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"> Imagen</label></label><label style="font-size: 16px; margin: 0; background-color: #FFB353;">600px X 400px</label>
                           
                           @if($cat->imagen)
                            <div>
                                 <img src="{{asset('uploads/categorias/'.$cat->imagen)}}" width="50px" height="50px">
                            </div>
                            @endif
                           
                            <input type="file" name="imagen" class="form-control" accept="image/*" autocomplete="off" value="{{$cat->imagen}}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @endforeach
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