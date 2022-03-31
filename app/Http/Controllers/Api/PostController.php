<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Aplications\Query\Post\GetAllPosts;
use App\Aplications\Query\Post\GetAllPostsNotSchedule;
use App\Aplications\UseCases\RegisterPost;
use App\Aplications\UseCases\SchedulePost;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePostRequest;
use App\Http\Resources\Api\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function __construct(
        private GetAllPosts            $getAllPosts,
        private GetAllPostsNotSchedule $getAllPostsNotSchedule,
        private RegisterPost           $registerPost,
        private SchedulePost           $schedulePost
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->getAllPosts->execute());
    }

    public function store(StorePostRequest $request): PostResource
    {
        $post = $this->registerPost->execute($request->validated());
        return new PostResource($post);
    }

    public function schedulesPost(): AnonymousResourceCollection
    {
        $posts = $this->getAllPostsNotSchedule->execute();
        return PostResource::collection($posts);
    }

    public function schedule(Request $request): PostResource
    {
        $post = $this->schedulePost->execute((int)$request->id);
        return new PostResource($post);
    }
}
