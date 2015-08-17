<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "dz_forum_post";

    protected $primaryKey = "pid";

    protected $fillable = [
        'fid',
        'subject',
        'message'
    ];

    public function thread()
    {
        return $this->belongsTo('App\Models\Forum\Thread', 'tid', 'pid');
    }
}
