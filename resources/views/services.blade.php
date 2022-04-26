@extends('layout.site', ['current' => 'services'])
@section('title', 'Serviços')

@section('content')

    <div class="container-md my-5">
        <h3 class="title-section">Ofertas</h3>
        <div id="carouselOffers" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-deck">
                        @for($i=0;$i<4;$i++)
                            <a href="#">
                                @component('components.card')
                                    @slot('scaleUp', false)
                                @endcomponent
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-deck">
                        @for($i=0;$i<4;$i++)
                            <a href="#">
                                @component('components.card')
                                    @slot('scaleUp', false)
                                @endcomponent
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev btn-primary" type="button" data-target="#carouselOffers" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next btn-primary" type="button" data-target="#carouselOffers" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: false
        });
    </script>
@endsection
