<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use DB;

class Attachment extends Model
{
    protected $table = "dz_forum_attachment";
    protected $primaryKey = "aid";

    public function __construct()
    {
        //
    }

    /**
     * 获得主帖中的缩略图
     * @tid: int, 帖子id
     * @num: int, 最大返回图片数量
     */
    public function getThumbByTid($tid, $num = 5)
    {
        $a = "dz_forum_attachment";
        $n = (int)$tid % 10;
        $an = "dz_forum_attachment_".$n;
        $data = DB::table($an)
              ->select('aid', 'dateline', 'uid', 'attachment', 'isimage', 'thumb')
              ->where('tid', '=', $tid)
              ->where('isimage', '=', 1)
              ->take($num)
              ->get();
        return $data;
    }

    public function getThumbByPid($pid)
    {
        //
    }
}
