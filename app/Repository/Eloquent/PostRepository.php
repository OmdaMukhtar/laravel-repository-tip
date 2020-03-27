<?php

namespace App\Repository\Eloquent;
use App\Repository\Contract\IPost;
use App\Post;
use App\Repository\Eloquent\BaseRepository;

class PostRepository  extends BaseRepository implements IPost
{
    public function model()
    {
        return Post::class;
    }

}
