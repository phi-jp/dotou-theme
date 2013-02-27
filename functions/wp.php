<?php
/*
 * wordpressカスタマイズ
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
    echo "<div class=\"pagination\">";
    //echo "<span class=\"pagePos\">Page ".$paged." of ".$pages."</span>";
    echo "<ul>";
    if($paged > 2 && $paged > $range+1 && $showitems < $pages){
      echo "<li><a href='".get_pagenum_link(1)."'>≪ First</a></li>";
    }
    if($paged > 1 && $showitems < $pages){
      echo "<li><a href='".get_pagenum_link($paged - 1)."'>? Previous</a></li>";
    }
    for ($i=1; $i <= $pages; $i++){
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        echo "<li>";
        echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        echo "</li>";
      }
    }
    if ($paged < $pages && $showitems < $pages){
      echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">Next ?</a></li>";
    }
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
      echo "<li><a href='".get_pagenum_link($pages)."'>Last ≫</a></li>";
    }
    echo "</ul>";
    echo "</div>\n";
  }
}

// ページのスラッグを取得
function getSlug($pageID){
  return get_page($pageID)->post_name;
}

// admin bar無効
function remove_footer_admin_bar() {
  define( 'BP_DISABLE_ADMIN_BAR', true );
}
add_action('wp_footer', 'remove_footer_admin_bar', 0);

// カスタムメニュー
add_theme_support( 'menus' );

// 最新の更新にNew表示
function isNew($post_date) {
  $days = 7; //Newを表示させたい期間の日数
  $today = date_i18n('U');
  $entry = $post_date;
  $kiji = date('U',($today - $entry)) / 86400 ;
  if( $days > $kiji ){
    return true;
  }
  return false;
}

// 記事の情報を取得
function getSinglePost($list, $cat, $parent){
  $postData = array();
  if( $parent->errors['invalid_term'][0] == "キーワードなし"){
    return 0;
  }
  for($i = 0; $i < count($list[$parent][$cat->name]); $i++) {
    $tmp = array();
    array_push($postData, $tmp);
  }
  global $post;
  $tmp_post = $post;
  $myposts = get_posts('numberposts=-1&category='.$cat->term_id);
  if($myposts): foreach($myposts as $post): setup_postdata($post);
    $tmp = array(
      "title" => $post->post_title,
      "link" => get_bloginfo('home')."/?p=".$post->ID,
      "ChapterName" => get_post_meta($post->ID, 'ChapterName', true),
      "ChapterNumber" => get_post_meta($post->ID, 'ChapterNumber', true),
      "ID" => $post->ID,
      "date" => get_the_time('U')
    );

    // pr($tmp);
    // pr($list[$parent]);
    // pr($cat->name);

    // 章順に配列に保存
    if( in_array($tmp['ChapterName'], $list[$parent][$cat->name]) ){
      $val = array_keys($list[$parent][$cat->name], $tmp['ChapterName']); // 値からキーを取得
      array_push($postData[$val[0]], $tmp);
    }

  endforeach; endif;
  wp_reset_postdata();
  $post = $tmp_post;

  //pr($postData);

  // sort
  $sortData = array();
  foreach($postData as  $key => $data){
    if(is_array($data[0])){
      $sort_key = array();
      foreach ($data as $key => $row) {
        $sort_key[$key]  = $row['ChapterNumber'];
      }
      array_multisort($sort_key, SORT_ASC, $data);
      array_push($sortData, $data);
    }
    else{
      $tmp = array(
        array("ChapterName" => $list[$parent][$cat->name][$key])
      );
      array_push($sortData, $tmp);
    }
  }

  return $sortData;
}


/* gianism */

// リダイレクト
function _my_redirect_to($url){
  return home_url();
}
add_filter('gianism_redirect_to', '_my_redirect_to');

function _my_login_link_facebook($markup, $link, $title){
  //return '<a class="my_fb_link btn" href="'.$link.'">'.$title.'</a>';
}
add_filter('_my_login_link_facebook', 10, 3);
?>
