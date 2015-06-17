<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = "dz_forum_thread";
    protected $primaryKey = "tid";

    /**
     * 获得帖子列表
     * @type: 列表类型, string
     * @page: 当前页码, int, >= 1
     * @tpp:  每页帖子数, int
     */
    public static function getThreadList($type, $page, $tpp)
    {
        if($type == 'all') { //所有帖子按时间先后倒序
            $threadList = self::where('displayorder', '>=', 0)
                        ->orderBy('tid', 'desc')
                        ->take($tpp)
                        ->get();
        } elseif($type == 'new') { //所有精华帖按时间倒序
            $threadList = self::where('displayorder', '>=', 0)
                        ->where('digest', '>', 0)
                        ->orderBy('tid', 'desc')
                        ->take($tpp)
                        ->get();
        } elseif($type == 'my') { //我发布的帖子按时间倒序
            $threadList = self::where('displayorder', '>=', 0)
                        ->orderBy('tid', 'desc')
                        ->take($tpp)
                        ->get();
        } else {
            $threadList = self::where('displayorder', '>=', 0)
                        ->orderBy('tid', 'desc')
                        ->take($tpp)
                        ->get();
        }
        return $threadList;
    }
}
