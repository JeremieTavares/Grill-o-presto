@extends('public.template.base')
@section('banner-title', 'Mon profil - Mes tickets')
@section('content')

    @include('user.template.sub-navbar')
    <main class="flex-wrapper m-auto">
        <div class="mx-3">
            @if ($ticketsArray != null)
                <table class="table table-hover table-striped table-tickets">
                    <thead>
                        <th class="border-0">Ticket</th>
                        <th class="border-0">Date</th>
                        <th class="border-0">État</th>
                        <th class="border-0">Type</th>
                        <th class="d-sm-none d-md-block border-0">Description</th>
                        <th class="text-center border-0">Voir</th>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($ticketsArray as $ticket)
                            <?php $i++; ?>
                            @if ($i % 2 == 1)
                            {{-- Regarder par la suite si je met la classe red-row --}}
                                <tr class='border border-1'>
                                @else
                                <tr class='border border-1'>
                            @endif
                            <td class="border-0 p-2 p-md-3">{{ $ticket->ticket_number }}</td>
                            <td class="border-0 p-2 p-md-3">{{ $ticket['date'] }}</td>
                            <td class="border-0 p-2 p-md-3">{{ $ticket->ticket_status->status }}</td>
                            <td class="border-0 p-2 p-md-3">{{ $ticket->ticket_type->type }}</td>
                            <td class="d-sm-none d-md-block border-0 p-2 p-md-3">{{ $ticket['description'] }}</td>
                            <td class="text-center border-0 p-2 p-md-3"><a
                                    href="{{ route('user.tickets.show', $ticket->id) }}"><i
                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        <hr class="w-25 text-primary my-5">

        <div class="text-center mb-5">
            <h2>Envoyer un nouveau Ticket</h2>
            <a href="{{ route('user.tickets.create', Auth::user()->id) }}"
                class="btn btn-primary btn-rounded btn-scale-press px-5">Nouveau ticket</a>
        </div>
    @else
        <div class="text-center mb-5">
            <h2>Envoyer un nouveau Ticket</h2>
            <a href="{{ route('user.tickets.create', Auth::user()->id) }}"
                class="btn btn-primary btn-rounded btn-scale-press px-5">Nouveau ticket</a>
        </div>
        @endif

    </main>
@endsection
