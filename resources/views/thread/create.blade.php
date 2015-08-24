@extends('layouts/basic')

@section('threadCss')
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/fabiao-debug.css">
  <link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
@endsection

@section('contents')
  <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
  <div class="publish-wrap">
    {!! Form::open(['url' => '/thread', 'method' => 'post', 'id' => 'postform', 'target' => '_self']) !!}
      <div class="publish-tab">
        <div class="pub-tab">
          <div class="pub-tab-box">
            <div class="pub-tab-tit">话题<i></i></div>
            <ul class="pub-tab-li">
              <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=52&amp;special=5">PK</a></li>
              <li><a href="forum.php?mod=post&amp;action=newthread&amp;fid=52&amp;special=1">投票</a></li>
            </ul>
          </div>
          <span class="pub-tab-text">切换话题模板：</span>
        </div>
        <div class="pub-now-circle"><span>当前圈子：</span><a href="forum.php?mod=forumdisplay&amp;fid=52">花千骨<i></i></a></div>
      </div><!-- end publish-tab -->

      <!-- 放置一些编辑器里面弹出的选择框，比如表情，背景，分割线 -->
      <div id="append_parent"></div>

      <div class="publish-input-box">
        {!! Form::token() !!}
        {!! Form::hidden('wysiwyg', '1', ['id' => 'e_mode']) !!}
        {!! Form::hidden('special', 0) !!}
        {!! Form::hidden('fid', $fid) !!}

        <div class="pub-input-list">
          <div class="pub-input-left">
            <span class="pub-inp-name">标题</span>
          </div>
          <div class="pub-input-right pub-inp-title">
            {!! Form::text('subject', '', ['id' => 'J-form-tiezi-title', 'placeholder' => '不少于5个字']) !!}
            <p class="pub-input-error-msg">不少于5个字</p>
          </div>
        </div>
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
