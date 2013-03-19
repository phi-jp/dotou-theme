<?php
    $this_cat = get_category($cat);
    $children_category = get_category_children($this_cat->term_id);
    $children_category = explode( "/", $children_category );
    $language_list = getLanguage($this_cat->cat_name);
?>

<div class="page-header">
    <h1><?php echo $this_cat->cat_name; ?></h1>
</div>

<div class="tabbable">
    <ul class="nav nav-tabs">
        <?php
        $iter = 0;
        foreach ($language_list as $key => $value) {
            $active = "";
            if($iter === 0){ $active = "active"; }
            $iter++;
            echo '<li class="'.$active.'"><a href="#tab'.$iter.'" data-toggle="tab">'.$key.'</a></li>';
        }
        ?>
    </ul>
    <div class="well">
        <div class="tab-content">
            <?php
            $iter = 1;
            foreach ($language_list as $key => $value) {
                $active = "";
                if($iter === 1){ $active = "active"; }
                echo '<div class="tab-pane '.$active.'" id="tab'.$iter.'">';
                echo '<ol>';
                $post_data = getCategoryPost($children_category[$iter]);
                foreach ($post_data as $key => $value) {
                    echo '<li><a href="'.$value->link.'">'.$value->post_title.'</a></li>';
                }
                $iter++;
                echo '</ol>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
