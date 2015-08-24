<div class="qz-switch-box">
  <div class="qz-switch-tit">
    <div class="qz-switch-l">
      <div class="qz-words-box  qz-switch-on">
        <a class="qz-switch-words" href="{{ action('ForumController@show', ['fid' => $fid, 'page' => 1]) }}"><i></i>看话题</a>
      </div>
      <div class="qz-pic-box ">
        <a class="qz-switch-pic" href="{{ action('ForumController@show', ['fid' => $fid, 'page' => 1, 'type' => 'pic']) }}"><i></i>图片</a>
      </div>
      <div class="qz-jj-box ">
        <a class="qz-switch-jj" href="{{ action('ForumController@show', ['fid' => $fid, 'page' => 1, 'type' => 'digest']) }}"><i></i>精华帖子</a>
      </div>
    </div>
    <div class="qz-switch-r">
      <ul>
        <li class="switch-new-words"><a href="{{ action('ThreadController@create', ['fid' => $fid]) }}">发新话题</a></li>
        <li class="vote"><a href="{{ action('ThreadController@create', ['fid' => $fid, 'special' => 1]) }}">发表投票</a></li>
        <li class="pk"><a href="{{ action('ThreadController@create', ['fid' => $fid, 'special' => 5]) }}">发表PK</a></li>
      </ul>
      <span></span>
    </div>
  </div>
</div>
