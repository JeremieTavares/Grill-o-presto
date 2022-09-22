@extends('public.template.base')
@section('banner-title', 'FAQ - Modification de la FAQ')
@section('content')
    @include('admin.template.sub-navbar-admin-3')

    <main class="m-auto">
        <div class="container mw-750px">
            <h2 class="text-center fs-3 my-5">Choisissez la FAQ à modifier</h2>

            <div class="text-center my-3">
                <a href="{{ route('admin.faq.index') }}" class="text-decoration-none"><i
                        class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
            </div>

            @if (Session::has('FaqCreated'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center mb-5"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('FaqCreated') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif


            <label for="id">Sélectionnez une question</label>
            <form action="{{ route('admin.faq.edit', ' ') }}" method="get">
                <select name="id" id="id" name="id" class="form-select btn-rounded px-3">
                    <option value="" selected>Sélectionnez une question</option>
                    @foreach ($faqs as $single)
                        <option value="{{ $single->id }}">{{ $single->question }} - {{ $single->faqTheme->theme }}
                        </option>
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
            <form action="{{ route('admin.faq.update', Auth::user()->id) }}" method="Post">
                @method('PATCH')
                @csrf
                <div>
                    <label class="form-label" for='faqQuestion'>Entrez le titre de la question</label>
                    <input type="text" name="question" id="faqQuestion"
                        class="form-control @error('question') is-invalid @enderror" value="{{ $faq->question }}">
                    @error('question')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-4">
                    <label class="form-label" for='faqAnswer'>Entrez le titre de la question</label>
                    <textarea type="text" name="answer" id="faqAnswer" class="form-control">{{ $faq->answer }}"</textarea>
                </div>
                <div class="mb-4">
                    <select name="faq_theme_id" id="faq_theme_id" class="form-select btn-rounded px-2">
                        @foreach ($faqThemes as $theme)
                            @if ($faq->faqTheme->theme == $theme->theme)
                                <option selected value="{{ $theme->id }}">{{ $theme->theme }}</option>
                            @else
                                <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">

                        <input class="form-check-input" name="is_active" type="checkbox" role="switch" value="1"
                            @if ($faq->is_active === 1) checked @endif id="flexSwitchCheckDefault">
                        <label class="form-check-label user-select-none" for="flexSwitchCheckDefault">Afficher sur la page
                            FAQ ?</label>
                    </div>
                </div>
                <div class="mb-4">
                    <input type="hidden" name="user_id" value="changePasCaSinonJteKickDansGorge">
                </div>
                <div class="mb-4">
                    <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Modifier</button>
                </div>
            </form>
        </div>
    </main>
@endsection
