<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends BaseController
{
   public function __invoke(StoreRequest $storeRequest)
   {
       $data = $storeRequest->validated();



       $this->service->store($data);


       return (redirect()->route('post.index'));
   }
}
