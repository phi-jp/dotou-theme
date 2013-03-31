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
	              <div class="sidebar span3">
	                  <?php get_sidebar('list'); ?>
	              </div>
                <div class="content span8 offset1">
				        		<div class="page-header">
				                <h1><?php the_title(); ?></h1>
				            </div>

                    <?php
                    $all_category = getAllCategory();
                    $parent_category = getParentCategory();
                    $children_category = getChildrenCategory();

                    foreach ($parent_category as $key => $value) {
                        $category_name = array("修練", "鍛練", "熟練");
                        ?>
                        <h2 id="<?php echo $value->slug; ?>"><?php echo $value->name; ?></h2>
                        <div class="language-list">
                            <ul class="row">
                                <?php
                                foreach ($category_name as $key2 => $value2) {
                                    $url = get_bloginfo("url")."/".$value->slug."/".$children_category[$value->slug][$value2]->slug;
                                    $description = $children_category[$value->slug][$value2]->description;
                                    $count = $children_category[$value->slug][$value2]->count;
                                    if(!$count){ $count = 0; }
                                    $offset = "offset1";
                                    if($key2 === 0){ $offset = ""; }
                                    ?>
                                    <li class="span2 <?php echo $offset; ?> clearfix">
                                        <img class="img-polaroid pull-left" src="http://dummyimage.com/128.png/aaa/666" alt="" width="128" height="128">
                                        <div class="member-info pull-left">
                                            <h3><a href="<?php echo $url; ?>"><?php echo $value2; ?></a></h3>
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
                    <?php }
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
