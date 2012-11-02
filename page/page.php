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
        </header>
        <div class="post cf">
          <div class="content"><?php the_content(); ?></div>
          <div class="code_box">
            <?php echo get_post_meta($post->ID, 'jsdoit', true); ?>
          </div>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</div>
