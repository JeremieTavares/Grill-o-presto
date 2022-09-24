<?php

namespace App\Http\Controllers\Admin\gestionOrder;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gestionOrder.order-search');
    }

    public function showAllOrders()
    {
        $orders = Order::with('order_status')->whereRelation('order_status', 'status', '=', 'En attente')->paginate(7);
        $orderStatus = OrderStatus::where('id', '>', '0')->get();
        return view('admin.gestionOrder.order-index', ['ordersArray' => $orders, 'orderStatus' => $orderStatus]);
    }

    public function showUserForSpecificOrder($id)
    {
        $user = User::with('infoUser')->find($id);
        return view('admin.gestionOrder.order-user-show', ['user' => $user]);
    }

    public function showOrderForSpecificUser(Request $request)
    {
        if (!(empty($request->order_number)))
            $order = Order::with('order_status')->where('order_number', $request->order_number)->get();
        elseif (!(empty($request->tel)))
            $order = Order::with('order_status')->where('telephone', $request->tel)->get();
        elseif (!(empty($request->email)))
            $order = Order::with('order_status')->where('email', $request->email)->get();
        $orderStatus = OrderStatus::where('id', '>', '0')->get();


        if (!isset($order[0]))
            return back()->with('noOrderFound', "Aucune commande trouvé, veuillez réessayer");
        else
            return view('admin.gestionOrder.order-show', ['ordersArray' => $order, 'orderStatus' => $orderStatus]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);
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
