<?php

/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>
<!-- 
<div class="tabbable">
  <ul class="nav nav-tabs">
		<?php
    //bp_get_options_nav();
    global $bp;
    //pr($bp);
    ?>
	</ul>
</div>
-->
<!-- .item-list-tabs -->

<?php do_action( 'bp_before_member_activity_post_form' ); ?>

<?php
/*
if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
	locate_template( array( 'activity/post-form.php'), true );

do_action( 'bp_after_member_activity_post_form' );
do_action( 'bp_before_member_activity_content' );
*/
?>

<div class="tab-content activity" role="main">
  <div class="tab-pane active" id="tab1">

  <?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>

  </div>
</div><!-- .activity -->

<?php do_action( 'bp_after_member_activity_content' ); ?>
