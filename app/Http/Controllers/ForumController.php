<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Forum\Forum;
use App\Models\Forum\Attachment;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now();
        $this->tpp = 20;
    }

    /**
     * 显示圈子列表
     *
     * @return Response
     */
    public function index(Request $request)
    {
        eval(\Psy\sh());
        $myForums = $allForums = [];
        $user = $request->user();
        if ($user) {
            $myForums = Forum::getForumsByUid($user->uid);
        }
        $allForums = Forum::getAllForums();
        return view('forum/index', [
            'myForums'  => $myForums,
            'allForums' => $allForums,
            'user'      => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $fid
     * @return Response
     */
    public function show($fid, $page)
    {
        $forumModel = new Forum;
        $threadList = $forumModel->find($fid)
                    ->thread()
                    ->where('displayorder', '>=', 0)
                    ->orderBy('tid', 'desc')
                    ->paginate($this->tpp);
        foreach ($threadList as $k => $thread) {
            $thread->lastpostdate = $this->now->diffForHumans(Carbon::createFromTimeStamp($thread->lastpost));
            $thread->thumb = Attachment::getThumbByTid($thread->tid, 4); //获得主帖缩略图
        }
        return view('forum/show', [
            'now' => $this->now,
            'threadList' => $threadList,
        ]);
    }
}
