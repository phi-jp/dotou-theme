<?php

$user   = (empty($_GET['user'])) ? 'phi' : $_GET['user'];
$path   = (empty($_GET['id'])) ? 'qwbs' : $_GET['id'];
$url = "http://api.jsdo.it/v0.2/code/show.json?user=$user&path=$path&source=all";

$str    = file_get_contents($url);
$data   = json_decode($str);

function dump_html() {
    global $data;
    echo $data->source->html;
}

function dump_js() {
    global $data;
    echo $data->source->js;
}

function dump_css() {
    global $data;
    echo $data->source->css;
}

function dump_thumbnail() {
    global $data;
    echo $data->thumbnail->{465};
}

function dump_url() {
    global $data;
    echo $data->url;
}

function dump_id() {
    global $data;
    echo $data->uid;
}

?>


<!DOCTYPE html>

<html>
    <head>
        <style>
        * {
            margin: 0px;
            padding: 0px;
            border: 0px;
            
            position: absolute;
        }
        </style>
        <script>
        var url = "<?php dump_url(); ?>".replace("http://jsdo.it", "http://jsrun.it");
        document.onclick = function() {
            var thumbnail = document.getElementById("thumbnail");
            var preview = document.createElement("iframe");
            
            thumbnail.src = "http://www.bannerkoubou.com/design/images/loading.gif";
            
            preview.src = url;
            preview.width = 465;
            preview.height = 465;
            preview.onload = function() {
                thumbnail.parentNode.removeChild(thumbnail);
            };
            document.body.appendChild(preview);
        };
        </script>
    </head>
    <body>
        <img id="thumbnail" src="<?php dump_thumbnail(); ?>" width=465 height=465 />
        <!--
        <pre><?php var_dump($data); ?></pre>
        <!-- -->
    </body>
</html>

