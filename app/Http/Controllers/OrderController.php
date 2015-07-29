<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\Status;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $order;
    /**
     * @var Status
     */
    private $status;

    /**
     * @param Order $order
     * @param Status $status
     */
    public function __construct(Order $order, Status $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = $this->order->paginate(10);

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->order->with('user', 'status')->find($id);

        $statuses = $this->status->lists('name', 'id');

        return view('order.edit', compact('order', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->order->find($id)->update($request->all());

        return redirect()->route('admin.orders.index');
    }
}
