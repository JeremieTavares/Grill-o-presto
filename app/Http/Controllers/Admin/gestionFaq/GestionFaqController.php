<?php

namespace App\Http\Controllers\Admin\gestionFaq;

use App\Models\Faq;
use App\Models\FaqTheme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GestionFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::with('faqTheme')->get();
        $faqThemes = FaqTheme::all();
        return view('admin.gestionFaq.faq-index', ['faqs' => $faqs, 'faqThemes' => $faqThemes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $faq = Faq::create($request->all());


        return back()->with('FaqCreated', "La question/réponse a été créé");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $faq = Faq::firstWhere('id', $request->id);
        $faqs = Faq::all();
        $faqThemes = FaqTheme::all();

        return view('admin.gestionFaq.faq-edit', ['faqs' => $faqs, 'faq' => $faq, 'faqThemes' => $faqThemes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_id'] = Auth::user()->id;
        Faq::find($request->faq_id)->update($request->all());
        return back()->with('FaqCreated', "La question/réponse a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
