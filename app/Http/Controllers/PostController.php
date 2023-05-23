<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{


  public function index()
  {
    $posts = Post::all();
    return view('post.index', compact('posts'));
  }

  public function create()
  {
    $categories = Category::all();
    $tags = Tag::all();
    return view('post.create', compact('categories','tags'));
  }

  public function store()
  {
    $data = request()->validate([
      'title' => 'string',
      'content' => 'string',
      'description' => 'string',
      'image' => 'string',
      'category_id' => 'integer',
      'tags' => ''
    ]);
    $data['likes'] = 0;
    $data['is_published'] = 1;
    $tags = [];
    if (array_key_exists('tags', $data)) {
      $tags = $data['tags'];
      unset($data['tags']);
    }
    $post = Post::create($data);
    foreach ($tags as $tag) {
      PostTag::firstOrCreate(
        [
          'tag_id' => $tag,
          'post_id' => $post->id
        ]
      );
    }
    return redirect()->route('posts.index');
  }

  public function show(Post $post)
  {
    $categories = Category::all();
    $postTags = $post->tags;
    return view('post.show', compact('post', 'categories', 'postTags'));
  }
  public function edit(Post $post)
  {
    $categories = Category::all();
    $tags = Tag::all();
    dd($post->tags);
    $postTags = $post->tags;

    return view('post.edit', compact('post', 'categories', 'tags', 'postTags'));
  }

  public function update(Post $post)
  {
    $data = request()->validate([
      'title' => 'required|string',
      'content' => 'string',
      'description' => 'string',
      'image' => 'string',
      'likes' => 'integer',
      'is_published' => 'string',
      'category_id' => 'integer',
      'tags' => ''
    ]);
    if ($data['is_published'] == 'on') {
      $data['is_published'] = 1;
    } else {
      $data['is_published'] = 0;
    }
    $tags = [];
    if (array_key_exists('tags', $data)) {
      $tags = $data['tags'];
      unset($data['tags']);
    }
    Post::find($post->id)->update($data);
    $post->tags()->sync($tags);

    return redirect()->route('posts.show', $post->id);
  }

  public function destroy(Post $post)
  {
    //dd($post);

    Post::find($post->id)->delete();
    return redirect()->route('posts.index');
  }

}