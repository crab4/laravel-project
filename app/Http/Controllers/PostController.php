<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


  public function index()
  {
    $posts = Post::all();
    return view('post.index', compact('posts'));
  }

  public function create()
  {
    return view('post.create');
  }

  public function store()
  {
    $data = request()->validate([
      'title' => 'string',
      'content' => 'string',
      'description' => 'string',
      'image' => 'string',
    ]);
    $data['likes'] = 0;
    $data['is_published'] = 1;
    Post::create($data);
    return redirect()->route('posts.index');
  }

  public function show(Post $post)
  {
    // dd($post->is_published);
    return view('post.show', compact('post'));
  }
  public function edit(Post $post)
  {
    //  dd($post->is_published);
    return view('post.edit', compact('post'));
  }

  public function update(Post $post)
  {
    $data = request()->validate([
      'title' => 'string',
      'content' => 'string',
      'description' => 'string',
      'image' => 'string',
      'likes' => 'integer',
      'is_published' => 'string',
    ]);
    if ($data['is_published'] == 'on'){
      $data['is_published'] = 1;
    } else{
      $data['is_published'] = 0;
    }
    Post::find($post->id)->update($data);
    return redirect()->route('posts.show', $post->id);
  }

  public function destroy(Post $post){
    //dd($post);
    
    Post::find($post->id)->delete();
    return redirect()->route('posts.index');
  }

}