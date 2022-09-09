@extends('public.template.base')

@section('content')

    <section>
        <h1>{{$meal->name}}</h1>
    </section>
    <section>
        <img src="{{$meal->image_path}}" alt="image">
        <p>Menu : {{$meal->menu->menu_type->type}}</p>
        <p>Ingrédients : </p>
        <ul>
            @foreach ($meal->ingredients as $ingredient)
                <li>{{$ingredient}}</li>
            @endforeach
        </ul>
    </section>

@endsection