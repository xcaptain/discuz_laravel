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

    /**
     * 获得所有的圈子的信息
     */
    public function getForumInfo()
    {
        return $this->model->getForumInfo();
    }

    public function getForumsByUid($uid)
    {
        return $this->model->getForumsByUid($uid);
    }

    public function getAllForums()
    {
        return $this->model->getAllForums();
    }
}
