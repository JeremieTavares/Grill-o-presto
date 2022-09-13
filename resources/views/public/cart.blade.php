@extends('public.template.base')

@section('content')
    <menu class="cart">
        <h2>Menu : {{ session('menu') }}</h2>
        @foreach ($meals as $meal)
            <div class="cart_card">
                <img src="{{$meal->image_path}}" alt="image">
                <div class="text_container">
                    <p>Nom : {{$meal->name}}</p>
                    <a href="{{route('cart', ['delete' => $meal->id])}}">Supprimer de la commande</a>
                </div>
            </div>
        @endforeach
    </menu>
@endsection
