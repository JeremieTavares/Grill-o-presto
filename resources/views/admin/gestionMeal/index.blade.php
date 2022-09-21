@extends('admin.template.base')
@section('title', 'Repas ajouter')
@section('content')
    <main class="adminRepasIndex">
        <h1>Tous les repas</h1>
        <nav class="nav_container m-auto mt-5">
            <ul class="d-flex justify-content-between align-items-center">
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'classic' ? 'nav_selected' : ''}}" href="{{route('admin.repas.index', ['type' => 'classique'])}}">Standard</a></li>
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'vegetarien' ? 'nav_selected' : ''}}" href="{{route('admin.repas.index', ['type' => 'vegetarien'])}}">Végétarien</a></li>
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'sans_gluten' ? 'nav_selected' : ''}}" href="{{route('admin.repas.index', ['type' => 'sans_gluten'])}}">Sans Gluten</a></li>
            </ul>
        </nav>
        <ul>
            @foreach ($meals as $meal)
                <li class="d-flex align-items-center justify-content-between">{{$meal->name}}<a href="{{route('admin.repas.edit', ['repa' => $meal->id])}}"><i class="fa-solid fa-arrow-right"></i></a></li>
            @endforeach
        </ul>
    </main>
@endsection