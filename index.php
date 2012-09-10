<!DOCTYPE html>

<html>
<head>
    <?php get_template_part('head'); ?>
</head>

<body>
<?php get_header(); ?>
<div id="contents">
    <?php
    if(have_posts()): while(have_posts()):the_post();
        $title = get_the_title();
        $link = get_permalink();
        $date = get_the_time('Y/m/d');
    ?>
    <article class="entry">
        <header class="postHeader">
            <h1 class="postTitle"><?php echo $title; ?></h1>
        </header>
        <div class="post">
            <div class="postContent"><?php the_content(); ?></div>
        </div>
    </article>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
