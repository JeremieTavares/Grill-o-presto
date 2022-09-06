@extends('public.template.base')

@section('content')
    <h1>Bienvenue sur la vue du projet</h1>
    <?= Auth::user() ?>


    <?php if(Auth::user()){ ?>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary">Deconnexion</button>
    </form>
    <?php }?>
@endsection
