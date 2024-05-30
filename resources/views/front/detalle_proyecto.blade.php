@extends('welcome')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center justify-content-center aling-item-center">
            <img src="{{ asset('uploads/proyectos/imagenes/' . $proyectos->imagen) }}" class="img-fluid main-image" alt="Producto">
            <div class="mt-3">
                @foreach($proyectos->imagenes as $imagen)
                    <img src="{{ asset('uploads/proyectos/imagenes_adicionales/' . $imagen->imagen) }}" class="img-thumbnail thumb-image" alt="Producto 1" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('uploads/proyectos/imagenes_adicionales/' . $imagen->imagen) }}">
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h2>{{ $proyectos->nombre }}</h2>
            <h4><i class="fas fa-map-marker-alt"></i> {{$proyectos->ubicacion}}</h4>
            <p>{!! $proyectos->descripcion !!}</p>
            
            <div class="row mt-4">
                <div class="col-md-6">
                <p class="text-left" style="background-color: "><a href="{{url('contacto')}}" class="btn btn-template-outlined-black btn-lg" style="color: black;">Cotizar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal con Carrusel -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($proyectos->imagenes as $index => $imagen)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($proyectos->imagenes as $index => $imagen)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/proyectos/imagenes_adicionales/' . $imagen->imagen) }}" class="d-block w-100 img-fluid" alt="Imagen {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imageModal = document.getElementById('imageModal');
        var carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleIndicators'));

        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imageSrc = button.getAttribute('data-src');
            var items = document.querySelectorAll('#carouselExampleIndicators .carousel-item');

            items.forEach(function (item, index) {
                var img = item.querySelector('img');
                if (img.getAttribute('src') === imageSrc) {
                    carousel.to(index);
                }
            });
        });
    });
</script>


@endsection
