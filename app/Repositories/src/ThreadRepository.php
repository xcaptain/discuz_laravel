<?php

namespace App\Repositories;

use App\Repositories\Contract\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class ThreadRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Forum\Thread';
    }
}
