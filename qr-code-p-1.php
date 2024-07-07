<?php

/**
 * Plugin Name: qr-code-p-1
 * Plugin URI: https://wordpress.org/plugins/qr-code-p-1/
 * Description: This is QR Code plugin
 * Version: 1.0.0
 * Author: Sabbir Noyon
 * Author URI: https://wordpress.org/plugins/qr-code-p-1/
 */


 class QR_Code_Generator{

    public function __construct()
    {
        add_action('init', [$this, 'initialize']);

    }

    public function initialize()
    {
        add_filter('the_content', [$this, 'qr_code_container']);


    } 

    public function qr_code_container($received_contents)
    {
        $current_page = get_permalink();
        $qr_code_image = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example'.$current_page;

        return $received_contents. "<p>Scanner: <img src='{$qr_code_image}'></p>";
        // "<p>This is my F {$current_page}</p>";
    }


 }


new QR_Code_Generator();


