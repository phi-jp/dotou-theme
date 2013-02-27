<div id="content">
  <div class="padder">

    <div class="row-fluid">

      <div class="span9">

        <?php do_action( 'bp_before_blog_single_post' ); ?>

        <div class="page" id="blog-single" role="main">
          <?php
          if(have_posts()): while(have_posts()):the_post();
            $title = get_the_title();
            $link = get_permalink();
            $date = get_the_time('Y/m/d');
            $cat = get_the_category(); $cat = $cat[0];
            $parentName = get_category_parents($cat->category_parent, false, '', true);
            $parentLink = get_category_link($cat->category_parent);
            ?>
            <article class="entry">
              <header>
                <h1 class="post_title">
                  <span class="favstar">
                  <?php
                    //getStarButton($post);
                    global $bp;
                    $activity_id = bp_activity_get_activity_id( array(
                      'user_id' => $post->author_id,
                      'type' => 'new_blog_post',
                      'component' => 'blogs',
                      'item_id' => 1,
                      'secondary_item_id' => $post->ID
                    ) );
                    if ( is_user_logged_in() ) :
                      bp_has_activities();
                      if ( !my_bp_activity_is_favorite($activity_id) ) : ?>
                        <a href="<?php my_bp_activity_favorite_link($activity_id) ?>" class="fav button" title="<?php _e( 'Mark as Favorite', 'buddypress' ) ?>">.</a>
                        <?php else : ?>
                        <a href="<?php my_bp_activity_unfavorite_link($activity_id) ?>" class="unfav button" title="<?php _e( 'お気に入りを解除', 'buddypress' ) ?>">.</a>
                        <?php endif;
                    endif;
                    ?>
                  </span>
                  <?php echo $title; ?></h1>
                <div class="row-fluid">
                  <div class="span4">
                    <p class="category"><?php the_category(", "); ?></p>
                    <p class="tags"><?php the_tags(); ?></p>
                  </div>
                  <div class="span8 clearfix">
                    <?php getSNS($link); ?>
                  </div>
                </div>
              </header>
              <div class="post cf">
                <div class="code_box well">
                  <?php
                  $jsdoit = get_post_meta( $post->ID, 'jsdoit', true);
                  $jsdoitThumnail = get_post_meta( $post->ID, 'jsdoit_thumnail', true);
                  if($jsdoitThumnail == "Auto play"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=play"></script>';
                  }
                  else if($jsdoitThumnail == "Screenshot"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=screenshot"></script>';
                  }
                  else if($jsdoitThumnail == "Readme"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js"></script>';
                  }
                  else if($jsdoitThumnail == "JavaScript"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=javascript"></script>';
                  }
                  else if($jsdoitThumnail == "HTML"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=html"></script>';
                  }
                  else if($jsdoitThumnail == "CSS"){
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=css"></script>';
                  }
                  else{
                    echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view=screenshot"></script>';
                  }
                  ?>
                </div>
                <div class="modified clearfix">
                  <ul class="pull-right">
                    <li>Last Update: <?php the_modified_date(); ?> by <a href="<?php echo home_url( '/' ); ?>user/<?php echo get_the_author(); ?>"><?php the_modified_author(); ?></a></li>
                    <li>Push: <?php the_date( ); ?> by <a href="<?php echo home_url( '/' ); ?>user/<?php echo get_the_author(); ?>"><?php the_modified_author(); ?></a></li>
                  </ul>
                </div>
                <div class="content">
                  <h2>一言コメント</h2>
                  <?php the_content(); ?>
                </div>
              </div>
            </article>
            <?php endwhile; endif; ?>

        </div>

        <?php
        $directory = str_replace(get_bloginfo('home'), "", get_bloginfo('template_url'));
        require_once ( '.'.$directory.'/list/lang_list.php');
        $List = getLangList();
        $parentName = get_category_parents($cat->category_parent, false, '', false);
        $data = getSinglePost($List, $cat, $parentName);

        // 同カテゴリのポストから同じ章の記事を取得
        if(is_array($data)){
          $key = 0;
          foreach($data as $tmp_key => $val){
            if($val[0]["ChapterName"] == get_post_meta($post->ID, 'ChapterName', true)){
              $key = $tmp_key;
              break;
            }
          }
          $data = $data[$key];

          // 同じ章の記事から現在の記事の位置を取得
          foreach($data as $tmp_key => $val){
            if($val["ChapterNumber"] == get_post_meta($post->ID, 'ChapterNumber', true)){
              $key = $tmp_key;
              break;
            }
          }
          ?>
          <ul class="post_nav pager">
            <?php
            $prev_disable = "";
            $next_disable = "";
            if(!$data[$key-1]["title"]){
              $prev_disable = "disabled";
            }
            if(!$data[$key+1]["title"]){
              $next_disable = "disabled";
            }
            ?>
            <li class="previous <?php echo $prev_disable; ?>">
              <?php
              if($prev_disable){
                echo "<a href=''>&larr; No</a>";
              }
              else{
                echo "<a href='{$data[$key-1]['link']}'>&larr; {$data[$key-1]['title']}</a>";
              }
              ?>
            </li>
            <li class="next <?php echo $next_disable; ?>">
              <?php
              if($next_disable){
                echo "<a href=''>No &rarr;</a>";
              }
              else{
                echo "<a href='{$data[$key+1]['link']}'>{$data[$key+1]['title']} &rarr;</a>";
              }
              ?>
            </li>
          </ul>
          <div id="comment_area" class="well">
            <?php comments_template(); ?>
          </div>
          <?php }
          else{
            echo '<p>対応する記事がありません。</p>';
          } ?>
      </div>
      <?php do_action( 'bp_after_blog_single_post' ); ?>
      <div class="span3 well">
        <?php get_template_part( "side/single" ); ?>
      </div>
    </div><!-- row -->
  </div><!-- .padder -->
</div><!-- #content -->
