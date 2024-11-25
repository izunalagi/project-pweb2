<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidationRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidationRequest $request)
    {
        $file = $request->file('photo');
        $filename = time() . '.' .
            $file->getClientOriginalExtension();

        $photo_post = $request->file('photo')->storeAs('public/post', $filename);
        $photo_post = str_replace('public/', '', $photo_post);

        try {
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $photo_post,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file = $request->file('photo');
        if ($file  != null) {
            $filename = time() . '.' .
                $file->getClientOriginalExtension();

            $photo_post = $request->file('photo')->storeAs('public/post', $filename);
            $photo_post = str_replace('public/', '', $photo_post);
        }

        $posts = Post::find($id);

        $posts->title = $request->title;
        $posts->description = $request->description;
        if (isset($photo_post)) {

            $posts->photo = $photo_post;
        }
        $posts->save();

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        try {
            Storage::delete('public/' . $posts->photo);
            $posts->delete();
        } catch (\Throwable $th) {
        }
        $posts->delete();
        return redirect()->route('admin.post.index');
    }
}
