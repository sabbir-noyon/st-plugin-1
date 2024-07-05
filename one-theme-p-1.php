<?php
/**
 * Plugin Name: One Theme P1
 * Plugin URI: https://wordpress.org/plugins/one-theme-p-1/
 * Description: This is the intro plugin
 * Version: 1.0.0
 * Author: Sabbir Noyon
 * Author URI: https://wordpress.org/plugins/one-theme-p-1/
 */

// add_filter('the_content', 'p1_change_content');

// function p1_change_content($post_content) {
//     $content = strip_tags($post_content);
//     $word_count = str_word_count($content);

//    $reading_time = ceil($word_count/200);

//    return $post_content. "<p> {$word_count} words, approximately reading time {$reading_time} minitues </P>";
// }



add_filter('the_title', 'change_title');


function change_title($new_title)
{
    return $new_title . " - " . "Sabbir Noyon";


}

add_filter('the_content', 'change_content');

function change_content($new_content)
{

    $content = strip_tags($new_content);
    $word_count = str_word_count($content);

    $time = ceil($word_count / 200);

    return $new_content . "Total Word is {$word_count}, & Approximately reading time {$time} Minutes";


}

