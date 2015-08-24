<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class PostRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Forum\Post';
    }
}
