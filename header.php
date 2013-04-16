
<header id="header" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="callapse" data-target=".nav-callapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <div class="nav-callapse">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li><a href="<?php echo home_url(); ?>/about">About</a></li>
                    <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
                    <li><a href="<?php echo home_url(); ?>/list">List</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php
                        $list = getLanguageList();
                        foreach ($list as $key => $value) {
                            $lang_name  = strtolower(str_replace(" ", "", $value));
                            $lang_chapter = getThemeOptions($lang_name);
                            $chapter_slug = getLanguageSlugList($lang_name);

                            foreach ($lang_chapter as $key2 => $value2) {
                                if(hasChapterEntry($lang_name, $chapter_slug[$key2])){
                                    $url = get_bloginfo("url")."/".$lang_name."/";
                                    echo '<li><a href="'.$url.'">'.$value.'</a></li>';
                                    break;
                                }
                            }
                        }
                        ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

