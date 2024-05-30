@extends('welcome')
@section('content')

<!-- Sección de encabezado -->
<div class="hero-section" style="background: url('{{asset('uploads/categorias/'.$productos->categoria->imagen)}}')">
    <h1>{{$productos->categoria->nombre}}</h1>
    <p>{{$productos->categoria->descripcion}}</p>
    
  </div>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="product-images">
                    <img src="{{asset('uploads/productos/imagenes/'.$productos->imagen)}}" alt="Producto" class="img-fluid main-image">
                    
                </div>
            </div>
            <div class="col-md-6">
                <h1>{{$productos->nombre}}</h1>
                <p>{!!$productos->descripcion!!}</p>
                
                <h5>Colores:</h5>
                <div class="color-options d-flex">
                    <div class="color-box bg-black"></div>
                    <div class="color-box bg-dark"></div>
                    <div class="color-box bg-secondary"></div>
                    <div class="color-box bg-light"></div>
                </div>
                
                <h5>Especificaciones</h5>
                <p>{!!$productos->especificaciones!!}</p>
                
                <div class="action-buttons d-flex justify-content-between mt-4">
                    <button class="btn btn-primary"><a href="{{url('contacto')}}" style="text-decoration: none; color: white;">Solicitar Cotización</a></button>
                    <button class="btn btn-secondary"><a href="{{asset('uploads/productos/catalogos/'.$productos->catalogo)}}" target="blank_" style="text-decoration: none; color: white;">Descargar Catálogo</a></button>
                </div>
            </div>
        </div>
    </div>
<br><br>
@endsection