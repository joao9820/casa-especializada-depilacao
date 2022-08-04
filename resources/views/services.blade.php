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

        .services-tag {
            font-size: 85%;
            font-weight: 500;
            margin-left: .2rem;
            margin-bottom: .5rem;
            background: var(--color-background-md-orange);
            border: 2px solid #ef8a2c3b;
            color: #fff;
            white-space: normal;
        }

    </style>
@endsection

@section('content')

    <div class="container-md">
        <section>
            @if($promotions->isNotEmpty())
            <div id="featuredOffers">
                <div id="featuredOffersBadge">
                    {{-- <img src="{{secure_asset('assets/images/details-offers.svg')}}"> --}}

                    <h3 class="title-section">Promoções{{-- <span>Imperdiveis</span> --}}</h3>
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
                                                @slot('cardOldPrice', $promo->old_price)
                                                @slot('cardPrice', $promo->new_price)
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

            </div>
        @endif
        </section>

        <section class="mt-5">
            <h3 class="title-section">Serviços</h3>
            <div class="grid-services">
                {{-- É possível listar na descrição, todos os serviços que o grupo contém --}}
                @foreach($serviceGroups as $servGroup)

                    <a href={{route("info-servico", ['id' => $servGroup->id])}}>
                        @component('components.card')
                            @slot('cardType', 'services-lg')
                            @slot('cardImg', $servGroup->img)
                            @slot('cardTitle', $servGroup->name . ' ' . $servGroup->audience)

                                @slot('cardDesc')
                                    {{-- <ul>
                                        @foreach($servGroup->services as $serv)

                                            <li>{{$serv->name}}</li>

                                        @endforeach
                                    </ul> --}}
                                        <div class="">
                                            @foreach($servGroup->services as $serv)

                                                <span class='badge badge-pill services-tag'>{{$serv->name}}</span>

                                            @endforeach
                                        </div>
                                @endslot
                            {{-- @slot('serviceId', $servGroup->id) --}}
                            @slot('scaleUp', false)
                        @endcomponent
                    </a>
                @endforeach
            </div>
        </section>

       {{--  @component('components.pagination')
        @endcomponent --}}

    </div>

@endsection

@section('script')
    <script src="{{secure_asset('js/swiper-offers.js')}}"></script>
@endsection
