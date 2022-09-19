@extends('public.template.base')

@section('content')
    <main class="checkout_section">
        <h1>Commandez</h1>     
        @include('public.template.stripe')
    </main>
@endsection
