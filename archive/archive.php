<?php
$pageSlug = $_SERVER["REQUEST_URI"];
$pageSlug = preg_replace('/\//', '', $pageSlug);
global $currentCategory;
global $parentName;
global $parentSlug;
?>
<div id="contents" class="cf">
  <?php
  $currentCategory = get_the_category();
  $currentCategory = $currentCategory[0];
  $parentName = get_category_parents($currentCategory->category_parent, false, '', false);
  $parentSlug = get_category_parents($currentCategory->category_parent, false, '', true);

  if($pageSlug == $parentSlug){
    get_template_part( "archive/archive-parent" );
  }
  else{
    get_template_part( "archive/archive-children" );
  }
  ?>
</div>
