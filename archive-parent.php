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
                        $category = get_the_category();
                        $category = $category[0];
                        $parentName = get_category_parents($category->category_parent, false, '', false);
                    ?>

                        <div class="page-header">
                            <h1><?php echo $parentName; ?></h1>
                        </div>
                        <div class="category_list"></div>
                        <div class="chapter_list well"></div>
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
