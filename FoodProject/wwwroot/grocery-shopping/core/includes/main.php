<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_grocery_shopping_dismissed_notice_handler', 'grocery_shopping_ajax_notice_handler' );

function grocery_shopping_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function grocery_shopping_deprecated_hook_admin_notice() {
    // Check if it's been dismissed...
    if ( ! get_option( 'dismissed-get_started', false ) ) {
        $current_screen = get_current_screen();

        // Check screen ID correctly
        if ( 
            $current_screen && 
            $current_screen->id !== 'appearance_page_grocery-shopping-guide-page' &&
            $current_screen->id !== 'appearance_page_groceryshopping-wizard'
        ) {
            $grocery_shopping_comments_theme = wp_get_theme();
            ?>
            <div class="grocery-shopping-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="grocery-shopping-notice">
                    <div class="grocery-shopping-notice-content">
                        <div class="grocery-shopping-notice-heading">
                            <h2>
                                <?php esc_html_e('Thanks For Installing ', 'grocery-shopping'); ?>
                                <?php echo esc_html( $grocery_shopping_comments_theme ); ?>
                                <?php esc_html_e('Theme', 'grocery-shopping'); ?>
                            </h2>
                            <p>
                                <?php
                                printf(
									/* translators: %s: theme name */
                                    esc_html__("%s is now installed and ready to use. We've provided some links to get you started.", 'grocery-shopping'),
                                    $grocery_shopping_comments_theme
                                );
                                ?>
                            </p>
                        </div>
                        <div class="diplay-flex-btn">
                            <a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=grocery-shopping-guide-page' ) ); ?>">
                                <?php echo esc_html__('GET STARTED', 'grocery-shopping'); ?>
                            </a>
                            <a class="button button-primary" href="<?php echo esc_url( GROCERY_SHOPPING_BUY_NOW ); ?>">
                                <?php echo esc_html__('GO TO PREMIUM', 'grocery-shopping'); ?>
                            </a>
                            <a class="button button-primary import" href="<?php echo esc_url( admin_url( 'themes.php?page=groceryshopping-wizard' ) ); ?>">
                                <?php echo esc_html__('ONE CLICK DEMO IMPORTER', 'grocery-shopping'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="grocery-shopping-notice-img">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/notification.png' ); ?>" alt="<?php esc_attr_e('logo', 'grocery-shopping'); ?>">
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'grocery_shopping_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'grocery_shopping_getting_started' );
function grocery_shopping_getting_started() {
	add_theme_page( esc_html__('Get Started', 'grocery-shopping'), esc_html__('Get Started', 'grocery-shopping'), 'edit_theme_options', 'grocery-shopping-guide-page', 'grocery_shopping_test_guide');
}

function grocery_shopping_admin_enqueue_scripts() {
	wp_enqueue_style( 'grocery-shopping-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'grocery-shopping-admin-script', get_template_directory_uri() . '/js/grocery-shopping-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'grocery-shopping-admin-script', 'grocery_shopping_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'grocery_shopping_admin_enqueue_scripts' );

if ( ! defined( 'GROCERY_SHOPPING_DOCS_FREE' ) ) {
define('GROCERY_SHOPPING_DOCS_FREE',__('https://demo.misbahwp.com/docs/grocery-shopping-free-docs/','grocery-shopping'));
}
if ( ! defined( 'GROCERY_SHOPPING_DOCS_PRO' ) ) {
define('GROCERY_SHOPPING_DOCS_PRO',__('https://demo.misbahwp.com/docs/grocery-shopping-pro-docs','grocery-shopping'));
}
if ( ! defined( 'GROCERY_SHOPPING_BUY_NOW' ) ) {
define('GROCERY_SHOPPING_BUY_NOW',__('https://www.misbahwp.com/products/grocery-store-wordpress-theme','grocery-shopping'));
}
if ( ! defined( 'GROCERY_SHOPPING_SUPPORT_FREE' ) ) {
define('GROCERY_SHOPPING_SUPPORT_FREE',__('https://wordpress.org/support/theme/grocery-shopping','grocery-shopping'));
}
if ( ! defined( 'GROCERY_SHOPPING_REVIEW_FREE' ) ) {
define('GROCERY_SHOPPING_REVIEW_FREE',__('https://wordpress.org/support/theme/grocery-shopping/reviews/#new-post','grocery-shopping'));
}
if ( ! defined( 'GROCERY_SHOPPING_DEMO_PRO' ) ) {
define('GROCERY_SHOPPING_DEMO_PRO',__('https://demo.misbahwp.com/grocery-shopping/','grocery-shopping'));
}
if( ! defined( 'GROCERY_SHOPPING_THEME_BUNDLE' ) ) {
define('GROCERY_SHOPPING_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','grocery-shopping'));
}

function grocery_shopping_test_guide() { ?>
	<?php $theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( GROCERY_SHOPPING_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'grocery-shopping' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'grocery-shopping' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( GROCERY_SHOPPING_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'grocery-shopping' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( GROCERY_SHOPPING_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'grocery-shopping' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','grocery-shopping'); ?><?php echo esc_html( $theme ); ?>  <span><?php esc_html_e('Version: ', 'grocery-shopping'); ?><?php echo esc_html($theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<h4><?php echo esc_html__('Import homepage demo in just one click.','grocery-shopping'); ?></h4>
					<p><?php echo esc_html__('Get started with the wordpress theme installation','grocery-shopping'); ?></p>
					<a class="button button-primary import" href="themes.php?page=groceryshopping-wizard"><?php echo esc_html__('ONE CLICK DEMO IMPORTER','grocery-shopping'); ?></a>
				</div>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-insidee">
					<?php
						$theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'grocery-shopping' ); ?></h3>
				<div class="insidee">
				<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','grocery-shopping'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( GROCERY_SHOPPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'grocery-shopping' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( GROCERY_SHOPPING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'grocery-shopping' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( GROCERY_SHOPPING_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'grocery-shopping' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Get All Themes', 'grocery-shopping' ); ?></h3>
				<div class="insidee theme-bundle">
					<img width="100%" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/bundle-image.png' ); ?>" alt="<?php esc_attr_e('logo', 'grocery-shopping'); ?>">
					<p class="offer"><?php esc_html_e('Get 100+ Perfect WordPress Theme In A Single Package at just $89."','grocery-shopping'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 100+ WordPress Themes At 15% Off','grocery-shopping'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','grocery-shopping'); ?></span></p>
				<div id="admin_pro_linkss">
					<a class="blue-button-1" href="<?php echo esc_url( GROCERY_SHOPPING_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Buy All Themes - $89', 'grocery-shopping' ) ?></a>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','grocery-shopping'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','grocery-shopping'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','grocery-shopping'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','grocery-shopping'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
