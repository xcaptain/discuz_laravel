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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
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
        foreach($threadList as $k => $thread) {
            $thread->lastpostdate = $this->now->diffForHumans(Carbon::createFromTimeStamp($thread->lastpost));
            $thread->thumb = Attachment::getThumbByTid($thread->tid, 4); //获得主帖缩略图
        }
        return view('forum/show', [
            'now' => $this->now,
            'threadList' => $threadList,
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
