<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class DestroyController extends Controller
{
   public function __invoke(Post $post)
   {
       $post->delete();
       return redirect()->route('post.index');
   }
}
