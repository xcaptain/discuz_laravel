<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ForumRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Forum\Forum';
    }

    public function getForumInfo()
    {
        return $this->model->getForumInfo();
    }
}
