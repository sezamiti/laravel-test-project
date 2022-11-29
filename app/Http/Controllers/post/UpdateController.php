<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $updateRequest, Post $post)
   {
       $data = $updateRequest->validated();

       $this->service->update($post, $data);

       return redirect()->route('post.show', $post->id);
   }
}
