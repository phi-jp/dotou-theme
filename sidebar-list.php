<div class="well sidebar-nav">
    <ul class="nav unstyled nav-list">
        <?php
        $parent_category = getParentCategory();
        $children_category = getChildrenCategory();
        $category_name = array("修練", "鍛練", "熟練");
        foreach ($parent_category as $key => $value) {
          echo '<li><a href="#'.$value->slug.'">'.$value->name.'</a>';
          echo '<ul>';
          foreach ($category_name as $key2 => $value2) {
              $url = get_bloginfo("url")."/".$value->slug."/".$children_category[$value->slug][$value2]->slug;
              echo '<li><a href="'.$url.'">'.$value2.'</a></li>';
          }
          echo '</ul></li>';
        }
        ?>
    </ul>
</div>
