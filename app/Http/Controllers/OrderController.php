<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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

        $seller = User::returnUser($product['user_id']);

        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['city'] = strip_tags($incomingFields['city']);

        $incomingFields['product_title'] = $product['title'];
        $incomingFields['product_description'] = $product['description'];
        $incomingFields['price'] = $product['price'];
        $incomingFields['buyer_id'] = auth()->id();
        $incomingFields['buyer_name_lastname'] = auth()->user()->name." ".auth()->user()->lastname;
        $incomingFields['seller_id'] = $product['user_id'];
        $incomingFields['buyer_email'] = auth()->user()->email;
        $incomingFields['seller_email'] = $seller->email;
        $incomingFields['seller_name_lastname'] =$seller->name.' '.$seller->lastname;

        $product->update(['isSold' => true]);
        Order::create($incomingFields);
        return redirect('/');
    }
}
