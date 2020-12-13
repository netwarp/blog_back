<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class PostsController extends Controller
{
    public function index() {
        return new PostResource(Post::orderBy('id', 'desc')->paginate(10));
    }
}
