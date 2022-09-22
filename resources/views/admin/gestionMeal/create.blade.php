@extends('admin.template.base')
@section('banner-title', 'Administrateur- Modification des repas')
@section('title', 'Repas ajouter')
@section('content')
    <main class="mealAddAdmin mw-750px">
        <h1 class="text-center">Ajouter un repas</h1>
        <form action="{{route('admin.repas.store')}}" method="POST" class="pb-5" enctype="multipart/form-data">
            @csrf
            <div class="pb-3">
                <label class="form-label fw-bold" for="name">Nom : </label>
                <input class="form-control" type="text" name="name" id="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="ingrediants pb-3">
                <div class="ingredient_container">
                    <div class="ingredient_item mb-2">
                        <label class="form-label fw-bold" for="ingredient-0">Ingrédiant :</label>
                        <input class="form-control" type="text" name="ingredient[]" id="ingredient-0">
                        @error('ingredient')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <button class="btn btn-primary" type="button">Ajouter un ingédiant</button>
            </div>
            <div class="pb-3">
                <label class="form-label fw-bold" for="description">Description :</label>
                <textarea class="form-control" type="text" name="description" id="description"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <p class="fw-bold">Type : </p>
                <div class="pb-3">
                    <label class="form-check-label" for="Vegetarian">Végétarien</label>
                    <input class="form-check-input" type="checkbox" name="vegetarian" id="vegetarian">
                </div>
                <div class="pb-3">
                    <label class="form-check-label" for="gluten_free">Sans gluten</label>
                    <input class="form-check-input" type="checkbox" name="gluten_free" id="gluten_free">
                </div>
            </div>
            <div class="fileInputGroup pb-3">
                <label class="form-label fw-bold" for="image">Image :</label>
                <input class="form-control " type="file" name="image" id="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column">
                <p class="fw-bold">Allergens : </p>
                
                    @foreach ($allergens as $allergen)
                    <div class="w-25 d-flex justify-content-between">
                        <label class="form-check-label" for="gluten_free">{{$allergen->name}} :</label>
                        <input class="form-check-input" type="checkbox" name="allergen-{{$allergen->id}}" id="gluten_free">
                    </div>
                    <hr>
                    @endforeach
                
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Ajouter">
            </div>
        </form>
    </main>
@endsection