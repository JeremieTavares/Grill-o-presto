@extends('public.template.base')

@section('content')
    <div class="container d-flex justify-content-center">
        <h1>Le plat sélectionné</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-1 g-4 container d-flex justify-content-center p-4">
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <p class="container d-flex justify-content-left">Plât:</p>
        <p class="container d-flex justify-content-left">Menu:</p>
        <p class="container d-flex justify-content-left">Description du plat:</p>
    </div>

    <hr>
    <div class="container d-flex justify-content-left">
        <h3>Allergènes (para) (para)</h3>
    </div>

    <hr>
    <div class="container d-flex justify-content-left">
        <h3>Choisir la portion</h3>
    </div>

    <div class="container">
        <a href="">1 personne</a>
        <a href="">2 personne</a>
        <a href="">Familliale (4)</a>
    </div>

    <hr>
    <div class="container">
        <p>Prix: (para)</p>
    </div>

    <div class="container d-flex justify-content-center">
        <a href="" class="btn btn-primary">Envoyer la commande</a>
    </div>
@endsection
