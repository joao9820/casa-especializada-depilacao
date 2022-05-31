<nav class="navbar navbar-expand-md navbar-light align-items-center align-items-md-center mt-3" id="navbar">
    <img id="logomarca" src="{{asset('assets/images/logo.png')}}" alt="Logo Marca" />
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse pt-3 pt-md-0 pl-4 pl-md-0" id="navbarDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{isset($current) && $current == 'home' ? 'active' : '' }}">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{isset($current) && $current == 'services' ? 'active' : '' }}">
                    <a href="{{route('servicos')}}" class="nav-link">Serviços</a>
                </li>
                <li class="nav-item {{isset($current) && $current == 'aboutUs' ? 'active' : '' }}">
                    <a href="{{url('nossa-historia')}}" class="nav-link">Nossa História</a>
                </li>
              {{--   <li class="nav-item">
                    <a href="#" class="nav-link">Portfólio</a>
                </li> --}}
                <li class="nav-item {{isset($current) && $current == 'meetUs' ? 'active' : '' }}">
                    <a href="{{url('contato')}}" class="nav-link">Contato</a>
                </li>
            </ul>
        </div>

</nav>
