<?php
declare(strict_types=1);

namespace App\Aplications\UseCases;

use App\Aplications\DAO\PostDao;
use App\Models\Post;
use Illuminate\Support\Str;

final class RegisterPost
{
    public function __construct(
        private PostDao $postDao
    )
    {
    }

    public function execute(array $dataInput)
    {
        $data = $dataInput;
        $data['slug'] = Str::slug($data['title']);
        return $this->postDao->savePost($data);
    }
}
