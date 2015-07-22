@extends('layouts/basic')

@section('registerCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.3.2/css/register-new-debug.css">
@endsection

@section('contents')
  <div class="wrap register-procedure">
    <div class="procedure-box procedure1-box plan">
      <span class="procedure1"></span>
      <p>填写注册信息</p>
    </div>
    <div class="procedure-box procedure2-box">
      <span class="procedure2"></span>
      <p>设置形象 有人爱</p>
    </div>
    <div class="procedure-box procedure3-box">
      <span class="procedure3"></span>
      <p>轻松完成注册</p>
    </div>
    <div class="register-line1"></div>
    <div class="register-line2"></div>
  </div><!-- end wrap -->
  <div class="wrap register-box">
    <ul class="qz-list-nav">
      <li class="on"><a href="/member.php?mod=register&type=normal" target="_self">普通账号注册</a></li>
    </ul>

    <div class="register-main">

      @include('auth/register_form')

      <div class="right">
        <div class="qq-box">
          <h1>使用QQ号一键注册</h1>
          <a rel="nofollow" target="_top" href="http://www.zeze.com/connect.php?mod=login&op=init&referer={$_G[setting][siteurl]}{$_SERVER['REQUEST_URI']}&statfrom=login"></a>
          <div class="line"></div>
          <h2>已有账号？<a href="/member.php?mod=logging&action=login" target="_self">马上登陆&gt;</a></h2>
        </div>
      </div>
    </div>
  </div><!-- end wrap -->
@endsection
