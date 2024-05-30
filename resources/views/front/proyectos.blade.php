@extends('welcome')
@section('content')
<div class="container my-5">
    <header class="text-center mb-5">
        <h1 class="display-4">PROYECTOS</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id orci non ipsum sollicitudin lobortis. Donec ut porttitor ante. Aenean auctor rhoncus mi, a commodo metus lacinia sit amet. Phasellus lobortis non tortor vel vehicula. Proin ornare cursus nunc eu sodales.</p>
    </header>

    <div class="row container-proy">
        @foreach($proyectos as $pro)
       <div class="col-md-6 ">
            <div class="card">
                <img src="{{asset('uploads/proyectos/imagenes/'.$pro->imagen)}}" class="card-img-top" alt="vitrelum" width="350px" height="350px">
                <div class="card-body bg-dark text-white text-center">
                    <h5 class="card-title">{{$pro->nombre}}</h5>
                    <a href="{{url('detalle_proyecto/'.$pro->slug)}}" class="btn btn-outline-light">VER PROYECTO</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection