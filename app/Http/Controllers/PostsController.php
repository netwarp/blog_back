<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DOMDocument;
use DOMXPath;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return response()->view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Post';

        return view('posts.create_or_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'preview' => $request->get('preview'),
            'content' => $request->get('content'),
        ];

        preg_match('#\https?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $data['preview'], $match);
        $url = $match[0] ?? null;

        if ($url) {
            $response = file_get_contents($url);

            $dom =  new DOMDocument;

            @$dom->loadHTML($response);

            $xpath = new DOMXPath($dom);
            $query = '//*/meta[starts-with(@property, \'og:\')]';
            $metas = $xpath->query($query);
            $rmetas = [];
            foreach ($metas as $meta) {
                $property = $meta->getAttribute('property');
                $content = $meta->getAttribute('content');
                $rmetas[$property] = $content;
            }
            $data['meta'] = $rmetas;
        }
        Post::create($data);

        return redirect()->action([PostsController::class, 'index'])->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.create_or_edit', compact('post'));
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
        $post = Post::findOrFail($id);

        $data = [
            'preview' => $request->get('preview'),
            'content' => $request->get('content'),
        ];

        preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $data['preview'], $match);
        $url = $match[0] ?? null;

        if ($url) {
            $response = file_get_contents($url);

            $dom =  new DOMDocument;

            @$dom->loadHTML($response);

            $xpath = new DOMXPath($dom);
            $query = '//*/meta[starts-with(@property, \'og:\')]';
            $metas = $xpath->query($query);
            $rmetas = [];
            foreach ($metas as $meta) {
                $property = $meta->getAttribute('property');
                $content = $meta->getAttribute('content');
                $rmetas[$property] = $content;
            }
            $data['meta'] = $rmetas;
        }

        $post->update($data);

        return redirect('/')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->action([PostsController::class, 'index'])->with('success', 'Post deleted');
    }
}
