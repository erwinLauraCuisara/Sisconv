@extends('layout.principal')

@section('content')
<link href="{{asset('css/style_eval.css')}}" rel="Stylesheet">
<div class="container">
    <h1 class="page-header text-center"><strong>CONVOCATORIAS<strong></h1>
    <div class="row">
        @foreach ($convocatorias as $convocatoria)
        <div class="col-sm" style="margin-top:5px">
            
            <div class="card container select" style="width: 18rem;">
                <a href="#">
                <img src="{{ asset(('storage/convocatorias').'/'.$convocatoria->id.'/'.'imagen.jpg') }}" class="card-img-top" alt="img" onerror="this.onerror=null;this.src='{{asset('img/logo-convocatoria.jpg')}}';">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-center txt">{{$convocatoria->titulo}}</h5>
                    <p class="card-text font-weight-bold text-center">{{$convocatoria->descripcion}}</p>
                </div>
                </a>
            </div>
            
        </div>
        @endforeach
    </div>
</div>

@stop