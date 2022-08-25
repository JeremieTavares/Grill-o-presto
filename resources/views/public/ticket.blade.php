@extends('public.template.base')

@section('content')
    <div class="blocHeader">
        <h1>Support-Ticket</h1>
    </div>

    <p>Nouveau ticket de support</p>

    <h2>Choisir une raison</h2>


    <div class="dropdown">
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

    <h2>Moyen de communication</h2>
    <div class="dropdown">
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
    <h2>Entrez votre adresse courriel</h2>
    <form>
        <div class="form-group">
            <label for="formGroupExampleInput">Example label</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
        </div>


        <h2>Numéro de commande si il y lieu</h2>

        <div class="form-group">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
        </div>
        <h2>Explication du problème</h2>

        <div class="mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>
    <a href="" class="btn btn-primary">Envoyer</a>
@endsection
