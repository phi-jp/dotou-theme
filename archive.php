<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>

    <body <?php body_class($body_class); ?>>
        <?php get_header(); ?>

        <div id="wrap">
            <div class="container">
                <div class="row">
                    <div class="content span9">
                    <?php
                        $this_cat = get_category($cat);
                        $is_parent = get_category_children($cat);
                        if( $is_parent ){
                            get_template_part( "archive-parent" );
                        }
                        else{
                            get_template_part( "archive-children" );
                        }
                    ?>
                    </div>

                    <div class="sidebar span3">
                        <?php get_sidebar('archive'); ?>
                    </div>
                </div>
            </div>
            <div id="footer-padding"></div>
        </div>

        <?php get_footer(); ?>

        <?php wp_footer(); ?>
    </body>
</html>
