<?php
declare(strict_types=1);

namespace App\Aplications\UseCases;

use App\Aplications\DAO\PostDao;

final class SchedulePost
{
    public function __construct(
        private PostDao $postDao
    )
    {
    }

    public function execute(int $id)
    {
        return $this->postDao->updatedPost($id);
    }
}
