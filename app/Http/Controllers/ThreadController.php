<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Forum\Thread;
use Carbon\Carbon;
use App\Helpers\Message;

class ThreadController extends Controller
{
    /**
     * 公共配置
     * @ppp: 每页显示楼层数, int
     */
    public function __construct()
    {
        $this->ppp = 20;
        Carbon::setLocale('zh'); //设置中文语言
        $this->now = Carbon::now();
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($tid, $page)
    {
        $offset = ($page - 1) * $this->ppp;
        $threadModel = new Thread;
        $thread = $threadModel->find($tid);
        $posts = $thread->post()
               ->where('invisible', 0)
               ->orderBy('pid', 'asc')
               ->paginate($this->ppp);
        foreach($posts as $k => $v) {
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
