<nav class="navbar navbar-expand navbar-light" id="navbar">
    <img id="logomarca" src="{{asset('assets/images/logo.png')}}" alt="Logo Marca" />
    <div class="ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item {{isset($current) && $current == 'home' ? 'active' : '' }}">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">Serviços</a>
            </li>
            <li class="nav-item {{isset($current) && $current == 'aboutUs' ? 'active' : '' }}">
                <a href="{{url('nossa-historia')}}" class="nav-link">Nossa História</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Portfólio</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Contato</a>
            </li>
        </ul>
    </div>
</nav>
