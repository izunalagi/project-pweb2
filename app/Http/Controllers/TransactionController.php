<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
    $transactions = Transaction::orderBy('status', 'asc')->get();
    return view('transaction.index', compact('transactions'));
    }

    public function create(Request $request)
    {
    $buyers = Buyer::all();
    return view('transaction.create', compact('buyers'));
    }

    public function store(Request $request)
    {
         $transactions = Transaction::create([
         'buyer_id' => $request->buyer_id,
         'date' => $request->date,
         ]);

        return redirect()->route('transaction.index')->with('success', 'Data Berhasil Diubah');
    }
    
    public function edit($id)
    {
    $buyers = Buyer::all();
    $ganti = Transaction::find($id);
    return view('transaction.edit', compact('ganti', 'buyers'));
    }

     public function update($id, Request $request)
     {
     $ganti = Transaction::find($id);
     $ganti->buyer_id = $request->buyer_id;
     $ganti->date = $request->date;
     $ganti->save();
     return redirect()->route('transaction.index')->with('success', 'Data Berhasil Diubah');
     }

     public function destroy($id)
     {
     $ganti = Transaction::find($id);
     
     $ganti->delete();
     return redirect()->route('transaction.index')->with('success', 'Data Berhasil Dihapus');
     
}
}
