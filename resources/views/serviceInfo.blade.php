@extends('layout.site', ['current' => 'services'])
@section('title', 'Detalhes do Serviço')

@section('style')
    <style>

        .moldure {
            position: relative;
            height: 470px;
            width: 100%;
        }

        #imgService, .moldure-shadow {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .moldure-shadow {
            box-shadow:
            inset 0 1rem 3rem -0.5rem rgba(0,0,0,.175),
            inset 0 -1rem 3rem -0.5rem rgba(0,0,0,.175);
        }

        /* .moldure-shadow {
            box-shadow:
            inset 0px 55px 45px -20px rgba(0, 0, 0, 0.25),
            inset 0px -55px 45px -20px rgba(0, 0, 0, 0.25);
        } */

        #imgService {
            object-fit: cover;
            object-position: top center;
        }

        .description p {
            text-align: justify;
            margin-bottom: 1.5rem;
            font-size: 14px;
        }

        .description p.topic {
            color: var(--color-primary-blue);
            font-weight: 400;
            font-size: 18px;
            margin-bottom: 1rem;
            margin-top: 1.5rem;
        }

        .recently {
            margin-top: 100px;
        }

        .title-section {
            margin: 2rem 0;
        }

        .divider {
            border-width: 2px;
            margin-top: 60px;
            margin-bottom: 90px;
        }

        .recently h4 {
            font-size: 24px;
            font-weight: 500;
            color: var(--color-secondary-orange);
            margin-bottom: 2rem;
        }

    </style>
@endsection

@section('content')
    <div class="container-md my-5">
        <div class="moldure">
            <img src="{{asset('assets/images/presentation-1.png')}}" alt="Imagem do serviço" id="imgService">
            <div class="moldure-shadow"></div>
        </div>
        <h3 class="title-section">Depilação em cera</h3>
        <div class="description">
            <p class="topic">Lorem Ipsum</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <p class="topic">Lorem Ipsum</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <p class="topic">Lorem Ipsum</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.

                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <hr class="divider" >
        <div class="recently">
            <h4>Recentes</h4>
            <div class="card-deck justify-content-center justify-content-md-between">
                {{-- Não é possível aninhar tags a, portanto quando tiver um externo, não poderá haver um link dentro do card --}}
                @for($i=0;$i<3;$i++)

                        @component('components.card')
                            @slot('cardType', 'services-md')
                            @slot('cardTitle', 'Lorem Ipsum')
                            @slot('cardDesc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
                        @endcomponent

                @endfor
            </div>
        </div>
    </div>
@endsection
