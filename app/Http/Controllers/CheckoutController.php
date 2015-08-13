<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        $checkout = $checkoutService->createCheckoutBuilder();

        if($cart->getTotal() > 0) {
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach($cart->all() as $k => $item) {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ''), $item['qtd']));

                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));

            $response = $checkoutService->checkout($checkout->getCheckout());

            //return view('checkout.place', compact('order'));
            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::All();

        return view('checkout.place', ['order' => 'empty', 'categories' => $categories]);
    }
}
