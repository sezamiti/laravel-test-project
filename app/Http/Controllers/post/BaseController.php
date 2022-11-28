<?php


namespace App\Http\Controllers\Post;


use App\Service\Post\Service;

class BaseController
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
