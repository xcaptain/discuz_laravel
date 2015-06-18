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
  <div class="circle-main grid-3">
<div class="my-qz-right person-wrap-right">
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
<!-- end hot-week -->
<div class="quanzi-correlation">
<div class="index-right-title">
<h3>相关圈子</h3>
</div><div class="quanzi-li">
<a href="forum-43-1.html">
    <img data-src="http://i.zeze.com/attachment/common/17/common_43_icon.jpg?2015061814" class="" src="http://i.zeze.com/attachment/common/17/common_43_icon.jpg?2015061814">
    <div class="qz-list">
<span class="qz-name">鹿晗</span>
<span class="qz-person">
<i>16069</i>人
</span>
  </div>
</a>
</div>
<div class="quanzi-li">
<a href="forum-47-1.html">
    <img data-src="http://i.zeze.com/attachment/common/67/common_47_icon.jpg?2015061814" class="lazy-img">
    <div class="qz-list">
<span class="qz-name">吴世勋</span>
<span class="qz-person">
<i>1297</i>人
</span>
  </div>
</a>
</div>
<div class="quanzi-li">
<a href="forum-60-1.html">
    <img data-src="http://i.zeze.com/attachment/common/07/common_60_icon.jpg?2015061814" class="lazy-img">
    <div class="qz-list">
<span class="qz-name">吴亦凡</span>
<span class="qz-person">
<i>7194</i>人
</span>
  </div>
</a>
</div>
<div class="quanzi-li">
<a href="forum-44-1.html">
    <img data-src="http://i.zeze.com/attachment/common/f7/common_44_icon.jpg?2015061814" class="lazy-img">
    <div class="qz-list">
<span class="qz-name">韩流</span>
<span class="qz-person">
<i>5060</i>人
</span>
  </div>
</a>
</div>
</div>
<!-- end quanzi-correlation -->
<div class="phone-ad-box" style="margin-top: 30px;">
<!-- 广告位：啧啧-右侧栏悬停 -->
<script type="text/javascript">BAIDU_CLB_SLOT_ID = "1096524";</script>
<script src="http://cbjs.baidu.com/js/o.js" type="text/javascript"></script><div id="BAIDU_DUP_wrapper_1096524_0"></div><script charset="utf-8" src="http://cb.baidu.com/ecom?di=1096524&amp;dcb=BAIDU_DUP_define&amp;dtm=BAIDU_DUP2_SETJSONADSLOT&amp;dbv=2&amp;dci=0&amp;dri=0&amp;dis=0&amp;dai=2&amp;dds=&amp;drs=1&amp;dvi=1430984165&amp;ltu=http%3A%2F%2Fwww.zeze.com%2Fforum-2-1.html&amp;liu=&amp;ltr=&amp;lcr=&amp;ps=971x884&amp;psr=1366x768&amp;par=1366x768&amp;pcs=1349x703&amp;pss=1349x7487&amp;pis=-1x-1&amp;cfv=17&amp;ccd=24&amp;chi=2&amp;cja=true&amp;cpl=5&amp;cmi=7&amp;cce=true&amp;col=zh-CN&amp;cec=UTF-8&amp;cdo=-1&amp;tsr=434&amp;tlm=1434608772&amp;tcn=1434608773&amp;tpr=1434608772205&amp;dpt=none&amp;coa=&amp;ti=EXO-%E5%9C%88%E5%AD%90%20-%20ZEZE!%E5%95%A7%E5%95%A7&amp;baidu_id="></script><script type="text/javascript">
var cpro_id="u2145990";
(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"280",rsi1:"280",pat:"17",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0"}
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script><div id="BAIDU_DUP_wrapper_u2145990_0" width="280px" height="280px" style="width: 280px; height: 280px; display: inline-block; z-index: 2147483646;"><iframe id="cproIframe_u2145990" src="http://pos.baidu.com/acom?adn=3&amp;adp=1&amp;at=0&amp;aurl=&amp;c01=1&amp;cad=0&amp;ccd=24&amp;cec=UTF-8&amp;cfv=17&amp;ch=0&amp;col=zh-CN&amp;conBW=1&amp;conOP=0&amp;cpa=1&amp;dai=2&amp;dis=0&amp;ltr=&amp;ltu=http%3A%2F%2Fwww.zeze.com%2Fforum-2-1.html&amp;lunum=6&amp;n=7k7kcom_cpr&amp;pat=17&amp;pcs=1349x703&amp;pis=10000x10000&amp;ps=971x884&amp;psr=1366x768&amp;pss=1349x7487&amp;ptt=0&amp;qn=94315ae50eebb940&amp;rad=&amp;rsi0=280&amp;rsi1=280&amp;rsi5=4&amp;rss0=%23FFFFFF&amp;rss1=%23FFFFFF&amp;rss2=%23000000&amp;rss3=%23444444&amp;rss4=%23008000&amp;rss5=&amp;rss6=%23e10900&amp;rss7=%23fdfdfd&amp;scale=&amp;skin=&amp;td_id=2145990&amp;titFF=%25E5%25BE%25AE%25E8%25BD%25AF%25E9%259B%2585%25E9%25BB%2591&amp;titFS=14&amp;titSU=0&amp;tn=baiduCustNativeAD&amp;tpr=1434608772205&amp;ts=1&amp;xuanting=1&amp;dtm=BAIDU_DUP2_SETJSONADSLOT&amp;dc=2&amp;di=u2145990&amp;ti=EXO-%E5%9C%88%E5%AD%90%20-%20ZEZE!%E5%95%A7%E5%95%A7&amp;tt=1434608772372.483.975.978" width="280" height="280" align="center,center" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" allowtransparency="true"></iframe></div><script charset="utf-8" src="http://pos.baidu.com/acom?di=u2145990&amp;dcb=BAIDU_DUP2_define&amp;dtm=BAIDU_DUP2_SETJSONADSLOT&amp;dbv=2&amp;dci=0&amp;dri=0&amp;dis=0&amp;dai=2&amp;dds=&amp;drs=1&amp;dvi=1432188695&amp;ltu=http%3A%2F%2Fwww.zeze.com%2Fforum-2-1.html&amp;liu=&amp;ltr=&amp;lcr=&amp;ps=971x884&amp;psr=1366x768&amp;par=1366x768&amp;pcs=1349x703&amp;pss=1349x7487&amp;pis=-1x-1&amp;cfv=17&amp;ccd=24&amp;chi=2&amp;cja=true&amp;cpl=5&amp;cmi=7&amp;cce=true&amp;col=zh-CN&amp;cec=UTF-8&amp;cdo=-1&amp;tsr=471&amp;tlm=1434608772&amp;tcn=1434608773&amp;tpr=1434608772205&amp;dpt=none&amp;coa=at%3D3%26rsi0%3D280%26rsi1%3D280%26pat%3D17%26tn%3DbaiduCustNativeAD%26rss1%3D%2523FFFFFF%26conBW%3D1%26adp%3D1%26ptt%3D0%26titFF%3D%2525E5%2525BE%2525AE%2525E8%2525BD%2525AF%2525E9%25259B%252585%2525E9%2525BB%252591%26titFS%3D14%26rss2%3D%2523000000%26titSU%3D0%26c01%3D1&amp;ti=EXO-%E5%9C%88%E5%AD%90%20-%20ZEZE!%E5%95%A7%E5%95%A7&amp;baidu_id="></script>
</div>
</div>
</div>
</div>
</div>
@endsection
