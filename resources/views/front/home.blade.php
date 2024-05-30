@extends('welcome')
@section('content')
<section style="background-color: #003d87; padding: 15px; margin-top: 10px;">
      </section>

      <div class="container-fluid" style="padding: 0px;">

          <!-- Carousel Start-->
          <div class="home-carousel"> 
              <div class="homepage owl-carousel">
                @foreach($banners as $ban)
                <div class="item" style="background: url('{{asset('uploads/banners/'.$ban->imagen)}}') center center repeat; background-size: cover;">
                  <div class="row">
                    <div class="col-md-5 text-left" style="background-color: #00000080; padding: 60px;">
                      <br>
                      <p style="font-size: 15px;">{{$ban->nombre}}</p>
                      <h1 style="color: #fff;">{{$ban->title}}</h1>
                      <p style="padding-bottom: 20px;">{{$ban->alt}}</p>
                      <p class="text-left"><a href="#" class="btn btn-template-outlined-white btn-lg" style="color: #fff;">Cotizaciones</a></p>
                    </div>
                    <div class="col-md-7" style=""><img src="img/template-homepage.png" alt="" class="img-fluid"></div>
                  </div>
                </div>
                @endforeach
              </div>
     
          </div>
          <!-- Carousel End-->

        </div>



    <!-- Solutions Section -->
    <section class="solutions py-5 text-center">
        <div class="container">
            <h2 class="mb-5">SOLUCIONES INTEGRALES EN HERRAJES</h2>
            <div class="row">
                @foreach($tips as $tip)
                <div class="col-md-3 justify-content-center aling-items-center">
                    <img src="{{asset('uploads/tips/'.$tip->imagen)}}" alt="Herrajes para Aluminio" class="img-fluid-redonda mb-3">
                    <h3>{{$tip->titulo}}</h3>
                    <p>{{ Str::limit($tip->descripcion, 100, '...') }}</p>
                   <p class="text-center"><a href="#" class="ver-mas" data-tip="{{ json_encode(['titulo' => $tip->titulo, 'descripcion' => $tip->descripcion, 'imagen' => asset('uploads/tips/' . $tip->imagen)]) }}" style="color: black;">Ver más</a></p>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="tipModal" tabindex="-1" aria-labelledby="tipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content justify-content-center text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="tipModalLabel">Detalles del Tip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="modalTipImage" class="img-fluid mb-3" alt="Imagen del Tip">
                <h3 id="modalTipTitle"></h3>
                <p id="modalTipDescription"></p>
            </div>
        </div>
    </div>
</div>

    
     <!-- Projects Section -->
     <section class="projects py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="project-info">
                        <h2>PROYECTOS 2024</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem urna ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris</p>
                        <button class="btn btn-outline-secondary "><a href="{{url('proyectos')}}" style="text-decoration: none; color: black;">Ver Proyectos</a></button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ultimosproyectos as $ultimo)
                        <a href="{{url('detalle_proyecto/'.$ultimo->slug)}}">
                        <div class="col-md-4 mb-3">
                            <div class="project-img-wrapper">
                                <img src="{{asset('uploads/proyectos/imagenes/'.$ultimo->imagen)}}" class="img-fluid" alt="Cancel - Polanco">
                                <div class="project-overlay">
                                    <div class="project-text">{{$ultimo->nombre}}</div>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="car-pro">
    <!-- Testimonials Section -->
    <div class="carousel-container">
    <button class="carousel-btn prev" onclick="prevSlide()">&#10094;</button>
    <div class="carousel">
        @foreach($productos_ten as $prot)
      <img src="{{asset('uploads/productos/imagenes/'.$prot->imagen)}}" alt="Imagen 1" height="350px" with="350px">
        @endforeach
      <img src="https://via.placeholder.com/300x250" alt="Imagen 2">
      <img src="https://via.placeholder.com/300x250" alt="Imagen 3">
      <img src="https://via.placeholder.com/300x250" alt="Imagen 4">
      <img src="https://via.placeholder.com/300x250" alt="Imagen 4">
      
      <!-- Añadir más imágenes si es necesario -->
    </div>
    <button class="carousel-btn next" onclick="nextSlide()">&#10095;</button>
  </div>
</div>         

<!-- Newsletter Section -->
<div class="container">
        <!-- Testimonial Section -->
        <div class="testimonial">
            <div class="testimonial-quote">
                “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem urna ipsum dolor sit amet, consectetur ipsum dolor”
            </div>
            <div class="testimonial-client">
                TESTIMONIO CLIENTE
            </div>
            <div class="more-testimonials">
                Más testimonios
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="row align-items-center newsletter">
            <div class="col-md-4 text-center">
                <h5>Suscríbete a nuestro:</h5>
                <h2>NEWSLETTER</h2>
                <button type="button" class="btn btn-outline-secondary">SUSCRIBIRSE</button>
            </div>
            <div class="col-md-8 images-row">
                <img src="https://via.placeholder.com/300x200" alt="Imagen 1">
                <img src="https://via.placeholder.com/300x200" alt="Imagen 2">
                <img src="https://via.placeholder.com/300x200" alt="Imagen 3">
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="container-info">
    <div class="section-container">
        <div class="info-section">
            <h2>QUIENES SOMOS</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem urna ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem urna ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem urna ipsum dolor sit amet, consectetur adipiscing elit.</p>
            
            <div class="process-section">
                <h4>PROCESO DE COMPRA</h4>
                <ul class="process-list">
                    <li>Lorem ipsum dolor sit amet, co adipiscing.</li>
                    <li>Lorem sit amet, consectetur adipiscing.</li>
                    <li>Lorem consectetur adipiscing.</li>
                    <li>Lorem ipsum amet, consectetur adipiscing.</li>
                </ul>
            </div>
        </div>
        <div class="image-section">
            <img src="https://via.placeholder.com/600x285" alt="Imagen de producto">
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tipModal = document.getElementById('tipModal');
        var modalTitle = document.getElementById('modalTipTitle');
        var modalDescription = document.getElementById('modalTipDescription');
        var modalImage = document.getElementById('modalTipImage');

        document.querySelectorAll('.ver-mas').forEach(function (element) {
            element.addEventListener('click', function (event) {
                event.preventDefault();
                var tip = JSON.parse(this.getAttribute('data-tip'));

                modalTitle.textContent = tip.titulo;
                modalDescription.textContent = tip.descripcion;
                modalImage.src = tip.imagen;

                var bootstrapModal = new bootstrap.Modal(tipModal);
                bootstrapModal.show();
            });
        });
    });
</script>
@endsection
