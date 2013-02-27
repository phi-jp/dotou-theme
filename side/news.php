<aside>
  <h2>最近のお知らせ</h2>
  <ul>
  <?php
    $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 5 ) );
    while ( $loop->have_posts() ) : $loop->the_post();
      $title = get_the_title();
      $link = get_permalink();
      $date = get_the_time('Y/m/d');
      ?>
      <li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
    <?php endwhile; wp_reset_query(); ?>
  </ul>
  <h2>月別アーカイブ</h2>
  <ul>
    <?php wp_get_archives('type=monthly&post_type=news'); ?>
  </ul>
</aside>
