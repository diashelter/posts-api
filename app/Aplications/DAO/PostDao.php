<?php
declare(strict_types=1);

namespace App\Aplications\DAO;

interface PostDao
{
    public function getAll();

    public function getAllPostsNotSchedule();

    public function savePost(array $post);

    public function updatedPost(int $id);
}
