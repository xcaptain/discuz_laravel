<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class AttachmentN extends Model
{
    protected $primaryKey = 'aid';

    /**
     * 使用参数来指定对应的表
     * $tid 按照主题来进行分表的，必须要有默认参数，否则会和父类的构造函数
     *      参数混淆
     * TODO: 还没有搞清楚为什么每次find结果table都是dz_forum_attachment_0
     */
    public function __construct($tid = 1)
    {
        $this->tid = $tid;
        $this->tableid = $this->tid % 10;
        $this->table = 'dz_forum_attachment_'.$this->tableid;
    }

    public function attachment()
    {
        return $this->hasOne('App\Models\Forum\AttachmentN', 'aid', 'aid');
    }
}
