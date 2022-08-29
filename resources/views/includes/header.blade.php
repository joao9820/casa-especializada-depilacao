<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="robots" content="index,follow,max-snippet:-1">
        <meta name="description"
            content="Há mais de 30 anos no mercado cuidando da pele dos nossos clientes por meio de produtos naturais. Realizamos todos os tipos de depilação masculina e feminina. Conheça a loja e visite já uma de nossas unidades" >
        <meta name="keywords" content="depilação, casa especializada em depilação, depilação feminina, depilação masculina, depilação íntima, todos os tipos de depilação, depilação em taguatinga" >

        <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        {{-- Swiper --}}
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        {{-- Fonts Google --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo&family=Roboto&display=swap" rel="stylesheet">

        {{-- Animate CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

        {{-- FontAwesome --}}
        <script src="https://kit.fontawesome.com/d35376beee.js" crossorigin="anonymous"></script>

        {{-- Wow JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">

        <title>
            @yield('title')
        </title>

        @hasSection('style')
		    @yield('style')
	    @endif

    </head>
    <body>
        {{-- Adaptar o menu para mobile --}}
        <div id="headerContact" class="d-none d-md-block">
            <div class="container-md" id="containerNav">
                <div id="contactInfo" class="d-flex flex-column justify-content-center align-items-sm-center flex-sm-row mx-auto">
                    <div title="E-mail" data-toggle="tooltip">
                        <i class="fas fa-envelope mr-2"></i>casadepilacao@casaespdepilacao.com.br
                    </div>
                    <div class=" ml-sm-4" title="Facebook" data-toggle="tooltip">
                        <i class="fab fa-facebook mr-2"></i>Casa Especializada em Depilação
                    </div>
                    {{-- <div>
                        <i class="fab fa-instagram ml-sm-4 mr-2"></i>@casaespecializadadeplicao
                    </div> --}}
                </div>
            </div>
        </div>
        <div id="bgNavbar">
            <div class="container-md">
                @include('includes.navbar')
            </div>
        </div>
