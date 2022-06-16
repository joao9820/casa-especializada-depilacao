@extends('layout.site', ['current' => 'services'])
@section('title', 'Detalhes do Serviço')

@section('style')
    <style>

        .moldure {
            position: relative;
            height: 470px;
            /* width: 100%; */
            max-width: 900px;
            margin-bottom: 2.5rem;
            border-radius: 1rem;
        }

        #imgService, .moldure-shadow {
           /*  height:auto; */
         /*    max-height: 50vh; */
            height: 100%;
            width: 100%;
            border-radius: 1rem;
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
            /* Talvez, salvar a referência do melhor angulo da imagem, left, top, center, bottom, junto da imagem no BD */
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

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: var(--color-background-light-orange) !important;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid var(--color-background-md-orange) !important;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: none !important;
        }

        .table th, .table td {
            color: var(--color-primary-blue) !important;
        }

        hr:not(.divider) {
            margin-top: -0.8rem;
            /* margin-bottom: 1rem; */
            border-top-style: dotted !important;
            /* border: 0; */
            border-top: 2px solid rgba(0,0,0, 0.4);
            /* border-width: thick; */
        }

        .services-price p {
            background: var(--color-background-light);
            color: var(--color-primary-blue);
        }

        .services-price p.service-name {
            padding-right: 0.4rem;
        }

        .services-price p.price {
            padding-left: 0.4rem;
        }

    </style>
@endsection

@section('content')
    <div class="container-md">
        {{-- Adicionar botão para voltar --}}
        <h3 class="title-section">{{$serviceGroup->name}}</h3>
        <div class="d-flex justify-content-center w-100">
            <div class="moldure w-100">
                <img src="{{asset($serviceGroup->img)}}" alt="Imagem do serviço" id="imgService">
                <div class="moldure-shadow"></div>
            </div>
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
        <h4 class="title-section">Preços</h4>
        {{-- <div class="table-responsive mx-auto">
            <table class="table table-striped ">
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

        </div> --}}
        <div class="services-price">
           @foreach($serviceGroup->services as $service)
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <p class="service-name">
                        {{$service->name}}
                    </p>
                    {{-- <span>...........................................</span> --}}
                    <p class="price">
                        R$ {{$service->price}}
                    </p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
        <hr class="divider">
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
