

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
                            <li class="active"><a href="#"><i class="fas fa-caret-right"></i>Home</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Ofertas e Serviços</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Nossa História</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Portfólio</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="info-social">
                    <p class="subtitle">Social</p>
                    <div class="info-items">
                        <div>
                            <img src="{{asset('assets/icons/instagram.png')}}"><p>@casaespecializadaemdepilacao</p>
                        </div>
                        <div>
                            <img src="{{asset('assets/icons/facebook.png')}}"><p>Casa de Depilação</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script>

        window.addEventListener('scroll', function(){

            const nav = $("#bgNavbar");

            if(window.scrollY > 36){

                console.log(nav);

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
