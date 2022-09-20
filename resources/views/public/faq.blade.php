@extends('public.template.base')

@section('banner-title', 'FAQ')
@section('content')
<main class="faq">
    
    <div class="container d-flex justify-content-center p-4 ">
        <h2>Foire aux questions</h2>
    </div>



    <?php foreach ($faq as $i => $faqs) { ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                  <?php echo $faq['question']; ?>
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
              <div class="panel-body">
                <?php echo $faq['answer']; ?>
              </div>
            </div>
        </div>
        <?php } ?>


    <hr class="w-25 mt-5 mb-3 m-auto">

    <div class="container">
        
        <h2 class="d-flex justify-content-center p-4">Notre adresse</h2>

        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=475 Rue du Cégep, Sherbrooke&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
        </div>

    </div>

    <hr class="w-25 my-5 m-auto">
    <div class="container">
        <h2 class="d-flex justify-content-center pb-4">Nous Joindre</h2>
        <h4 class="d-flex justify-content-center">Téléphone</h4>
        <div class="d-flex justify-content-center p-1">
            <p>819-843-8321</p>
        </div>
        <div class="d-flex justify-content-center p-4 mb-5">
            <a href="{{ route('user.tickets.create')}}" class="btn btn-primary btn-rounded btn-scale-press px-5">Envoyer un Ticket</a>
        </div>
       
    </div>
</main>
   
@endsection
