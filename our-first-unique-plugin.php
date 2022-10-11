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
        add_action('admin_init', array($this, 'settings'));
    }

    function settings() {
        add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');
        add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
        register_setting('wordcountplugin','wcp_location',array('sanitize_callback' => 'sanitize_text_field', 'default' => '0')); // sanitize_text_field is WP function to sanitize
    }

    function locationHTML() { ?>
        <select name="wcp_location">
            // selected and get option is to get the selected value from the table
            <option value="0" <?php selected(get_option('wcp_location'), '0') ?> >Beggining of post</option>
            <option value="1" <?php selected(get_option('wcp_location'), '1') ?> >End of post</option> 
        </select>
    <?php }

    function adminPage() {
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
    }
    
    function ourHTML() { ?>
        <div class="wrap">
            <h1>Word Count Settings</h1>
            <form action="options.php" method="POST">
            <?php 
                settings_fields('wordcountplugin'); // add hidden nonce fields
                do_settings_sections('word-count-settings-page');
                submit_button();
            ?>   
            </form>
        </div>
    <?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();



