<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  EasyForm
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// drop a custom database table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS EasyForm_Fields");
$wpdb->query("DROP TABLE IF EXISTS EasyForm_INBOX");
