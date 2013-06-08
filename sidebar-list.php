<div class="well sidebar-nav">
    <ul class="nav unstyled nav-list">
        <?php
        global $entry_list;

        foreach ($entry_list as $key => $value) {
            echo '<li><a href="#'.trimString($key).'">'.$key.'</a>';
            echo '<ul>';
            foreach ($value as $key2 => $value2) {
                $meta = explode(", ", $value2);
                $url = get_bloginfo("url")."/".trimString($key)."/".$meta[1];
                echo '<li><a href="'.$url.'">'.$meta[0].'</a></li>';
            }
            echo '</ul></li>';
        }
        ?>
    </ul>
</div>
