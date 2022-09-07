@extends('public.template.base')

@section('content')
    <div class="refused ">
        <main class="confirmation">
            <div class="container d-flex justify-content-center">
                <h1> Erreur lors de la commande</h1>
            </div>
            <div class="container d-flex justify-content-center">
                <img src="{{ URL('images/deniedLogo.png') }}" class="confirmImg p-4" alt="Image de X pas confirm">
            </div>
            <div>
                <p class="container d-flex justify-content-center">N# de commande:{{-- {{ $order->orderNumber}} --}}</p>
                <p class="container d-flex justify-content-center">Prix: {{-- {{ $order->orderPrice}} --}}</p>
                <p class="container d-flex justify-content-center">Client: {{-- {{ $order->orderClient}} --}}</p>
                <p class="container d-flex justify-content-center">Raison: (para)</p>
            </div>
            <div class="refused container d-flex justify-content-center p-2">
                <a href="" class="btn btn-primary p-1">Réessayer</a>
                <a href="" class="btn btn-primary p-1">Support client</a>
            </div>
    </div>
    </main>
@endsection
