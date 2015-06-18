@extends('layouts/basic')

@section('forumCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.0.16/css/quanzi-debug.css">
@endsection

@section('contents')
<div class="qz-index-wrap">
  @include('forum/banner')
  <div class="qz-index-main content-grid">
    <div class="zhuti-list-box grid-7" id="J-tiezi-list">

      @include('forum/typeBar')

      @foreach($threadList as $k => $thread)
        <div class="list-top-area">
          <div class="list-list">
            <div class="return-card">
              <span class="ie6transbg">433</span>
            </div>
            <div class="list-list-l">
              <h3>
                <a target="_blank" href="thread-51052-1-1.html">{{ $thread->subject }}</a>
              </h3>
              <div class="list-img-box">
                <ul class="list-img J-list-img">
                  <li><a class="mutual" href="thread-51052-1-1.html" target="_blank"><img data-src="http://i.zeze.com/attachment/image/000/79/68/92_180_90.jpg?1432641224" data-big="http://i.zeze.com/attachment/forum/201502/18/221256h1mm9v9mvpeipepr.jpg" class="lazy-img" src="http://www.7k7kjs.cn/zeze/img/common/empty.png"></a><div class="shade"></div></li>
                  <li><a class="mutual" href="thread-51052-1-1.html" target="_blank"><img data-src="http://i.zeze.com/attachment/image/000/79/69/17_180_90.jpg?1432641224" data-big="http://i.zeze.com/attachment/forum/201502/18/221516nsmyssyo6okmsexm.jpg" class="lazy-img" src="http://www.7k7kjs.cn/zeze/img/common/empty.png"></a><div class="shade"></div></li>
                  <li><a class="mutual" href="thread-51052-1-1.html" target="_blank"><img data-src="http://i.zeze.com/attachment/image/000/79/69/18_180_90.jpg?1432641224" data-big="http://i.zeze.com/attachment/forum/201502/18/221522vhjef9f9tzei2a86.jpg" class="lazy-img" src="http://www.7k7kjs.cn/zeze/img/common/empty.png"></a><div class="shade"></div></li>
                </ul>
              </div>
            </div>
            <div class="list-list-r">
              <div class="list-list-rt">
                <div class="list-user">
                  <a href="hispage-281198-1-1.html" title="{{ $thread->author }}">{{ $thread->author }}</a>
                </div>
                <div class="list-user-bottom">
                  <div class="list-user-lang">
                    <a href="hispage-852016-0-1.html" target="_blank" title="{{ $thread->lastposter }}">{{ $thread->lastposter }}</a>
                  </div>
                  <div class="list-time-before">
                    <span title="{{ $thread->lastpostdate }}">{{ $thread->lastpostdate }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div class="zeze-page page-left" id="fd_page_bottom">
  <div class="pg">
    {!! $thread->render() !!}
  </div>
</div>
@endsection
