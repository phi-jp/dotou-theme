<?php

/**
 * BuddyPress - Users Home
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( 'buddypress' ); ?>

<div id="content">
  <div class="padder container-fluid">
    <div class="row-fluid">
      <?php do_action( 'bp_before_member_home_content' ); ?>

      <div id="item-header" role="complementary" class="span4 well">
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

                <div id="item-body tab-content well">

                  <?php do_action( 'bp_before_member_body' );

                  if ( bp_is_user_activity() || !bp_current_component() ) :
                    locate_template( array( 'members/single/activity.php'  ), true );

                  elseif ( bp_is_user_blogs() ) :
                    locate_template( array( 'members/single/blogs.php'     ), true );

                  elseif ( bp_is_user_friends() ) :
                    locate_template( array( 'members/single/friends.php'   ), true );

                  elseif ( bp_is_user_groups() ) :
                    locate_template( array( 'members/single/groups.php'    ), true );

                  elseif ( bp_is_user_messages() ) :
                    locate_template( array( 'members/single/messages.php'  ), true );

                  elseif ( bp_is_user_profile() ) :
                    locate_template( array( 'members/single/profile.php'   ), true );

                  elseif ( bp_is_user_forums() ) :
                    locate_template( array( 'members/single/forums.php'    ), true );

                  elseif ( bp_is_user_settings() ) :
                    locate_template( array( 'members/single/settings.php'  ), true );

                  // If nothing sticks, load a generic template
                  else :
                    locate_template( array( 'members/single/plugins.php'   ), true );

                  endif;

                  do_action( 'bp_after_member_body' ); ?>

                </div><!-- #item-body -->
              </div>
            </div>
          </div><!-- #item-nav -->

          <?php do_action( 'bp_after_member_home_content' ); ?>
        </div>
      </div>
    </div><!-- .padder -->
  </div><!-- #content -->

  <?php //get_sidebar( 'buddypress' ); ?>
  <?php get_footer( 'buddypress' ); ?>
