<div class="well sidebar-nav">
    <ul class="nav unstyled nav-list">
        <?php
        global $entry_list;

        foreach ($entry_list as $key => $value) {
            echo '<li><a href="#'.strtolower(str_replace(" ", "", $key)).'">'.$key.'</a>';
            echo '<ul>';
            foreach ($value as $key2 => $value2) {
                $meta = explode(", ", $value2);
                $url = get_bloginfo("url")."/".$key."/".$meta[1];
                echo '<li><a href="'.$url.'">'.$meta[0].'</a></li>';
            }
            echo '</ul></li>';
        }
        ?>
    </ul>
</div>
