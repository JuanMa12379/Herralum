@extends('welcome')
@section('content')
    
 <!-- Sección de encabezado -->
 <div class="hero-section" style="background: url('{{asset('uploads/categorias/'.$categoria->imagen)}}')">
    <h1>{{$categoria->nombre}}</h1>
    <p>{{$categoria->descripcion}}</p>
    
  </div>

  <!-- Galería de productos -->
  <div class="container py-5">
    <div class="row">
      @foreach($productos as $pro)
      <div class="col-md-3">
        <div class="card product-card">
          <img src="{{asset('uploads/productos/imagenes/'.$pro->imagen)}}" alt="Producto 1" >
          <div class="card-body">
            <h5 class="card-title">{{$pro->nombre}}</h5>
            <a href="{{url('detalle_producto/'.$categoria->slug.'/'.$pro->slug)}}" class="btn btn-outline-secondary">VER MÁS</a>         
           </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>

@endsection