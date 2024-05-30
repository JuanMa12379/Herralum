@extends('admin.layouts.layout') 
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-black">Lista de Productos </h3>
                <hr>
                @if (Auth::user()->crearr == '1')
                <a class="btn btn-primary" href="{{url('admin/nuevo_producto')}}">Agregar Nuevo Producto</a>
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
                            <th> Categoria</th>
                            <th> Nombre</th>
                            <th> Catalogo</th>
                            <th> Imagen</th>
                            <th> Tendencia</th>
                            <th> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($productos as $pro)
                         <tr>
                            <td> {{$pro->id}} </td>
                            <td> {{$pro->categoria->nombre}}</td>
                            <td> {{$pro->nombre}}</td>
                            <td> <a class="btn btn-danger" href="{{asset('uploads/productos/catalogos/'.$pro->catalogo)}}" target="blank_">Ver Catalogo</a></td>
                            <td> <img src="{{asset('uploads/productos/imagenes/'.$pro->imagen)}}" width="60px" height="60px"></td>
                            <td class="col-auto">@if($pro->tendencia == '1')
                                <button class="btn btn-success">Si</button>    
                            
                                @else

                                <button class="btn btn-danger">No</button> 

                            
                            @endif
                            </td>
                            <td>
                            @if (Auth::user()->editarr == '1')
                                <a href="{{url('admin/editar_producto/'.$pro->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                
                            @endif
                            @if (Auth::user()->eliminarr == '1')
                            <form method="POST" action="{{url('admin/eliminar_producto/'.$pro->id)}} " class="d-inline">
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
                {{$productos->links()}}

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