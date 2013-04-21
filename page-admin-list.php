<!DOCTYPE html>

<html>
    <head>
        <?php get_template_part('head'); ?>
    </head>

    <body <?php body_class($body_class); ?>>
        <?php get_header(); ?>

		<div id="wrap" class="admin-list">
        <div class="container">
    		<div class="row">
                <div class="content">
	        		<div class="page-header">
	                    <h1><?php the_title(); ?></h1>
    	            </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">All</a></li>
                        <?php
                        $lang_list = getLanguageList();
                        foreach ($lang_list as $key => $value) {
                            echo '<li><a href="#tab'.($key+2).'" data-toggle="tab">'.$value.'</a></li>';
                        }
                        ?>
                    </ul>
                    <?php
                        $post_data = array();
                        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 9999 ) );
                        while ( $loop->have_posts() ) : $loop->the_post();
                            $category = get_the_category();
                            $category = $category[0];
                            $tmp = array(
                                         "title"    => get_the_title(),
                                         "link"     => get_permalink(),
                                         "category"    => $category->name
                            );
                            if(!is_array($post_data[$category->name])){
                                $post_data[$category->name] = array();
                            }
                            array_push($post_data[$category->name], $tmp);
                        endwhile; wp_reset_query();
                    ?>
                    <div class="language-list well">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?php
                                $btn = '<a class="btn" href="">copy</a>';
                                echo '<ul>';
                                foreach ($post_data as $key => $value) {
                                    foreach ($value as $key2 => $value2) {
                                    echo '<li class="'.$value2['category']->slug.'">'.$btn.'<a class="entry" href="'.$value2['link'].'">'.$value2['title'].'</a></li>';
                                    }
                                }
                                echo '</ul>';
                                ?>
                            </div>
                            <?php
                            foreach ($lang_list as $key => $value) {
                                echo '<div class="tab-pane" id="tab'.($key+2).'">';
                                if($post_data[$value][0]){
                                    echo '<ul>';
                                    foreach ($post_data[$value] as $key2 => $value2) {
                                    echo '<li class="'.$value2['category']->slug.'">'.$btn.'<a class="entry" href="'.$value2['link'].'">'.$value2['title'].'</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</div>';
                            }
                            ?>
                        </div>
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
