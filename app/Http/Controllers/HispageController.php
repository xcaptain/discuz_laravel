<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User\Detail;
use App\Models\Forum\Thread;
use App\Helpers\Misc;

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
        $userdetail = Detail::find($uid);
        $threadList = Thread::getThreadListByAuthor($uid, $typeid, $page);
        return view('hispage/index', [
            'threadList' => $threadList,
            'userdetail' => $userdetail,
            'uid'        => $uid,
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
