@include('public.template.head')
@include('public.template.navbar')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false"
    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
    @csrf
    <h1>informations</h1>
    <div class="row">
        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom*</label>
            <input type="text" name="prenom" id="prenom"
                class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" required
                autocomplete="prenom" autofocus>
            @error('prenom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="nom" class="form-label">Nom*</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                value="{{ old('nom') }}" required autocomplete="nom" autofocus />
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="rue" class="form-label">Rue*</label>
            <input type="text" name="rue" id="rue" class="form-control @error('rue') is-invalid @enderror"
                value="{{ old('rue') }}" required autocomplete="rue" autofocus>
            @error('rue')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-2">
            <label for="noPorte" class="form-label">No de porte*</label>
            <input type="text" name="noPorte" id="noPorte"
                class="form-control @error('noPorte') is-invalid @enderror" value="{{ old('noPorte') }}" required
                autocomplete="noPorte" autofocus>
            @error('noPorte')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-2">
            <label for="appartement" class="form-label">Appartement</label>
            <input type="text" name="appartement" id="appartement"
                class="form-control @error('appartement') is-invalid @enderror" value="{{ old('noPorte') }}" required
                autocomplete="appartement" autofocus>
            @error('appartement')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-md-2">
            <label for="zip-code" class="form-label">Code-Postal*</label>
            <input type="text" name="zip-code" id="zip-code"
                class="form-control @error('zip-code') is-invalid @enderror" value="{{ old('zip-code') }}" required
                autocomplete="zip-code" autofocus>
            @error('zip-code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="ville" class="form-label">Ville*</label>
            <input type="text" name="ville" id="ville"
                class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}" required
                autocomplete="ville" autofocus>
            @error('ville')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="tel" class="form-label">Numéro de téléphone*</label>
            <input type="tel" name="tel" id="tel" class="form-control @error('tel') is-invalid @enderror"
                value="{{ old('tel') }}" required autocomplete="tel" autofocus>
            @error('tel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="email" class="form-label">Adresse courriel*</label>
            <input type="email" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                autocomplete="email" autofocus>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <h1>Paiement</h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-">
                <div class="panel panel-default credit-card-box ">
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nom sur la carte</label> <input class='form-control'
                                    size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Numéro de carte</label> <input autocomplete='off'
                                    class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Exp - Mois</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Exp - Année</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
                        {{-- <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.
                                    </div>
                                </div>
                            </div> --}}
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                    ($100)</button>
                            </div>
                        </div>
</form>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
@include('public.template.footer')
