<?php

$user = 'phi';
$path = 'qwbs';
//$path = '2XgH';
$url = "http://api.jsdo.it/v0.2/code/show.json?user=$user&path=$path&source=all";

$str    = file_get_contents($url);
$data   = json_decode($str);

//var_dump($data);

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

?>


<!DOCTYPE html>

<html>
    <head>
        <style>
        <?php dump_css(); ?>
        </style>
    </head>
    <body>
        <?php dump_html(); ?>
        
        <script type="text/javascript" src="http://jsdo.it/lib/tmlib.js-0.1.5/js"></script>
        <script>
        <?php dump_js(); ?>
        </script>
    </body>
</html>