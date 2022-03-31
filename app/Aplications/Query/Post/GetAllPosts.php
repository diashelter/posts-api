<?php
declare(strict_types=1);

namespace App\Aplications\Query\Post;

use App\Aplications\DAO\PostDao;

final class GetAllPosts
{
    public function __construct(
        private PostDao $postDao
    )
    {
    }

    public function execute()
    {
        return $this->postDao->getAll();
    }
}
