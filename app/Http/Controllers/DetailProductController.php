<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDetaiValidationRequest;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function index(Request $request)
    {
        $products = ProductDetail::all();
        return view('productdetail.index', compact('products'));
    }

    public function create(Request $request)
    {
        $products = Product::all();
        return view('productdetail.create', compact('products'));
    }

    public function store(ProductDetaiValidationRequest $request)
    {
        $products = ProductDetail::create([
            'product_id' => $request->product_id,
            'unit' => $request->unit,
            'brand' => $request->brand,
        ]);
        return redirect()
            ->route('admin.productdetail.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function edit($id)
    {
        $products = Product::all();
        $ganti = ProductDetail::find($id);
        return view('productdetail.edit', compact('ganti', 'products'));
    }

     public function update($id, Request $request)
     {

     $ganti = ProductDetail::find($id);
     $ganti->product_id= $request->product_id;
     $ganti->unit = $request->unit;
     $ganti->brand = $request->brand;
     $ganti->save();
     return redirect()->route('admin.productdetail.index')->with('success', 'Data Berhasil Diubah');
     }

      public function destroy($id)
      {
      $ganti = ProductDetail::find($id);
      $ganti->delete();
      return redirect()->route('admin.productdetail.index')->with('success', 'Data Berhasil Dihapus');
      }
}
