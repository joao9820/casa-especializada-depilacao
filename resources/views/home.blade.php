@extends('layout.site', ['current' => 'home'])
@section('title', 'Página Inicial')

@section('style')
    <style>

        #slogan {
            font-size: 48px;
            font-weight: 700;
            color: var(--color-primary-blue);
        }

        #presentation {
            height: 405px;
            display: flex;
            align-items: center;
            margin-bottom: 4rem;
            /* background-repeat: no-repeat;
            background-position: right;
            background-image: url(); */
        }

        #presentation #presentationText {
            max-width: 400px;
        }

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

        #presentation_cta {
            background: var(--color-secondary-orange);
            color: #fff;
            width: 155px;
            border-radius: 16px;
            height: 45px;
            box-shadow: 0px 0px 11px rgba(255, 103, 45, 0.4);
            /* border-radius:  */
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

        h3.title-section {
            position: relative;
            display: inline-block;
            color: var(--color-primary-blue);
            font-weight: 500;
            font-size: 2.25rem;
            margin-bottom: 2.5rem;
        }

        h3.title-section span {
            display: block;
            color: var(--color-secondary-orange);
        }

        h3.title-section::after {
            /* opacity: 0; */
            position: absolute;
            bottom: -5px;
            left: 0;
            content: '';
            width: 45%;
            height: 3px;
            background: var(--color-secondary-orange);
           /*  border-radius: 5px; */
            transition: width .3s;
        }

        #featuredOffers {
            margin-bottom: 4rem;
        }

        #featuredOffers #featuredOffersBadge {
            /* position: relative; */
            /* display: flex; */
        }

        #featuredOffers .card-deck a {
            display: contents;
        }

        #featuredOffers .card-deck a .card-offers {
            transition: all .5s;
        }

        #featuredOffers .card-deck a:hover .card-offers {
            transform: scale(1.1);
            border: 1px solid var(--color-secondary-orange) !important;
        }

        #featuredOffers .card-deck a:hover .card-offers img {
            border-bottom-color: var(--color-secondary-orange);
        }

        #services {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 240px 240px;
            margin-bottom: 130px;
        }

        #services .card-services {
            position: relative;
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

        #services a:nth-child(2) img {
            border-bottom-left-radius: 0;
        }

        #services a:nth-child(4) img {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        #services a {
            display: contents;
        }

        #services #infoClients {
            padding: 3.8rem 4rem;
            background: var(--color-primary-blue);
            color: #fff;
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        #services #infoClients h4, #services #infoClients p, #services #infoClients i {
            color: #fff;
        }

        #services #infoClients h4 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: .25rem;
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
            margin-bottom: 130px;
        }

        #aboutUs a p {
            font-size: 18px;
        }

        #aboutUs a:hover {
            text-decoration-color: var(--color-text-light);
        }

        /* #featuredOffers #featuredOffersBadge img {
            position: absolute;
            top: 0;
            right: 0;
        } */

    </style>
@endsection

@section('content')
    <div class="container">
        <div id="presentation">
            <div id="presentationText">
                <h1 id="slogan">Good skin reflects Your story and Your spirit.</h1>
                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                <button class="btn btn-sm" id="presentation_cta">Contato</button>
            </div>
            <div class="presentation-pics">
                <div class="carousel slide carousel-fade h-100" data-touch="false" data-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item">
                            <img id="presentationPic1" class="carousel-pics" src="{{asset('assets/images/presentation-1.png')}}">
                        </div>
                        <div class="carousel-item">
                            <img id="presentationPic2" class="carousel-pics" src="{{asset('assets/images/presentation-2.png')}}">
                        </div>
                        <div class="carousel-item">
                            <img id="presentationPic3" class="carousel-pics" src="{{asset('assets/images/presentation-3.png')}}">
                        </div>
                    </div>
                    <div id="bgPresentation">
                        <img src="{{asset('assets/images/bg-presentation.png')}}">
                        <img id="vectorsPresentation" src="{{asset('assets/images/vectors-presentation.svg')}}">
                    </div>
                </div>
            </div>
        </div>
        <div id="featuredOffers">
            <div id="featuredOffersBadge">
                {{-- <img src="{{asset('assets/images/details-offers.svg')}}"> --}}
                <h3 class="title-section">Ofertas</h3>
                <div class="card-deck">
                    @for($i=0; $i < 4; $i++)
                        <a href="#">
                            @component('components.card')
                            @endcomponent
                        </a>
                    @endfor
                </div>
            </div>

        </div>
        {{-- Verificar se é necessário colocar things svg no grid --}}
        <div id="services">
            <div>
                <h3 class="title-section">Conheça nossos<span>Serviços</span></h3>
            </div>
            @for($i=0; $i < 3; $i++)
                <a href="#">
                    <div class="card-services">
                        <img src="{{asset('assets/images/presentation-1.png')}}">
                        <div class="text-services">
                            <p>Lorem Ipsum</p>
                        </div>
                    </div>
                </a>
            @endfor
            <div id="infoClients">
                <div>
                    <h4>+1200</h4>
                    <p>Clientes atendidos</p>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <a href="#" class="">
                <div id="toAllServices">
                    <div class="d-flex align-items-center">
                        <p>Veja todos os serviços</p>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div id="aboutUs">
            <div class="row mt-2">
                <div class="col-4">
                    <h3 class="title-section">Conheça a<span>Nossa História</span></h3>
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...</p>
                    <a href="#"><p>Ler mais<i class="fas fa-arrow-right ml-2"></i></p></a>
                </div>
                <div class="col-auto offset-1">
                    @component('components.picture')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        window.onload = function(){
            //Estratégia para carregar as fotos somente depois da moldura
            $('.presentation-pics .carousel .carousel-item').first().addClass('active');
        }

        $('.carousel').carousel({
            interval: 3500
        })
    </script>

@endsection
