@extends('layouts/basic')

@section('threadCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.1.3/css/fabiao-debug.css">
  <link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
@endsection

@section('contents')
  <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
  <div class="publish-wrap">
    <form action="{{ url('/thread/new') }}" method="post" target="_self" id="postform">
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
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="hidden" name="posttime" id="posttime" value="{{ time() }}">
        <input type="hidden" name="wysiwyg" id="e_mode" value="1">

        <div class="pub-input-list">
          <div class="pub-input-left">
            <span class="pub-inp-name">标题</span>
          </div>
          <div class="pub-input-right pub-inp-title">
            <input placeholder="不少于5个字" type="text" id="J-form-tiezi-title" name="subject">
            <p class="pub-input-error-msg">不少于5个字</p>
          </div>
        </div>
        <script>
         $(document).ready(function() {
           $("#editor").wysibb()
         })
        </script>
        <textarea id="editor" name="message">请输入内容</textarea>
        <button type="submit" class="btn btn-primary">添加</button>
    </form>

    <div class="friend-tishi">
      <span>*</span>友情提示：请不要发不健康言论，也不要发不文明照片，良好的环境需要你跟我们一起来努力哦！
    </div><!-- end friend-tishi -->
  </div>
@endsection
