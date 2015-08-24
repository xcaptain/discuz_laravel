@extends('layouts.basic')

@section('threadCss')
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/fabiao-debug.css">
  <link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
@endsection

@section('contents')
  <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
  <div class="publish-wrap">
    {!! Form::open(['url' => '/thread/reply', 'method' => 'post', 'id' => 'postform', 'target' => '_self']) !!}
    <div class="publish-input-box">
      {!! Form::token() !!}
      {!! Form::hidden('wysiwyg', '1', ['id' => 'e_mode']) !!}
      {!! Form::hidden('tid', $tid) !!}

      <script>
       $(document).ready(function() {
         $("#editor").wysibb()
       })
      </script>
      {!! Form::textarea('message', '', ['id' => 'editor']) !!}
      {!! Form::submit('发表', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    <div class="friend-tishi">
      <span>*</span>友情提示：请不要发不健康言论，也不要发不文明照片，良好的环境需要你跟我们一起来努力哦！
    </div><!-- end friend-tishi -->
  </div>
@endsection
