@extends('layouts/basic')

@section('forumListCss')
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/qz-list-debug.css">
@endsection

@section('contents')
  <div class="qz-list-wrap">

    @if ($user)
      @include('forum/_index_myForums')
    @endif

    @include('forum/_index_allForums')

  </div>
@endsection
