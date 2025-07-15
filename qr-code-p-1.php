<?php
/**
 * Plugin Name:       QR Code P1
 * Plugin URI:        https://wordpress.org/plugins/qr-code-p-1/
 * Description:       This is a QR Code generator plugin.
 * Version:           1.0.0
 * Author:            Sabbir Noyon
 * Author URI:        https://www.github.com/sabbir-noyon/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class QR_Code_Generator
 *
 * Appends a QR code of the current post/page URL at the end of the content.
 */
class QR_Code_Generator {

	/**
	 * Constructor.
	 * Hooks into the init action.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'initialize' ) );
	}

	/**
	 * Registers content filter on init.
	 */
	public function initialize() {
		add_filter( 'the_content', array( $this, 'qr_code_container' ) );
	}

	/**
	 * Appends a QR code to the post/page content.
	 *
	 * @param string $content The original content.
	 *
	 * @return string Modified content with QR code.
	 */
	public function qr_code_container( $content ) {
		if ( ! is_singular() || ! in_the_loop() || ! is_main_query() ) {
			return $content;
		}

		$current_page_url = esc_url( get_permalink() );
		$qr_code_url      = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $current_page_url;

		$qr_html  = '<p>Scan this QR code to visit this page:</p>';
		$qr_html .= '<p><img src="' . esc_url( $qr_code_url ) . '" alt="QR Code" /></p>';

		return $content . $qr_html;
	}
}

// Initialize the plugin.
new QR_Code_Generator();
