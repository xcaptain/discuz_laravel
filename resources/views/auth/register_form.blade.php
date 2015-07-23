<div class="left showContent">
  <form method="post" autocomplete="off" name="register" id="" enctype="multipart/form-data" action="{{ url('/auth/register/') }}" target="_self">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="landing-box username-box">
      <label for="J-register-username">登陆账号:</label>
      <input type="text" id="J-register-username" name="username" class="username" tabindex="1" value="" autocomplete="off" size="25" placeholder="6-12位字母数字或组合"/>
      <i class="input-state"></i><span></span>
    </div>
    <div class="landing-box username-box">
      <label for="J-register-username">Email:</label>
      <input type="text" id="J-register-email" name="email" class="email" tabindex="2" value="" autocomplete="off" size="25"  placeholder="你的邮箱地址用于登录啧啧">
      <i class="input-state true"></i><span></span>
    </div>
    <div class="landing-box username-box">
      <label for="J-register-pwd">密码:</label>
      <input type="password" id="J-register-pwd" name="password" size="25" tabindex="3" class="email" placeholder="6-18位，可使用大小写字母、数字及符号"/>
      <i class="input-state"></i><span></span>
      <div class="padd-str-box nomalpart">
	<a href="javascript:;" class="strong">弱</a>
	<a href="javascript:;">中</a>
	<a href="javascript:;">强</a>
      </div>
    </div>
    <div class="landing-box username-box">
      <label for="J-register-pwd-confirm">确认密码:</label>
      <input type="password" id="J-register-pwd-confirm" name="password2" size="25" tabindex="4" value="" class="email" placeholder="再输一次看看有没有输错"  />
      <i class="input-state false"></i><span></span>
    </div>
    <button class="nextbtn" id="J-register-btn-submit" type="submit" name="regsubmit" value="true" tabindex="5"><strong>立即注册</strong></button>
    <div class="consent"><input type="checkbox" value="" name="agreebbrule" id="J-register-agreement" checked="checked"><span class="motion-login">我已阅读并同意《<a href="/member.php?mod=agreement" target="_blank">啧啧社区用户注册协议</a>》</span><i class="input-state"><span></span></i></div>
  </form>
</div>
