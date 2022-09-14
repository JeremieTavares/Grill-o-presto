<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUserId = (int) Auth::user()->id;

        $allOrdersForLoggedUser = (object) Order::where('user_id', $authUserId)->get();


        $orderArray = [];
        // dd($allOrdersForLoggedUser[0]);
        if(isset($allOrdersForLoggedUser[0])){       
        for ($i = 0; $i < count($allOrdersForLoggedUser); $i++) {
            $allOrdersForLoggedUser[$i]['date'] = (string) date('d-m-Y', strtotime($allOrdersForLoggedUser[$i]->created_at));
            array_push($orderArray,  $allOrdersForLoggedUser[$i]);
        }
    }

    // dd($orderArray);
        // dd($allOrdersForLoggedUser[0]);
        return (object) view('user.user-orders', ['ordersArray' => $orderArray]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}