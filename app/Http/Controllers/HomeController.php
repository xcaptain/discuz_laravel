<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Forum\Thread;
use App\Models\Forum\Forum;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * 初始化控制器配置
     * @tpp: 每页显示帖子数
     */
    public function __construct()
    {
        $this->tpp = 20;
        Carbon::setLocale('zh'); //设置中文语言
        $this->now = Carbon::now();
        $forumInfo = Forum::getForumInfo();
        dd($forumInfo);
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
        $threadList = Thread::getThreadList($type, $page, $this->tpp);

        //该在列表中包含圈子名，避免复杂的联合查询
        foreach($threadList as $k => $thread) {
            $thread->lastpostdate = $this->now->diffForHumans(Carbon::createFromTimeStamp($thread->lastpost));
        }
        return view('home/index', [
            'threadList' => $threadList,
        ]);
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
    public function show($id)
    {
        //
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
