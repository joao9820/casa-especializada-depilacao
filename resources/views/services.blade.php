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

        .swiper-button-next, .swiper-button-prev {
            color: var(--color-secondary-orange);
        }

        .grid-services {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
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

       {{--  <section class="mt-5">
            <h3 class="title-section">Serviços</h3>
            <div class="grid-services">
                @for($i=0;$i<8;$i++)
                    <a href="#">
                        @component('components.card')
                            @slot('cardType', 'services')
                            @slot('scaleUp', false)
                        @endcomponent
                    </a>
                @endfor
            </div>
        </section> --}}
    </div>

@endsection

@section('script')
    <script>

        var swiper = new Swiper(".my-swiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1,
            breakpoints: {
            700: {
                slidesPerView: 2,
                },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
             }
            },
            loop: false,
            navigation:{
                nextEl:".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }

        });
    </script>
@endsection
