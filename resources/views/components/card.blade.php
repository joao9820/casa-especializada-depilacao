<div class="card card-{{(!isset($cardType) || $cardType == 'offers') ? 'offers' : $cardType}} {{(isset($scaleUp) && !$scaleUp) ? 'no-scale-up' : ''}}">
   {{--  <div class="card-header">
        <div class="card-title">Lorem Ipsun</div>
    </div> --}}
    <div class="card-img">
        <img src="{{asset('assets/images/presentation-1.png')}}">
    </div>
    <div class="card-body">
        <div class="card-title">{{$cardTitle}}</div>
        <p>{{$cardDesc}}</p>
    </div>

    <div class="card-footer">
        @if(!isset($cardType) || $cardType == "offers")
            <p>R$ 99,90</p>
            <i class="fas fa-arrow-right"></i>
        @else
            <a href="{{url('servicos/1')}}" class="btn btn btn-outline rounded-pill ml-auto">
                <p>Ver serviço</p>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        @endif
    </div>
</div>
