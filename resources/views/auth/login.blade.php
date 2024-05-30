<!doctype html>
<html lang="en">
    <head>
        <title>Login-Vitrelum</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>

    <body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>
        
        <form action="{{route('login')}}" method="Post" class="p-3 mt-3">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="userName" placeholder="Correo Electronico" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn mt-3">Entrar -></button>
        </form>
        
    </div>
    </body>
</html>

