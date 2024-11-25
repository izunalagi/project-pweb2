<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryValidationRequest;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {$categories = Category::all();
        
        return view('category.index', compact('categories'));
    }

     public function detail(Request $request, $id)
     {
     $category = Category::find($id);

     return view('category.detail',compact('category'));
     }

      public function crud(Request $request)
      {
      $category = Category::all();

      return view('category.crud',compact('category'));
      }

    public function create(Request $request)
    {
    return view('category.create');
    }

    public function store(CategoryValidationRequest $request)
    {
    $data = $request->all();

    $categories =Category::create([
    'name' => $data['name'],
    ]);

    return redirect()->route('category.crud')->with('success', 'Data Berhasil Diubah');

    return redirect()->route('category.crud');
    }

    public function edit($id)
    {
    $ganti = Category::find($id);
    return view('category.edit',compact(['ganti']));
    }

    public function update($id, Request $request)
    {
    $ganti = Category::find($id);
    $input = $request->all();
    $ganti->update($input);
    return redirect()->route('category.crud')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
    $ganti =Category::find($id);
    $ganti->delete();
    return redirect()->route('category.crud')->with('success', 'Data Berhasil Dihapus');
    }

}
