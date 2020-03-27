<?php

namespace App\Http\Controllers;

use App\Repository\Contract\IPost;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(IPost $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->postRepository->all();
    }

    public function show($id)
    {
        return $this->postRepository->show($id);
    }
}
