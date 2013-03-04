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
                        <header>
                            <h1><?php the_title(); ?></h1>
                        </header>

                        <div class="well">
                            <div class="code-box">
                            <?php
                            $jsdoit = get_post_meta( $post->ID, 'jsdoit', true);
                            $jsdoitThumbnail = get_post_meta( $post->ID, 'jsdoit_thumbnail', true);
                            $jsdoitType = "screenshot";
                            if($jsdoitThumbnail === "Auto play"){
                                $jsdoitType = "play";
                            }
                            else if($jsdoitThumbnail === "Screenshot"){
                                $jsdoitType = "screenshot";
                            }
                            else if($jsdoitThumbnail === "Readme"){
                                $jsdoitType = "";
                            }
                            else if($jsdoitThumbnail === "JavaScript"){
                                $jsdoitType = "javascript";
                            }
                            else if($jsdoitThumbnail === "HTML"){
                                $jsdoitType = "html";
                            }
                            else if($jsdoitThumbnail === "CSS"){
                                $jsdoitType = "css";
                            }
                            echo '<script type="text/javascript" src="http://jsdo.it/blogparts/'.$jsdoit.'/js?width=465&height=496&view='.$jsdoitType.'"></script>';
                            ?>
                            </div>
                        </div>
                        <?php endwhile; endif; ?>

                        <ul class="pager">
                            <li class="previous"><a href="">&larr; prev</a></li>
                            <li class="next"><a href="">next &rarr;</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <div class="well sidebar-nav">
                            <ul class="nav nav-list">
                                <li class="nav-header">nav title</li>
                                <li>dummy</li>
                                <li>dummy</li>
                                <li>dummy</li>
                                <li class="nav-header">nav title</li>
                                <li>dummy</li>
                                <li>dummy</li>
                                <li>dummy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php get_footer(); ?>

        <?php wp_footer(); ?>
    </body>
</html>
