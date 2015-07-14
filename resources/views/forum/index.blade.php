@extends('layouts/basic')

@section('forumListCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.2.3/css/qz-list-debug.css">
@endsection

@section('contents')
  <div class="qz-list-wrap">

    @if ($user)
      @include('forum/myForums')
    @endif

    @include('forum/allForums')

  </div>
@endsection
