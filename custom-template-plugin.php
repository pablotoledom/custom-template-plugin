<?php
/*
Plugin Name: Custom Template Plugin
Description: Adds a custom template to WordPress.
Version: 1.0
Author: Your Name
*/

// Register custom template
function custom_template_plugin_register() {
    $template_file = plugin_dir_path( __FILE__ ) . 'custom-template.php';
    if ( file_exists( $template_file ) ) {
        add_filter( 'theme_page_templates', 'custom_template_plugin_add_template' );
        add_filter( 'wp_insert_post_data', 'custom_template_plugin_register_template', 10, 2 );
    }
}

// Add custom template to the list of available page templates
function custom_template_plugin_add_template( $templates ) {
    $templates['custom-template.php'] = 'Custom Template';
    return $templates;
}

// Assign custom template to the page
function custom_template_plugin_register_template( $data, $postarr ) {
    if ( isset( $postarr['page_template'] ) && $postarr['page_template'] == 'custom-template.php' ) {
        $data['page_template'] = 'custom-template.php';
    }
    return $data;
}

// Load custom template if assigned
function custom_template_plugin_load_template( $template ) {
    global $post;
    if ( isset( $post ) && $post->post_type == 'page' && is_page_template( 'custom-template.php' ) ) {
        $custom_template = plugin_dir_path( __FILE__ ) . 'custom-template.php';
        if ( file_exists( $custom_template ) ) {
            return $custom_template;
        }
    }
    return $template;
}

add_action( 'plugins_loaded', 'custom_template_plugin_register' );
add_filter( 'template_include', 'custom_template_plugin_load_template' );
