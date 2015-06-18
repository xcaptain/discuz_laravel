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
        return \BBCode::parse($msg);
    }
}