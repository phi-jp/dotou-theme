<?php
/* 
  wordpressの機能追加
 */

//!< ウィジェットの追加
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

//!< アイキャッチをWPに追加
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 400, 225, true );

//!< #more-$id を削除する。
function custom_content_more_link( $output ) {
    $output = preg_replace('/#more-[\d]+/i', '', $output );
    return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

//!< ループ時にポストの位置を判定
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

//!< ページング
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

/* 
  環境取得
*/

//!< スマホとPCの判別
function is_mobile(){
	$useragents = array(
		'iPhone', // Apple iPhone
		'iPod', // Apple iPod touch
		'Android', // 1.5+ Android
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
	);
	
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

//!< ブラウザタイプを判別
function getBrowser(){
	$agent = getenv("HTTP_USER_AGENT");
	$brws = "";
	if(mb_ereg("MSIE 6.0", $agent)){
		$brws = "IE6";
	}
	else if(mb_ereg("MSIE 7.0", $agent)){
		$brws = "IE7";
	}
	else if(mb_ereg("MSIE 8.0", $agent)){
		$brws = "IE8";
	}
	else if(mb_ereg("MSIE 9.0", $agent)){
		$brws = "IE9 ModernBrowser";
	}
	else if(mb_ereg("MSIE 10.0", $agent)){
		$brws = "IE10 ModernBrowser";
	}
	else if(mb_ereg("MSIE 11.0", $agent)){
		$brws = "IE11 ModernBrowser";
	}
	else if(mb_ereg("Firefox", $agent)){
		$brws = "Firefox ModernBrowser";
	}
	else if(mb_ereg("Chrome", $agent)){
		$brws = "Chrome ModernBrowser";
	}
	else if(mb_ereg("Safari", $agent)){
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
?>
