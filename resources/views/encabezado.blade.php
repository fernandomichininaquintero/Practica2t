@php

use App\Models\Categoria;

$categorias = Categoria::get();
@endphp

<nav class="navbar navbar-expand-md navbar-light " style="background-color: #33D1FF;">
  <a class="navbar-brand" href="{{route('home')}}" style="color: black;">FMQ</a>
  <button class="navbar-toggler" style="background-color: #33D1FF;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}" style="color: black;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="categorias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorias
          </button>
          <div class="dropdown-menu" aria-labelledby="categorias">
            @foreach($categorias as $categoria)
                <a class="dropdown-item" href="{{route('categoria.ver', ['categoria_id'=>$categoria->id])}}">{{ $categoria->getCategoriasVisibles() }}</a>
            @endforeach
          </div>
        </div>
      </li>
      
    </ul>
    <!-- Authentication Links -->
      @guest
        @if (Route::has('login'))
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

        @endif

        @if (Route::has('register'))
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
      @else
        <div class="dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.delete') }}">
                  {{ __('Eliminar cuenta') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.modify') }}">
                  {{ __('Modificar cuenta') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
      @endguest
    <a class="btn" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></a>
  </div>
</nav>