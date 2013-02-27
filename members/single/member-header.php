<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_member_header' ); ?>

<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<h2>
      <a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
	</h2>

  <p><?php bp_profile_field_data( 'field=プロフィール' );?></p>
  <?php
  if(bp_get_profile_field_data('field=ウェブサイトURL')){
    echo "<p><a href='".bp_get_profile_field_data( "field=ウェブサイトURL" )."' target='_blank'>ウェブサイト</a></p>";
  }
  if(bp_get_profile_field_data('field=Twitterユーザー名')){
    echo "<p><a href='https://twitter.com/".bp_get_profile_field_data( "field=Twitterユーザー名" )."' target='_blank'>Twitter</a></p>";
  }
  if(bp_get_profile_field_data('field=Facebook URL')){
    echo "<p><a href='".bp_get_profile_field_data( "field=Facebook URL" )."' target='_blank'>Facebook</a></p>";
  }
  ?>
	<span class="user-nicename">@<?php bp_displayed_user_username(); ?></span>
	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

	<?php do_action( 'bp_before_member_header_meta' ); ?>

	<div id="item-meta">

		<?php if ( bp_is_active( 'activity' ) ) : ?>

			<div id="latest-update">

				<?php //bp_activity_latest_update( bp_displayed_user_id() ); ?>

			</div>

		<?php endif; ?>

		<div id="item-buttons">

			<?php //do_action( 'bp_member_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php
		/***
		 * If you'd like to show specific profile fields here use:
		 * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
		 */
		 do_action( 'bp_profile_header_meta' );

		 ?>

	</div><!-- #item-meta -->

</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>
