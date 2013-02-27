<?php
global $currentCategory;
global $parentName;
//global $parentSlug;
?>
<div id="contents" class="cf">
  <?php
  $directory = str_replace(get_bloginfo('home'), "", get_bloginfo('template_url'));
  require_once ( '.'.$directory.'/list/lang_list.php');
  $List = getLangList();
  $data = getSinglePost($List, $currentCategory, $parentName);

  $url = $_SERVER["REQUEST_URI"];
  $urlDirectory = explode( '/', $url );
  $parentSlug = $urlDirectory[1];

  $ParentTitle = "";
  foreach($List as $key => $val){
    if( str_replace(".", "", strtolower($key)) == $parentSlug){
      $ParentTitle = $key;
    }
  }

  // 兄弟カテゴリを取得・表示
  $catSlug = array(
    "shuren" => $parentSlug.'-shuren',
    "tanren" => $parentSlug.'-tanren',
    "jukuren" => $parentSlug.'-jukuren'
  );
  $active = array();
  foreach ($catSlug as $key => $value) {
    if($value == $urlDirectory[2]){
      $active[$key] = "active";
    }
    else{
      $active[$key] = "";
    }
  }
  $archiveURL = get_bloginfo('home')."/".$parentSlug."/";
  $url = $archiveURL.$urlDirectory[2]."/";
  ?>

  <h1 class="title"><?php echo $ParentTitle; ?></h1>
  <div class="archive_header row-fluid">
    <nav class="span5">
      <ul class="nav nav-pills">
        <li class="<?php echo $active['shuren']; ?>"><a href="<?php echo $archiveURL.$catSlug["shuren"]; ?>">修練</a></li>
        <li class="<?php echo $active['tanren']; ?>"><a href="<?php echo $archiveURL.$catSlug["tanren"]; ?>">鍛錬</a></li>
        <li class="<?php echo $active['jukuren']; ?>"><a href="<?php echo $archiveURL.$catSlug["jukuren"]; ?>">熟練</a></li>
      </ul>
    </nav>
    <div class="span7 clearfix">
      <?php getSNS($url); ?>
    </div>
  </div>

  <div class="main_content well">
    <section class="category_section">
      <?php
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
    </section>
  </div>
</div>
