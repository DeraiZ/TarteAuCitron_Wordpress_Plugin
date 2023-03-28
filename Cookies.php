<?php

define( 'WP_DEBUG', true );
/**
 * Plugin Name: Cookie
 * Description: Plugins Basé avec Tarte_aux_citron
 * Author: Moa
 * Version: 0.0.1
 */

function tarte_au_citron_init(){

	?>
        <script src="wp-content/plugins/Cookies/asset/tarteaucitron.js-1.10.0/tarteaucitron.js-1.10.0/tarteaucitron.js"></script>
        <script type="text/javascript" defer>
            tarteaucitron.init({
                "privacyUrl": "", /* Privacy policy url */
                "bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

                "hashtag": "<?= $_POST['hashtag'] ?>", /* Open the panel with this hashtag */
                "cookieName": "tarteaucitron", /* Cookie name */

                "orientation": "middle", /* Banner position (top - bottom) */

                "groupServices": false, /* Group services by category */
                "serviceDefaultState": "wait", /* Default state (true - wait - false) */

                "showAlertSmall": false, /* Show the small banner on bottom right */
                "cookieslist": false, /* Show the cookie list */

                "closePopup": false, /* Show a close X on the banner */

                "showIcon": true, /* Show cookie icon to manage cookies */
                //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
                "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

                "adblocker": false, /* Show a Warning if an adblocker is detected */

                "DenyAllCta" : true, /* Show the deny all button */
                "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
                "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */

                "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

                "removeCredit": false, /* Remove credit link */
                "moreInfoLink": true, /* Show more info link */

                "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
                "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

                //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

                "readmoreLink": "", /* Change the default readmore link */

                "mandatory": true, /* Show a message about mandatory cookies */
                "mandatoryCta": true /* Show the disabled accept button when mandatory on */
            });
        </script>;
		<?php
}

add_action('wp_head', 'tarte_au_citron_init');

function add_plugin_menu(){
	add_menu_page(
		__( 'Tarte Au Citron Parameters', 'textdomain' ),
		'TarteAuCitron',
		'manage_options',
		'TarteAuCitron_settings_page',
		'example_settings_page_markup',
		plugins_url( '' ),
		6
	);
}

add_action('admin_menu', 'add_plugin_menu');

function example_settings_page_markup(){
	?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="POST">
			<?php
			settings_fields( 'my_settings' );
			do_settings_sections( 'TarteAuCitron_settings_page' );
			submit_button();
			?>
        </form>
    </div>
	<?php
}

add_action('admin_init', 'my_settings');

function my_settings(){
    register_setting(
            'Form',
            'my_setting',
            'sanitize_text_field');

    add_settings_section(
		    'example_section',                   // Section ID
		    __( 'Fill in the contents of the Tarteaucitron init scripts', 'example' ),  // Title
		    'example_section_markup',            // Callback or empty string
		    'TarteAuCitron_settings_page'              // Page to display the section in.
	);

	add_settings_field(
		'hashtag',                   // Field ID
		__( 'hashtag', 'example' ),  // Title
		'example_text_field_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',                // Page
		'example_section'                      // Section
	);

	add_settings_field(
		'HighPrivacy',                                       // Field ID
		__( 'HighPrivacy', 'example' ),             // Title
		'example_text_select_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	add_settings_field(
		'AcceptAllCta',                                       // Field ID
		__( 'AcceptAllCta', 'example' ),             // Title
		'example_text_select_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	add_settings_field(
		'orientation',                                       // Field ID
		__( 'orientation', 'example' ),             // Title
		'example_text_orientation_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	add_settings_field(
		'addblocker',                                       // Field ID
		__( 'addblocker', 'example' ),             // Title
		'example_text_select_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	add_settings_field(
		'showAlertSmall',                                       // Field ID
		__( 'showAlertSmall', 'example' ),             // Title
		'example_text_select_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	add_settings_field(
		'cookieslist',                                       // Field ID
		__( 'cookieslist', 'example' ),             // Title
		'example_text_select_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);
}

function example_section_markup( $args ){}


function example_text_field_markup( $args ){
	$setting = get_option( 'my_settings' );
	$value   = $setting ?: '';
	?>
    <input class="regular-text" type="text" name="TarteAuCitron_settings_page" value="<?php echo esc_attr( $value ); ?>">
	<?php
}

function example_text_select_markup( $args ){
	$setting = get_option( 'my_settings' );
	$value   = $setting ?: '';
	?>
    <select class="regular-text" type="" name="TarteAuCitron_settings_page" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_orientation_markup( $args ){
	$setting = get_option( 'my_settings' );
	$value   = $setting ?: '';
	?>
    <select class="regular-text" type="" name="TarteAuCitron_settings_page" value="<?php echo esc_attr( $value ); ?>">
        <option>top</option>
        <option>middle</option>
        <option>bottom</option>

    </select>
	<?php
}