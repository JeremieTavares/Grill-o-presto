@extends('admin.template.base')
@section('title', 'Repas ajouter')
@section('content')
    <main class="adminRepasIndex">
        <h1>Tous les repas</h1>

        <div class="container d-flex flex-column align-items-center mb-5">
            <div class="nav_container mt-4 px-2">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="d-flex align-items-center justify-content-center"><a
                            class="cursor-pointer bg-primary text-white" id="linkSearchEmail">Email</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                            id="linkSearchTel">Tel</a></li>
                </ul>
                <form action="{{ route('admin.client.show', ' ') }}" method="GET">
                    <div id="divSearchEmail">
                        <label for="email" class="form-label">Rechercher un client via son email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div id="divSearchTel" class="d-none">
                        <label for="tel" class="form-label">Rechercher un client via son téléphone</label>
                        <input type="tel" class="form-control" placeholder="819-000-0000" name="tel">
                    </div>
                    <div class="d-flex justify-content-sm-center justify-content-md-start">
                        <button type="submit"
                            class="btn btn-info mt-5 btn-rounded px-5 btn-scale-press">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- <nav class="nav_container m-auto mt-5">
            <ul class="d-flex justify-content-between align-items-center">
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'classic' ? 'nav_selected' : ''}}" href="{{route('admin.repas', ['type' => 'classique'])}}">Standard</a></li>
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'vegetarien' ? 'nav_selected' : ''}}" href="{{route('admin.repas', ['type' => 'vegetarien'])}}">Végétarien</a></li>
                <li class="d-flex align-items-center justify-content-center"><a class="bg-primary btn-scale-press text-white {{$type == 'sans_gluten' ? 'nav_selected' : ''}}" href="{{route('admin.repas', ['type' => 'sans_gluten'])}}">Sans Gluten</a></li>
            </ul>
        </nav>
        <ul>
            @foreach ($meals as $meal)
                <li class="d-flex align-items-center justify-content-between">{{$meal->name}}<a href="{{route('admin.repas.edit', ['repa' => $meal->id])}}"><i class="fa-solid fa-arrow-right"></i></a></li>
            @endforeach
        </ul> --}}
    </main>
@endsection