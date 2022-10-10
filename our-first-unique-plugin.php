<?php

/*
    Plugin Name: Our Test Plugin
    Description: A Truly amazing plugin
    Version: 1.0
    Author: Joao
    Author URI: https://zapiens.com.br
*/

// add_filter('the_content', 'addToEndOfPost');

// function addToEndOfPost($content) {
//     if (is_page() && is_main_Query()) {
//         return $content . '<p>My name is Joao</p>';
//     }
//     return $content;
// }

class WordCountAndTimePlugin {
    function __construct() {
        add_action('admin_menu', array($this, 'adminPage'));
    }

    function adminPage() {
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
    }
    
    function ourHTML() { ?>
    Hello 
    <?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();



