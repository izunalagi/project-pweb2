<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidationRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }


    public function store(ProductValidationRequest $request)
    {
        $file = $request->file('photo');
        $filename = time() . '.' .
            $file->getClientOriginalExtension();

        $photo_path = $request->file('photo')->storeAs('public/products', $filename);
        $photo_path = str_replace('public/', '', $photo_path);

        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stocks' => $request->stocks,
            'category_id' => $request->category_id,
            'photo' => $photo_path
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Data Berhasil Diubah');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $ganti = Product::find($id);
        return view('product.edit', compact('ganti', 'categories'));
    }

    public function update($id, Request $request)
    {

        $file = $request->file('photo');
        if ($file != null) {
            $filename = time() . '.' .
                $file->getClientOriginalExtension();

            $photo_path = $request->file('photo')->storeAs('public/products', $filename);
            $photo_path = str_replace('public/', '', $photo_path);
        }


        $ganti = Product::find($id);
        $ganti->name = $request->name;
        $ganti->price = $request->price;
        $ganti->stocks = $request->stocks;
        $ganti->category_id = $request->category_id;
        if (isset($photo_path)) {
            $ganti->photo = $photo_path;
        }

        $ganti->save();
        return redirect()->route('admin.product.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $ganti = Product::find($id);
        try {
            Storage::delete('public/' . $ganti->photo);
            $ganti->delete();
        } catch (\Throwable $th) {
        }
        $ganti->delete();
        return redirect()->route('admin.product.index')->with('success', 'Data Berhasil Dihapus');
    }

   

}
