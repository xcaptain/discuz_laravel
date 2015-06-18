<?php

namespace App\Helpers;

/**
 * 关于附件方法的帮助函数都在这里
 */
class Attachment {
    /**
     * 获得圈子图标的绝对路径
     *
     * @url: string
     * @return: string
     */
    public static function forumIconUrl($url)
    {
        $attachurl = config('app.attachurl');
        if(strpos($url, 'http:') !== false) {
            return $url;
        } else {
            return $attachurl . '/attachment/common/' . $url;
        }
    }
}