@extends('layouts/basic')

@section('hispageCss')
  <link rel="stylesheet" href="http://www.7k7kjs.cn/zeze/v/1.2.3/css/his-qz-debug.css">
@endsection

@section('contents')
  <div class="his-qz-wrap">
    <div class="my-qz-main content-grid">
      <div class="his-qz-l person-wrap grid-7">

        <div class="person-user">
          <div class="user-card master-info">
            <div class="user-img">
              <span class="user-img-wrap">
                <img src="{{ Attach::avatar($uid, 'small') }}">
                <i class="i-mask90"></i>
              </span>
            </div>
            <div class="person-user-r">
              <div class="name-box">
                <a href="javascript:;">{{ $userdetail->username }}</a>
                <span class="user-sex user-sex-{{ Misc::gender($userdetail->gender) }}"></span>
                <span class="user-crown-img {{ Misc::level($userdetail->groupid) }}"></span>
              </div>
              <div class="user-lever">
                <div class="user-crown">
                  <span class="person-zan"><i>100</i>赞</span>
                </div>
              </div>
              <div class="person-care">
                <ul class="user-atten">
                  <!--{if $_G[uid]!=$uid}-->
                  <li class="user-note">
                    <a href="/home.php?mod=space&do=pm#uid=$hisdetail[uid]&nickname=$hisdetail[nickname]" target="_blank">传纸条</a>
                  </li>
                  <!--{if $isfollow}-->
                  <li class="$isfollow J-btn-focus" data-fuid="$uid">
                    <!--{else}-->
                    <li class="user-focus J-btn-focus" data-fuid="$uid">
                      <!--{/if}-->
                      <!--{/if}-->
                      <a href="javascript:;"></a>
                    </li>
                </ul>
              </div>

            </div><!-- end person-user-r -->
          </div>
        </div><!-- end person-user -->

        <div class="person-nav">
          <ul>
            <li{{ $typeid == 0 ? ' class=on' : '' }}>
              <a href="{{ action('HispageController@index', ['uid' => $uid, 'page' => 1, 'typeid' => 0]) }}">
                <i class="reply-icon"></i>
                {{ $usersign }}参与的话题
              </a>
            </li>
            <li{{ $typeid == 1 ? ' class=on' : '' }}>
              <a href="{{ action('HispageController@index', ['uid' => $uid, 'page' => 1, 'typeid' => 1]) }}">
                <i class="topic-icon"></i>
                {{ $usersign }}发表的话题
              </a>
            </li>
          </ul>
        </div><!-- end person-nav -->

        <div class="zhuti-list-box" id="J-tiezi-list">
          @foreach($threadList as $thread)
            <div class="list-list">
              <div class="list-list-l">
                <h3>
                  <a href="{{ action('ThreadController@show', ['tid' => $thread->tid, 'page' => 1]) }}" target="_blank">{{ $thread->subject }}</a>
                </h3>
                <p>
                  {{ $thread->message }}
                </p>
                <div class="list-img-box">
                  <ul class="list-img  J-list-img">
                    <li>
                      <a class="mutual" href="{{ action('ThreadController@show', ['tid' => $thread->tid, 'page' => 1]) }}" target="_blank"><img src="http://www.7k7kjs.cn/zeze/img/common/empty.png" data-src="http://i.zeze.com/attachment/image/000/09/65/33_180_90.jpg?1432636593" data-big="http://i.zeze.com/attachment/forum/201412/09/200252hs7979ss17mhwwh8.jpg" class="lazy-img"><div class="shade"></div></a>
                    </li>
                  </ul>
                </div>
                <div class="forum-name">
                  <a class="forum-color01" href="{{ action('ForumController@show', ['fid' => $thread->fid, 'page' => 1]) }}" target="_blank">
                    <span class="forum-text">{{ HForum::getForum($thread->fid)->name }}<i></i></span>
                  </a>
                </div>
              </div>
              <div class="list-list-r">
                <div class="list-list-rt">
                  <div class="list-user">
                    <a href="{{ action('HispageController@index', ['uid' => $thread->authorid, 'typeid' => 0, 'page' => 1]) }}" target="_blank">{{ $thread->author }}</a>
                  </div>
                  <div class="list-user-lang">
                    <span>{{ $thread->lastposter }}</span>
                  </div>
                  <div class="list-zan-box">
                    <div class="list-zan-l">
                      <div class="list-zan-r">
                        <div class="list-zan-txt">赞</div>
                        <div class="list-zan-num">31</div>
                      </div>
                    </div>
                  </div>
                  <div class="list-time-before">
                    12-09
                  </div>
                </div>
              </div>
            </div><!-- end list-list -->
          @endforeach
        </div>

      </div><!-- end his-qz-l -->

      <div class="his-qz-right person-wrap grid-3">

        <div class="i-joined">
          <div class="joined-tit-box">
            <h3 class="i-joined-tit">{$usersign}加入的圈子</h3>
            <!--{if !empty($hisgroups)}-->
            <a class="more-qz" href="forumlist-$uid-0-1.html" target="_blank">更多</a>
            <!--{/if}-->
          </div><!-- end joined-tit-box -->
          <!--{if empty($hisgroups)}-->
          <div class="i-joined-box dis">
            <p class="no-onejoin">TA还一个圈子都没有加入~</p>
          </div>
          <!--{else}-->
          <div class="i-joined-box dis">
            <!--{loop $hisgroups $fid $groupname}-->
            <div class="i-joined-li">
              <a href="forum-$fid-1.html" target="_blank">
                <img src="$group_icons[$fid]"/>
                <div class="shade"></div>
                <div class="i-joined-user qz-about-user">
                  <span class="joined-user-name">$groupname</span>
                  <span class="joined-user-add"><i>$group_membernums[$fid]</i>人</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <div class="qz-about-join {if $isjoin_group[$fid]}qz-about-joined{/if}" data-qzid="$fid"></div>
                </div>
              </a>
            </div><!-- end i-joined-li -->
            <!--{/loop}-->
          </div><!-- end i-joined-box -->
          <!--{/if}-->
        </div><!-- end i-joined -->

        <div class="qz-new-join">
          <div class="qz-about-tit">
            <h3 class="cir-name">{$usersign}关注的同学</h3>
            <!--{if !empty($userlist)}-->
            <a class="more-qz" href="follow-$uid-3-1.html" target="_blank">全部</a>
            <!--{/if}-->
          </div>
          <!--{if empty($userlist)}-->
          <div class="circle-list-box">
            <p class="no-onecare">TA还一个人都没有关注~</p>
          </div>
          <!--{else}-->
          <div class="circle-list-box">
            <!--{loop $userlist  $key $user}-->
            <!--{eval $userzan = getuserzan($user[uid])}-->
            <div class="circle-list user-card">
              <div class="circle-user-wrap">
                <div class="circle-user-photo">
                  <a class="mutual" href="hispage-$user[uid]-0-1.html" target="_blank">
                    {avatar($user[uid])}
                    <div class="shade"></div>
                    <i class="i-mask64"></i>
                  </a>
                </div>
                <div class="circle-user">
                  <div class="circle-user-top">
                    <div class="new-join-name">
                      <a href="hispage-$user[uid]-0-1.html" target="_blank">$user[username]</a>
                    </div>
                    <div class="circle-user-lever">
                      <!--{if $user[gender]==1}-->
                      <span class="user-sex user-sex-boy"></span>
                      <!--{elseif $user[gender]==2}-->
                      <span class="user-sex user-sex-girl"></span>
                      <!--{elseif $user[gender]==3}-->
                      <span class="user-sex user-sex-wein"></span>
                      <!--{elseif $user[gender]==4}-->
                      <span class="user-sex user-sex-man"></span>
                      <!--{else}-->
                      <span class="user-sex user-sex-girl"></span>
                      <!--{/if}-->
                      <a href="hispage-$user[uid]-0-1.html" class="user-crown" target="_blank">
                        <span class="user-crown-img $user[crown_class]"></span>
                      </a>
                    </div>
                  </div>
                  <div class="circle-user-bottom">
                    <a href="javascript:;"><i>$userzan</i>赞</a>
                  </div>
                </div>
              </div>

              <div class="circle-care $user[isfollow]" data-fuid="$user[uid]">
                <a href="javascript:;"></a>
              </div>
            </div><!-- end circle-list -->
            <!--{if $key != count($followinglist)-1}-->
            <div class="circle-line"></div>
            <!--{/if}-->
            <!--{/loop}-->


          </div>
          <!--{/if}-->
        </div>

      </div><!-- end my-qz-right -->
    </div><!-- end my-qz-main -->
  </div>
@endsection
