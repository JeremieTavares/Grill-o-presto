@extends('public.template.base')

@section('content')

<h1>Bienvenue sur la vue du projet</h1>


 <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary">Deconnexion</button>
</form>

@endsection