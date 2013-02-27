<?php

/**
 * BuddyPress Member Settings
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( 'buddypress' ); ?>

<div id="content">
  <div class="padder container-fluid">
    <div class="row-fluid">

      <?php do_action( 'bp_before_member_settings_template' ); ?>

      <div id="item-header" class="span4 well">

        <?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

      </div><!-- #item-header -->

      <div class="item_nav_box span8">
        <div id="item-nav">
          <div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <?php
                $userName = bp_get_displayed_user_username();
                $loginUserName = wp_get_current_user();
                $loginUserName = $loginUserName->user_nicename;
                ?>

                <?php //bp_get_displayed_user_nav(); ?>
                <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $userName; ?>/activity/favorites/">お気に入り</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">プロフィール<b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <?php //bp_get_options_nav(); ?>
                    <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $loginUserName; ?>/profile/edit/">プロフィール編集</a></li>
                    <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $loginUserName; ?>/profile/change-avatar/">プロフィール画像</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">設定<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php //bp_get_options_nav(); ?>
                    <li><a href="<?php echo home_url( '/' ); ?>user/<?php echo $loginUserName; ?>/settings/">設定</a></li>
                    <!--                    <li><a href="--><?php //echo home_url( '/' ); ?><!--user/--><?php //echo $userName; ?><!--/settings/delete-account/">アカウント削除</a></li>-->
                  </ul>
                </li>
                <?php do_action( 'bp_member_options_nav' ); ?>
              </ul>
              <div class="well">


                <div id="item-body" role="main">

                  <?php do_action( 'bp_before_member_body' ); ?>
                  <!-- .item-list-tabs -->

                  <h3><?php _e( 'General Settings', 'buddypress' ); ?></h3>

                  <?php do_action( 'bp_template_content' ); ?>

                  <form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/general'; ?>" method="post" class="standard-form" id="settings-form">

                    <?php if ( !is_super_admin() ) : ?>

                    <label for="pwd"><?php _e( 'Current Password <span>(required to update email or change current password)</span>', 'buddypress' ); ?></label>
                    <input type="password" name="pwd" id="pwd" size="16" value="" class="settings-input small" /> &nbsp;<a href="<?php echo site_url( add_query_arg( array( 'action' => 'lostpassword' ), 'wp-login.php' ), 'login' ); ?>" title="<?php _e( 'Password Lost and Found', 'buddypress' ); ?>"><?php _e( 'Lost your password?', 'buddypress' ); ?></a>

                    <?php endif; ?>

                    <label for="email"><?php _e( 'Account Email', 'buddypress' ); ?></label>
                    <input type="text" name="email" id="email" value="<?php echo bp_get_displayed_user_email(); ?>" class="settings-input" />

                    <label for="pass1"><?php _e( 'Change Password <span>(leave blank for no change)</span>', 'buddypress' ); ?></label>
                    <input type="password" name="pass1" id="pass1" size="16" value="" class="settings-input small" /> &nbsp;<?php _e( 'New Password', 'buddypress' ); ?><br />
                    <input type="password" name="pass2" id="pass2" size="16" value="" class="settings-input small" /> &nbsp;<?php _e( 'Repeat New Password', 'buddypress' ); ?>

                    <?php do_action( 'bp_core_general_settings_before_submit' ); ?>

                    <div class="submit">
                      <input type="submit" name="submit" value="<?php _e( 'Save Changes', 'buddypress' ); ?>" id="submit" class="auto" />
                    </div>

                    <?php do_action( 'bp_core_general_settings_after_submit' ); ?>

                    <?php wp_nonce_field( 'bp_settings_general' ); ?>

                  </form>

                  <?php do_action( 'bp_after_member_body' ); ?>

                </div><!-- #item-body -->
              </div>
            </div>
          </div>
        </div><!-- #item-nav -->
        <?php do_action( 'bp_after_member_settings_template' ); ?>

      </div>
    </div>
  </div><!-- .padder -->
</div><!-- #content -->

<?php //get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>