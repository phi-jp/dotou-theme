<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>
    
    <body>
        <?php get_header(); ?>

        <?php
        if (is_home()) {
            get_template_part("home");
        }
        ?>

        <?php get_footer(); ?>
        
        <?php wp_footer(); ?>
    </body>
</html>
