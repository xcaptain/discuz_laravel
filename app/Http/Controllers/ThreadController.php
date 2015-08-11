<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ThreadRepository;
use Carbon\Carbon;
use App\Helpers\Message;

class ThreadController extends Controller
{
    /**
     * 公共配置
     * @ppp: 每页显示楼层数, int
     */
    public function __construct(ThreadRepository $thread)
    {
        $this->middleware('auth', ['except' => 'show']);
        $this->ppp = 20;
        Carbon::setLocale('zh'); //设置中文语言
        $this->now = Carbon::now();
        $this->thread = $thread;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('thread/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $subject = $request->subject ? $request->subject : '';
        $message = $request->message ? $request->message : '';
        $author  = $request->user()->username;
        $authorid= $request->user()->uid;

        $thread = new Thread;
        $t = ['subject'  => $subject,
              'author'   => $author,
              'authorid' => $authorid,
              'message'  => $message,
        ];
        $thread->newThread($t);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($tid, $page)
    {
        $thread = $this->thread->find($tid);
        $posts = $thread->post()
               ->where('invisible', 0)
               ->orderBy('pid', 'asc')
               ->paginate($this->ppp);
        foreach ($posts as $k => $v) {
            $v->dateline = $this->now->diffForHumans(Carbon::createFromTimeStamp($v->dateline));
            $v->message = Message::parseReply($v->message);
        }
        $forum = $thread->forum()->first();
        return view('thread/show', [
            'posts'  => $posts,
            'thread' => $thread,
            'forum'  => $forum,
            'page'   => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
