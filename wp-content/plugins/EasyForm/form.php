<?php

/*
 * @package EasyForm
 */

/*
Plugin Name: EasyForm
Plugin URI: http://Falc0n.exe
Description: Add Form
Version: 1.0.0
Author: Falc0n
Author URI: http://Falc0n.exe
License: MTT
Text Domain: EasyForm
 */

if (!function_exists('add_action')) {
    exit;
}

class EasyForm
{

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_shortcode('EasyForm', [$this, 'start_shortcode']);
    }

    public function start_shortcode($atts = [], $content = null)
    {
        include_once 'pages/view.php';
    }

    public function add_admin_pages()
    {
        add_menu_page('EasyForm Plugin', 'EasyForm', 'manage_options', 'EasyForm_plugin', array($this, 'admin_index_view'), 'dashicons-feedback', 110);
    }

    public function admin_index_view()
    {
        require_once plugin_dir_path(__FILE__) . 'pages/admin.php';
    }
    public function activate()
    {
        $this->createTableFields();
        $this->instantiation();
        flush_rewrite_rules();
    }
    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function enqueue()
    {
        wp_enqueue_style('mystyles', plugins_url('EasyForm/assets/mystyles.css'), __FILE__);
        wp_enqueue_script('script', plugins_url('EasyForm/assets/script.js'), __FILE__);
    }

    public function createTableFields()
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $sql = "CREATE TABLE EasyForm_Fields (
        id INT,
        username BOOLEAN,
        firstname BOOLEAN,
        lastname BOOLEAN,
        email BOOLEAN,
        subject BOOLEAN,
        message BOOLEAN
        )";

        maybe_create_table('EasyForm_Fields', $sql);

        // creating inbox table

        $sql = "CREATE TABLE EasyForm_INBOX (
              id INT PRIMARY KEY AUTO_INCREMENT,
              username VARCHAR(255) DEFAULT NULL,
                firstName VARCHAR(255) DEFAULT NULL,
                lastName VARCHAR(255) DEFAULT NULL,
                email VARCHAR(255) DEFAULT NULL,
                subject VARCHAR(255) DEFAULT NULL,
                message TEXT DEFAULT NULL
            )";

        maybe_create_table('EasyForm_INBOX', $sql);
    }

    public function instantiation()
    {
        global $wpdb;

        $wpdb->insert(
            'EasyForm_Fields',
            [
                'id' => 1,
                'username' => false,
                'firstName' => false,
                'lastName' => false,
                'email' => false,
                'subject' => false,
                'message' => false,
            ]
        );
    }

    public function updateSettings()
    {
        global $wpdb;
        $wpdb->update(
            'EasyForm_Fields',
            [
                "username" => isset($_POST["username"]) ? true : false,
                "firstname" => isset($_POST["firstname"]) ? true : false,
                "lastname" => isset($_POST["lastname"]) ? true : false,
                "email" => isset($_POST["email"]) ? true : false,
                "subject" => isset($_POST["subject"]) ? true : false,
                "message" => isset($_POST["message"]) ? true : false
            ],
            ['id' => 1]
        );
    }

    public function getActiveFields()
    {
        global $wpdb;
        $form = $wpdb->get_row("SELECT * FROM EasyForm_fields WHERE id = 1;");
        return $form;
    }

    public function getMessages()
    {
        global $wpdb;
        $inbox = $wpdb->get_results("SELECT * FROM EasyForm_INBOX");
        return $inbox;
    }

    public function addMessage()
    {
        global $wpdb;
        unset($_POST['submit']);
        $wpdb->insert(
            'EasyForm_INBOX',
            $_POST
        );
    }
}

if (class_exists('EasyForm')) {
    $easyform = new EasyForm();
    $easyform->register();
}

// activate

register_activation_hook(__FILE__, array($easyform, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($easyform, 'deactivate'));

