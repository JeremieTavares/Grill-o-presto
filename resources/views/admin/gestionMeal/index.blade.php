@extends('admin.template.base')
@section('title', 'Repas ajouter')
@section('content')
    <main class="adminRepasIndex">
        <h1 class="text-center mt-3">Tous les repas</h1>

        @if (Session::has('deleteSuccess'))
            <p class="alert alert-success">{{Session::get('deleteSuccess')}}</p>
        @endif

        <div class="container d-flex flex-column align-items-center mb-5">
            <div class="nav_container mt-4 px-2 d-flex flex-column align-items-center">
                <form action="{{route('admin.repas.show')}}" method="POST">
                    @csrf
                    <div id="divSearchEmail">
                        <label for="meal" class="form-label">Rechercher un client via son email</label>
                        <select class="form-select" name="meal" id="meal">
                            <option value="">Repas</option>
                            @foreach ($meals as $meal)
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="divSearchTel" class="d-none">
                        <label for="tel" class="form-label">Rechercher un repas</label>
                        <input type="tel" class="form-control" placeholder="819-000-0000" name="tel">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-info mt-5 btn-rounded px-5 btn-scale-press">Rechercher</button>
                    </div>
                </form>
                
                <a class="btn btn-secondary btn-rounded pt-2 pb-2 ps-3 pe-3" href="{{route('admin.repas.showAll')}}">Afficher tout les repas</a>

                <hr class="w-100" />

                <a class="btn btn-success btn-rounded pt-2 pb-2 ps-3 pe-3" href="{{route('admin.repas.create')}}">Afficher tout les repas</a>

            </div>
        </div>


       
    </main>
@endsection