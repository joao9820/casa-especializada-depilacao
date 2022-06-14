@extends('layout.site', ['current' => 'services'])
@section('title', 'Detalhes do Serviço')

@section('style')
    <style>

        .moldure {
            position: relative;
            height: 470px;
            width: 100%;
            margin-bottom: 2.5rem;
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
            object-position: top;
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

        h4.title-section {
            margin-bottom: 1.5rem;
        }

    </style>
@endsection

@section('content')
    <div class="container-md my-5">
        <h3 class="title-section">{{$serviceGroup->name}}</h3>
        <div class="moldure">
            <img src="{{asset($serviceGroup->img)}}" alt="Imagem do serviço" id="imgService">
            <div class="moldure-shadow"></div>
        </div>
        {{-- <div class="description">
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
        </div> --}}
        <h4 class="title-section">Tabela de Preços</h4>
        <div class="table-responsive mx-auto">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serviço</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceGroup->services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>R$ {{$service->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="divider" >
        <div class="recently">
            <h4>Recentes</h4>
            <div class="card-deck d-flex flex-column align-items-center flex-lg-row">
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
