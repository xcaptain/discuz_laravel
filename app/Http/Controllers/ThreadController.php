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
    public function create(Request $request)
    {
        return view('thread/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreThreadRequest $request)
    {
        $this->validate($request);
        $inputs = $request->all();
        $inputs['authorid'] = $request->user()->id;
        $inputs['author'] = $request->user()->username;
        $p = [
            'author' => $author,
            'authorid' => $authorid,
            'message' => $request->message,
            'fid' => $request->fid,
            'first' => 1,
        ];
        // TODO: 这里不应该用transaction,应该使用关系插入
        $tid = DB::transaction(function () use ($inputs) {
                // 插入thread表
                $this->thread->authorid = $inputs['authorid'];
                $this->thread->author = $inputs['author'];
                $this->thread->lastposterid = $inputs['lastposterid'];
                $this->thread->lastposter = $inputs['lastposter'];
                $this->thread->dateline = Carbon::now()->timestamp;
                $t = $this->thread->create($inputs);

                // 插入Post表
                $this->post->authorid = $inputs['authorid'];
                $this->post->author = $inputs['author'];
                $this->post->tid = $t->tid;
                $this->post->first = 1;
                $this->post->position = 1;
                $this->post->create($inputs);

                return $t->tid;
            });
        return redirect(action('ThreadController@show', $tid));
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
