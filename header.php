
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
                        $list = getParentCategory();
                        foreach ($list as $key => $value) {
                            if($value->parent === "0"){
                                echo '<li><a href="'.get_bloginfo('home').'/'.$value->slug.'/" title="'.$value->cat_name.''.$value->cat_name.'">'.$value->name.'</a></li>';
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

