<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
         
          $vouchers = Voucher::all();
        return view('voucher.index', compact('vouchers'));
    }

    public function create(Request $request)
    {
        $products = Product::all();
        return view('voucher.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $vouchers = Voucher::create([
            'product_id' => $data['product_id'],
            'name' => $data['name'],
            'diskon' => $data['diskon'],
            'stocks' => $data['stocks'],
        ]);

        return redirect()
            ->route('voucher.index')
            ->with('success', 'Data Berhasil Diubah');

        return redirect()->route('voucher.index');
    }

    public function edit($id)
    {
        $products = Product::all();
        $ganti = Voucher::find($id);
        return view('voucher.edit', compact('ganti', 'products'));
    }

    public function update($id, Request $request)
    {
        $ganti = Voucher::find($id);
        $input = $request->all();
        $ganti->update($input);
        return redirect()
            ->route('voucher.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $ganti = Voucher::find($id);
        $ganti->delete();
        return redirect()
            ->route('voucher.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
