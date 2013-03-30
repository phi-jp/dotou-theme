<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>

    <body <?php body_class($body_class); ?>>
        <?php get_header(); ?>

		<div id="wrap" class="<?php echo get_page($pageID)->post_name; ?>">
        <div class="container">
            <div class="row">
                <div class="sidebar span3">
                    <?php get_sidebar('page'); ?>
                </div>
                <div class="content span8 offset1">
                    <div class="well">
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php
                        if(have_posts()): while(have_posts()):the_post();
                            the_content();
                        endwhile; endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-padding"></div>
    </div>

    <?php get_footer(); ?>

    <?php wp_footer(); ?>
    </body>
</html>
