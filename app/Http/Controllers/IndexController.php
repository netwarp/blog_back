<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class IndexController extends Controller
{
    public function index() {

        $posts = Post::orderBy('id', 'desc')->limit(3)->get();

        return view('index', compact('posts'));
    }
}
