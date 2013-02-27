<div id="contents" class="cf">
  <h1 class="title"><?php wp_title(""); ?></h1>
  <div class="main_content cf">
    <ul>
      <?php /* main loop */
      if(have_posts()): while(have_posts()):the_post();
        $title = get_the_title();
        $link = get_permalink();
        $date = get_the_time('Y/m/d');
        $excerpt = get_the_excerpt();
        ?>
      <li>
        <h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
        <p><?php echo $excerpt; ?></p>
      </li>
      <?php endwhile; endif; ?>
    </ul>
  </div>
</div>
