@extends('layouts/basic')

@section('indexCss')
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/my-qz-debug.css">
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/index-debug.css">
@endsection

@section('contents')
  @include('home/_index_banner')

  <div class="my-qz-wrap">
    <div class="my-qz-main content-grid">
      <div class="zhuti-list-box grid-7" id="J-tiezi-list">

        @include('home/_index_categoryBar')

        @include('home/_index_typeBar')

        @foreach($threadList as $k => $thread)
          <div class="list-list" data-tid="207680">
            <div class="list-list-t">
              <a href="{{ action('ForumController@show', ['fid' => $thread->fid, 'page' => 1])}}" target="_blank">
                <img src="{{ $forumInfo[$thread->fid]->icon }}">
                <p>{{ $forumInfo[$thread->fid]->name }}</p>
              </a>
            </div>
            <div class="list-list-l">
              <h3>
                <a href="{{ action('ThreadController@show', ['tid' => $thread->tid, 'page' => 1]) }}">{{ $thread->subject }}</a>
              </h3>

              <p>{{ $thread->message }}</p>

              <div class="list-img-box J-list-img">
                <ul class="list-img">
                  <li>
                    <a class="mutual" href="thread-207680-1-1.html">
                      <img data-src="http://i.zeze.com/attachment/image/002/40/75/30_180_90.jpg?1434426121" data-big="http://i.zeze.com/attachment/forum/201506/16/114246i692m27ullxlf7yl.jpg" src="http://www.7k7kjs.cn/zeze/img/common/empty.png" class="lazy-img">
                      <div class="shade"></div>
                    </a>
                  </li>
                  <li>
                    <a class="mutual" href="thread-207680-1-1.html">
                      <img data-src="http://i.zeze.com/attachment/image/002/40/75/31_180_90.jpg?1434426121" data-big="http://i.zeze.com/attachment/forum/201506/16/114250k4yymwfv4c73ma7k.jpg" src="http://www.7k7kjs.cn/zeze/img/common/empty.png" class="lazy-img">
                      <div class="shade"></div>
                    </a>
                  </li>
                  <li>
                    <a class="mutual" href="thread-207680-1-1.html">
                      <img data-src="http://i.zeze.com/attachment/image/002/40/75/33_180_90.jpg?1434426121" data-big="http://i.zeze.com/attachment/forum/201506/16/114256y51xdqaxryr6k2nd.jpg" src="http://www.7k7kjs.cn/zeze/img/common/empty.png" class="lazy-img">
                      <div class="shade"></div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="forum-name">
                <a href="{{ action('HispageController@index', ['uid' => $thread->lastposterid, 'page' => 1, 'typeid' => 0]) }}" target="_blank" class="list-person">{{ $thread->lastposter }}</a>
                <p class="list-time"><span title="{{ $thread->lastpostdate }}">{{ $thread->lastpostdate }}</span></p>
              </div>
            </div>
          </div><!-- end list-list -->
        @endforeach

      </div><!-- end zhuti-list-box -->

      <div class="my-qz-right grid-3 person-wrap-right">
        <div class="hot-week">
          <div class="index-right-title">
            <h3>热门话题</h3>
          </div>
          <ul class="index-hot-words"><li>
            <a href="http://www.zeze.com/thread-208419-1-1.html" class="hot-words-img">
              <img data-src="http://i.zeze.com/attachment/portal/201506/17/120454j8z89xearxgi3rx3.jpg" src="http://i.zeze.com/attachment/portal/201506/17/120454j8z89xearxgi3rx3.jpg" width="62" height="62" class="">
            </a>
            <a href="http://www.zeze.com/thread-208419-1-1.html" class="hot-words-text">
              <h3>一年一度的甜咸粽子PK大赛开始啦</h3>
              <p>你家的粽子是什么口味的？</p>
            </a>
          </li>
          <li>
            <a href="http://www.zeze.com/thread-205843-1-1.html" class="hot-words-img">
              <img data-src="http://i.zeze.com/attachment/portal/201506/17/120608tvwjyoopibpvqops.jpg" src="http://i.zeze.com/attachment/portal/201506/17/120608tvwjyoopibpvqops.jpg" width="62" height="62" class="">
            </a>
            <a href="http://www.zeze.com/thread-205843-1-1.html" class="hot-words-text">
              <h3>父亲节给爸爸亲手做个贺卡吧！</h3>
              <p>立体手工贺卡制作方法图解教程</p>
            </a>
          </li>
          <li>
            <a href="http://www.zeze.com/thread-207236-1-1.html" class="hot-words-img">
              <img data-src="http://i.zeze.com/attachment/portal/201506/17/120649zvya6znnerg3nznp.jpg" src="http://i.zeze.com/attachment/portal/201506/17/120649zvya6znnerg3nznp.jpg" width="62" height="62" class="">
            </a>
            <a href="http://www.zeze.com/thread-207236-1-1.html" class="hot-words-text">
              <h3>为3年后的你写下一句话吧！</h3>
              <p>想对3年后的自己说什么呢？</p>
            </a>
          </li>
          </ul>
        </div>

      	<div class="quanzi-correlation">
          <div class="index-right-title">
            <h3>最新圈子</h3>
          </div>
          <div class="quanzi-li">
            <a href="forum-37-1.html">
              <img src="http://i.zeze.com/attachment/common/a5/common_37_icon.jpg?2015061719">
              <div class="qz-list">
                <span class="qz-name">快乐大本营</span>
                <span class="qz-person">
                  <i>8062</i>人
                </span>
              </div>
            </a>
          </div>
          <div class="quanzi-li">
            <a href="forum-80-1.html">
              <img src="http://i.zeze.com/attachment/common/f0/common_80_icon.jpg?2015061719">
              <div class="qz-list">
                <span class="qz-name">动漫二次元</span>
                <span class="qz-person">
                  <i>21144</i>人
                </span>
              </div>
            </a>
          </div>
          <div class="quanzi-li">
            <a href="forum-102-1.html">
              <img src="http://i.zeze.com/attachment/common/ec/common_102_icon.jpg?2015061719">
              <div class="qz-list">
                <span class="qz-name">娱乐八卦阵</span>
                <span class="qz-person">
                  <i>1585</i>人
                </span>
              </div>
            </a>
          </div>
          <div class="quanzi-li">
            <a href="forum-86-1.html">
              <img src="http://i.zeze.com/attachment/common/93/common_86_icon.jpg?2015061719">
              <div class="qz-list">
                <span class="qz-name">赛尔号</span>
                <span class="qz-person">
                  <i>1704</i>人
                </span>
              </div>
            </a>
          </div>
        </div>
      </div><!-- end my-qz-right -->
    </div><!-- end my-qz-main -->
  </div>

  @include('home/_index_pagination')
@endsection

@section('home/bottom')
  <script src="http://apps.bdimg.com/libs/require.js/2.1.9/require.min.js" type="text/javascript"></script>
  <script>
   requirejs.config({
     urlArgs: 'version=20141229'
   });
   require([JSURL+'/common-conf.js'], function(common){
     require(['app/index']);
   })
  </script>
@endsection
