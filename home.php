<!DOCTYPE html>

<html>
<head>
  <?php get_template_part('head'); ?>
</head>

<body <?php body_class(); ?>>
<?php get_header(); ?>
<div id="contents">
  <div class="blanding">
    <div class="slide">
      <ul>
        <li><a href="">怒涛とは！？</a></li>
        <li><a href="">jsdo.itとコラボ！</a></li>
      </ul>
    </div>
  </div>
  <section class="content_list">
    <h1>言語一覧</h1>
    <ul>
    <li><h2><a href="">JavaScript</a></h2></li>
    <li><h2><a href="">tmlib.js</a></h2></li>
    <li><h2><a href="">LESS</a></h2></li>
    <li><h2><a href="">CoffeeScript</a></h2></li>
    <li><h2><a href="">jQuery</a></h2></li>
    <li><h2><a href="">CSS</a></h2></li>
    <li><h2><a href="">HTML</a></h2></li>
    <li><h2><a href="">enchant.js</a></h2></li>
  </ul>
  </section>
</div>
<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>