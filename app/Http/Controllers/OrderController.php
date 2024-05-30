<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function loadOrderPage(Product $product)
    {
        return view('order', ['product' => $product]);
    }

    public function makeOrder(Product $product, Request $request){
        if(!auth()->check())
            return redirect('/');

        $incomingFields = $request->validate([
           'address' => 'required',
           'city' => 'required',
        ]);

        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['city'] = strip_tags($incomingFields['city']);

        $incomingFields['product_id'] = $product['id'];
        $incomingFields['price'] = $product['price'];
        $incomingFields['user_id'] = auth()->id();

        $product->update(['isSold' => true]);
        Order::create($incomingFields);
        return redirect('/');
    }
}
