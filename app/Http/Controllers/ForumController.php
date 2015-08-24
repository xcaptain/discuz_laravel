<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\ForumRepository as Forum;
use App\Repositories\AttachmentRepository as Attachment;

class ForumController extends Controller
{
    public function __construct(
        Request $request,
        Forum $forum,
        Attachment $attachment
    )
    {
        $this->now = Carbon::now();
        $this->tpp = 20;
        $this->request = $request;
        $this->forum = $forum;
        $this->attachment = $attachment;
    }

    /**
     * 显示圈子列表
     *
     * @return Response
     */
    public function index()
    {
        $myForums = $allForums = [];
        $user = $this->request->user;
        if ($user) {
            $myForums = $this->forum->getForumsByUid($user->uid);
        }
        $allForums = $this->forum->getAllForums();
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
        $threadList = $this->forum->find($fid)
            ->thread()
            ->where('displayorder', '>=', 0)
            ->orderBy('tid', 'desc')
            ->paginate($this->tpp);
        foreach ($threadList as $k => $thread) {
            $thread->lastpostdate = $this->now->diffForHumans(Carbon::createFromTimeStamp($thread->lastpost));
            $thread->thumb = $this->attachment->getThumbByTid($thread->tid, 4);
        }
        return view('forum/show', [
            'now' => $this->now,
            'threadList' => $threadList,
            'fid' => $fid,
        ]);
    }
}
