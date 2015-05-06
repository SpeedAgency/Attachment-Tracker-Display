<?php
// Options Page
/*if(!function_exists('install_acf')){
    function install_acf(){

        $class = 'error';
        $message = 'ACF is required for this plugin to work. <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Download ACF to continue</a>';

        echo '<div class="'.$class.'"><p>'.$message.'</p></div>';

    }
}

if(function_exists('acf_add_options_page')){

    acf_add_options_page(array(
        'page_title'    => 'Attachment Tracker Display',
        'menu_title'    => 'Tracker Display',
        'menu_slug'     => 'sp-at-display',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-email',
        'parent_slug'   => 'options-general.php'
    ));

}else{

    add_action('admin_notices', 'install_acf');
    exit();

}




if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_55438e01e35a8',
	'title' => 'Tracker Display',
	'fields' => array (
		array (
			'key' => 'field_55438e1f79f33',
			'label' => 'Sites',
			'name' => 'sites',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'row',
			'button_label' => 'Add Site',
			'sub_fields' => array (
				array (
					'key' => 'field_55438e3679f34',
					'label' => 'Site Name',
					'name' => 'site_name',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55438e3f79f35',
					'label' => 'URL',
					'name' => 'url',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'http://',
					'append' => '/',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55438e6979f36',
					'label' => 'API Key',
					'name' => 'api_key',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'sp-at-display',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;
*/
