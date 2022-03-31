<?php

namespace App\Aplications\Query\Post;

use App\Aplications\DAO\PostDao;

class GetAllPostsNotSchedule
{
    public function __construct(
        private PostDao $postDao
    )
    {
        //
    }

    public function execute()
    {
        return $this->postDao->getAllPostsNotSchedule();
    }
}
