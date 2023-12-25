<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class FirstController extends Controller
{
    public function MainPage()
    {
        $Result = Category::all();

        return view('welcome', ['categories' => $Result]);
    }

    public function GetCategoriesProducts($catid = null)
    {
        if ($catid == null) {
            $Result = Product::all();
            return view('Products.product', ['products' => $Result]);
            # code...
        } else {
            # code...
            $Result = Product::where('category_id', $catid)->get();
            return view('Products.product', ['products' => $Result]);
        }

        // dd:$catid;
    }

    public function GetAllCategoriesWithProducts()
    {
        $Categories = Category::all();
        $Products = Product::paginate(3);

        return view('category', ['products' => $Products, 'categories' => $Categories]);
    }

    //review

    public function Review()
    {
        $Result = Review::all();

        return view('review', ['review' => $Result]);
    }

    public function StoreReview(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $storeproduct = new Review();

        $storeproduct->name = $request->name;
        $storeproduct->email = $request->email;
        $storeproduct->phone = $request->phone;
        $storeproduct->subject = $request->subject;
        $storeproduct->message = $request->message;

        $storeproduct->save();

        return redirect('/review');
    }
}
