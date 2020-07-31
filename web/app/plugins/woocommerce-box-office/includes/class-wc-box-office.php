<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Box_Office {

	/**
	 * The single instance of WooCommerce_Box_Office.
	 *
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_version;

	/**
	 * The token.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_token;

	/**
	 * The main plugin file.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $file;

	/**
	 * The main plugin directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_url;

	/**
	 * Suffix for Javascripts.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $script_suffix;

	/**
	 * Plugin's component.
	 *
	 * @var   object
	 * @since 1.0.0
	 */
	public $components;

	/**
	 * Flag to indicate that the plugin has been initiated.
	 *
	 * @var   object
	 * @since 1.0.0
	 */
	private $_initiated = false;

	/**
	 * Constructor.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	private function __construct( $file = '', $version ) {
		$this->_version      = $version;
		$this->_token        = 'woocommerce_box_office';
		$this->file          = $file;
		$this->dir           = trailingslashit( plugin_dir_path( $this->file ) );
		$this->assets_dir    = $this->dir . 'assets';
		$this->assets_url    = trailingslashit( plugins_url( '/assets/', $this->file ) );
		$this->script_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	}

	/**
	 * Init the plugin. Can be initiated once.
	 *
	 * @return void
	 */
	public function init() {
		if ( $this->_initiated ) {
			return;
		}

		// Load includes.
		$this->_load_includes();

		// Set plugin's components.
		$this->_set_components();

		// Handle localisation.
		$this->load_plugin_textdomain();

		// Check updates.
		add_action( 'init', array( $this, 'check_updates' ) );

		$this->_initiated = true;
	}

	private function _load_includes() {
		// Box Office functions.
		require_once( $this->dir . 'includes/wcbo-deprecated-functions.php' );
		require_once( $this->dir . 'includes/wcbo-update-functions.php' );

		// Ticket model.
		require_once( $this->dir . 'includes/class-wc-box-office-ticket.php' );

		// Ticket form.
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-form.php' );

		// Create ticket admin.
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-create-admin.php' );

		// Settings.
		require_once( $this->dir . 'includes/class-wc-box-office-settings.php' );

		// Updater.
		require_once( $this->dir . 'includes/class-wc-box-office-updater.php' );

		// Component classes.
		require_once( $this->dir . 'includes/class-wc-box-office-logger.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-post-types.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-product-admin.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-cart.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-cron.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-admin.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-ajax.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-barcode.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-frontend.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-ticket-shortcode.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-assets.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-tools.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-report.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-privacy.php' );
		require_once( $this->dir . 'includes/class-wc-box-office-order.php' );
	}

	/**
	 * Set plugin's components.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	private function _set_components() {
		$this->components                   = new stdClass;
		$this->components->logger           = new WC_Box_Office_Logger();
		$this->components->post_types       = new WC_Box_Office_Post_Types();
		$this->components->ticket_barcode   = new WC_Box_Office_Ticket_Barcode();
		$this->components->ticket_admin     = new WC_Box_Office_Ticket_Admin();
		$this->components->ticket_ajax      = new WC_Box_Office_Ticket_Ajax();
		$this->components->ticket_frontend  = new WC_Box_Office_Ticket_Frontend();
		$this->components->ticket_shortcode = new WC_Box_Office_Ticket_Shortcode();
		$this->components->settings         = new WC_Box_Office_Settings();
		$this->components->product_admin    = new WC_Box_Office_Product_Admin();
		$this->components->cart             = new WC_Box_Office_Cart();
		$this->components->order            = new WC_Box_Office_Order();
		$this->components->assets           = new WC_Box_Office_Assets();
		$this->components->tools            = new WC_Box_Office_Tools();
		$this->components->report           = new WC_Box_Office_Report();
		$this->components->cron             = new WC_Box_Office_Cron();
		$this->components->updater          = new WC_Box_Office_Updater();
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain() {
		$domain = 'woocommerce-box-office';

		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	}

	/**
	 * Main WC_Box_Office Instance.
	 *
	 * Ensures only one instance of WC_Box_Office is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see get_woocommerce_box_office()
	 * @return Main WooCommerce_Box_Office instance
	 */
	public static function instance( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce-box-office' ), $this->_version );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce-box-office' ), $this->_version );
	}

	/**
	 * Check updates
	 *
	 * @since 1.1.0
	 */
	public function check_updates() {
		$this->components->updater->update_check( $this->_version );
	}
}
