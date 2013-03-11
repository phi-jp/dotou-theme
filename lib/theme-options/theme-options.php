<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
add_action( 'admin_head', 'wp_custom_admin' );

function wp_custom_admin(){?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/lib/theme-options/style.css" />
<?php
}

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

/**
 * Create the options page
 */
function theme_options_do_page() {
    global $select_options, $radio_options, $lang_list, $lang_category;

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
        		<?php
            settings_fields( 'dotou_options' );
        		$options = get_option( 'dotou_theme_options' );
            $lang_list = $options['LanguageList'];
            $lang_list = explode( "\n", $lang_list );
            ?>

        		<table class="form-table">
                <tr valign="top"><th scope="row">LanguageList</th>
                    <td>
                        <textarea id="dotou_theme_options[LanguageList]" class="large-text" cols="50" rows="10" name="dotou_theme_options[LanguageList]"><?php echo esc_textarea( $options['LanguageList'] ); ?></textarea>
                    </td>
                </tr>
                <?php
                $lang_category = array("_syuren", "_tanren", "_jukuren");
                foreach ($lang_list as $key => $value) {
                    $array_key = 'LanguageList_'.trim($value);
                    echo '<tr valign="top"><th scope="row">'.$value.'</th>';
                    foreach ($lang_category as $key2 => $value2) {
                  ?>
                        <td>
                            <textarea id="dotou_theme_options[<?php echo $array_key.$value2; ?>]" class="large-text" cols="50" rows="10" name="dotou_theme_options[<?php echo $array_key.$value2; ?>]"><?php echo esc_textarea( $options[$array_key.$value2] ); ?></textarea>
                        </td>
                    <?php }
                    echo '</tr>';
                } ?>
        		</table>
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
    global $select_options, $radio_options, $lang_list, $lang_category;

    $input['LanguageList'] = wp_filter_nohtml_kses( $input['LanguageList'] );

    foreach ($lang_list as $key => $value) {
        $array_key = 'LanguageList_'.trim($value);
        foreach ($lang_list as $key => $value2) {
            $input[$array_key.$value2] = wp_filter_nohtml_kses( $input[$array_key.$value2] );
        }
    }

    return $input;
}

function access_logger($str){
    error_log( $str, 3, "/home/sites/heteml/users/k/i/k/kiki2965/web/study/phi/halt/wp-content/themes/dotou-theme/log/errors.log" );
}
