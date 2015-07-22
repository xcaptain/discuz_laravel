<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
      ZEZE啧啧_zeze.com_只属于年轻人的乐园 -zeze.com</title>
    <meta name="baidu-site-verification" content="5V6DbJre2j" /><meta name="keywords" content="啧啧,啧啧网,啧啧兴趣部落,95后,00后" />
    <meta name="description" content="啧啧zeze.com是一个只属于年轻人的乐园，无论你是95后还是00后，都能在啧啧找到与自己兴趣相投的小伙伴，每天啧一下，开心一整天，同学朋友都在啧。" />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <meta property="qc:admins" content="2433752666625256375" />
    <!--[if IE 6]>
    <script src="http://www.7k7kjs.cn/js/lib/DD_belatedPNG/0.0.8/DD_belatedPNG-min.js
    " type="text/javascript"></script>
    <script>
    DD_belatedPNG.fix('.ie6transbg');
    </script>
    <![endif]-->
    <base href="http://www.zeze.com/" />
    <base target= _blank />
    <!-- <link rel="stylesheet" type="text/css" href="data/cache/style_1_common.css?kQA" /> -->
    <script type="text/javascript">var JSURL = 'http://www.7k7kjs.cn/zeze/v/1.0.16/js', STYLEID = '1', STATICURL = 'http://www.7k7kjs.cn/zeze/static/', IMGDIR = 'http://www.7k7kjs.cn/zeze/static/image/common', VERHASH = 'kQA', charset = 'utf-8', discuz_uid = '0', cookiepre = 'ezd0_47f6_', cookiedomain = '.zeze.com', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|威望|,2|金钱|,3|贡献|', defaultstyle = '', REPORTURL = 'aHR0cDovL3d3dy56ZXplLmNvbS8=', SITEURL = 'http://www.zeze.com/', JSPATH = 'static/js/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
    <!-- <script src="static/js/common.js?kQA" type="text/javascript"></script> -->
    <meta name="application-name" content="ZEZE!啧啧" />
    <meta name="msapplication-tooltip" content="ZEZE!啧啧" />
    <meta name="msapplication-task" content="name=论坛;action-uri=http://www.zeze.com/forum.php;icon-uri=http://www.zeze.com/http://www.7k7kjs.cn/zeze/static/image/common/bbs.ico" />
    <link rel="archives" title="ZEZE!啧啧" href="http://www.zeze.com/archiver/" />
    <!-- <script src="static/js/forum.js?kQA" type="text/javascript"></script> -->
    <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.3.2/css/common-debug.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    @section('indexCss')
    @show

    @section('threadCss')
    @show

    @section('forumCss')
    @show

    @section('hispageCss')
    @show

    @section('forumListCss')
    @show

    @section('registerCss')
    @show

  </head>
  <body id="nv_forum" class="pg_mypage" onkeydown="if(event.keyCode==27) return false;">
    <div class="right-share-box">
      <div class="gotop-box" id="gotoTop"><a href="javascript:;"></a></div>
      <div class="care-weibo"><a href="http://www.weibo.com/u/5348256325" target="_blank"></a></div>
      <div class="care-weixin">
        <a>
          <img src="http://www.7k7kjs.cn/zeze/img/common/weixin-code.png" />
        </a>
      </div>
      <div class="care-qzone"><a href="http://user.qzone.qq.com/6559599" target="_blank"></a></div>
    </div>

    <div id="append_parent"></div><div id="ajaxwaitid"></div>

    <div class="common-nav">
      <div class="common-nav-cont wrap">
        @if(Auth::check())
          <div class="common-nav-loged">
            <a href="/home.php?mod=space&do=profile" class="common-nav-user-icon"><span><img src="{{ Attach::avatar(Auth::user()->uid) }}"><i class="bg-loged-unread"></i></span></a>
            <a href="/home.php?mod=space&do=profile" class="common-nav-user-name">{{ Auth::user()->username }}</a>
            <i class="common-nav-triangle"></i>
            <ul>
              <li>
                <a href="/home.php?mod=space&do=notice"><i class="common-nav-icon-notice"></i><span>我的通知</span><i class="common-nav-dot">2</i></a>
              </li>
              <li><a href="/home.php?mod=space&do=pm"><i class="common-nav-icon-msg"></i><span>我的纸条</span><i class="common-nav-dot">4</i></a></li>
              <li>
                <a href="member.php?mod=getpasswd" target="_self"><i class="common-nav-icon-lock"></i><span>修改密码</span></a>
              </li>
              <li>
                <a href="home.php?mod=spacecp&ac=avatar" target="_self"><i class="common-nav-icon-img"></i><span>修改头像</span></a>
              </li>
              <li>
                <a href="{{ url('/auth/logout/') }}" target="_self"><i class="common-nav-icon-exit"></i><span>退出账号</span></a>
              </li>
            </ul>
          </div>
        @else
          <div class="common-nav-unlog"><a href="{{ url('/auth/login/') }}" target="_self" class="common-nav-login"><i></i>登录</a><a class="common-nav-reg" href="{{ url('/auth/register/') }}">注册</a></div>
        @endif
        <a href="/" target="_self" class="common-nav-logo"></a>
        <div class="common-nav-menu"><a href="{{ url('/home/') }}" class="common-nav-index on" target="_self">首页</a><a href="{{ url('/forum/') }}" class="common-nav-qz" target="_self">圈子</a></i></div>
        <form class="common-nav-search" id="scbar_form" method="post" autocomplete="off" action="search.php?mod=forum" target="_blank">
          <input type="hidden" name="mod" id="scbar_mod" value="forum" />
          <input type="hidden" name="formhash" value="c16192c8" />
          <input type="hidden" name="srchtype" value="title" />
          <input type="hidden" name="srhfid" value="" />
          <input type="hidden" name="srhlocality" value="forum::mypage" />
          <input type="hidden" name="searchsubmit" value="yes"/>
          <input type="text" class="common-nav-search-text" name="srchtxt" value="" placeholder="搜索" autocomplete="off"/>
          <input type="submit" name="submit" value="" class="common-nav-search-btn" />
        </form>
      </div>
    </div><!-- 头部导航栏 -->

      @yield('contents')

      <div class="foot-copybox">
        <div class="copyright">Copyright &copy; 2014 ZEZE啧啧社区</div>
      </div>

  </body>
