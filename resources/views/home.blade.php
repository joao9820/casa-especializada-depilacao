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
            /* background-repeat: no-repeat;
            background-position: right;
            background-image: url(); */
        }

        #presentation #slogan {
            line-height: 1.1;
        }

        #presentation .presentation-pics {
            position: relative;
            height: 100%;
            width: 100%;
        }

        #presentation .presentation-pics #bgPresentation{
            position: absolute;
            top: 0;
            right: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div id="presentation">
            <div>
                <h1 id="slogan">Good skin reflects Your story and Your spirit.</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                <button>Contato</button>
            </div>
            <div class="presentation-pics">
                <img id="bgPresentation" src="{{asset('assets/images/bg-presentation.png')}}">
                <img id="presentationPic1" src="{{asset('assets/images/presentation-1.png')}}">
            </div>
        </div>
    </div>
@endsection
