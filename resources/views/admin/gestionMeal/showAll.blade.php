@extends('admin.template.base')
@section('banner-title', 'Administrateur- Modification des repas')
@section('title', 'Afficher tout les repas')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="adminRepasIndex m-auto">
        <h1 class="text-center mt-3">Tous les repas</h1>
        <nav class="nav_container m-auto mt-5">
            <ul class="d-flex justify-content-between align-items-center">
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'classic' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'classique']) }}">Standard</a></li>
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'vegetarien' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'vegetarien']) }}">Végétarien</a></li>
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'sans_gluten' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'sans_gluten']) }}">Sans Gluten</a></li>
            </ul>
        </nav>
        <ul>
            @foreach ($meals as $meal)
                <li class="d-flex align-items-center justify-content-between">{{ $meal->name }}
                    <a href="{{ route('admin.repas.show.get', ['id' => $meal->id]) }}">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </li>
            @endforeach
        </ul>
    </main>
@endsection
