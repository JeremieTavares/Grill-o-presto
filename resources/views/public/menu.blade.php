@extends('public.template.base')

@section('content')

<div class="blocHeader">
    <h1>Sélectionnez un menu</h1>

    <ul>
        <li><a href="">Tout les plats</a></li>
        <li><a href="">Menu Standard</a></li>
        <li><a href="">Menu Végétarien</a></li>
        <li><a href="">Menu Sans Gluten</a></li>
    </ul>
    
    <div>
        <h2>Rechercher un plat</h2>
    </div>
    
    <div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputText" aria-describedby="emailHelp" placeholder="Entrez le nom d'un plat">
            <a href="" class="btn btn-primary">Rechercher</a>
          </div>
    </div>
</div>

<h2>Nos Favoris de la semaine</h2>

<div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <h2>Not plats réguliers</h2>
  @foreach($repasRegulier as $repas)
  <div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <hr>
  <h2>Not plats Végétariens</h2>
  @foreach($repasVegan as $repas)
  <div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
  <hr>
  <h2>Not plats sans-gluten</h2>

  @foreach($repasGluten as $repas)
  <div class="row row-cols-1 row-cols-md-1 g-4">
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  




    
@endsection