<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


  public function read($id = -1)
  {
    if ($id == -1) {
      $post = Post::first();
    } else {
      $post = Post::where('id', $id)->get();
    }
    // $returnString=[];
    // foreach($post->toArray() as $property => $value){
    //   array_push($returnString,"{$property}: {$value}");
    // }
    $post = $post->toArray();
    $post["Operation"] = "Read";
    //dump($returnString);
    return view('crud', compact('post'));
  }
  public function create(
    $title = "Default Title",
    $content = "default Exercitation laboris exercitation reprehenderit laboris cillum quis et velit laboris irure est consectetur ipsum.",
    $description = "default description",
    $image = "default image",
    $likes = 0,
    $is_published = true
  ) {

    $post = [
      'title' => $title,
      'content' => $content,
      'description' => $description,
      'image' => $image,
      'likes' => $likes,
      'is_published' => $is_published
    ];
    Post::create($post);
    $post["Operation"] = "Read";
    return view('crud', compact('post'));
  }

  public function update(
    $id = -1,
    $title = "Default Update Title",
    $content = "default Exercitation laboris exercitation reprehenderit laboris cillum quis et velit laboris irure est consectetur ipsum.",
    $description = "default description",
    $image = "default image",
    $likes = 0,
    $is_published = true
  ) {
    $post = [
      'title' => $title,
      'content' => $content,
      'description' => $description,
      'image' => $image,
      'likes' => $likes,
      'is_published' => $is_published
    ];
    if ($id == -1) {
      Post::first()->update($post);
    } else {
      Post::where('id', $id)->update($post);
    }
    $post["Operation"] = "Update";
    return view('crud', compact('post'));
  }

  public function delete($id = -1)
  {
    if ($id == -1) {
      Post::first()->delete();
    } else {
      Post::where('id', $id)->delete();
    }
    $post["Operation"] = "delete";
    $post["Id"] = "$id";
    //dump($returnString);
    return view('crud', compact('post'));
  }
}