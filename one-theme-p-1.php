<?php
/**
 * Plugin Name: One Theme P1
 * Plugin URI: https://wordpress.org/plugins/one-theme-p-1/
 * Description: This is the intro plugin
 * Version: 1.0.0
 * Author: Sabbir Noyon
 * Author URI: https://wordpress.org/plugins/one-theme-p-1/
 */



// Procedural


// add_filter('the_title', 'change_title');


// function change_title($new_title)
// {
//     return $new_title . " - " . "Sabbir Noyon";


// }

// add_filter('the_content', 'change_content');

// function change_content($new_content)
// {

//     $content = strip_tags($new_content);
//     $word_count = str_word_count($content);

//     $time = ceil($word_count / 200);

//     return $new_content . "Total Word is {$word_count}, & Approximately reading time {$time} Minutes";


// }



// OOP 

class Custom_Title_Content_Modifier
{

    public function __construct()
    {
        add_action('init', array($this, 'initialization'));


    }

    public function initialization()
    {
        add_filter('the_title', array($this, 'change_title'));
        add_filter('the_content', array($this, 'change_content'));
    }

    function change_title($new_title)
    {
        return $new_title . " - " . "Sabbir Noyon";


    }


    function change_content($new_content)
    {

        $content = strip_tags($new_content);
        $word_count = str_word_count($content);

        $time = ceil($word_count / 200);

        return $new_content . "Total Word is {$word_count}, & Approximately reading time {$time} Minutes";


    }






}

new Custom_Title_Content_Modifier();


// // OOP

// class Name_Modifier{

//     function __construct()
//     {

//         add_action('init', array($this, 'initialization'));

//     }

//     function initialization()
//     {

//        add_filter('the_title', array($this, 'change_title'));

//        add_filter('the_content', array($this, 'change_content'));

//     }

//     function change_title($new_title)
//     {
//         return $new_title . "sabbiiiiiiiiiiiiiiiiiiiiiir";

//     }



//     function change_content($new_content)
//     {
//        $after_strip = strip_tags($new_content);

//        $word_count = str_word_count($after_strip);

//        $time = ceil($word_count/200);

//        return $new_content ."Total Word is {$word_count }, Approx Reading Time {$time} minutes";

//     }




// }

// new Name_Modifier();