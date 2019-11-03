@extends('layout.principal')

@section('content')

@foreach ($convocatorias as $convocatoria)
<div class="card align-content-center">
  <div class="card-body text-center">
    <h5 class="card-title font-weight-bold">{{$convocatoria->titulo}}</h5>
    <p class="card-text font-weight-bold">{{$convocatoria->descripcion}}</p>
    <a href=""><p class="card-text; font-weight-bold"><small class="text-muted font-weight-bold">{{$convocatoria->titulo}}.pdf</small></p></a>
  </div>
  <img src="{{ asset(('storage/convocatorias').'/'.$convocatoria->id.'/'.'imagen.jpg') }}" class="rounded mx-auto d-block; text-align-center" alt="Image" width="500" height="400">
  <br>
</div>
@endforeach
@stop