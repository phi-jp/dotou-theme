<?php
$category = get_the_category();
$category = $category[0];
$parent_name = get_category_parents($category->category_parent, false, '', false);
?>

<div class="page-header">
    <h1><?php echo $parent_name; ?></h1>
</div>
<div class="category_list"></div>
<div class="chapter_list well"></div>
