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

}
