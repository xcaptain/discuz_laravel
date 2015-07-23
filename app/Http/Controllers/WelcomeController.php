<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
//use App\Models\Forum\Thread;
use App\Models\Forum\Forum;
use Carbon\Carbon;
use App\Repositories\ThreadRepository as Thread;

class WelcomeController extends Controller
{
    private $thread;

    public function __construct(Thread $thread)
    {
        $this->middleware('guest');
        $this->thread = $thread;
        $this->tpp = 20;
        $this->now = Carbon::now();
        $this->forumInfo = Forum::getForumInfo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type') ? $request->get('type') : 'all';
        $page = $request->get('page') ? $request->get('page') : 1;
        $threadList = $this->thread->getThreadList($type, $page, $this->tpp);

        //该在列表中包含圈子名，避免复杂的联合查询
        foreach ($threadList as $k => $thread) {
            $thread->lastpostdate = $this->now->diffForHumans(Carbon::createFromTimeStamp($thread->lastpost));
        }
        return view('welcome/index', [
            'threadList' => $threadList,
            'forumInfo'  => $this->forumInfo,
        ]);
    }
}
