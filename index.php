<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>

    <body <?php body_class($body_class); ?>>
        <?php get_header(); ?>

        <div id="wrap" class="archive">
            <div class="container">
                <div class="row">
                    <div class="content span9">
                    <?php
                    global $page_slug, $lang_list, $lang_chapter, $chapter_name, $chapter_slug;
                    $page_slug = $_SERVER["REQUEST_URI"];
                    $page_slug = explode('/', $page_slug);

                    $lang_list = getLanguageList();

                    $lang_chapter = getThemeOptions($page_slug[1]);
                    $chapter_name = getLanguageChapterList($page_slug[1]);
                    $chapter_slug = getLanguageSlugList($page_slug[1]);

                    $get_key = $page_slug[1]."_".$page_slug[2]."_章名";

                    $children_flag = getThemeOptions($get_key);

                    if( $children_flag[0] ){
                        get_template_part("archive/children");
                    }
                    else if( $lang_chapter[0] ){
                        get_template_part("archive/parent");
                    }
                    else if(is_404()){
                        get_template_part("404_not_found");
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
