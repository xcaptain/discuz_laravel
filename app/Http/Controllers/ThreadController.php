<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreThreadRequest;
use App\Http\Controllers\Controller;
use App\Repositories\ThreadRepository;
use App\Repositories\PostRepository;
use Carbon;
use App\Helpers\Message;

class ThreadController extends Controller
{
    /**
     * 公共配置
     * @ppp: 每页显示楼层数, int
     */
    public function __construct(
        ThreadRepository $thread,
        PostRepository $post
    ) {
        $this->middleware('auth', ['except' => 'show']);
        $this->ppp = 20;
        Carbon::setLocale('zh'); //设置中文语言
        $this->now = Carbon::now();
        $this->thread = $thread;
        $this->post = $post;
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
    public function create($fid, Request $request)
    {
        return view('thread/create', [
            'fid' => $fid,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|max:255|min:5',
            'message' => 'required|min:5'
        ]);
        $inputs = $request->all();
        $inputs['lastposterid'] = $inputs['authorid'] = $request->user()->uid;
        $inputs['lastposter'] = $inputs['author'] = $request->user()->username;
        $inputs['lastpost'] = $inputs['dateline'] = Carbon::now()->timestamp;
        // 采用关系模型来写入数据库而不是手动设置事务
        $thread = $this->thread->create($inputs);
        $post = $thread->post()->create($inputs);
        return redirect(action('ThreadController@show', ['tid' => $thread->tid, 'page' => 1]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $page
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
     * 回复高级模式页面，就展示一个文本框
     *
     * @param int $tid
     * @return Response
     */
    public function getReply($tid)
    {
        $thread = $this->thread->find($tid);
        if (!$thread) {
            dd('thread not exists');
        }
        return view('thread/reply', [
            'tid' => $tid,
        ]);
    }

    public function postReply(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:5',
        ]);
        $inputs = $request->all();
        $inputs['author'] = $request->user()->username;
        $inputs['authorid'] = $request->user()->uid;
        $inputs['dateline'] = Carbon::now()->timestamp;

        $thread = $this->thread->find($inputs['tid']);
        $thread->increment('replies', 1, [
            'lastpost' => Carbon::now()->timestamp,
            'lastposter' => $request->user()->username,
            'lastposterid' => $request->user()->uid,
        ]);
        $thread->post()->create($inputs);
        return redirect(action('ThreadController@show', ['tid' => $request->tid, 'page' => 1]));
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
