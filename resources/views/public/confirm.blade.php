@extends('public.template.base')

@section('content')
    <div class="confirmed">
        <div class="blocHeader">
            <h1> Merci (para) pour votre commande</h1>
        </div>
        <div>
            <img src="" alt="Image de ok confirm">
        </div>
        <div>
            <p>N# de commande:(para)</p>
            <p>Prix: (para)</p>
            <p>Client: (para)</p>
        </div>
        <div class="confirmed">
            <a href="" class="btn btn-primary">Retour à la page d'accueil</a>
        </div>
    </div>


    <div class="refused">
        <div class="blocHeader">
            <h1> Erreur lors de la commande</h1>
        </div>
        <div>
            <img src="" alt="Image de X pas confirm">
        </div>
        <div>
            <p>N# de commande:(para)</p>
            <p>Prix: (para)</p>
            <p>Client: (para)</p>
            <p>Raison: (para)</p>
        </div>
        <div class="refused">
            <a href="" class="btn btn-primary">Réessayer</a>
            <a href="" class="btn btn-primary">Support client</a>
        </div>
    </div>
@endsection
