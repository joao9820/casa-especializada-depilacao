@extends('layout.site', ['current' => 'services'])
@section('title', 'Serviços')

@section('style')
    <style>
        .carousel-inner #prevCard {
            position: absolute;
            left: 0;
            top: 0;
            cursor: pointer;
        }

        .carousel-inner #nextCard {
            position: absolute;
            right: 0;
            top: 0;
            cursor: pointer;
        }

        .carousel-inner #controlsCard i {
            font-size: 30px;
            top: 50%;
            transform: translateY(-50%);
        }

        .grid-services {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        @media (max-width: 767px){
            .grid-services {
                grid-template-columns: 1fr;
            }

        }

    </style>
@endsection

@section('content')

    <div class="container-md my-5">
        <section>
            <h3 class="title-section">Ofertas</h3>
            <div class="position-relative px-5">
                <div id="carouselOffers" class="swiper my-swiper">
                    <div class="swiper-wrapper">
                        @for($i=0;$i<8;$i++)
                            <div class="swiper-slide d-flex justify-content-center">
                                <a href="#">
                                    @component('components.card')
                                        @slot('cardTitle', 'Lorem Ipsum')
                                        @slot('cardDesc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
                                        @slot('scaleUp', false)
                                    @endcomponent
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <section class="mt-5">
            <h3 class="title-section">Serviços</h3>
            <div class="grid-services">
                @foreach($serviceGroups as $serv)
                    @component('components.card')
                        @slot('cardType', 'services-lg')
                        @slot('cardImg', $serv->img)
                        @slot('cardTitle', $serv->name)
                        @slot('cardDesc', $serv->name)
                        @slot('scaleUp', false)
                    @endcomponent
                @endforeach
            </div>
        </section>

        @component('components.pagination')
        @endcomponent

    </div>

@endsection

@section('script')
    <script src="{{asset('js/swiper-offers.js')}}"></script>
@endsection
