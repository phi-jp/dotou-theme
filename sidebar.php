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
      $title = get_the_title();
      $link = get_permalink(); ?>
      <li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
    <?php endforeach; endif; ?>
  </ul>
</aside>
