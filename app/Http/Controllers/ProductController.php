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

        $userDirectory = 'public/images/user' .auth()->id();


        if (!Storage::exists($userDirectory)) {
            Storage::makeDirectory($userDirectory);
        }

        $image = $request->file('image');
        $newImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $image->move($userDirectory, $newImageName);

        $imgPath = $userDirectory . $newImageName;

        $incomingFields['image'] = $imgPath;

        Product::create($incomingFields);
        return redirect()->back();
    }

}
