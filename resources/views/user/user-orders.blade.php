@extends('public.template.base')
@section('banner-title', 'Mon profil - Historique commande')
@section('content')

@include('user.template.sub-navbar')


@if (Auth::check())
        @include('user.template.sub-navbar')
    @endif
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
            @if (isset($ticketMessages[0]))




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