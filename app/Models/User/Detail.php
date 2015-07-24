<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;

class Detail extends Model
{
    protected $table = 'dz_common_member_profile';

    protected $primaryKey = 'uid';

    public $timestamps = false;

    public $rememberToken = false;

    protected $fillable = [
        'uid',
    ];

    /**
     * 获得用户的详细信息
     *
     * @uid: int 用户id
     * @return: Eloquent Object
     */
    public static function profile($uid)
    {
        $profileTable = 'dz_common_member_profile';
        $data = DB::table('dz_common_member as m')
            ->leftJoin($profileTable . ' as mp', 'm.uid', '=', 'mp.uid')
            ->where('m.uid', '=', $uid)
            ->take(1)
            ->get();
        return $data[0];
    }
}
