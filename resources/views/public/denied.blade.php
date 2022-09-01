@extends('public.template.base')

@section('content')
<div class="refused ">
    <div class="container d-flex justify-content-center">
        <h1> Erreur lors de la commande</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <img src="{{URL ('images/deniedLogo.png')}}" class="img-fluid" alt="Image de X pas confirm">
    </div>
    <div>
        <p class="container d-flex justify-content-center">N# de commande:(para)</p>
        <p class="container d-flex justify-content-center">Prix: (para)</p>
        <p class="container d-flex justify-content-center">Client: (para)</p>
        <p class="container d-flex justify-content-center">Raison: (para)</p>
    </div>
    <div class="refused container d-flex justify-content-center p-2">
        <a href="" class="btn btn-primary">Réessayer</a>
        <a href="" class="btn btn-primary">Support client</a>
    </div>
</div>
@endsection