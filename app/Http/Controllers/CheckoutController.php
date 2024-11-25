<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $vouchers = Voucher::all();
        $products = Product::all();
        $details = Transaction::find($id);
        return view('checkout.index', compact('details', 'products', 'vouchers'));
    }

    public function cetak(Request $request, $id)
    {
        $vouchers = Voucher::all();
        $products = Product::all();
        $details = Transaction::find($id);
        $full = TransactionDetail::all();
        return view('checkout.cetak', compact('details', 'products', 'full', 'vouchers'));
    }

    public function create(Request $request)
    {
        $products = Product::find($request->product_id);
        $total_price = 0;
        $total_price += $products->price * $request->qty;

        $create = Checkout::create([
            'product_id' => $request->product_id,
            'total' => $total_price,
            'total_before' => $total_price,
            'qty' => $request->qty,
            'transaction_id' => $request->transaction_id,
        ]);

        return back();
        //    return redirect()->route('checkout.index.'. $request->transaction_id);
    }

    public function checkout(Request $request, $id)
    {
        $details = Transaction::find($id);
        $vouchers = Voucher::find($id);
        foreach ($details->fkTransactionDetail as $item) {
            $simpan = Product::find($item->product_id);
            // $kurangi = Voucher::find($item->voucher_id);
            $simpan->update([
                'stocks' => $simpan->stocks - $item->qty,
                // 'vouchers' =>$item->total_harga-$kurangi->diskon ,
            ]);
        }
        $details->update([
            'status' => '1',
        ]);
        return back();
    }

    public function update_cart($cart, Request $request)
    {
        $cart->update([
            'price' => $request->price,
        ]);

        return redirect('checkout.index');
    }

    public function diskon($id, Request $request)
    {
        if ($request->voucher_id != null) {


            $checkouts = Checkout::find($id);
            $vouchers = Voucher::find($request->voucher_id);

            // $test = $vouchers->stocks - $checkouts->qty;
            // dd($test);

            //CREATE DATA PRICE
            $price_before = $checkouts->total;
            $price_discount = $vouchers->diskon * $checkouts->qty;
            $price_after = $price_before - $price_discount;

            //SAVE TRANSACTION DETAIL AFTER DISCOUNT
            $checkouts->voucher_id = $request->voucher_id;
            $checkouts->total = $price_after;
            $checkouts->total_discount = $price_discount;
            $checkouts->save();

            // $totals = $checkouts->update([
            //     'voucher_id' => $request->voucher_id,
            //     'total' => $price_after,
            // ]);

            $vouchers->stocks = $vouchers->stocks - $checkouts->qty;
            $vouchers->save();

            return back();
        } else {
            return back();
        }
    }
    public function destroy($id)
    {
        $ganti = Checkout::find($id);

        if ($ganti->voucher_id !=null) {
            $vouchers = Voucher::find($ganti->voucher_id);
            // $vouchers = $vouchers->stocks + $ganti->qty;
            $vouchers->update([
                'stocks' => $vouchers->stocks + $ganti->qty
            ]);
        }

        if ($ganti != null) {
            $ganti->delete();
            return back();
        }
    }
}
