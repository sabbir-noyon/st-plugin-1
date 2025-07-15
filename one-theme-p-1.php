<?php
/**
 * Plugin Name:       One Theme P1
 * Plugin URI:        https://wordpress.org/plugins/one-theme-p-1/
 * Description:       This is a content modifier plugin.
 * Version:           1.0.0
 * Author:            Sabbir Noyon
 * Author URI:        https://www.github.com/sabbir-noyon/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Custom_Title_Content_Modifier
 *
 * Appends author name to the title and displays word count and reading time in content.
 */
class Custom_Title_Content_Modifier {

	/**
	 * Constructor to initialize hooks.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'initialization' ) );
	}

	/**
	 * Registers content filters on init.
	 */
	public function initialization() {
		add_filter( 'the_title', array( $this, 'change_title' ) );
		add_filter( 'the_content', array( $this, 'change_content' ) );
	}

	/**
	 * Modifies the post title.
	 *
	 * @param string $new_title The original post title.
	 *
	 * @return string Modified title.
	 */
	public function change_title( $new_title ) {
		return $new_title . ' - John Doe';
	}

	/**
	 * Appends word count and reading time to the content.
	 *
	 * @param string $new_content The original post content.
	 *
	 * @return string Modified content.
	 */
	public function change_content( $new_content ) {
		$content    = wp_strip_all_tags( $new_content );
		$word_count = str_word_count( $content );
		$time       = ceil( $word_count / 200 );

		return $new_content . " Total words: {$word_count}, Approx. reading time: {$time} minutes.";
	}
}

new Custom_Title_Content_Modifier();

/**
 * Class Name_Modifier
 *
 * Another content modifier class.
 */
class Name_Modifier {

	/**
	 * Constructor to initialize hooks.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'initialization' ) );
	}

	/**
	 * Registers content filters.
	 */
	public function initialization() {
		add_filter( 'the_title', array( $this, 'change_title' ) );
		add_filter( 'the_content', array( $this, 'change_content' ) );
	}

	/**
	 * Modifies the post title.
	 *
	 * @param string $new_title The original post title.
	 *
	 * @return string Modified title.
	 */
	public function change_title( $new_title ) {
		return $new_title . ' WP';
	}

	/**
	 * Appends word count and reading time to the content.
	 *
	 * @param string $new_content The original content.
	 *
	 * @return string Modified content.
	 */
	public function change_content( $new_content ) {
		$content    = wp_strip_all_tags( $new_content );
		$word_count = str_word_count( $content );
		$time       = ceil( $word_count / 200 );

		return $new_content . " Total words: {$word_count}, Approx. reading time: {$time} minutes.";
	}
}

new Name_Modifier();
