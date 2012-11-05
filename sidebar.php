<?php
  $currentCategory = get_the_category();
  $currentCategory = $currentCategory[0];
  $parentName = get_category_parents($currentCategory->category_parent, false, '', true);
?>
<aside>
  <h2><?php echo $parentName. "の". $currentCategory->cat_name; ?>一覧</h2>
  <ul>
  <?php
    $posts = get_posts('numberposts=-1&category='.$currentCategory->cat_ID);
    global $post;
    if($posts): foreach($posts as $post): setup_postdata($post); ?>
      <?php
      $name = get_the_title(); ?>
      <li><a href="<?php echo get_permalink() ; ?>"><?php echo $name; ?></a></li>
    <?php endforeach; endif; ?>
  </ul>
</aside>
