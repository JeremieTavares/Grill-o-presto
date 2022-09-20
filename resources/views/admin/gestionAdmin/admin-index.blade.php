@extends('admin.template.base')
@section('banner-title', "Modification d'un administrateur")
@section('content')
    @include('admin.template.sub-navbar-admin-3')
    <main class="m-auto">
        <div class="container mw-750px">
            <h2 class="text-center fs-3 my-5">Choisissez l'administrateur à modifier</h2>
            <label for="selectAdmin">Sélectionnez un Administrateur</label>
            <form action="{{ route('admin.admin-edit', Auth::user()->id) }}" method="get">
                <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select btn-rounded px-3">
                    <option value="" selected>Choisissez un Admin</option>
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Rechercher</button>
                </div>
            </form>

        </div>
    </main>
@endsection
