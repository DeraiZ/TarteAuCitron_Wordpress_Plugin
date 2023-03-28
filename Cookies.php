<?php


define( 'WP_DEBUG', true );
/**
 * Plugin Name: Cookie
 * Description: Plugins Basé avec Tarte_aux_citron
 * Author: Moa
 * Version: 0.0.1
 */

function tarte_au_citron_init(){
	$hashtag = get_option('Hashtag');
	$read = get_option('ReadMore');
	$highPrivacy = get_option('HighPrivacy');
	$orientation = get_option('Orientation');
	$addBlocker = get_option('AddBlocker');
	$acceptAllCta = get_option('AcceptAllCta');
	$showAlert = get_option('ShowAlertSmall');
	$list = get_option('CookiesList');
	$name = get_option('CookiesName');
	$groupServices = get_option('GroupServices');
	$state = get_option('service_default_state');
	$popup = get_option('ClosePopup');
	$showIcon = get_option('ShowIcon');
	$pos = get_option('Icon_Position');
	$deny = get_option('DenyAllCta');
	$handlBrowser = get_option('HandlBrowserDNTRequest');
	$remove = get_option('RemoveCredit');
	$moreInfo = get_option('MoreInfo');
	$css = get_option('UseExternalCss');
	$js = get_option('UseExternalJs');
	$mandatory = get_option('Mandatory');
	$mandatoryCta = get_option('MandatoryCta');
	?>
        <script src="wp-content/plugins/Cookies/asset/tarteaucitron.js-1.10.0/tarteaucitron.js-1.10.0/tarteaucitron.js"></script>
        <script type="text/javascript" defer>
            tarteaucitron.init({
                "privacyUrl": "", /* Privacy policy url */
                "bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

                "hashtag": "<?= $hashtag ?>", /* Open the panel with this hashtag */
                "cookieName": "<?= $name ?>", /* Cookie name */

                "orientation": "<?= $orientation ?>", /* Banner position (top - bottom) */

                "groupServices": <?= $groupServices ?>, /* Group services by category */
                "serviceDefaultState": "<?= $state ?>", /* Default state (true - wait - false) */

                "showAlertSmall": <?= $showAlert ?>, /* Show the small banner on bottom right */
                "cookieslist": <?= $list ?>, /* Show the cookie list */

                "closePopup": <?= $popup ?>, /* Show a close X on the banner */

                "showIcon": <?= $showIcon ?>, /* Show cookie icon to manage cookies */
                //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
                "iconPosition": "<?= $pos ?>", /* BottomRight, BottomLeft, TopRight and TopLeft */

                "adblocker": <?= $addBlocker ?>, /* Show a Warning if an adblocker is detected */

                "DenyAllCta" : <?= $deny ?>, /* Show the deny all button */
                "AcceptAllCta" : <?= $acceptAllCta ?>, /* Show the accept all button when highPrivacy on */
                "highPrivacy": <?= $highPrivacy ?>, /* HIGHLY RECOMMANDED Disable auto consent */

                "handleBrowserDNTRequest": <?= $handlBrowser ?>, /* If Do Not Track == 1, disallow all */

                "removeCredit": <?= $remove ?>, /* Remove credit link */
                "moreInfoLink": <?= $moreInfo ?>, /* Show more info link */

                "useExternalCss": <?= $css ?>, /* If false, the tarteaucitron.css file will be loaded */
                "useExternalJs": <?= $js ?>, /* If false, the tarteaucitron.js file will be loaded */

                //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

                "readmoreLink": "<?= $read ?>", /* Change the default readmore link */

                "mandatory": <?= $mandatory ?>, /* Show a message about mandatory cookies */
                "mandatoryCta": <?= $mandatoryCta ?> /* Show the disabled accept button when mandatory on */
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
		'example_setting_page_markup',
		plugins_url( '' ),
		66
	);
}

add_action('admin_menu', 'add_plugin_menu');

function example_setting_page_markup(){
	?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
			<?php
			settings_fields( 'citron_setting' );
			do_settings_sections( 'TarteAuCitron_settings_page' );
			submit_button();
			?>
        </form>
    </div>
	<?php
}

add_action('admin_init', 'example_setting');

function example_setting(){

	add_settings_section(
		    'example_section',                   // Section ID
		    __( 'Fill in the contents of the Tarteaucitron init scripts', 'example' ),  // Title
		    'example_section_markup',            // Callback or empty string
		    'TarteAuCitron_settings_page'              // Page to display the section in.
	);

	register_setting(
		'citron_setting',
		'Hashtag',
	);

	add_settings_field(
		'hashtag',                   // Field ID
		__( 'hashtag', 'example' ),  // Title
		'example_text_Hashtag_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',                // Page
		'example_section'                      // Section
	);

	register_setting(
		'citron_setting',
		'HighPrivacy',
	);

	add_settings_field(
		'HighPrivacy',                                       // Field ID
		__( 'HighPrivacy', 'example' ),             // Title
		'example_text_HighPrivacy_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'AcceptAllCta',
	);

	add_settings_field(
		'AcceptAllCta',                                       // Field ID
		__( 'AcceptAllCta', 'example' ),             // Title
		'example_text_Accept_All_Cta_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'Orientation',
	);

	add_settings_field(
		'orientation',                                       // Field ID
		__( 'orientation', 'example' ),             // Title
		'example_text_orientation_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'AddBlocker',
	);

	add_settings_field(
		'addblocker',                                       // Field ID
		__( 'addblocker', 'example' ),             // Title
		'example_text_AddBlocker_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'ShowAlertSmall',
	);

	add_settings_field(
		'showAlertSmall',                                       // Field ID
		__( 'showAlertSmall', 'example' ),             // Title
		'example_text_ShowAlertSmall_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'CookiesList',
	);

	add_settings_field(
		'cookieslist',                                       // Field ID
		__( 'cookieslist', 'example' ),             // Title
		'example_text_CookiesList_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'CookiesName',
	);

	add_settings_field(
		'cookiesName',                                       // Field ID
		__( 'cookiesName', 'example' ),             // Title
		'example_text_CookiesName_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'GroupServices',
	);

	add_settings_field(
		'groupServices',                                       // Field ID
		__( 'groupServices', 'example' ),             // Title
		'example_text_GroupServices_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'service_default_state',
	);

	add_settings_field(
		'ServiceDefaultState',                                       // Field ID
		__( 'serviceDefaultState', 'example' ),             // Title
		'example_text_service_state_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'ClosePopup',
	);

	add_settings_field(
		'closePopup',                                       // Field ID
		__( 'closePopup', 'example' ),             // Title
		'example_text_ClosePopup_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'ShowIcon',
	);


	add_settings_field(
		'showIcon',                                       // Field ID
		__( 'showIcon', 'example' ),             // Title
		'example_text_ShowIcon_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'Icon_Position',
	);


	add_settings_field(
		'iconPosition',                                       // Field ID
		__( 'iconPosition', 'example' ),             // Title
		'example_text_icon_pos_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'DenyAllCta',
	);

	add_settings_field(
		'DenyAllCta',                                       // Field ID
		__( 'DenyAllCta', 'example' ),             // Title
		'example_text_DenyAllCta_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'HandlBrowserDNTRequest',
	);

	add_settings_field(
		'handleBrowserDNTRequest',                                       // Field ID
		__( 'handleBrowserDNTRequest', 'example' ),             // Title
		'example_text_HandleBrowser_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'RemoveCredit',
	);

	add_settings_field(
		'removeCredit',                                       // Field ID
		__( 'removeCredit', 'example' ),             // Title
		'example_text_RemoveCredit_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'MoreInfo',
	);

	add_settings_field(
		'moreInfoLink',                                       // Field ID
		__( 'moreInfoLink', 'example' ),             // Title
		'example_text_MoreInfo_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'UseExternalCss',
	);

	add_settings_field(
		'UseExternalCss',                                       // Field ID
		__( 'UseExternalCss', 'example' ),             // Title
		'example_text_UseExternalCss_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'UseExternalJs',
	);

	add_settings_field(
		'UseExternalJs',                                       // Field ID
		__( 'UseExternalJs', 'example' ),             // Title
		'example_text_UseExternalJS_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'ReadMore',
	);

	add_settings_field(
		'readMoreLink',                                       // Field ID
		__( 'readMoreLink', 'example' ),             // Title
		'example_text_read_more_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'Mandatory',
	);

	add_settings_field(
		'madatory',                                       // Field ID
		__( 'mandatory', 'example' ),             // Title
		'example_text_Mandatory_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

	register_setting(
		'citron_setting',
		'MandatoryCta',
	);

	add_settings_field(
		'mandatoryCta',                                       // Field ID
		__( 'mandatoryCta', 'example' ),             // Title
		'example_text_MandatoryCta_markup',            // Callback to display the field
		'TarteAuCitron_settings_page',            // Page
		'example_section'                       // Section
	);

}

function example_section_markup( $args ){}


function example_text_Hashtag_markup( $args ){
	$setting = get_option( 'Hashtag' );
	$value   = $setting ?: '';

	?>
    <input class="regular-text" type="text" name="Hashtag" value="<?php echo esc_attr( $value ); ?>">
	<?php
}

function example_text_read_more_markup( $args ){
	$setting = get_option( 'ReadMore' );

	$value   = $setting ?: '';

	?>
    <input class="regular-text" type="text" name="ReadMore" value="<?php echo esc_attr( $value ); ?>">
	<?php
}

function example_text_HighPrivacy_markup( $args ){
	$setting = get_option( 'HighPrivacy' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="HighPrivacy" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_orientation_markup( $args ){
	$setting = get_option( 'Orientation' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="Orientation" value="<?php echo esc_attr( $value ); ?>">
        <option>top</option>
        <option>middle</option>
        <option>bottom</option>

    </select>
	<?php
}

function example_text_service_state_markup( $args ){
	$setting = get_option( 'service_default_state' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="service_default_state" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>wait</option>
        <option>false</option>

    </select>
	<?php
}

function example_text_icon_pos_markup( $args ){
	$setting = get_option( 'Icon_Position');
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="Icon_Position" value="<?php echo esc_attr( $value ); ?>">
        <option>BottomRight</option>
        <option>BottomLeft</option>
        <option>TopRight</option>
        <option>TopLeft</option>
    </select>
	<?php
}

function example_text_Accept_All_Cta_markup( $args ){
	$setting = get_option( 'AcceptAllCta' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="AcceptAllCta" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_AddBlocker_markup( $args ){
	$setting = get_option( 'AddBlocker' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="AddBlocker" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_ShowAlertSmall_markup( $args ){
	$setting = get_option( 'ShowAlertSmall' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="ShowAlertSmall" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_CookiesList_markup( $args ){
	$setting = get_option( 'CookiesList' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="CookiesList" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_CookiesName_markup( $args ){
	$setting = get_option( 'CookiesName' );
	$value   = $setting ?: '';
	?>
    <input class="regular-text" type="" name="CookiesName" value="<?php echo esc_attr( $value ); ?>">

	<?php
}

function example_text_GroupServices_markup( $args ){
	$setting = get_option( 'GroupServices' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="GroupServices" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_ClosePopup_markup( $args ){
	$setting = get_option( 'ClosePopup' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="ClosePopup" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_ShowIcon_markup( $args ){
	$setting = get_option( 'ShowIcon' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="ShowIcon" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_DenyAllCta_markup( $args ){
	$setting = get_option( 'DenyAllCta' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="DenyAllCta" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_handleBrowser_markup( $args ){
	$setting = get_option( 'HandlBrowserDNTRequest' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="HandlBrowserDNTRequest" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_RemoveCredit_markup( $args ){
	$setting = get_option( 'RemoveCredit' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="RemoveCredit" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_MoreInfo_markup( $args ){
	$setting = get_option( 'MoreInfo' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="MoreInfo" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_UseExternalCss_markup( $args ){
	$setting = get_option( 'UseExternalCss' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="UseExternalCss" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_UseExternalJs_markup( $args ){
	$setting = get_option( 'UseExternalJs' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="UseExternalJs" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_Mandatory_markup( $args ){
	$setting = get_option( 'Mandatory' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="Mandatory" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
}

function example_text_MandatoryCta_markup( $args ){
	$setting = get_option( 'MandatoryCta' );
	$value   = $setting ?: '';
	?>
    <select class="" type="" name="MandatoryCta" value="<?php echo esc_attr( $value ); ?>">
        <option>true</option>
        <option>false</option>
    </select>
	<?php
};