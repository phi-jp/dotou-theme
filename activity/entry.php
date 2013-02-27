<?php

/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_activity_entry' ); ?>

<li class="<?php bp_activity_css_class(); ?> cf" id="activity-<?php bp_activity_id(); ?>">

  <div class="activity-content clearfix">

    <?php if ( is_user_logged_in() ) : ?>
    <span class="activity_star">
        <?php if ( bp_activity_can_favorite() ) : ?>
      <?php if ( !bp_get_activity_is_favorite() ) : ?>
        <a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>">.</a>
        <?php else : ?>
        <a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>">.</a>
        <?php endif; ?>
      <?php endif; ?>
      <?php //if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>
      <?php do_action( 'bp_activity_entry_meta' ); ?>
    </span>
    <?php endif; ?>

    <span class="activity-header">

      <?php
      global $activities_template;
      $post_ID = $activities_template->activity->secondary_item_id; //記事ID
      $title = get_the_title(get_post($post_ID));
      $link = bp_get_activity_feed_item_link();
      echo '<a href="'.$link.'">'.$title.'</a>';
      ?>

    </span>

    <?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>

    <div class="activity-inreplyto">
      <strong><?php _e( 'In reply to: ', 'buddypress' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" class="view" title="<?php _e( 'View Thread / Permalink', 'buddypress' ); ?>"><?php _e( 'View', 'buddypress' ); ?></a>
    </div>

    <?php endif; ?>

    <?php if ( bp_activity_has_content() ) : ?>

    <div class="activity-inner">

      <?php //bp_activity_content_body(); ?>
      <?php
      $text = limitStringLength(bp_get_activity_content_body(),320);
      //echo $text;
      ?>

    </div>

    <?php endif; ?>

    <?php do_action( 'bp_activity_entry_content' ); ?>

  </div>

  <?php do_action( 'bp_before_activity_entry_comments' ); ?>

  <?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_activity_get_comment_count() ) : ?>



  <?php endif; ?>

  <?php do_action( 'bp_after_activity_entry_comments' ); ?>

</li>

<?php do_action( 'bp_after_activity_entry' ); ?>
