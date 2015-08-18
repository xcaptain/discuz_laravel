<?php

namespace App\Helpers;

/**
 * 经过测试这里没法使用Repository模式
 * 对于Repository来说构造函数参数必须是一个IOC
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
