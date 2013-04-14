<?php
$key_name = 'dotou_option';

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
add_action( 'admin_head', 'theme_head', 100 );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
    register_setting( 'dotou_options', 'dotou_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
    add_theme_page( __( 'Theme Options', 'DOTOU_OPTIONS' ), __( 'Theme Options', 'DOTOU_OPTIONS' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

function theme_head(){
    ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/lib/bootstrap/admin_css/bootstrap.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/bootstrap.min.js"></script>
    <script type="text/javascript">
    jQuery(function() {
        // showTab(0);
        // var tab = jQuery(".nav-tabs li");
        // tab.click(function(){
        //     showTab( jQuery(this).index() );
        // });

        // function showTab(num){
        //     jQuery(".tab-pane").hide();
        //     jQuery(".tab-pane").eq(num).show();
        // }
    });
    </script>
    <?php
}

/**
 * Create the options page
 */
function theme_options_do_page() {
    global $select_options, $radio_options, $key_name;

    if ( ! isset( $_REQUEST['settings-updated'] ) ){
      	$_REQUEST['settings-updated'] = false;
    }
    ?>
    <div class="wrap">
      	<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'DOTOU_OPTIONS' ) . "</h2>"; ?>

      	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
      	<div class="updated fade"><p><strong><?php _e( 'Options saved', 'DOTOU_OPTIONS' ); ?></strong></p></div>
      	<?php endif; ?>

        <form method="post" action="options.php">

            <div class="tabbable">

                <?php
                echo esc_textarea( $options[$key_name] );
                settings_fields( 'dotou_options' );
                $options = get_option( 'dotou_theme_options' );
                $lang_list = getLanguageData($key_name);
                ?>

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">List</a></li>
                    <?php
                    foreach ($lang_list as $key => $value) {
                        echo '<li><a href="#tab'.($key+2).'" data-toggle="tab">'.$value.'</a></li>';
                    }
                    ?>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <table class="form-table">
                            <thead>
                                <tr>
                                    <th scope="row">LanguageList</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr valign="top">
                                    <td>
                                        <textarea id="dotou_theme_options[<?php echo $key_name; ?>]" class="large-text" cols="50" rows="10" name="dotou_theme_options[<?php echo $key_name; ?>]"><?php echo esc_textarea( $options[$key_name] ); ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <?php
                        $tmp = array();
                        foreach ($lang_list as $key => $value) {
                            array_push($tmp, $value);

                            if( count($tmp) === 5 ){
                                showTable($tmp);
                                $tmp = array();
                            }
                        }
                        if( count($tmp) < 5 ){
                            showTable($tmp);
                        }
                        ?>
                    </div>

                    <?php
                    foreach ($lang_list as $key => $value) { ?>
                        <div class="tab-pane" id="tab<?php echo $key+2; ?>">
                            <?php
                            $lang_name = str_replace(".", "", $value);
                            $get_key = $key_name.'_'.strtolower(str_replace(" ", "", $value));
                            $category_list = getLanguageData($get_key);
                            ?>
                            <ul class="nav nav-tabs">
                                <?php
                                foreach ($category_list as $key2 => $value2) {
                                    $active = "";
                                    if($key2 === 0){ $active = "active"; }
                                    $chapter_name = explode( ", ", $value2 );
                                    $chapter_name = $chapter_name[0];
                                    echo '<li class="'.$active.'"><a href="#'.$lang_name.'_tab'.($key2).'" data-toggle="tab">'.$chapter_name.'</a></li>';
                                }
                                ?>
                            </ul>

                            <div class="tab-content">
                                <?php
                                foreach ($category_list as $key2 => $value2) {
                                    $active = "";
                                    if($key2 === 0){ $active = "active"; }
                                    $chapter = explode( ", ", $value2 );
                                    $chapter_name = $chapter[0];
                                    $chapter_slug = $chapter[1];
                                    $get_key = $key_name."_".$value."_".$chapter_name;
                                    ?>
                                    <div class="tab-pane <?php echo $active; ?>" id="<?php echo $lang_name.'_tab'.$key2; ?>">

                                        <table class="form-table">
                                            <thead>
                                                <tr>
                                                    <th scope="row">章のリスト</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr valign="top">
                                                    <td>
                                                        <?php $get_key = $key_name."_".strtolower(str_replace(" ", "", $value))."_".$chapter_slug."_章名"; ?>
                                                        <textarea id="dotou_theme_options[<?php echo $get_key; ?>]" class="large-text" cols="50" rows="10" name="dotou_theme_options[<?php echo $get_key; ?>]"><?php echo esc_textarea( $options[$get_key] ); ?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="form-table">
                                            <?php
                                            $chapter_list = getLanguageData($get_key);
                                            foreach ($chapter_list as $key3 => $value3) { ?>
                                                <thead>
                                                    <tr>
                                                        <th scope="row"><?php echo $value3; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr valign="top">
                                                        <td>
                                                            <?php $get_key = $key_name."_".strtolower($value)."_".$chapter_slug."_".$value3; ?>
                                                            <textarea id="dotou_theme_options[<?php echo $get_key; ?>]" class="large-text" cols="50" rows="10" name="dotou_theme_options[<?php echo $get_key; ?>]"><?php echo esc_textarea( $options[$get_key] ); ?></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'DOTOU_OPTIONS' ); ?>" />
            </p>
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
    global $select_options, $radio_options, $key_name;
    $lang_list = getLanguageData($key_name);

    $input[$key_name] = trim(wp_filter_nohtml_kses( $input[$key_name] ));
    access_logger("key: " . $key_name. " | ". "value: ".$input[$key_name]."\n");

    foreach ($lang_list as $key => $value) {
        $array_key = $key_name."_".trim($value);
        $input[$array_key] = trim(wp_filter_nohtml_kses( $input[$array_key] ));
        access_logger("key: " . $array_key. " | ". "value: ".$input[$array_key]."\n");
    }

    return $input;
}

function getLanguageData($key_name){
    $options = get_option( 'dotou_theme_options' );
    $lang_list = $options[$key_name];
    $lang_list = explode( "\n", $lang_list );

    foreach ($lang_list as $key => $value) {
        $lang_list[$key] = trim(str_replace("\n", "", $value));
    }

    return $lang_list;
}

function showTable($tmp){
    global $key_name;
    settings_fields( 'dotou_options' );
    $options = get_option( 'dotou_theme_options' );
    echo '<table class="form-table">';
    echo '<thead><tr>';
    foreach ($tmp as $key => $value) { ?>
        <th scope="row"><?php echo $value; ?></th>
    <?php }
    echo '</tr></thead>';
    echo '<tbody><tr>';
    foreach ($tmp as $key => $value) {
        $form_key = $key_name."_".strtolower(trim(str_replace(" ", "", $value)));
        ?>
        <td scope="row">
            <textarea id="dotou_theme_options[<?php echo $form_key; ?>]" class="large-text" cols="50" rows="10" name="dotou_theme_options[<?php echo $form_key; ?>]"><?php echo esc_textarea( $options[$form_key] ); ?></textarea>
        </td>
    <?php }
    echo '</tr></tbody>';
    echo '</table>';
}

function access_logger($str){
    $hr = "\n-----------------------------------------------\n\n";
    error_log( $str, 3, "/home/sites/heteml/users/k/i/k/kiki2965/web/study/phi/halt/wp-content/themes/dotou-theme/log/errors.log" );
    error_log( $hr, 3, "/home/sites/heteml/users/k/i/k/kiki2965/web/study/phi/halt/wp-content/themes/dotou-theme/log/errors.log" );
}
