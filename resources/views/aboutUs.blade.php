@extends('layout.site', ['current' => 'aboutUs'])
@section('title', 'Sobre Nós')

@section('style')
    <style>

        #aboutUsText p {
            text-align: justify;
            margin-bottom: 1.5rem;
        }

        #aboutUsImg {
            margin-bottom: 70px;
            margin-right: 50px;
        }

        @media (min-width: 992px){
            #aboutUsImg {
                float: right;
                margin-left: 50px;

            }
        }

        @media (max-width: 767px){
            .picture-area{
               /*  min-height: 222px; */
                max-height: 386px;
                width: unset;
                min-width: 315px;
            }

            .picture-vectors {
                display: none;
            }
        }

        @media(max-width: 575px){
            .picture-img {
                top: 0 !important;
                left: 0 !important;
            }

            #aboutUsImg {
                margin-right: 0;
            }
        }
}

    </style>
@endsection

@section('content')
    <div class="container-md my-5">
        <div id="aboutUsText">
            <h3 class="title-section">Conheça a<span>Nossa História</span></h3>
            <div id="aboutUsImg">
                @component('components.picture')
                @endcomponent
            </div>
            <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            </p>
            <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            </p>
            <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged...
            </p>
        </div>
    </div>
@endsection
