<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class AttachmentN extends Model
{
    public function attachment()
    {
        return $this->hasOne('App\Models\Forum\AttachmentN', 'aid', 'aid');
    }
}
