<?php
/*
  wordpressの機能追加
 */

// ウィジェットの追加
if ( function_exists('register_sidebar') ){
  register_sidebar();
}
if( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name' => 'footer_sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

// アイキャッチをWPに追加
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 400, 225, true );

// カスタムメニューを追加
add_theme_support( 'menus' );

// ログイン時のツールバーを削除
add_filter( 'show_admin_bar', '__return_false' );


// #more-$id を削除する。
function custom_content_more_link( $output ) {
  $output = preg_replace('/#more-[\d]+/i', '', $output );
  return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

// ループ時にポストの位置を判定
function isFirst(){
  global $wp_query;
  return ($wp_query->current_post === 0);
}

function isLast(){
  global $wp_query;
  return ($wp_query->current_post+1 === $wp_query->post_count);
}

function isOdd(){
  global $wp_query;
  return ((($wp_query->current_post+1) % 2) === 1);
}

function isEvery(){
  global $wp_query;
  return ((($wp_query->current_post+1) % 2) === 0);
}

// ページング
function pagination($pages = '', $range = 4){
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == ''){
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }
  if(1 != $pages){
    echo "<div class=\"pagination\"><span class=\"pagePos\">Page ".$paged." of ".$pages."</span>";
    if($paged > 2 && $paged > $range+1 && $showitems < $pages){
      echo "<a href='".get_pagenum_link(1)."'>« First</a>";
    }
    if($paged > 1 && $showitems < $pages){
      echo "<a href='".get_pagenum_link($paged - 1)."'>‹ Previous</a>";
    }
    for ($i=1; $i <= $pages; $i++){
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        //echo "<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
      }
    }
    if ($paged < $pages && $showitems < $pages){
      echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next ›</a>";
    }
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
      echo "<a href='".get_pagenum_link($pages)."'>Last »</a>";
    }
    echo "</div>\n";
  }
}

// ページのスラッグを取得
function getSlug($pageID){
  return get_page($pageID)->post_name;
}

/* カスタム投稿タイプを追加 */
function my_custom_init() {
    register_post_type( 'news', array(
        'label' => 'お知らせ',
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ,'comments' ),
        'menu_position' => 5,
        'has_archive' => true
    ));
}
add_action( 'init', 'my_custom_init' );

// カスタム投稿のアーカイブ
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( '' != $my_archives_post_type )
    $add_link .= '?post_type=' . $my_archives_post_type;
  $link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link." '",$link_html);

  return $link_html;
}
/* カスタム投稿タイプここまで */



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

/*
 * その他
 */

// 値の中身を表示
function pr($value){
  echo "<pre>";
    print_r($value);
  echo "</pre>";
}
?>
