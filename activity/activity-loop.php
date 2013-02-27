<?php

/**
 * BuddyPress - Activity Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php
// ページのスラッグを取得
$pageSlug = $_SERVER["REQUEST_URI"];
$pageSlug = preg_replace('/(\?acpage=[0-9]{1,100})/', "", $pageSlug);

// ユーザー名を取得
$userName = bp_get_displayed_user_username();

// ユーザーレベルを取得
global $user_level;
get_currentuserinfo();

 // pr($activities_template->activity_count); // このページの記事数
 // pr($activities_template->total_activity_count); // 記事総数
 // pr($activities_template->pag_page); // 現在のページナンバー
 // pr($activities_template->pag_num);  // 1ページの表示数

if ($user_level == 10) {
  if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) :
    global $activities_template;
    // ページ数を計算
    global $pageNum;
    $pageNum = $activities_template->total_activity_count / $activities_template->pag_num;
    if(fmod($pageNum, 1) != 0) $pageNum++;
    $pageNum = floor($pageNum); // ページ数

    get_template_part( "activity/activity-favorite" );
  endif;
}
else if(empty($user_level)) {
  if($pageSlug == "/user/".$userName."/"){
    get_template_part( "activity/activity-home" );
  }
}
?>


<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>

<?php else : ?>
<?php
?>
<?php endif; ?>


<?php do_action( 'bp_after_activity_loop' ); ?>

<form action="" name="activity-loop-form" id="activity-loop-form" method="post">

  <?php wp_nonce_field( 'activity_filter', '_wpnonce_activity_filter' ); ?>

</form>
