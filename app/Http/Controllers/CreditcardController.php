<?php

namespace App\Http\Controllers;

use App\Models\Creditcard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $newCreditCard = new Creditcard();

        $newCreditCard->name = $request->name;
        $newCreditCard->card_number = $request->card_number;
        $newCreditCard->cvc = $request->cvc;
        $newCreditCard->month = $request->month;
        $newCreditCard->year = $request->year;
        $newCreditCard->user_id = $request->loggedUserId;

        $newCreditCard->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creditcard  $creditcard
     * @return \Illuminate\Http\Response
     */
    public function show(Creditcard $creditcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creditcard  $creditcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Creditcard $creditcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creditcard  $creditcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creditcard $creditcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creditcard  $creditcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creditcard $creditcard)
    {
        //
    }
}
