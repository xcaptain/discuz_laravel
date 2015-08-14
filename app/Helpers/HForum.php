<?php

namespace App\Helpers;

/**
 * TODO: 把直接调用Model的代码全部改为调用Repository的
 */
use App\Models\Forum\Forum;

class HForum
{
    public static function getForum($fid)
    {
        $allInfo = Forum::getForumInfo();
        return $allInfo[$fid];
    }
}
