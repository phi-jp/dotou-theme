<?php

/*
  PHPの便利関数
*/
/* print_rでのチェック用 */
function pr($value){
  echo "<pre>";
  print_r($value);
  echo "</pre>";
}

/* 全角半角チェック */
function checkEmEn($value){
  if (strlen($value) === mb_strlen($value)) { return true;  }
  else { return false; }
}


//!< 文字数を制限
function limitStringLength($content, $str_num){
  $continue_point = "";
  $content = apply_filters('the_content', $content);
  $content = strip_tags($content,'');
  $content = preg_replace("(\r\n|\r|\n)", "", $content);
  if(mb_strlen($content) > $str_num){
    $continue_point = "...";
  }
  $content = mb_substr($content, 0, $str_num).$continue_point;
  return $content;
}


/*
  ユーザー環境取得
*/

// スマホの判定
function is_mobile(){
  $useragents = array(
    'iPhone',           // Apple iPhone
    'iPod',             // Apple iPod touch
    'incognito', // Other iPhone browser
    'Android',          // 1.5+ Android
    'webOS', // Palm Pre Experimental
    'webmate' // Other iPhone browser
  );

  $pattern = '/'.implode('|', $useragents).'/i';
  return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// ブラウザタイプを判別
function getBrowser(){
  $agent = getenv("HTTP_USER_AGENT");
  $brws = "";
  if(preg_match('/MSIE 6.0/', $agent)){
    $brws = "IE6";
  }
  else if(preg_match('/MSIE 7.0/', $agent)){
    $brws = "IE7";
  }
  else if(preg_match('/MSIE 8.0/', $agent)){
    $brws = "IE8";
  }
  else if(preg_match('/MSIE 9.0/', $agent)){
    $brws = "IE9 ModernBrowser";
  }
  else if(preg_match('/MSIE 10.0/', $agent)){
    $brws = "IE10 ModernBrowser";
  }
  else if(preg_match('/MSIE 11.0/', $agent)){
    $brws = "IE11 ModernBrowser";
  }
  else if(preg_match('/Firefox/', $agent)){
    $brws = "Firefox ModernBrowser";
  }
  else if(preg_match('/Chrome/', $agent)){
    $brws = "Chrome ModernBrowser";
  }
  else if(preg_match('/Safari/', $agent)){
    $brws = "Safari ModernBrowser";
  }
  else{
    $brws = "other";
  }
  return $brws;
}

// WinかMacか判定
function getOS() {
  $ua = $_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/Macintosh/', $ua)){ return "Mac"; }
  else{ return "Win"; }
}

// ソーシャルアイコンを設置
function getSNS($link){ ?>
<ul class="socialcount" data-url="<?php echo $link ?>" data-counts="true">
  <li class="twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo $link ?>" title="Share on Twitter"><span class="icon">t</span><span class="count">Tweet</span></a></li>
  <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link ?>" title="Share on Facebook"><span class="icon">f</span><span class="count">Like</span></a></li>
  <li class="hatebu"><a href="" title="Share on HatenaBookmark"><span class="icon">h</span><span class="count">Hatena</span></a></li>
  <li class="googleplus"><a href="https://plus.google.com/share?url=<?php echo $link ?>" title="Share on Google Plus"><span class="icon">g</span><span class="count">+1</span></a></li>
</ul>
<?php }
?>
