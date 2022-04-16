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

        #vectorsPresentation {
            right: 32px;
        }

        h3.title-section {
            position: relative;
            display: inline-block;
            color: var(--color-primary-blue);
            font-weight: 500;
            font-size: 2.5rem;
            margin-bottom: 2.5rem;
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
            margin-bottom: 3rem;
        }

        #featuredOffers #featuredOffersBadge {
            /* position: relative; */
            /* display: flex; */
        }

        #featuredOffers .card-deck a {
            display: contents;
        }

        #featuredOffers .card-deck a:hover .card-offers {
            border: 1px solid var(--color-secondary-orange) !important;
        }

        #featuredOffers .card-deck a:hover .card-offers img {
            border-bottom-color: var(--color-secondary-orange);
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
                <img id="presentationPic2" class="carousel-pics" src="{{asset('assets/images/presentation-2.png')}}">
                <img id="presentationPic3" class="carousel-pics" src="{{asset('assets/images/presentation-3.png')}}">
                <img id="presentationPic1" class="carousel-pics" src="{{asset('assets/images/presentation-1.png')}}">
                <img id="bgPresentation" src="{{asset('assets/images/bg-presentation.png')}}">
                <img id="vectorsPresentation" src="{{asset('assets/images/vectors-presentation.svg')}}">
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
    </div>
@endsection
