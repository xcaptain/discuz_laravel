<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class AttachmentRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Forum\Attachment';
    }

    public function getThumbByTid($tid, $num = 5)
    {
        return $this->model->getThumbByTid($tid, $num);
    }
}
