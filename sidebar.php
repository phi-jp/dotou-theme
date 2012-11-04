<aside>
  <h2>講座一覧</h2>
  <ul>
  <?php
    $currentCategory = get_the_category();
    $currentCategory = $currentCategory[0];
    $posts = get_posts('numberposts=-1&category='.$currentCategory->cat_ID);
    global $post;
    if($posts): foreach($posts as $post): setup_postdata($post); ?>
      <?php
      $name = get_the_title(); ?>
      <li><a href="<?php echo get_permalink() ; ?>"><?php echo $name; ?></a></li>
    <?php endforeach; endif; ?>
  </ul>
</aside>