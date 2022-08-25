@extends('public.template.base')

@section('content')
    <div class="blocHeader">
        <h1>Votre panier d'achats</h1>

        @foreach ($repasPanier as $repas)
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>




    @endforeach
@endsection
