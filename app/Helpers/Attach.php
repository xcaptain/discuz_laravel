<?php

namespace App\Helpers;

/**
 * 关于附件方法的帮助函数都在这里
 */
class Attach
{
    /**
     * 获得圈子图标的绝对路径
     * @url: string
     * @return: string
     */
    public static function forumIconUrl($url)
    {
        $cdn = config('app.cdn');
        if (strpos($url, 'http:') !== false) {
            return $url;
        } else {
            return $cdn . '/attachment/common/' . $url;
        }
    }

    public static function threadThumb($url)
    {
        $cdn = config('app.cdn');
        if (strpos($url, 'http:') !== false) {
            return $url;
        } else {
            return $cdn . '/attachment/forum/' . $url;
        }
    }

    /**
     * 获得用户头像的绝对路径
     * @uid: int, 用户id
     * @size: string, 用户头像尺寸
     * @return: avatar, 用户头像链接
     */
    public static function avatar($uid, $size = 'small')
    {
        if (!in_array($size, ['small', 'middle', 'big'])) {
            $size = 'small';
        }
        $uid = sprintf("%09d", $uid);
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $dir3 = substr($uid, 5, 2);
        $avatar = $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).'_avatar_'.$size.'.jpg';
        $cdn = config('app.cdn');
        $avatar = $cdn . '/avatar/' . $avatar;
        return $avatar;
    }
}
