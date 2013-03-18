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
                        if(have_posts()): while(have_posts()):the_post(); ?>
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="meta-box row">
                            <div class="category span3">
                                <i class="icon-tag"></i>
                                <?php the_category(", "); ?>
                            </div>
                            <div class="sns-share span6 clearfix">
                                <?php getSNS(get_permalink()); ?>
                            </div>
                        </div>

                        <div class="well preview">
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
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">助言</a></li>
                                <li><a href="#tab2" data-toggle="tab">差分</a></li>
                                <li><a href="#tab3" data-toggle="tab">更新日</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <?php the_content(); ?>
                                </div>
                                <div class="tab-pane" id="tab2">あああああああああああ</div>
                                <div class="tab-pane" id="tab3">いいいいいいいいいい</div>
                            </div>
                        </div>
                        <?php endwhile; endif; ?>

                        <ul class="pager">
                            <li class="previous"><?php previous_post_link('%link', '&larr; prev', true); ?></li>
                            <li class="next"><?php next_post_link('%link', 'next &rarr;', true); ?></li>
                        </ul>

                        <div class="comment-box">
                            <div class="well">
                                <?php comments_template(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar span3">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
            <div id="footer-padding"></div>
        </div>

        <?php get_footer(); ?>

        <?php wp_footer(); ?>
    </body>
</html>
