<?php

namespace App\Helpers;

class Misc
{
    /**
     * 获得用户性别对应的css类
     * @gender: int 0, 1, 2, 3, 4
     * @return: string
     */
    public static function gender($gender)
    {
        if ($gender == 1) {
            $sex = "boy";
        } elseif ($gender == 2) {
            $sex = "girl";
        } elseif ($gender == 3) {
            $sex = "wein";
        } elseif ($gender == 4) {
            $sex = "main";
        } else {
            $sex = "girl";
        }
        return $sex;
    }

    /**
     * 获得用户等级css标记
     * @groupid: int
     * @return: string
     */
    public static function level($groupid)
    {
        $map = [
            1 => 'lv1',
            2 => 'lv2',
            3 => 'lv3',
            4 => 'lv4',
        ];
        if (isset($map[$groupid])) {
            return $map[$groupid];
        } else {
            return 'lv0';
        }
    }
}
