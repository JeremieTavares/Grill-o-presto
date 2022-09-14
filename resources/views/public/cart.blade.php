@extends('public.template.base')

@section('content')
    <main class="cart">
        <div class="cart_container">
            @if (session()->exists('cart') && count(session('cart')) > 0)
            <h2 class="mb-5">Menu : {{ session('menu') }}</h2>
            <div class="card_container">
            
                @foreach ($meals as $meal)
                    
                        <div class="cart_card">
                            <a href="{{route('meal', ['repas' => $meal->id])}}">
                                <img src="{{$meal->image_path}}" alt="image">
                            </a>
                            <div class="text_container">
                                <p>Nom : {{$meal->name}}</p>
                                <a href="{{route('cart', ['delete' => $meal->id])}}">Supprimer de la commande</a>
                            </div>
                        </div>
                    
                @endforeach
            </div>
            @else
                <p class="mt-5 mb-5 text-center">Aucun repas n'a été selectionné</p>
            @endif
        </div>
        
        </main>
@endsection
