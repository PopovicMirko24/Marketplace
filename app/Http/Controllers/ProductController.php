<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $incomingFields['isSold'] = false;
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['user_id'] = auth()->id();

        $userDirectory = 'images/'.auth()->id();

        $image = $request->file('image');
        $newImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $path = $image->move($userDirectory, $newImageName);


        $incomingFields['image'] = $path;

        Product::create($incomingFields);
        return redirect()->back();
    }

    public function showEditScreen(Product $product){
        if(auth()->user()->id !== $product->user_id){
            return redirect('/');
        }
        return view('product-edit', ['product' => $product]);
    }

    public function updateProduct(Request $request, Product $product){
        if(auth()->user()->id != $product->user_id){
            return redirect('/');
        }
        $incomingFields = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['image'] = $product->image;
        if($request['image']){
            $userDirectory = 'images/'.auth()->id();

            $image = $request->file('image');
            $newImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->move($userDirectory, $newImageName);


            $incomingFields['image'] = $path;
        }

        $product->update($incomingFields);
        return redirect('/profile');
    }

    public function deleteProduct(Product $product){
        if(auth()->user()->id !== $product->user_id){
            return redirect('/');
        }
        $product->delete();
        return redirect('/profile');
    }
}
