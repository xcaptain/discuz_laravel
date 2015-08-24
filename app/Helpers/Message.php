<?php

namespace App\Helpers;

use App\Models\Forum\AttachmentN;
use App\Models\Forum\Attachment;

class Message
{
    /**
     * 把bbcode格式的msg转成html
     * @msg: string bbcode
     * @return: string html
     * TODO: 要先处理一下msg把特殊的bbcode解析了
     */
    public static function parseReply($msg)
    {
        $msg = self::parseAttach($msg);//过滤attach标签
        \BBCode::setParser('colors', '/\[color=(\w+)\](.*?)\[\/color\]/', '<font color="$1">$2</font>');
        \BBCode::setParser('align', '/\[align=center\](.*?)\[\/align\]/s', '<div style="text-align:center;">$1</div>');
        return \BBCode::parse($msg);
    }

    public static function parseAttach($msg)
    {
        $ret = preg_replace_callback('#\[attach\](\d+)\[\/attach\]#', function ($m) {
            $aid = $m[1];
            $tid = Attachment::find($aid)->tid;
            $attach = new AttachmentN($tid);
            $url = $attach->find($aid)->attachment;
            $img = 'http://i.zeze.com/attachment/forum/' . $url;
            return "<img src='$img'>";
        }, $msg);
        return $ret;
    }
}
