<?php
declare(strict_types=1);

namespace App\Infra\DAO;

use App\Aplications\DAO\PostDao;
use App\Models\Post;

final class PostDaoDatabase implements PostDao
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::orderBy('id')->get(['id', 'title', 'slug', 'body', 'scheduled_at']);
    }

    public function getAllPostsNotSchedule(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::where('scheduled_at', null)->get(['id', 'title', 'slug', 'body', 'scheduled_at']);
    }

    public function savePost(array $post)
    {
        return Post::create($post);
    }

    public function updatedPost(int $id)
    {
        $data['scheduled_at'] = (new \DateTime())->format('Y-m-d');
        $post = Post::find($id);
        $post->update($data);
        return $post;
    }
}
