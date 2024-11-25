<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $products = Product::all();
        $categories = Category::all();
        return view('layouts.frontend', compact('posts', 'products', 'categories'));
    }

    public function detail($id)
    {
        $products = Product::findOrFail($id);
        $posts = Post::all();
        return view('layouts.frontend-detail', compact('products', 'posts'));
    }
}
