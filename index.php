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
            <div class="post">
                <div class="content"><?php the_content(); ?></div>
            </div>
        </article>
    <?php endwhile; endif; ?>
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
