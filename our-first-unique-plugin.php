<?php

/*
    Plugin Name: Our Test Plugin
    Description: A Truly amazing plugin
    Version: 1.0
    Author: Joao
    Author URI: https://zapiens.com.br
*/

add_filter('the_content', 'addToEndOfPost');

function addToEndOfPost($content) {
    return $content . '<p>My name is Joao</p>'; // concatenate to add this <p> after content besides substitute it
}
