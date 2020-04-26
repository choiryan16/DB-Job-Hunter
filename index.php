<?php

/**
 * This is an example of a front controller for a flat file PHP site. Using a
 * Static list provides security against URL injection by default. See README.md
 * for more examples.
 */
# [START gae_simple_front_controller]
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'landing.php';
        break;
    case '/login.php':
        require 'login.php';
        break;
    case '/mainpage.php':
    	require 'mainpage.php';
    	break;
    case '/jobmanager.php':
    	require 'jobmanager.php';
    	break;
    default:
        http_response_code(404);
        exit('Not Found');
}
# [END gae_simple_front_controller]