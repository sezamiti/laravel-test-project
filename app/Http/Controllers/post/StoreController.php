<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends Controller
{
   public function __invoke(StoreRequest $storeRequest)
   {
       $data = $storeRequest->validated();
       $tags = $data['tags'];
       unset($data['tags']);

       $post= Post::create($data);

       $post->tags()->attach($tags,  ['created_at' => new \DateTime('now')]);

       return (redirect()->route('post.index'));
   }
}
