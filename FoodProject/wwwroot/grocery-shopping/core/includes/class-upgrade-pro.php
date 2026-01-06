<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Grocery_Shopping_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/core/includes/upgrade-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Grocery_Shopping_Customize_Section_Pro' );

		// Add the PRO Upgrade section.
		$manager->add_section(
		    new Grocery_Shopping_Customize_Section_Pro(
		        $manager,
		        'grocery_shopping_upgrade_pro',
		        array(
		            'title'         => esc_html__( 'Grocery Shopping PRO', 'grocery-shopping' ),
		            'pro_text'      => esc_html__( 'Shopping PRO', 'grocery-shopping' ),
		            'pro_url'       => esc_url( GROCERY_SHOPPING_BUY_NOW ),
		            'demo_text'     => esc_html__( 'Demo', 'grocery-shopping' ),
		            'demo_url'      => esc_url( GROCERY_SHOPPING_DEMO_PRO ),
		            'support_text'  => esc_html__( 'Support', 'grocery-shopping' ),
		            'support_url'   => esc_url( GROCERY_SHOPPING_SUPPORT_FREE ),
		            'bundle_text'   => esc_html__( 'Get All Themes', 'grocery-shopping' ),
		            'bundle_url'    => esc_url( GROCERY_SHOPPING_THEME_BUNDLE ),
		            'lite_doc_text' => esc_html__( 'Lite Doc', 'grocery-shopping' ),
		            'lite_doc_url'  => esc_url( GROCERY_SHOPPING_DOCS_FREE ),
		            'review_text'   => esc_html__( 'Review', 'grocery-shopping' ),
		            'review_url'    => esc_url( GROCERY_SHOPPING_REVIEW_FREE ),
		            'priority'      => 1,
		        )
		    )
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script(
			'grocery-shopping-customize-controls',
			trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js',
			array( 'customize-controls' )
		);

		wp_enqueue_style(
			'grocery-shopping-customize-controls',
			trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css'
		);
	}
}

// Doing this customizer thang!
Grocery_Shopping_Customize::get_instance();
