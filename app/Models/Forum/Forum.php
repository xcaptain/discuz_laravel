<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use Cache;
use DB;

class Forum extends Model
{
    public $table = "dz_forum_forum";

    public $primaryKey = "fid";

    /**
     * 获得所有的圈子的信息，按照fid来索引
     *
     * @return: array
     */
    public static function getForumInfo()
    {
        $f = "dz_forum_forum";
        $ff = "dz_forum_forumfield";
        $key = "forumInfo";
        $data = Cache::get($key);
        if (!$data) {
            $tmpData = DB::table($f)
                  ->join($ff, $f.'.fid', '=', $ff.'.fid')
                  ->select($f.'.fid', $f.'.name', $ff.'.icon')
                  ->get();
            foreach ($tmpData as $k => $v) {
                $fid = $v->fid;
                $v->icon = \Attach::forumIconUrl($v->icon);
                $data[$fid] = $v;
            }
            Cache::put($key, $data, config('cache.forumttl'));
        }
        return $data;
    }

    public function thread()
    {
        return $this->hasMany('App\Models\Forum\Thread', 'fid', 'fid');
    }

    /**
     * 获得uid用户加入的圈子的信息
     * @uid: int 用户id
     * @return: Eloquent Object
     */
    public function getForumsByUid($uid)
    {

    }
}
