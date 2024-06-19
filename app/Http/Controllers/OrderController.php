<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = $request->validate([
            'customer_name' => 'required|string',
            'order_value' => 'required|numeric',
        ]);
        $order['process_id'] = rand(1, 10);
        $order['user_id'] = $request->user()->id;
        $order = Order::create($order);
        OrderCreated::dispatch($order); // event to submit 3rd party api endpoint
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
