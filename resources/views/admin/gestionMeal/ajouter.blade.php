@extends('admin.template.base')
@section('title', 'Repas ajouter')
@section('content')
    <main class="mealAddAdmin">
        <form action="">
            <div>
                <label for="name">Nom : </label>
                <input type="text" name="name" id="name">
            </div>
            <div class="ingrediants">
                <div class="input_container">
                    <label for="">Ingrédiant :</label>
                    <input type="text" name="" id="">
                </div>
                <button class="btn btn-primary">Ajouter un ingédiant</button>
            </div>
            <div>
                <label for="description">Description :</label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="Vegetarian">Végétarien</label>
                <input type="text" name="" id="">
            </div>
            <div>
                <label for="gluten_free">Sans gluten</label>
                <input type="text" name="gluten_free" id="gluten_free">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
        </form>
    </main>
@endsection