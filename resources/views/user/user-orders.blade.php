@extends('public.template.base')
@section('banner-title', 'Mon profil - Historique commande')
@section('content')

    @include('user.template.sub-navbar')
    <main class="m-auto">
        @if (Auth::check())
            <?php $user = Auth::user()->id;
            ?>
        @else
            <?php $user = ''; ?>
        @endif

        <div class="container mw-900px">
            @if (Session::has('successResponse'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successResponse') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @elseif (Session::has('noPermission'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('noPermission') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @elseif (Session::has('ticketClosed'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('ticketClosed') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @endif
            <div class="mx-3">
                @if (isset($ordersArray[0]))


                    <div class="accordion" id="accordionPanelsStayOpenExample">


                        <table class="table table-hover table-striped table-tickets">
                            <thead class="text-center">
                                <th class="border-0">Commande</th>
                                <th class="border-0">Date</th>
                                <th class="border-0">Prix</th>
                                <th class="border-0">Statut</th>
                                <th class="text-center border-0">Aide</th>
                                <th class="text-center border-0">Voir</th>
                            </thead>
                        </table>

                        <tbody>

                            @foreach ($ordersArray as $order)
                                <tr class='border border-1'>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">

                                <tr>

                                    <td class="border-0 p-2 p-md-3 text-center">{{ $order->order_number }}</td>
                                    <td class="border-0 p-2 p-md-3 text-center">{{ $order['date'] }}</td>
                                    <td class="border-0 p-2 p-md-3 text-center">{{ $order->price }}</td>
                                    <td class="border-0 p-2 p-md-3 text-center">{{ $order->order_status->status }}</td>
                                    <td class="text-center border-0 p-2 p-md-3"><a
                                            href="{{ route('user.tickets.show', $order->id) }}"><i
                                                class="fa-solid fa-circle-exclamation"></i></a></td>
                                    <td class="text-center border-0 p-2 p-md-3"><a
                                            href="{{ route('user.tickets.show', $order->id) }}"><i
                                                class="fa-solid fa-arrow-up-right-from-square"></i></a></td>

                                </tr>

                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default,
                                        until
                                        the collapse plugin adds the appropriate classes that we use to style each element.
                                        These classes control the overall appearance, as well as the showing and hiding via
                                        CSS
                                        transitions. You can modify any of this with custom CSS or overriding our default
                                        variables. It's also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                    </div>

                    </tr>
                @endforeach
                </tbody>



            </div>









        </div>
    @else
        <h2>Aucune commandes pour ce compte</h2>
        @endif
        <script>
            const divAlertSuccessSession = document.getElementById('divAlertSucccessInfoChanged');
            const btnCloseAlertSuccessSession = document.getElementById('btnAlertSucccessInfoChanged');

            if (btnCloseAlertSuccessSession) {
                btnCloseAlertSuccessSession.addEventListener('click', () => {
                    divAlertSuccessSession.remove();
                })
            }
        </script>

        </div>
    </main>

@endsection
