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
                <?php
                $lang_list = getLanguageList();
                $entry_list = array();
                foreach ($lang_list as $key => $value) {

                    $lang_name  = strtolower(str_replace(" ", "", $value));
                    $lang_chapter = getThemeOptions($lang_name);
                    $chapter_name = getLanguageChapterList($lang_name);
                    $chapter_slug = getLanguageSlugList($lang_name);

                    $has_entry = false;
                    $tmp = array();
                    foreach ($lang_chapter as $key2 => $value2) {
                        if(hasChapterEntry($lang_name, $chapter_slug[$key2])){
                            $has_entry = true;
                            array_push($tmp, $value2);
                        }
                    }
                    if($tmp[0]){ $entry_list[$value] = $tmp; }
                }
                ?>
                <div class="sidebar span3">
                    <?php get_sidebar('list'); ?>
                </div>
                <div class="content span8 offset1">
	        		<div class="page-header">
	                    <h1><?php the_title(); ?></h1>
    	            </div>

                    <?php
                    foreach ($entry_list as $key => $value) {
                        echo '<h2 id="'.strtolower(str_replace(" ", "", $key)).'">'.$key.'</h2>';
                        ?>
                        <div class="language-list">
                            <ul class="row">
                                <?php
                                foreach ($value as $key2 => $value2) {
                                    $meta = explode(", ", $value2);
                                    $url = get_bloginfo("url")."/".strtolower(str_replace(" ", "", $key))."/".$meta[1];
                                    $description = explode(", ", $lang_chapter[$key2]);
                                    $description = $description[2];
                                    $count = getEntryCount($key, $meta[1]);
                                    $img_url = "http://dummyimage.com/128.png/aaa/666&text=".str_replace(" ", "_", $key);

                                    ?>
                                    <li class="span2 <?php echo $offset; ?> clearfix">
                                        <a href="<?php echo $url; ?>"><img class="img-polaroid pull-left" src="<?php echo $img_url; ?>" alt="" width="128" height="128"></a>
                                        <div class="member-info pull-left">
                                            <h3><a href="<?php echo $url; ?>"><?php echo $meta[0]; ?></a></h3>
                                            <p class="member-text">
                                              <?php echo $count; ?>投稿<br>
                                              <?php echo $description; ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
		        </div>
            </div>
        </div>
        <div id="footer-padding"></div>
    </div>

    <?php get_footer(); ?>

    <?php wp_footer(); ?>
    </body>
</html>
