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
                    <div class="span9">
                        <?php
                        if(have_posts()): while(have_posts()):the_post(); ?>
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="meta-box row">
                            <div class="category well span3">
                                <i class="icon-tag"></i>
                                <?php the_category(", "); ?>
                            </div>
                            <div class="sns-share well span6">
                                <?php getSNS(get_permalink()); ?>
                            </div>
                        </div>

                        <div class="well">
                            <div class="code-box">
                                <style>
                                iframe {
                                    border: 0;
                                }
                                </style>
                                <!-- <iframe src="http://dotou.lugn-design.com/wp-content/themes/dotou-theme/jsdoit.php?user=dotou&id=<?php echo get_jsdoit_id($post->ID); ?>" width=465 height=465></iframe> -->
                                <iframe src="http://dotou.lugn-design.com/wp-content/themes/dotou-theme/jsdoit.php?user=dotou&id=9iJb" width=465 height=465></iframe>
                            </div>
                        </div>

                        <div class="update-box clearfix">
                            <ul class="pull-right">
                                <li>Last Update: <?php the_modified_date(); ?> by <a href="<?php echo home_url( '/' ); ?>user/<?php echo get_the_author(); ?>"><?php the_modified_author(); ?></a></li>
                                <li>Push: <?php the_date( ); ?> by <a href="<?php echo home_url( '/' ); ?>user/<?php echo get_the_author(); ?>"><?php the_modified_author(); ?></a></li>
                            </ul>
                        </div>

                        <div class="one-content-box">
                            <h2>助言</h2>
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; endif; ?>

                        <ul class="pager">
                            <li class="previous"><a href="">&larr; prev</a></li>
                            <li class="next"><a href="">next &rarr;</a></li>
                        </ul>
                        <div class="comment-box">
                            <div class="well">
                                <?php
                                comments_template();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="span3">
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
