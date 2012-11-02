<div id="contents" class="cf">
  <div class="main_content cf">
    <?php /* main loop */
    if(have_posts()): while(have_posts()):the_post();
      $title = get_the_title();
      $link = get_permalink();
      $date = get_the_time('Y/m/d');
      ?>
      <article class="entry">
        <header class="post_header">
          <h1 class="post_title"><?php echo $title; ?></h1>
          <p class="category">カテゴリー : <?php the_category(", "); ?></p>
          <p class="tags"><?php the_tags(); ?></p>
        </header>
        <div class="post cf">
          <div class="content"><?php the_content(); ?></div>
          <div class="code_box">
            <?php echo get_post_meta($post->ID, 'jsdoit', true); ?>
          </div>
        </div>
      </article>
    <?php endwhile; endif; ?>
    <div class="lesson_nav">
      <nav class="single_nav">
        <ul class="cf">
          <li class="prev_post"><?php previous_post_link('← Previous %link'); ?></li>
          <li class="next_post"><?php next_post_link( '%link Next →' ); ?></li>
        </ul>
      </nav>

      <nav class="list_nav cf">
        <h3>講座一覧</h3>
        <table>
          <?php
          $cnt = 0;
          $currentCategory = get_the_category();
          $currentCategory = $currentCategory[0];
          $posts = get_posts('numberposts=-1&category='.$currentCategory->term_id);

          if($posts): foreach($posts as $post): setup_postdata($post);
            $name = get_the_title();
            $link = get_permalink();
            if($cnt % 5 == 0){ echo "<tr>"; } ?>
            <td><a href="<?php echo $link; ?>"><?php echo $name; ?></a></td>
            <?php
            if($cnt % 5 == 5){ echo "</tr>"; }
            $cnt++;
          endforeach; endif;
          ?>
        </table>
      </nav>
    </div>
  </div>
</div>
