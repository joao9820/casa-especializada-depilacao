<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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
        <div class="container">
            <div id="contactInfo">
                <i class="fas fa-envelope mr-2"></i>casaespecializadadeplicacao@gmail.com
                <i class="fab fa-instagram ml-4 mr-2"></i>@casaespecializadadeplicao
            </div>

            @include('includes.navbar')
        </div>
