<!DOCTYPE html>

<html>
<head>
  <?php get_template_part('head'); ?>
</head>

<body <?php body_class(); ?>>
<?php get_header(); ?>
<div id="contents" class="cf">
  <div class="main_content cf">
    <?php
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
      <?php endwhile; endif;
    if (is_single()) { ?>
      <div class="lesson_nav">
        <nav class="single_nav">
          <ul class="cf">
            <li class="prev_post"><?php previous_post_link('← Previous %link'); ?></li>
            <li class="next_post"><?php next_post_link( '%link Next →' ); ?></li>
          </ul>
        </nav>
        <nav class="list_nav cf">
          <dl>
            <dt>試練</dt>
            <dd><a href="">part01</a></dd>
            <dd><a href="">part02</a></dd>
            <dd><a href="">part03</a></dd>
          </dl>
          <dl>
            <dt>修練</dt>
            <dd><a href="">part01</a></dd>
            <dd><a href="">part02</a></dd>
            <dd><a href="">part03</a></dd>
          </dl>
          <dl>
            <dt>鍛錬</dt>
            <dd><a href="">part01</a></dd>
            <dd><a href="">part02</a></dd>
            <dd><a href="">part03</a></dd>
          </dl>
        </nav>
      </div>
      <?php } ?>
  </div>
  <?php
  if (is_page()) {
    get_sidebar();
  }
  ?>
</div>
<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
