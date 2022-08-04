@extends('layout.site', ['current' => 'meetUs'])
@section('title', 'Contate-nos')

@section('style')
    <style>

        .alert-danger * {
            color: #721c24;
        }

        .alert-success * {
            color: #155724;
        }

        .alert-val-errors {
            padding-left: 1.85rem;
        }

        .picture-area {
            height: 555px;
            width: 545px;
            margin-right: 50px;
        }

        .picture-area img {
            position: absolute;
            top: 5px;
            left: -11px;
        }

        .picture-bg {
            background: var(--color-primary-blue);
        }

        .info {
            height: 100%;;
            width: 100%;
            position: absolute;
            top: 40px;
            left: 50px;
            background: var(--color-primary-blue);
            border-radius: 16px;
            padding: 3rem;
        }

        .info div, .info i, .info p {
            color: #fff;
        }

        .info i {
            font-size: 20px;

        }

        .info .info-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 2.5rem;
            color: #fff;
        }

        .info div:not(.media-social) {
            margin-bottom: 1.25rem;
        }

        .media-social {
            margin-bottom: 2.5rem;
        }

        .media-social p {
            word-break: break-all;
        }

        .localization p , .localization p i {
            color: var(--color-secondary-orange);
        }

        .localization p {
            margin-bottom: 1.5rem;
        }

        .form-email {
            width: 100%;
           /*  margin-right: 2.5rem; */
        }

        .form-email .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            height: 55px;
            border: unset;
            border-bottom: 1px solid var(--color-text-muted);
            border-radius: 0;
            background: none;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--color-primary-blue);
            outline: 0;
            box-shadow: none;
        }

        .send-email {
            background: var(--color-primary-blue);
            width: 100%;
            color: #fff;
            height: 55px;
            border-radius: 16px;
            font-weight: 700;
        }

        .send-email:hover {
            color: #fff;
            background: var(--color-primary-blue);
            opacity: .8;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-right: 85px;
            min-height: calc(555px + 40px);
        }

        .localization-maps {
            margin-top: 50px;
        }

        .localization-maps i {
            margin-right: .5rem;
            color: var(--color-secondary-orange);
        }

        .localization-maps p {
            color: var(--color-primary-blue);
            /* font-size: 18px; */
            font-weight: 500;
        }

        .localization-maps iframe {
            height: 374px;
            width: 100%;
            border: 2px solid rgba(239, 138, 44, 0.4);
            border-radius: 16px;
        }

        @media (max-width: 1199px) {
            .picture-area {
                width: 430px;
            }
        }

        @media (max-width: 991px) {

            .localization, .group-localization {
                margin-bottom: 0 !important;
            }

            .picture-area {
                width: 100%;
                height: auto;
               /*  height: auto;
                min-height: 385px; */
            }

            .picture-bg {
                display: none;
            }

            .main-content {
                margin-right: 0;
                margin-bottom: 50px;
            }

            .info {
                top: 0;
                left: 0;
                height: auto;
                position: unset;
               /*  border: 2px solid var(--color-background-light-orange); */
            }

            .picture-area img {
                display: none;
            }
        }

        @media (max-width: 575px){
            .picture-area {
                width: 100%;
                /* min-height: 555px; */
            }
        }

    </style>
@endsection

@section('content')
    <div class="container-md">
        <div class="d-flex justify-content-between flex-column flex-lg-row">
            <div class="main-content">
                <div class="mb-2">
                    <h3 class="title-section">Contate-nos</h3>
                    <p>Sinta-se livre para contatar-nos a qualquer hora. Retornaremos o mais breve possível!</p>
                </div>

                @if(Session::has('msg'))
                    @php
                        $msg = Session::get('msg');
                    @endphp
                    <div class="alert alert-{{$msg['status']}}">
                        <h5>{{$msg['title']}}</h5>
                        <div class="mt-3">
                            {{$msg['desc']}}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-val-errors alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action={{route('enviar-email')}} class="form-email" id="sendEmail">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Nome" value="{{old('name')}}" />
                    </div>
                    {{-- @if($erros->any() && array_key_exists())
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div> --}}
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Celular" value="{{old('phone')}}" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{old('email')}}" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="subject" placeholder="Assunto" value="{{old('subject')}}" />
                    </div>
                    <div class="form-group"><textarea rows="3" name="msg" placeholder="Mensagem" class="form-control">{{old('msg')}}</textarea></div>
                    <button type="submit" class="btn send-email">Enviar</button>
                </form>
            </div>
            <div class="contact-area">
                <div class="picture-area">

                    <div class="picture-bg"></div>
                    <div class="info">
                        <p class="info-title">Informações</p>
                        <div class="media-social">

                                <p class="mb-3"><i class="fas fa-envelope mr-2"></i>casaespecializadadeplicacao@gmail.com</p>

                                <p><i class="fab fa-instagram mr-2"></i>@casaespecializadadeplicao</p>

                        </div>
                        <div class="d-sm-flex justify-content-sm-between d-lg-block group-localization">
                            <div class="localization mr-sm-2 mr-md-0">
                                <p><i class="fas fa-map-marker-alt mr-2"></i> Loja 3/4 - Taguatinga Norte</p>
                                <div class="ml-4">
                                    <div><i class="fas fa-phone mr-2"></i>(61) 3352-4265</div>
                                    <div><i class="fab fa-whatsapp mr-2"></i>(61) 99934-7852</div>
                                </div>
                            </div>
                            <div class="localization">
                                <p><i class="fas fa-map-marker-alt mr-2"></i> Ed. São José - Taguatinga Sul</p>
                                <div class="ml-4">
                                    <div><i class="fas fa-phone mr-2"></i>(61) 3351-8488</div>
                                    <div><i class="fab fa-whatsapp mr-2"></i>(61) 99315-9867</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('assets/images/vectors-meet-us.png')}}">
                </div>
            </div>
        </div>
        <div class="localization-maps">

                <div class="mb-4">
                    <p><i class="fas fa-map-marker-alt"></i> Loja 3/4 - Taguatinga Norte</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d698.4473730315156!2d-48.060453863868624!3d-15.828333846224467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a32e76320428f%3A0x9eb7bad7bde72fa!2sThaynah%20-%20Casa%20Especializada%20em%20Depila%C3%A7%C3%A3o!5e0!3m2!1sen!2sbr!4v1650342955661!5m2!1sen!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="">
                    <p><i class="fas fa-map-marker-alt"></i> Ed. São José - Taguatinga Sul</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.89815939823475!2d-48.05552174049284!3d-15.83711021773233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a3379b75d28af%3A0xb1f196d8148a778d!2sThaynah%20-%20Casa%20Especializada%20em%20Depila%C3%A7%C3%A3o!5e0!3m2!1sen!2sbr!4v1650340674253!5m2!1sen!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

        </div>
    </div>
@endsection

@section('script')

    <script src="{{asset('js/mask.js')}}"></script>
    <script>
        window.onload = function(){

            $('#sendEmail').on('submit', function() {
                $(this).find('button[type="submit"]').prop('disabled', true).text('Enviando...');
            });

            $("#phone").on('keydown', function(){
                this.value = phoneMask(this.value);
            });

        }
    </script>

@endsection
