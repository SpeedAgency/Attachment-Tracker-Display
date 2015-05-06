<?php

/*
Plugin Name: Attachment Tracker Display
Plugin URI: http://speed.agency
Description: Display all collected data in a dashboard widget.
Author: Speed Agency
Version: 1.0
Author URI: http://speed.agency
License: GPLv3
Text Domain: speed
*/

require('speed-options.php');
require('display.php');

function sp_at_td_scripts(){
    wp_enqueue_script('sp-at-td-js', plugin_dir_url(__FILE__).'display-widget.js', array('jquery'));
    wp_enqueue_style('sp-at-td-css', plugin_dir_url(__FILE__).'tracker-display.css');
}
add_action('admin_enqueue_scripts', 'sp_at_td_scripts');



function sp_at_td_widget(){
    wp_add_dashboard_widget(
        'sp_at_db_widget',
        'File Tracker Stats (Coming Soon)',
        'sp_at_db_widget_func'
    );
}

//add_action('wp_dashboard_setup', 'sp_at_td_widget');

function sp_at_db_widget_func(){

    echo '<div class="sp_at_tabs">
            <div class="tab-head-wrap">';
    if(have_rows('sites', 'option')){
        echo '<ul>';
        while(have_rows('sites', 'option')):the_row();

            echo '<li class="tab-head"><a href="#'.sanitize_title(get_sub_field('site_name')).'" data-ajaxurl="'.get_sub_field('url').'" data-api="'.get_sub_field('api_key').'">'.get_sub_field('site_name').'</a></li>';

        endwhile;
        echo '</ul>';
        echo '</div><div class="tab-content-wrap">';
        while(have_rows('sites', 'option')):the_row();

            echo '<div id="'.sanitize_title(get_sub_field('site_name')).'"><div class="inner"></div></div>';

        endwhile;
    }
    echo '</div></div>';


}
