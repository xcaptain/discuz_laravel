<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Attachment;
use Cache;
use DB;

class Forum extends Model
{
    protected $table = "dz_forum_forum";
    protected $primaryKey = "fid";

    public static function getForumInfo()
    {
        $f = "dz_forum_forum";
        $ff = "dz_forum_forumfield";
        $key = "forumInfo";
        $data = Cache::get($key);
        if(!$data) {
            $tmpData = DB::table($f)
                  ->join($ff, $f.'.fid', '=', $ff.'.fid')
                  ->select($f.'.fid', $f.'.name', $ff.'.icon')
                  ->get();
            foreach($tmpData as $k => $v) {
                $fid = $v->fid;
                $v->icon = Attachment::forumIconUrl($v->icon);
                $data[$fid] = $v;
            }
            Cache::put($key, $data, config('cache.forumttl'));
        }
        return $data;
    }
}
