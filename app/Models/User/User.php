<?php

namespace App\Models\User;

use DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dz_common_member';

    protected $primaryKey = 'uid';

    /**
     * 禁止在insert操作的时候更新updated_at和created_at
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'username', 'email', 'password', 'groupid', 'regdate',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    /**
     * 通过用户名来获得用户信息，尤其是 ucenter 中记录的密码
     */
    public function getUserByUsername($username)
    {
        //
    }

    /**
     * 使用eager求值的方式联合2张表查询数据
     * TODO: 目前的方式会导致内存溢出，还没有找到问题
     * @param Int 用户id
     * @return Eloquent Object
     */
    public function getUserDetail($uid)
    {
        return $this->find($uid)->with('detail')->get();
    }

    public function detail()
    {
        return $this->hasOne('App\Models\User\Detail', 'uid', 'uid');
    }
}
