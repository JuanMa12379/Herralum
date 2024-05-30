@extends('admin.layouts.layout') 
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Lista de Proyectos </h3>
                <hr>
                @if (Auth::user()->crearr == '1')
                <a class="btn btn-primary" href="{{url('admin/nuevo_proyecto')}}">Agregar Nuevo Proyecto</a>
                @endif
                <form action="{{url('admin/lista_productos')}}" mmethod="GET">
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
                <div class="col-auto">

                <table class="table table-bordered ">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th> Id</th>
                            <th> Nombre</th>
                            <th> Ubicacion</th>
                            
                            <th> Imagen</th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($proyectos as $proy)
                         <tr>
                            <td> {{$proy->id}} </td>
                            <td> {{$proy->nombre}}</td>
                            <td> {{$proy->ubicacion}}</td>
                            <td> <img src="{{asset('uploads/proyectos/imagenes/'.$proy->imagen)}}" width="60px" height="60px"></td>
                            
                            <td>
                            @if (Auth::user()->editarr == '1')
                                <a href="{{url('admin/editar_proyecto/'.$proy->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                
                            @endif
                            @if (Auth::user()->eliminarr == '1')
                            <form method="POST" action="{{url('admin/eliminar-proyecto/'.$proy->id)}} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger deleteItem"><i class="fas fa-trash" ></i></a>
                            </form>
                                
                                
                            @endif
                            </td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table> 
                {{$proyectos->links()}}

                </div>
                
            </div>
        </div>
    </div>

   

    
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