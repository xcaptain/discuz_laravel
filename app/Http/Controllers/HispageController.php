<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User\Detail;
use App\Models\Forum\Thread;
use App\Helpers\HForum;
use App\Helpers\Misc;
use Carbon;

class HispageController extends Controller
{
    private $tpp = 20;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid, $typeid, $page)
    {
        $userdetail = Detail::profile($uid);
        $threadList = Thread::getThreadListByAuthor($uid, $typeid, $page);
        $usersign   = $this->helpGetUserSign($userdetail->gender);
        return view('hispage/index', [
            'threadList' => $threadList,
            'userdetail' => $userdetail,
            'uid'        => $uid,
            'usersign'   => $usersign,
            'typeid'     => $typeid,
        ]);
    }

    /**
     * 目前仅仅在他的首页用到这个函数，所以不做更高级的抽象
     * @gender: int
     * @return: string
     */
    private function helpGetUserSign($gender)
    {
        if ($gender == 1) {
            return '他';
        } else {
            return '她';
        }
    }
}
