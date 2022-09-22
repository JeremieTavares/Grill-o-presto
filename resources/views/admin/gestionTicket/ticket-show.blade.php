@extends('public.template.base')
@section('banner-title', 'Support - Ticket')
@section('content')
    <?php
    $state = (int) $ticket_status;
    ?>
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


            @if (!isset($ticketMessages[0]))
                <div class="my-4 div-useless"></div>
            @endif



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


            @if (isset($ticketMessages) && !isset($ticketMessages[0]))
                <div class="mt-md-5 mt-3 overflow-auto rounded-4" id="divMsg">
                    <div class="bg-dark pt-3 div-head-comments d-flex justify-content-around text-center sticky-top">
                        <p class="text-white fw-bold fs-md-3 w-50">Order: #{{ $ticket[0]->order_number }}
                        </p>
                        <p class="text-white fw-bold w-50">Ticket: #{{ $ticket[0]->ticket_number }}</p>
                    </div>
                    <div class="d-flex flex-column bg-ultra-light rounded-4 pt-5 pb-4 px-4 mb-4 h-100">
                        <div class="d-flex flex-column align-items-start text-center">
                            <p class="max-w-80 p-2 mb-2 rounded-5 msg user-bubble">
                                {{ $ticket[0]->description }}</p>
                            <span class="span-date-msg me-2">{{ $ticket[0]->created_at }}</span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('user.tickets.message.submit', $user) }}" method="POST">
                    @csrf
                    <div>
                        <label for="responseMessageTicketTextarea">Répondre:</label>
                        <textarea name="response" class="form-control @error('response') is-invalid @enderror" maxlength="400"
                            placeholder="Répondre au dernier message." id="responseMessageTicketTextarea">{{ old('response') }}</textarea>
                        @error('response')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="ticket_id" value="{{ $ticket[0]->id }}">

                        <button type="submit" class="btn btn-success btn-scale-press btn-rounded my-5 w-75"
                            id="btnSubmitMessage">Envoyer</button>
                    </div>
                </form>

                <div class="">
                    <hr class="col-4 m-auto">
                </div>

                @include('user.template.modal-close-ticket')
                @include('user.template.modal-close-ticket')
                @include('user.template.modal-close-ticket')
            @endif

            @if (isset($ticketMessages[0]))
                <div class="mt-md-5 mt-3 overflow-auto rounded-4" id="divMsg">
                    <div class="bg-dark pt-3 div-head-comments d-flex justify-content-around text-center sticky-top">
                        <p class="text-white fw-bold fs-md-3 w-50">Order: #{{ $ticketMessages[0]->ticket->order_number }}
                        </p>
                        <p class="text-white fw-bold w-50">Ticket: #{{ $ticketMessages[0]->ticket->ticket_number }}</p>
                    </div>
                    <div class="d-flex flex-column bg-ultra-light rounded-4 pt-5 pb-4 px-4 mb-4 h-100">
                        <div class="d-flex flex-column align-items-start text-center">
                            <p class="max-w-80 p-2 mb-2 rounded-5 msg user-bubble">
                                {{ $ticketMessages[0]->ticket->description }}</p>
                            <span class="span-date-msg me-2">{{ $ticketMessages[0]->ticket->created_at }}</span>
                        </div>




                        @foreach ($ticketMessages as $response)
                            @if ($response->user_id == $response->ticket->user_id)
                                <div class="d-flex flex-column align-items-start text-center">
                                    <p class="max-w-80 p-2 mb-2 rounded-5 msg user-bubble">
                                        {{ $response->response }}</p>
                                    <span class="span-date-msg me-2">{{ $response->created_at }}</span>
                                </div>
                            @else
                                <div class="d-flex justify-content-start flex-column align-items-end text-center">
                                    <p class="max-w-80 p-2 p-comments rounded-5 msg admin-bubble">
                                        {{ $response->response }}</p>
                                    <div>
                                        <span class="span-date-msg ms-2">{{ $response->created_at }}</span>
                                        <span class="span-date-msg">-</span>
                                        <span class="span-date-msg">{{ $response->user->infoUser->prenom }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>




                @if (!($state == $ticket_closed || $state == $ticket_expired || $state == $ticket_not_resolved))
                    <form action="{{ route('user.tickets.message.submit', $user) }}" method="POST">
                        @csrf
                        <div>
                            <label for="responseMessageTicketTextarea">Répondre:</label>
                            <textarea name="response" class="form-control @error('response') is-invalid @enderror" maxlength="400"
                                placeholder="Répondre au dernier message." id="responseMessageTicketTextarea">{{ old('response') }}</textarea>
                            @error('response')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="ticket_id" value="{{ $response->ticket->id }}">

                            <button type="submit" class="btn btn-success btn-scale-press btn-rounded my-5 w-75"
                                id="btnSubmitMessage">Envoyer</button>
                        </div>
                    </form>

                    <div class="">
                        <hr class="col-4 m-auto">
                    </div>

                    @include('user.template.modal-close-ticket')
                @endif
            @else
                @if ($state == $ticket_expired)
                    <h2 class="text-center">Ce Ticket est expiré</h2>
                @elseif($state == $ticket_not_resolved)
                    <h2 class="text-center">Ce Ticket est non résolus</h2>
                @elseif($state == $ticket_closed)
                    <h2 class="text-center">Ce Ticket est fermé</h2>
                @endif



                @if (!isset($ticketMessages[0]))
                    <div class="my-4 div-useless"></div>
                @endif



                @if (isset($ticketMessages[0]) &&
                    !($state == $ticket_closed || $state == $ticket_expired || $state == $ticket_not_resolved))
                    @include('user.template.modal-close-ticket')
                @endif
            @endif
        </div>




        @if ($state == $ticket_closed || $state == $ticket_expired || $state == $ticket_not_resolved)
            <div class="my-4 div-useless"></div>
        @endif
    </main>
@endsection
