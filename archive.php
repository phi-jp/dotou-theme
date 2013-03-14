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
                        global $post;
                        $category = get_the_category();
                        $category = $category[0];
                        $postData = array();
                        $paged = get_query_var('paged');
                        if(have_posts()):while(have_posts()):the_post();
                            $tmp = array(
                                "title" => get_the_title(),
                                "link" => get_permalink(),
                                "ChapterName" => get_post_meta($post->ID, "ChapterName", true),
                                "ChapterNumber" => get_post_meta($post->ID, "ChapterNumber", true),
                            );
                            array_push($postData, $tmp);
                        endwhile; endif;

                        pr($postData);
                    ?>
                    </div>

                    <div class="sidebar span3">
                        <div class="well sidebar-nav">
                            <ul class="nav nav-list">
                                <li class="nav-header">nav title</li>
                                <li><a href="">dummy</a></li>
                                <li><a href="">dummy</a></li>
                                <li><a href="">dummy</a></li>
                                <li class="nav-header">nav title</li>
                                <li><a href="">dummy</a></li>
                                <li><a href="">dummy</a></li>
                                <li><a href="">dummy</a></li>
                            </ul>
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
