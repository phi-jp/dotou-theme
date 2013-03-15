<?php
    $this_cat = get_category($cat);
    $parent_name = get_category_parents($this_cat->category_parent, false, '', false);
    $chapter_list = getLanguageChapter($parent_name, $this_cat->cat_name);
    // pr($chapter_list);
    $post_data = getCategroyPost($this_cat->term_id);
    // pr($post_data[0]);

    // 章順に取得
    $sort_data = array();
    foreach ($chapter_list as $key => $value) {
        $tmp = array();
        foreach ($post_data as $key2 => $value2) {
            if( $value2->ChapterName === $value ){
                array_push($tmp, $value2);
            }
        }
        array_push($sort_data, $tmp);
    }

    // ソート
    $post_data = $sort_data;
    $sort_data = array();
    foreach ($post_data as $key => $value) {
        if(is_array($value)){
            $sort_key = array();
            foreach ($value as $key2 => $value2) {
                $sort_key[$key2] = $value2->ChapterNumber;
            }
            array_multisort($sort_key, SORT_ASC, $value);
            array_push($sort_data, $value);
        }
    }
?>
<div class="page-header">
    <h1><?php echo $parent_name." ".$this_cat->cat_name; ?></h1>
</div>
<div class="category_list"></div>
<div class="chapter_list well">
    <?php
    foreach ($sort_data as $key => $value) {
        echo '<h2>'.$value[0]->ChapterName.'</h2>';
        echo '<ul>';
        foreach ($value as $key2 => $value2) {
            echo '<li><a href="'.$value2->guid.'">'.$value2->post_title.'</a></li>';
        }
        echo '</ul>';
    }
    ?>
</div>