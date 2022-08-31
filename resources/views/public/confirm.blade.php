@extends('public.template.base')

@section('content')
    <div class="top">
        <div>
            <h2 class="container d-flex justify-content-center"> Merci (para)</h2>
            <h2 class="container d-flex justify-content-center">D'avoir commander!</h2>
        </div>
        <div class="container d-flex justify-content-center">
            <img src="" alt="Image de ok confirm">
        </div>
        <div>
            <p  class="container d-flex justify-content-center">N# de commande:(para)</p>
            <p  class="container d-flex justify-content-center">Prix: (para)</p>
            <p  class="container d-flex justify-content-center">Client: (para)</p>
        </div>
        <div class="confirmed container d-flex justify-content-center">
            <a href="" class="btn btn-primary">Retour à la page d'accueil</a>
        </div>
    </div>


    <div class="refused ">
        <div class="container d-flex justify-content-center">
            <h1> Erreur lors de la commande</h1>
        </div>
        <div class="container d-flex justify-content-center">
            <img src="" alt="Image de X pas confirm">
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

