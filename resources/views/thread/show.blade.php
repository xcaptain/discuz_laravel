@extends('layouts/basic')

@section('threadCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.0.16/css/tiezi-debug.css">
@endsection

@section('contents')
  <div class="wrap-liuyan"><script type="text/javascript">var phpFid = parseInt('66'), phpTid = parseInt('209022'), phpImgHash='051c8c1e51b7bfdda6e1fa86d750ebc8', phpFavid='46569', phpFormHash='c16192c8', phpCommentNum = 5, phpMasterId=186432;</script>
    <div class="tz-bread-box">
      <div class="tz-bread-left">
        <a href="{{ action('ForumController@show', ['fid' => $forum->fid, 'page' => 1])}}"><i>&lt;&nbsp;返回</i>{{ $forum->name }}</a>
      </div>
      <div id="pt" class="bm cl">
        <a href="./">啧啧</a>
        <em>&gt;</em>
        <a href="{{ action('ForumController@show', ['fid' => $forum->fid, 'page' => 1])}}">{{ $forum->name }}</a>
        <em>&gt;</em>
        <a href="thread-{{ $thread->tid }}-1-1.html">{{ $thread->subject }}</a>
      </div>
    </div>

    <div class="quanzi-ad-box">
      <a class="quanzi-logo" href="{{ action('ForumController@show', ['fid' => $forum->fid, 'page' => 1])}}">
        <img src="http://i.zeze.com/attachment/common/32/common_66_icon.jpg?2015061722" data-bd-imgshare-binded="1">
        <div class="shade"></div>
      </a>
      <div class="qz-desc-box">
        <div class="qz-desc-top">
          <a href="{{ action('ForumController@show', ['fid' => $forum->fid, 'page' => 1])}}" class="qz-desc-name">{{ $forum->name }}</a>
          <span class="qz-desc-join">
            <a href="javascript:;" class="qz-about-join" data-qzid="{{ $forum->fid }}"></a>
          </span>
        </div>
        <div class="qz-desc-bottom">
          <span class="qz-desc-num qz-desc-xxf">粉丝：<i>30423</i></span>
          <span class="qz-desc-num qz-desc-words">话题：<i>25675</i></span>
        </div>
      </div>
      <div class="qz-switch-r">
        <ul>
          <li class="switch-new-words"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=66">发新话题</a></li>
          <li class="vote"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=66&amp;special=1">发表投票</a></li>
          <li class="pk"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=66&amp;special=5">发表PK</a></li>
        </ul>
        <span></span>
      </div>
    </div>
    <!-- end quanzi-ad-box -->

    <div id="J-message-list-parent" class="message-box">
      @foreach($posts as $k => $post)
        <div class="message-list" id="pid4002640">
          <div class="user-card message-list-l">
            <div class="user-img">
              <a class="user-img-wrap mutual" href="hispage-{{ $post->authorid }}-0-1.html" target="_blank" data-zan="43" data-mycare="573" data-careme="283" data-level="crown-yellow08" data-focus="0" data-isself="0" data-fuid="186432" data-gold="3927" data-credits="3927" data-threads="1414" data-sex="user-sex-girl" data-nickname="{{ $post->author }}">
                <img src="http://i.zeze.com/avatar/000/18/64/32_avatar_middle.jpg?1433564894" data-bd-imgshare-binded="1">                <div class="shade"></div>
                <i class="i-mask80"></i>
                <div class="floor-poster"></div>
              </a>
            </div>

            <div class="name-box">
              <a href="hispage-{{ $post->authorid }}-0-1.html" target="_blank">{{ $post->author }}</a>
              <span class="user-sex user-sex-girl"></span>
            </div>
            <ul class="user-atten">
              <li class="user-only">
                <a href="forum.php?mod=viewthread&tid={{ $thread->tid }}&page={{ $page }}&authorid={{ $post->authorid }}">只看TA</a>
              </li>
            </ul>
          </div><!-- end message-list-l -->

          <div class="message-list-r">
            <div class="mes-list-rl">
              <div class="mes-text">
                {!! $post->message !!}
              </div>
              <div class="mes-feedback J-subreply-btn-wrap">
                <div class="mes-feedback-r">
                  <a class="mes-replay J-subreply-btn-reply" data-pid="{{ $post->pid }}" href="javascript:;">
                    <span>回复</span>
                  </a>
                  <a class="mes-replay J-subreply-btn-unreply" href="javascript:;" style="display: none;">
                    <span>回复</span>
                  </a>
                  <div class="function-zan"><a href="/forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=209022&amp;pid=4002640&amp;hash=c16192c8&amp;isjson=1" data-pid="4002640" class="J-btn-mes-zan"><i class="function-zan-heart"></i><span class="func-zan-text">赞</span><span class="num">(<i>0</i>)</span></a></div>
                </div>
                <div class="mes-feedback-time">
                  <span><span title="{{ $post->lastpost }}">{{ $post->lastpost }}</span></span>
                  <a class="J-btn-report" href="javascript:;" data-id="4002640" data-uid="186432" data-username="幽狐魅舞">举报</a>
                </div>
              </div>
            </div><!-- end mes-list-rl -->
            <div class="mes-list-rfloor">#{{ $post->position }}</div>
          </div><!-- end message-list-r -->
          <div class="clear"></div>
        </div><!-- end message-list -->
      @endforeach
      <div id="postlistreply" class="pl"><div id="post_new" class="viewthread_table" style="display: none"></div></div>
    </div>

    <form method="post" autocomplete="off" name="modactions" id="modactions">
      <input type="hidden" name="formhash" value="c16192c8">
      <input type="hidden" name="optgroup">
      <input type="hidden" name="operation">
      <input type="hidden" name="listextra" value="">
      <input type="hidden" name="page" value="1">
    </form>
    <div class="pgbtn"><a id="J-btn-big-next" href="/thread-209022-2-1.html" hidefocus="true" class="bm_h">下一页</a></div>

    <div id="fd_page_bottom" class="zeze-page page-center">
      <div class="back-qz">
        <a href="{{ action('ForumController@show', ['fid' => $forum->fid, 'page' => 1])}}"><i>&lt;&nbsp;返回</i>个性小屋</a>
      </div>
      <div class="pg"><strong>1</strong><a target="_self" href="thread-209022-2-1.html">2</a><a target="_self" href="thread-209022-2-1.html" class="nxt ie6transbg">下一页</a><span>到</span><label><input type="text" name="custompage" class="px" size="2" title="输入页码，按回车快速跳转" value="1"><span title="共 2 页"> </span></label><span>页</span><a target="_self" href="javascript:;" class="sure">确&nbsp;定</a></div></div>


    <!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
      <div class="fb-area">
        <div class="fb-area-top">
          <div class="fb-top-l">回复</div>
        </div>
        <form action="forum.php?mod=post&amp;action=reply&amp;fid=66&amp;tid=209022&amp;replysubmit=yes&amp;handlekey=fastpost&amp;isjson=1" method="post" id="J-form-tiezi-e">
          <input type="hidden" name="formhash" value="c16192c8">
          <div class="fb-textarea">
            <div class="area">
              <div class="pt hm show" id="J-bottom-editor-unlog">
                您需要登录后才可以回帖
                <a href="member.php?mod=logging&amp;action=login" id="J-bottom-edit-btn-login" class="xi2">登录</a>|<a href="member.php?mod=register" class="xi2">立即注册</a>
                <a href="http://www.zeze.com/connect.php?mod=login&amp;op=init&amp;referer=forum.php%3Fmod%3Dviewthread%26tid%3D89258%26extra%3Dpage%253D1%26page%3D1&amp;statfrom=login" target="_top" rel="nofollow"><img src="http://www.7k7kjs.cn/zeze/static/image/common/btn-qq-login.png" class="vm" data-bd-imgshare-binded="1"></a>
              </div>
              <textarea name="message" id="e_textarea" class="pt" rows="10" style="display: none;"></textarea>
            </div>
          </div>
          <div class="fb-area-bottom" style="display: none;">
            <div class="fb-bot-l J-e-controls-wrap">
              <a class="fb-area-em" data-role="e-control" id="e_sml" href="javascript:;" menupos="11"></a>
              <a class="fb-area-img J-upload" data-target="e" data-role="e-control" href="javascript:;"></a>
            </div>
            <div class="fb-bot-r">
              <a id="J-editor-btn-submit-e" href="javascript:;"></a>
            </div>
          </div>
          <p class="pub-input-error-msg" id="J-editor-error-holder-e"></p>
        </form>
      </div>
      <div class="wp mtn">
        <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
      </div>
      <div style="display:none;">
        <div class="replay-send-box" id="J-dynamic-editor">
          <div class="replay-send-box-area"><textarea rows="1" id="g_textarea" placeholder="想说点儿什么？写在这里吧"></textarea></div>
          <input type="submit" class="fast-reply-box-submit" id="J-subreply-btn-quick-reply" data-pid="4754" value="快速回复">
        </div>
      </div><!-- 举报 -->

      <script src="http://apps.bdimg.com/libs/require.js/2.1.9/require.min.js" type="text/javascript"></script>
      <script>
       requirejs.config({
         urlArgs: 'version=20150107'
       });
       require([JSURL+'/common-conf.js',JSURL+'/editor-conf.js',JSURL+'/upload-conf.js'],function(common){
         require(['app/tiezi-huati']);
       })
      </script>
  </div>
@endsection
