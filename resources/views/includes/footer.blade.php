

    <footer>
        <div class="container-md p-4">

            <h2 id="footerLogo">CASA ESPECIALIZADA EM DEPILAÇÃO</h2>

            <div id="footerInfo">
                <div class="info-adress">
                    <p class="subtitle">Endereços</p>
                    <div class="info-items">
                        <div>
                            <p><i class="fas fa-map-marker-alt"></i>QNB 05 Lote 39 - Loja 3/4 - Taguatinga Norte</p>
                            <p><i class="fas fa-phone"></i>(61) 3352-4265</p>
                            <p><i class="fab fa-whatsapp"></i>(61) 99934-7852</p>
                        </div>
                        <div class="mt-3">
                            <p><i class="fas fa-map-marker-alt"></i>CBS 03 LOTE 07/08 - ED. São José - Taguatinga Sul</p>
                            <p><i class="fas fa-phone"></i>(61) 3351-8488</p>
                            <p><i class="fab fa-whatsapp"></i>(61) 99315-9867</p>
                        </div>
                    </div>
                </div>
                <div class="info-menu mx-md-4">
                    <p class="subtitle">Menu</p>
                    <div class="info-items">
                        <ul>
                            <li class="{{isset($current) && $current == 'home' ? 'active' : '' }}"><a href="{{route('home')}}"><i class="fas fa-caret-right"></i>Home</a></li>
                            <li class="{{isset($current) && $current == 'services' ? 'active' : '' }}"><a href="{{route('grupo-servicos')}}"><i class="fas fa-caret-right"></i>Serviços</a></li>
                            {{-- <li class="{{isset($current) && $current == 'aboutUs' ? 'active' : '' }}"><a href="{{url('nossa-historia')}}"><i class="fas fa-caret-right"></i>Nossa História</a></li> --}}
                            <li class="{{isset($current) && $current == 'meetUs' ? 'active' : '' }}"><a href="{{url('contato')}}"><i class="fas fa-caret-right"></i>Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="info-social">
                    <p class="subtitle">Social</p>
                    <div class="info-items">
                        <div>
                            <img src="{{secure_asset('assets/icons/instagram.png')}}"><p>@casaespecializadaemdepilacao</p>
                        </div>
                        <div>
                            <img src="{{secure_asset('assets/icons/facebook.png')}}"><p>Casa de Depilação</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>

        <div class="d-flex dropright" id="gp-whatsapp">
            <button class="btn d-flex align-items-center justify-content-center rounded-circle grad {{isset($current) && $current == 'home' ? 'wow fadeIn rollIn' : ''}}"
            data-wow-delay="1s" type="button" id="btn-whatsapp"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            >
                <i class="fab fa-whatsapp text-light" style="font-size: 2rem;"></i>
            </button>
            <div class="ml-2 gp-whatsapp-links dropdown-menu">
                <div>
                    <a href="https://api.whatsapp.com/send?phone=5561999347852&text=Olá!%20preciso%20entrar%20em%20contato" target="_blank" class="link-whatsapp">Tag. Norte</a>
                </div>
                <div class="mt-2">
                    <a href="https://api.whatsapp.com/send?phone=5561993159867&text=Olá!%20preciso%20entrar%20em%20contato" target="_blank" class="link-whatsapp">Tag. Sul</a>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script>

        //Ativa o tooltip para as páginas
        $('[data-toggle="tooltip"]').tooltip();

        window.addEventListener('scroll', function(){

            const nav = $("#bgNavbar");

            if(window.scrollY > 36){

                //console.log(nav);

                nav.addClass('nav-fixed');

            }else{
                nav.removeClass('nav-fixed');
            }

        });
    </script>

    @hasSection('script')
        @yield('script')
    @endif

    </body>
</html>
