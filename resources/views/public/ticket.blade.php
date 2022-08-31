@extends('public.template.base')

@section('content')
    <div class="container d-flex justify-content-center p-4">
        <h1>Support-Ticket</h1>
    </div>

    <div class="container d-flex justify-content-center p-5">
        <h2>Nouveau ticket</h2>
    </div>
    <div class="container d-flex justify-content-center">
        <h2>Choisir une raison</h2>
    </div>

    <div class="container d-flex justify-content-center pb-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Raison
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button">Action</button>
            <button class="dropdown-item" type="button">Another action</button>
            <button class="dropdown-item" type="button">Something else here</button>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <h2>Moyen de communication</h2>
    </div>

    <div class="container d-flex justify-content-center pb-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Choisir
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button">Action</button>
            <button class="dropdown-item" type="button">Another action</button>
            <button class="dropdown-item" type="button">Something else here</button>
        </div>
    </div>


    <div class="container d-flex justify-content-center">
        <form>
            <div class="form-group p-3">
                <label for="formGroupExampleInput" class="h2">Entrez votre adresse courriel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>

            <div class="form-group p-3">
                <label for="formGroupExampleInput" class="h2">Numéro de commande</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>

            <div class="mb-3 p-3">
                <label for="exampleFormControlTextarea1" class="h2">Explication du problème</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>
    </div>

    <div class="container d-flex justify-content-center">
        <a href="" class="btn btn-primary">Envoyer</a>
    </div>
@endsection
