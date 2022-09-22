@extends('admin.template.base')
@section('title', 'Menu rechercher')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="admin_search_menu d-flex flex-column align-items-center justify-content-center m-auto">
        <h1>Rechercher un menu</h1>

        @if (Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
            <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif

        <form class=" w-100 d-flex flex-column" action="{{route('admin.menu.search')}}" method="POST">
            @csrf
            <div>
                <label for="year">Année</label>
                <select name="year" id="year">
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            

            <div>
                <label for="month">Mois</label>
                <select name="month" id="month">
                    @foreach ($months[0] as $key => $month)
                        <option value="{{ $months[1][$key] }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Chercher les menus du mois</button>

        </form>

        @if (isset($menus))
            <div class="container_menu w-100 mt-5">
                <div class="d-flex justify-content-between ps-3 pe-3 pt-3 pb-3 bg-primary header_container">
                    <div class="d-flex w-50 justify-content-between">
                        <p class="m-0 w-50">Date début-fin</p>
                        <p class="m-0 w-50">Type</p>
                    </div>
                    <p class="m-0">Liens</p>
                </div>
                <div class="meals_menu_container">
                    @foreach ($menus as $menu)
                        <div class="p-3 d-flex bg-light w-100 justify-content-between">
                            <div class="d-flex w-50 justify-content-between"> 
                                <p class="m-0 w-50">{{$menu->start_date." / ".$menu->end_date}}</p>
                                <p class="m-0 w-50">{{$menu->menu_type->type}}</p>
                            </div>
                            <a class="me-3" href="{{route('admin.menu.edit', ['id' => $menu->id])}}">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </main>
@endsection
