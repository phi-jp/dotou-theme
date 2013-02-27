<?php
  $cat = get_the_category(); $cat = $cat[0];
  $parentName = get_category_parents($cat->category_parent, false, '', false);
?>
<aside>
  <h2><a href="<?php echo get_category_link($cat->category_parent); ?>" title=""><?php echo $parentName; ?></a> の <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>一覧</h2>
  <ul>
  <?php
  $directory = str_replace(get_bloginfo('home'), "", get_bloginfo('template_url'));
  require_once ( '.'.$directory.'/list/lang_list.php');
  $List = getLangList();
  $data = getSinglePost($List, $cat, $parentName);
  if(is_array($data)){
    foreach($data as $key => $parent_data){
      echo "<h2>".$parent_data[0]['ChapterName']."</h2>";
      echo "<ul>";
      foreach($parent_data as $post_data){
        if($post_data['link']){ ?>
          <li>
            <span class="favstar">
              <?php
              global $bp;
              $activity_id = bp_activity_get_activity_id( array(
                'user_id' => $post->author_id,
                'type' => 'new_blog_post',
                'component' => 'blogs',
                'item_id' => 1,
                'secondary_item_id' => $post_data['ID']
              ) );
              if ( is_user_logged_in() ) :
                bp_has_activities();
                if ( !my_bp_activity_is_favorite($activity_id) ) : ?>
                  <a href="<?php my_bp_activity_favorite_link($activity_id) ?>" class="fav button" title="<?php _e( 'Mark as Favorite', 'buddypress' ) ?>">.</a>
                  <?php else : ?>
                  <a href="<?php my_bp_activity_unfavorite_link($activity_id) ?>" class="unfav button" title="<?php _e( 'お気に入りを解除', 'buddypress' ) ?>">.</a>
                  <?php endif;
                endif; ?>
            </span>
            <a href='<?php echo $post_data['link']; ?>'><?php echo $post_data['title']; ?></a>
            <?php
            if(isNew($post_data['date'])){ ?>
              <span class="new_icon">New!</span>
            <?php } ?>
          </li>
        <?php
        }
        else{
          echo "<li class='unactive'>随時更新予定！</li>";
        }
      }
      echo "</ul>";
    }
  }
  else{
    echo '<p>まだデータがありません。</p>';
  }
  ?>
  </ul>
</aside>
