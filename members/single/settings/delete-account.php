<?php

/**
 * BuddyPress Delete Account
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
?>

<?php get_header( 'buddypress' ); ?>

	<div id="content">
	  <div class="padder container-fluid">
	    <div class="row-fluid">

			<?php do_action( 'bp_before_member_settings_template' ); ?>

	      <div id="item-header" class="span4 well">

				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

			</div><!-- #item-header -->

      <div class="item_nav_box span8 well">
        <div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					
              <ul class="nav nav-tabs">

                <?php //bp_get_displayed_user_nav(); ?>
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      活動
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu">
                    <?php //bp_get_options_nav(); ?>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/activity/">個人</a></li>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/activity/favorites/">お気に入り</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      プロフィール
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu">
                    <?php //bp_get_options_nav(); ?>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/profile/edit/">プロフィール</a></li>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/profile/change-avatar/">プロフィール画像</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle"
                     data-toggle="dropdown"
                     href="#">
                      設定
                      <b class="caret"></b>
                    </a>
                  <ul class="dropdown-menu">
                    <?php //bp_get_options_nav(); ?>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/settings/">設定</a></li>
                    <li><a href="<?php echo home_url( '/' ); ?>user/dotou/settings/delete-account/">アカウント削除</a></li>
                  </ul>
                </li>

                <?php do_action( 'bp_member_options_nav' ); ?>

              </ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

<!-- 				<div class="item-list-tabs no-ajax" id="subnav">
					<ul class="cf">

						<?php //bp_get_options_nav(); ?>

						<?php do_action( 'bp_member_plugin_options_nav' ); ?>

					</ul>
				</div> -->
				<!-- .item-list-tabs -->

				<h3><?php _e( 'Delete Account', 'buddypress' ); ?></h3>

				<div id="message" class="info">
					
					<?php if ( bp_is_my_profile() ) : ?>

						<p><?php _e( 'Deleting your account will delete all of the content you have created. It will be completely irrecoverable.', 'buddypress' ); ?></p>
						
					<?php else : ?>

						<p><?php _e( 'Deleting this account will delete all of the content it has created. It will be completely irrecoverable.', 'buddypress' ); ?></p>

					<?php endif; ?>

				</div>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/delete-account'; ?>" name="account-delete-form" id="account-delete-form" class="standard-form" method="post">

					<?php do_action( 'bp_members_delete_account_before_submit' ); ?>

					<label>
						<input type="checkbox" name="delete-account-understand" id="delete-account-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-account-button').disabled = ''; } else { document.getElementById('delete-account-button').disabled = 'disabled'; }" />
						 <?php _e( 'I understand the consequences.', 'buddypress' ); ?>
					</label>

					<div class="submit">
						<input type="submit" disabled="disabled" value="<?php _e( 'Delete Account', 'buddypress' ); ?>" id="delete-account-button" name="delete-account-button" />
					</div>

					<?php do_action( 'bp_members_delete_account_after_submit' ); ?>

					<?php wp_nonce_field( 'delete-account' ); ?>

				</form>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_settings_template' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

<?php //get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>