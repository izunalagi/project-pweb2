<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerValidationRequest;
use App\Models\Buyer;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index(Request $request)
    {
    $buyers = Buyer::all();
    return view('buyer.index', compact('buyers'));
    }

    public function create(Request $request)
    {
    return view('buyer.create');
    }

    public function store(BuyerValidationRequest $request)
    {
    $data = $request->all();

    $buyers =Buyer::create([
    'name' => $data['name'],
    'age' => $data['age'],
    'address' => $data['address'],
    ]);

    return redirect()->route('buyer.index')->with('success', 'Data Berhasil Diubah');

    return redirect()->route('buyer.index');
    }

    public function edit($id)
    {
    $ganti = Buyer::find($id);
    return view('buyer.edit',compact(['ganti']));
    }

    public function update($id, Request $request)
    {
    $ganti = Buyer::find($id);
    $input = $request->all();
    $ganti->update($input);
    return redirect()->route('buyer.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
    $ganti = Buyer::find($id);
    $ganti->delete();
    return redirect()->route('buyer.index')->with('success', 'Data Berhasil Dihapus');
    }

    }
