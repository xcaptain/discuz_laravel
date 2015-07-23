<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ThreadRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Forum\Thread';
    }

    public function getThreadList($type, $page, $tpp)
    {
        return $this->model->getThreadList($type, $page, $tpp);
    }

    public function getThreadListByAuthor($uid, $typeid = 0, $tpp = 20)
    {
        return $this->model->getThreadListByAuthor($uid, $typeid, $tpp);
    }
}
