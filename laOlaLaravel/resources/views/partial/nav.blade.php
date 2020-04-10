<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Ola | Hamburguesas Veggie</title>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{your-app-id}',
          cookie     : true,
          xfbml      : true,
          version    : '{api-version}'
        });
        FB.AppEvents.logPageView();
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/logyregistro.css">
    <link rel="stylesheet" href="/css/products.css">
    <link rel="stylesheet" href="/css/carrito.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a href="/" class="logo"></a>
       <!-- <h1>LA OLA</h1> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/"><i class="fas fa-home"></i></ion-icon><br>Home </a>
            </li>
            @if((Auth::user()) && (Auth::user()->admin))
            <li class="nav-item active">
              <a class="nav-link" href="/productos/agregar"><i class="fas fa-plus"></i></i></ion-icon><br>Agregar </a>
            </li>
            @endif
            <li class="nav-item active">
              <a class="nav-link" href="/productos"><i class="fas fa-hamburger"></i></ion-icon><br>Productos </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/preguntas"><i class="fas fa-question"></i></i></i><br>F.A.Q.</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/carrito" ><i class="fas fa-shopping-cart"></i>

               @if($user = Auth::user())
                (<span id="cantCar">{{ $user->carrito()->sum('quantity') }}</span>)
              @endif

              <br> Carrito</a>

            </li>

            @guest
            <li class="nav-item active">
              <a class="nav-link" href="/register"><i class="fas fa-pencil-alt"></i></i><br>Registrate</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/login"><i class="fas fa-user-circle" ></i><br>Login</a>
            </li>

              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="/storage/{{Auth::user()->foto}}" alt="" class="foto">
                  <br>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>

            @endguest
          </ul>
        </div>
      </nav>
</div>
