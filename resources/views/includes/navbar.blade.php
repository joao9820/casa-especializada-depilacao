<nav class="navbar navbar-expand-md navbar-light align-items-center align-items-md-center" id="navbar">
    {{-- <img id="logomarca" src="{{asset('assets/images/logo.png')}}" alt="Logo Marca" /> --}}
    <h2 id="navLogo">CASA ESPECIALIZADA EM DEPILAÇÃO</h2>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-light"></i>
    </button>

        <div class="collapse navbar-collapse pt-md-0" id="navbarDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{isset($current) && $current == 'home' ? 'active' : '' }}">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{isset($current) && $current == 'services' ? 'active' : '' }}">
                    <a href="{{route('grupo-servicos')}}" class="nav-link">Serviços</a>
                </li>
                <li class="nav-item {{isset($current) && $current == 'aboutUs' ? 'active' : '' }}">
                    <a href="{{url('nossa-historia')}}" class="nav-link">Nossa História</a>
                </li>
              {{--   <li class="nav-item">
                    <a href="#" class="nav-link">Portfólio</a>
                </li> --}}
                <li class="nav-item {{isset($current) && $current == 'meetUs' ? 'active' : '' }}">
                    <a href="{{route('contato')}}" class="nav-link">Contato</a>
                </li>
            </ul>
            <div class="contact-info">
                <a href="#"><i class="fas fa-envelope"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

</nav>
