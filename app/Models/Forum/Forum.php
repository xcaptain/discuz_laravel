<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use RedisFacade;
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
        $data = RedisFacade::get($key);
        if(!$data) {
            $data = DB::table($f)
                  ->join($ff, $f.'.fid', '=', $ff.'.fid')
                  ->select($f.'.fid', $f.'.name', $ff.'.icon')
                  ->get();
            RedisFacade::set($key, json_encode($data));
        }
        return $data;
    }
}
