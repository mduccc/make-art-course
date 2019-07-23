<?php
/**
 * Plugin Name:       Make Art Course
 * Description:       Make Post is Art Course
 * Version:           1.0.0
 * Author:            IndieTeam
 * Author URI:
 * Text Domain:
 * License:
 * License URI:
 * GitHub Plugin URI:
 */

require_once 'DBManager/DBManager.php';

$DB = new DBManager();
$isExits = $DB->artCostIsExits();

if (!$isExits) {
    $creteColumn = $DB->createArtCostColumn();

    if (!$creteColumn)
        echo "Error #01";
    else
        add_action('add_meta_boxes', 'register_meta_box');
} else
    add_action('add_meta_boxes', 'register_meta_box');

function register_meta_box()
{
    require_once 'template/template.php';
    add_meta_box('custom_type', 'Thông tin khác', 'display', 'post');
}

