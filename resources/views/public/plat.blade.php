@extends('public.template.base')

@section('content')
    <div class="blocHeader">
        <h1>Le plat sélectionné</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-1 g-4">
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
        <p>Plât:</p>
        <p>Menu:</p>
        <p>Description du plat:</p>
    </div>

    <hr>
    <h2>Allergènes</h2>

    <hr>
    <h2>Choisir la portion</h2>
    <a href="">1 personne</a>
    <a href="">2 personne</a>
    <a href="">Familliale (4)</a>

    <hr>
    <p>Prix:</p>

    <hr>

    <a href="" class="btn btn-primary">Envoyer la commande</a>
@endsection
