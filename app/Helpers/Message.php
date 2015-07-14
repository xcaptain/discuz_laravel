<?php

namespace App\Helpers;

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
        \BBCode::setParser('colors', '/\[color=(\w+)\](.*?)\[\/color\]/', '<font color="$1">$2</font>');
        \BBCode::setParser('align', '/\[align=center\](.*?)\[\/align\]/s', '<div style="text-align:center;">$1</div>');
        return \BBCode::parse($msg);
    }
}
