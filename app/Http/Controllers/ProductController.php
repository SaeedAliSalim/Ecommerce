<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{



    public function AddNewProduct()
    {
        $allcategroies = Category::all();
        return view('/Products.addproduct', ['allcategroies' => $allcategroies]);
    }

    function StoreProduct(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Update Product

        $storeproduct = Product::find($request->id);
        if (!$request->id == null) {
            $storeproduct->name = $request->name;
            $storeproduct->description = $request->description;
            $storeproduct->quantity = $request->quantity;
            $storeproduct->price = $request->price;
            $storeproduct->category_id = $request->category_id;


            if ($request->has('photo')) {
                $originalFileName = pathinfo($request->file('photo')->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueFileName = $originalFileName . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
                $imagepath = $request->file('photo')->move('Uploads', $uniqueFileName, 'public');
                $storeproduct->imagepath = $imagepath;
            }
            // else {
            //     $storeproduct->imagepath = '';
            // }

            $storeproduct->save();

            return redirect('/products');
        } else {
            //Add Product

            $storeproduct = new Product();

            $storeproduct->name = $request->name;
            $storeproduct->description = $request->description;
            $storeproduct->quantity = $request->quantity;
            $storeproduct->price = $request->price;
            $storeproduct->category_id = $request->category_id;


            $imagepath = 'Uploads\NoImage.jpg';
            if ($request->has('photo')) {
                // Get the original file name without the extension.
                $originalFileName = pathinfo($request->file('photo')->getClientOriginalName(), PATHINFO_FILENAME);
                // Generate a unique file name (you can use any logic to create a unique name).
                $uniqueFileName = $originalFileName . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
                //  $request->photo->move('Uploads', Str::uuid()->tostring() . '_' . $request->photo->getClientOriginalName());
                $imagepath = $request->file('photo')->move('Uploads', $uniqueFileName, 'public');
                // $imagepath = $request -> photo -> move('Uploads', Str::uuid()->toString() . '_' . $request->photo->getClientOriginalName());
            }
            // dd($imagepath);
            $storeproduct->imagepath = $imagepath;

            $storeproduct->save();

            return redirect('/products');
        }
    }

    public function RemoveProduct($id = null)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/products');
            // ->route('/products')
            // ->with('خطأ', 'هذا الصنف غير موجود');
        }

        $product->delete();

        return redirect('/products');
        // ->route('/products')
        // ->with('العملية ناجحة', 'تم الحذف بنجاح');
    }

    public function EditProduct($id = null)
    {
        $product = Product::findorfail($id);
        $allcategroies = Category::all();

        return view('/Products.editproduct', ['product' => $product, 'allcategroies' => $allcategroies]);
    }

    public function Edit(Request $request,$id = null)
    {
        $product = Product::findorfail($id);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:55|unique:Products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if (!$product) {
            return redirect('/products');
            // ->route('/products')
            // ->with('خطأ', 'هذا الصنف غير موجود');
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
            'imagepath' => 'https://th.bing.com/th/id/OIP.7ZSizvlIOUUbyUdm63l2VQHaE_?w=303&h=204&c=7&r=0&o=5&pid=1.7',
        ]);
        return redirect('/products');

        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->quantity = $request->quantity;
        // $product->price = $request->quantity;
        // $product->imagepath = 'https://th.bing.com/th/id/OIP.7ZSizvlIOUUbyUdm63l2VQHaE_?w=303&h=204&c=7&r=0&o=5&pid=1.7';
        // $product->category_id = $request->category_id;

        // ->route('/products')
        // ->with('العملية ناجحة', 'تم الحذف بنجاح');
    }

    public function Search(Request $request)
    {
        // dd($request -> name);
        if ($request == null) {
            $Result = Product::all();
            return view('Products.product', ['products' => $Result]);
            # code...
        } else {
            # code...
            $Result = Product::where('name', 'like', '%' . $request->search . '%')->get();
            return view('Products.product', ['products' => $Result]);
        }
    }

    public function DataTable(){

        $product = Product::all();

        return view('Products.datatable', ['products' => $product]);
    }

 
}
