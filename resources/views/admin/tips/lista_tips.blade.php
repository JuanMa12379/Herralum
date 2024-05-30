@extends('admin.layouts.layout') 
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Lista de Tips </h3>
                <hr>
                @if (Auth::user()->crearr == '1')
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                  Agregar Nuevo Tip
                </button>
                @endif
                <form action="{{url('admin/lista_categorias')}}" mmethod="GET">
                <div class="row  justify-content-center ">
                    <div class="col-md-4">
                    <label for=""><strong>Buscar:</strong></label>
                        <div class="row ">
                            <div class="col-md-5">
                            <input type="text" name="busqueda" placeholder="Titulo " class="form-control">
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
                            <th> Titulo</th>
                            <th> Descripción</th>
                            <th> Imagen</th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($tips as $tip)
                         <tr>
                            <td> {{$tip->id}} </td>
                            <td> {{$tip->titulo}}</td>
                            <td> {{$tip->descripcion}}</td>
                            <td> <img src="{{asset('uploads/tips/'.$tip->imagen)}}" width="50px" height="50px"></td>
                            <td>
                            @if (Auth::user()->editarr == '1')
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editStudentModal{{$tip->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endif
                                @if (Auth::user()->eliminarr == '1')
                                <form method="POST" action="{{url('admin/eliminar_tip')}} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="tipid" value="{{$tip->id}}">
                                    <button class="btn btn-danger btn-sm deleteItem" type="submit" >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                            </td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table> 
                {{$tips->appends(['busqueda'=>$busqueda])}}
            </div>
        </div>
    </div>

    <!-- Add Marca Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{url('admin/nuevo_tip')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel"> Agregar Tip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Titulo</label>
                            <input type="text" name="titulo" class="form-control" required autocomplete="off" placeholder="Titulo del Tip">
                        </div>
                        <div class="form-group">
                            <label for="name">Descripcion</label>
                            <textarea type="text" name="descripcion" rows="5" class="form-control" required autocomplete="off" placeholder="Descripcion del Tip"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"> Imagen</label><label style="font-size: 16px; margin: 0; background-color: #FFB353;">300px X 300px</label>
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
    @foreach($tips as $tip)
    <div class="modal fade" id="editStudentModal{{$tip->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editStudentModalLabel{{$tip->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action=" {{url('admin/editar_tip')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel{{$tip->id}} "><i class="fas fa-edit"></i> Editar tip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{$tip->id}} ">
                        <div class="form-group">
                            <label for="name"> Nombre</label>
                            <input type="text" name="titulo"  class="form-control" value="{{$tip->titulo}} " required>
                        </div>
                        <div class="form-group">
                            <label for="name">Descripcion</label>
                            <textarea type="text" name="descripcion" rows="5" class="form-control"  autocomplete="off">{{$tip->descripcion}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address"> Imagen</label></label><label style="font-size: 16px; margin: 0; background-color: #FFB353;">300px X 300px</label>
                           
                           @if($tip->imagen)
                            <div>
                                 <img src="{{asset('uploads/tips/'.$tip->imagen)}}" width="50px" height="50px">
                            </div>
                            @endif
                           
                            <input type="file" name="imagen" class="form-control" accept="image/*" autocomplete="off" value="{{$tip->imagen}}">
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