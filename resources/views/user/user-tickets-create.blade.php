@extends('public.template.base')
@section('banner-title', 'Support - Ticket')
@section('content')
    @include('user.template.sub-navbar')
    <main class="flex-wrapper">




        <div class="container">
            <h1 class="display-6 text-center">Nouveau ticket de support</h1>
            <select class="form-select mw-600px" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        {{-- <a href="{{ route('user.ticket.create', $ticket->user_id) }}"></a> --}}
    </main>
@endsection
