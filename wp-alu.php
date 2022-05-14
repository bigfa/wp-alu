<?php
/*
Plugin Name: WP Alu
Plugin URI: http://fatesinger.com/799
Description: 阿鲁表情
Version: 1.0.2
Author: Bigfa
Author URI: http://fatesinger.com
*/

define('ALU_VERSION', '1.0.2');
define('ALU_URL', plugins_url('', __FILE__));
define('ALU_PATH', dirname(__FILE__));
define('ALU_ADMIN_URL', admin_url());

/**
 * 加载函数
 */
require ALU_PATH . '/functions.php';
