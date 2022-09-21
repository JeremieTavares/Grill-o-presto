@extends('public.template.base')
@section('banner-title', 'FAQ - Gestion de la FAQ')
@section('content')
    @include('admin.template.sub-navbar-admin-3')

    <main class="m-auto">
        <div class="container mw-750px">
            <h2 class="text-center fs-3 my-5">Choisissez la FAQ à modifier</h2>
            @if (Session::has('noAdmin'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center mb-5"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('noAdmin') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @endif
            <label for="selectFaq">Sélectionnez une question</label>
            <form action="{{ route('admin.faq.edit', Auth::user()->id) }}" method="get">
                <select name="selectFaq" id="selectFaq" name="selectFaq" class="form-select btn-rounded px-3">
                    <option value="" selected>Sélectionnez une question</option>
                    @foreach ($faqs as $faq)
                        <option value="{{ $faq->id }}">{{ $faq->question }} - {{ $faq->faqTheme->theme }} </option>
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-rounded px-5 btn-scale-press mt-5">Rechercher</button>
                </div>
            </form>

            <hr class="w-25 text-primary my-5 m-auto">

            <h2 class="text-center fs-3 my-5">Ajouter une nouvelle Question/Réponse</h2>

            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.faq.store') }}" method="Post">

                <div>
                    <label class="form-label" for='faqQuestion'>Entrez le titre de la question</label>
                    <input type="text" name="question" id="faqQuestion" class="form-control">
                </div>

                <div class="my-4">
                    <label class="form-label" for='faqAnswer'>Entrez le titre de la question</label>
                    <textarea type="text" name="answer" id="faqAnswer" class="form-control"></textarea>
                </div>
                <div class="mb-4">
                    <select name="faqTheme" id="faq_theme_id" class="form-select btn-rounded px-2">
                        @foreach ($faqThemes as $theme)
                            <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label user-select-none" for="flexSwitchCheckDefault">Afficher sur la page FAQ ?</label>
                      </div>
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Ajouter</button>
                </div>
            </form>
        </div>
    </main>
@endsection
