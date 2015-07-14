<?php

namespace App\Helpers;

use App\Models\Forum\Forum;

class HForum
{
    public static function getForum($fid)
    {
        $allInfo = Forum::getForumInfo();
        return $allInfo[$fid];
    }
}
