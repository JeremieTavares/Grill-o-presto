@extends('public.template.base')

@section('content')
    <div class="confirmed">
        <div>
            <h2 class="container d-flex justify-content-center"> Merci (para)</h2>
            <h2 class="container d-flex justify-content-center">D'avoir commander!</h2>
        </div>
        <div class="container d-flex justify-content-center">
            <img src="{{URL ('images/confirmLogo.png')}}" class="img-fluid" alt="Image de ok confirm">
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
@endsection

