@extends('layout.site', ['current' => 'home'])
@section('title', 'Página Inicial')

@section('style')
    <style>

        body main {
            padding: 3rem 0;
        }

        #slogan {
            white-space: nowrap;
            font-size: 48px;
            font-weight: 700;
            color: var(--color-primary-blue);
        }

        #slogan span {
            color: var(--color-secondary-orange);
        }

        #presentation {
            height: 405px;
            display: flex;
            align-items: center;
            margin-bottom: 85px;
            /* background-repeat: no-repeat;
            background-position: right;
            background-image: url(); */
        }

        #presentation #presentationText {
            max-width: 400px;
        }

        #presentation #presentationText ul {
                /* background: white; */
    /* border: 1px solid var(--color-primary-blue); */
           /*  padding-left: 36px; */
            margin-top: 1.5rem;
            list-style-type: none;
          /*   border-radius: 24px; */
        }

        #presentation #presentationText ul li {
            display: flex;
        }

        #presentation #presentationText ul li p {
            line-height: 1.25;
            margin-left: .5rem;
            font-size: 1.5rem;
            color: var(--color-primary-blue);
        }

        #presentation #presentationText ul li ~ li {
            margin-top: 0.75rem;
        }

        #presentation #presentationText ul li i {
            padding-top: 0.4rem;
            font-size: 1.2rem;
            color: var(--color-secondary-orange);
        }

        /* #presentation #presentationText ul li::marker {
            color: var(--color-secondary-orange);
        } */

        #presentation #slogan {
            line-height: 1.1;
        }

        #presentation p {
            font-size: 14px;
        }

        #presentation .presentation-pics {
            position: relative;
            height: 100%;
            width: 100%;
        }

        #contact_cta {
            background: var(--color-primary-blue);
            color: #fff;
            width: 155px;
            border-radius: 16px;
            padding: 8px;
            transition: .3s all;
            /* height: 45px; */
           /*  box-shadow: 0px 0px 11px rgba(45, 111, 255, 0.4); */
            /* border-radius:  */
        }

        #contact_cta:hover {
           opacity: .8;
        }

        .presentation-pics img {
            position: absolute;
            right: 0;
            top: 0;
            object-fit: cover;
        }

        .carousel-pics {
            width: 500px;
            height: 400px;
            padding: 0 2px;
        }

        #bgPresentation img {
            z-index: 3;
        }

        #vectorsPresentation {
            right: 32px;
        }

        #featuredOffers {
            margin-bottom: 85px;
        }

        #featuredOffers .title-section {
            margin-bottom: 1.5rem;
        }

        #featuredOffers .title-section ~ #obs {
            margin-bottom: 1rem;
        }

        #services {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            grid-auto-rows: 240px;
            /* grid-template-rows: 240px 240px; */
            margin-bottom: 85px;
        }

        #changeAudience {
            display: none;
        }

        #services .custom-switch {
            padding-left: 3.25rem;
        }

        #services .custom-control-label {
            font-size: 1.4rem;
        }

        #services .custom-switch .custom-control-label::before {
            left: -3.25rem;
            border-color: #F8AFA6;
            width: 2.75rem;
            height: 1.5rem; /* 1.75rem */
            border-radius: 1.5rem; /* Aumenta em relação ao height seria 1.25 */
        }

        #services .custom-switch .custom-control-label::after {
            left: calc(-3.25rem + 2px);
            background-color: #F8AFA6;
            width: calc(1.5rem - 4px);
            height: calc(1.5rem - 4px);
            border-radius: 1rem;
        }

        #services .custom-control-input:checked~.custom-control-label::before{
            border-color: initial;
        }

        #services .custom-control-input:checked~.custom-control-label::after{
            background-color: #fff;
            transform: translateX(1.25rem);
        }

        .custom-control-input:not(:disabled):active ~.custom-control-label::before{
            background-color: #fff !important;
        }

        #audienceOption {
            user-select: none;
            cursor: pointer;
        }

        /* .custom-control-input:not(:disabled):checked ~.custom-control-label::before{
            background-color: #F8AFA6;
        } */

        /* #services .custom-control-input:focus~.custom-control-label::after{
            box-shadow: 0 0 0 0.2rem #FADCD9;
        } */


        #services .card-services {
            position: relative;

        }

        #services .card-services-img {
            overflow: hidden;
            border-radius: 16px;
        }

        #services .card-services-male {
            display: none;
        }

        #services .card-services .text-services {
            position: absolute;
            top: 24px;
            left: 0;
            background: var(--color-primary-blue);
            opacity: 0.5;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            height: 50px;
            padding-left: 1.5rem;
            padding-right: 2rem;
            display: flex;
            align-items: center;
        }


        #services .card-services .text-services p {
            position: relative;
            font-weight: 500;
            font-size: 18px;
            color: #fff;
        }

        #services .card-services .text-services p::after {
            position: absolute;
            bottom: -2.5px;
            left: 0;
            content: '';
            width: 45%;
            height: 2px;
            background: #fff;
        }

        #services .card-services img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
        }

        #services .card-services-img img, #services .card-services-img .text-services {
            transition: all .75s;
        }

        #services .card-services-img:hover .text-services {
            opacity: 1;
        }

        #services .card-services-img:hover img {
            transform: scale(1.2);
        }

        #services a:nth-child(2) .card-services img,
        #services a:nth-child(5) .card-services img,
        #services a:nth-child(2) .card-services,
        #services a:nth-child(5) .card-services {
            border-bottom-left-radius: 0;
        }

        #services a:nth-child(4) .card-services img,
        #services a:nth-child(7) .card-services img,
        #services a:nth-child(4) .card-services,
        #services a:nth-child(7) .card-services {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        #services a {
            display: contents;
        }

        #services #infoClients {
            padding: 2.3rem 2.5rem;
            background: var(--color-primary-blue);
            color: #fff;
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        #services #infoClients h4, #services #infoClients p, #services #infoClients i {
            color: #fff;
        }

        #services #infoClients h4 {
            max-width: 180px;
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: .45rem;
        }

        #services #infoClients p {
            margin-bottom: .5rem;
        }

        #services #infoClients i ~ i {
            margin-left: .5rem;
        }

        #services #toAllServices {
            padding: 4rem;
        }

        #services #toAllServices p {
            width: 120px;
            line-height: 1.1;
            font-size: 18px;
        }

        #services #toAllServices i {
            font-size: 18px;
        }

        #services a:last-child:hover p {
            text-decoration: underline;
        }

        #aboutUs {
            /* 130px + 30px do top da img absolute */
            /* margin-bottom: calc(86px + 30px); */
            margin-bottom: 85px;
        }

        #aboutUs a p {
            font-size: 18px;
        }

        #aboutUs a:hover {
            text-decoration-color: var(--color-text-light);
        }

        #aboutUsText {
            text-align: justify;
        }

        /* #findUs {
            margin-bottom: 85px;
        } */

        #findUs i {
            margin-right: .5rem;
            color: var(--color-secondary-orange);
        }

        #findUs p {
            color: var(--color-primary-blue);
            /* font-size: 18px; */
            font-weight: 500;
        }

        #findUs iframe {
            height: 374px;
            width: 100%;
            border: 2px solid rgba(239, 138, 44, 0.4);
            border-radius: 16px;
        }

        #featuredOffersBadge #obs, #featuredOffersBadge #obs b  {
            color: var(--color-primary-blue);
        }

        /* #featuredOffers #featuredOffersBadge img {
            position: absolute;
            top: 0;
            right: 0;
        } */

        @media(max-width: 575px){

            /* Adicionar verificação para inserir padding maior apenas no mobile, em relação ao main */

            #services {
                grid-template-rows: auto repeat(3, 300px) auto auto;
                gap: .5rem;
            }
            #slogan {
                white-space: normal;
            }
        }

        @media (max-width: 991px){

            #bgPresentation {
                display: none;
            }

            #presentation {
                height: auto;
                flex-direction: column-reverse;
            }

            #presentationText {
                max-width: none !important;
            }

            .presentation-pics {
                height: 405px !important;
               /*  margin-top: 3rem; */
                margin-bottom: 1.5rem;
            }

            .carousel-pics {
                height: 405px;
                width: 100%;
                /* position: unset; */
                border-radius: 16px;
                border: 1px solid var(--color-background-light-orange);
                padding: 0;
            }

            .carousel-indicators li {
                background-color: var(--color-secondary-orange);
            }

            .picture-bg {
                display: none;
            }

        }

        @media(max-width: 1199px){
            .picture-bg, .picture-vectors {
                display: none;
            }
            .picture-img {
                position: unset !important;
                width: 100% !important;
            }

            .picture-area {
                width: 100%;
            }

            #aboutUs {
                margin-bottom: 85px;
            }
        }

        @media(min-width: 1200px){
            #services {
                grid-template-columns: repeat(auto-fill, minmax(270px, 370px));
            }
        }

    </style>
@endsection

@section('content')
    <div class="container-md">
        <section id="presentation">
            <div id="presentationText">
                <h1 id="slogan">Cera <span>100%</span> natural</h1>
                <ul>
                    <li><i class="fas fa-check"></i><p>Produto à base de mel e própolis</p></li>
                    <li><i class="fas fa-check"></i><p>Todos os tipos de depilação masculina e feminina</p></li>
                    <li><i class="fas fa-check"></i><p>Profissionais experientes prontas para cuidar da sua pele</p></li>
                    <li><i class="fas fa-check"></i><p>Depilação sem desconforto</p></li>
                    <li><i class="fas fa-check"></i><p>Atendimento sem hora marcada</p></li>
                </ul>
              {{--   <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p> --}}
               {{--  <button class="btn btn-sm" id="presentation_cta">Contato</button> --}}
            </div>
            <div class="presentation-pics">
                <div id="carouselPresentation" class="carousel slide carousel-fade h-100" data-ride="carousel">
                    <ol class="carousel-indicators d-lg-none">
                        <li data-target="#carouselPresentation" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselPresentation" data-slide-to="1"></li>
                        <li data-target="#carouselPresentation" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item">
                            <img id="presentationPic1" class="carousel-pics" src="{{secure_asset('assets/images/presentation-1.png')}}">
                        </div>
                        <div class="carousel-item">
                            <img id="presentationPic2" class="carousel-pics" src="{{secure_asset('assets/images/presentation-2.png')}}">
                        </div>
                        <div class="carousel-item">
                            <img id="presentationPic3" class="carousel-pics" src="{{secure_asset('assets/images/presentation-3.png')}}">
                        </div>
                    </div>
                    <div id="bgPresentation">
                        <img src="{{secure_asset('assets/images/bg-presentation.png')}}">
                        <img id="vectorsPresentation" src="{{secure_asset('assets/images/vectors-presentation.svg')}}">
                    </div>
                    {{-- <div class="d-lg-none">
                        <button class="carousel-control-prev" type="button" data-target="#carouselPresentation" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselPresentation" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </button>
                    </div> --}}
                </div>
            </div>
        </section>

        @if($promotions->isNotEmpty())
            <section id="featuredOffers">
                <div id="featuredOffersBadge">
                    {{-- <img src="{{secure_asset('assets/images/details-offers.svg')}}"> --}}
                    <div class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-sm-between">
                        <h3 class="title-section">Promoções</h3>
                        <small id="obs" class="ml-sm-3"><b>Obs:</b> As promoções são válidas de de <b>Segunda a Quarta-feira</b> para o público <b>Feminino</b></small>
                    </div>
                    <div class="position-relative px-5">
                        <div id="carouselOffers" class="swiper my-swiper">
                            <div class="swiper-wrapper">
                                @foreach($promotions as $promo)
                                    <div class="swiper-slide d-flex justify-content-center">
                                        <a href="{{route('info-promocao', ['id' => $promo->id])}}">
                                            @component('components.card')
                                                {{-- @slot('cardImg', $promo->services->first()->img) --}}
                                                @slot('cardTitle', $promo->name)
                                                @slot('cardDesc', '')
                                                @slot('cardPrice', $promo->new_price)
                                                @slot('cardOldPrice', $promo->old_price)
                                                @slot('scaleUp', false)
                                            @endcomponent
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

            </section>
        @endif
        {{-- Verificar se é necessário colocar things svg no grid --}}
        <div id="services">
            <div>
                <h3 class="title-section">Conheça nossos<span>Serviços</span></h3>
                <div class="d-flex align-items-center">
                    {{-- <label for="audience">F</label> --}}
                        <div class="custom-control custom-switch" id="changeAudience">
                            <input type="checkbox" class="custom-control-input" id="audience">
                            <label class="custom-control-label" for="audience" id="audienceOption" data-toggle="tooltip"
                            title="Clique para alternar o público">Feminino</label>
                        </div>
                    {{-- <label class="custom-control-label" for="audience">M</label> --}}
                </div>
            </div>
            @for($i=0; $i < 3; $i++)
                <a href="{{route('info-servico', ['id' => $serviceGroupsFemale[$i]['id']])}}" class="card-services-female">
                    <div class="card-services card-services-img shadow-sm">
                        <img src="{{secure_asset($serviceGroupsFemale[$i]['img'])}}">
                        <div class="text-services">
                            <p>{{$serviceGroupsFemale[$i]['name']}}</p>
                        </div>
                    </div>
                </a>
            @endfor

            @for($i=0; $i < 3; $i++)
                <a href="{{route('info-servico', ['id' => $serviceGroupsMale[$i]['id']])}}" class="card-services-male">
                    <div class="card-services card-services-img shadow-sm">
                        <img src="{{secure_asset($serviceGroupsMale[$i]['img'])}}">
                        <div class="text-services">
                            <p>{{$serviceGroupsMale[$i]['name']}}</p>
                        </div>
                    </div>
                </a>
            @endfor
            <div id="infoClients">
                <div>
                    <h4>Há mais de 30 anos</h4>
                    <p>Atendendo nossos clientes com excelência</p>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <a href="{{route('grupo-servicos')}}" class="">
                <div id="toAllServices">
                    <div class="d-flex align-items-center">
                        <p>Veja todos os serviços</p>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div id="aboutUs">
            <div class="row flex-column-reverse flex-xl-row mt-2">
                <div class="col-12 col-xl-4">
                    <h3 class="title-section d-none d-xl-inline-block">Sobre Nós</h3>
                    <div class="" id="aboutUsText">
                        <p>A Casa Especializada em Depilação está <b>há mais de 30 anos no mercado</b> cuidando da pele das nossas clientes por meio de produtos naturais.
                        A cera que utilizamos à base de mel e própolis não causa ardor e nem desconforto simplificando o processo de depilação.</p>
                        <p class="mt-2">Realizamos todos os tipos de depilação <a href="{{route('grupo-servicos')}}">facial, corporal e íntima</a> para o público <b>Feminino e Masculino</b>.
                        <p class="mt-2 mb-3">Atualmente possuimos uma unidade localizada em <b>Taguatinga Sul</b> e outra em <b>Taguatinga Norte</b> onde realizamos <b>atendimento sem hora marcada</b>:</p>
                        <ul class="pl-3">
                            <li>Segunda à Sexta - 08:00 às 18:00</li>
                            <li>Sábado - 08:00 às 15:00</li>
                            {{-- <span style="text-decoration: underline"></span> --}}
                        </ul>
                        <p class="mt-4 mb-3" style="font-style: italic">Para dúvidas, reclamações e sugestões acesse a nossa página de contato: </p>
                        <div class="d-flex">
                            <a href="{{url('contato')}}" class="btn btn-sm" id="contact_cta">Contato</a>
                        </div>
                    </div>
                    {{-- <a href="#"><p>Ler mais<i class="fas fa-arrow-right ml-2"></i></p></a> --}}
                </div>
                <div class="col-12 col-xl-auto mb-4 mb-xl-0 ml-xl-auto">
                    <h3 class="title-section d-inline-block d-xl-none">Sobre Nós</h3>
                    @component('components.picture')
                    @endcomponent
                </div>
            </div>
        </div>
        <div id="findUs">
            <h3 class="title-section">Localização</h3>
            <div class="row">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <p><i class="fas fa-map-marker-alt"></i> Loja 3/4 - Taguatinga Norte</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d698.4473730315156!2d-48.060453863868624!3d-15.828333846224467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a32e76320428f%3A0x9eb7bad7bde72fa!2sThaynah%20-%20Casa%20Especializada%20em%20Depila%C3%A7%C3%A3o!5e0!3m2!1sen!2sbr!4v1650342955661!5m2!1sen!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-lg-6">
                    <p><i class="fas fa-map-marker-alt"></i> Ed. São José - Taguatinga Sul</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.89815939823475!2d-48.05552174049284!3d-15.83711021773233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a3379b75d28af%3A0xb1f196d8148a778d!2sThaynah%20-%20Casa%20Especializada%20em%20Depila%C3%A7%C3%A3o!5e0!3m2!1sen!2sbr!4v1650340674253!5m2!1sen!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="{{secure_asset('js/swiper-offers.js')}}"></script>

    <script>
        window.onload = function(){
            //Estratégia para carregar as fotos somente depois da moldura
            $('.presentation-pics .carousel .carousel-item').first().addClass('active');

            //Exibe apenas quando carrega toda a página
            $('#changeAudience').toggle();


            $('#audience').on('change', function(){
                if($(this).is(':checked')){

                    $('.card-services-female').toggle();
                    $('.card-services-male').css('display', 'contents');

                    $("#audienceOption").text('Masculino');
                }
                else{
                    $('.card-services-male').toggle();
                    $('.card-services-female').css('display', 'contents');

                    $("#audienceOption").text('Feminino');
                }
            });

        }

        $('.carousel').carousel({
            interval: 3500
        })
    </script>

@endsection
