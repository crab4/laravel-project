<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class CategoryController extends Controller
{
    public function index(){
      $post = Post::find(3);
      $tags = $post->tags;
      dd($tags[0]->posts);

    }
}
