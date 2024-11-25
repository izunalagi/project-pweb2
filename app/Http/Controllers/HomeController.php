<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function rooms()
    {
        return view('home.rooms');
    }

    public function restaurant()
    {
        return view('home.restaurant');
    }

    public function about()
    {
        return view('home.about');
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function blog_single()
    {
        return view('home.blog_single');
    }

    public function rooms_single()
    {
        return view('home.rooms_single');
    }
}
