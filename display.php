<?php



add_action('admin_menu', 'sp_at_create_display_menu');

function sp_at_create_display_menu(){
  // create Menu Item
  add_menu_page('File Tracker', 'File Tracker', 'administrator', 'attachment-tracker', 'sp_at_display_page', 'dashicons-chart-area');
  add_submenu_page('attachment-tracker', 'Settings', 'Settings', 'administrator', 'sp-at-display-settings', 'sp_at_display_settings_page');

  add_action('admin_init', 'register_sp_at_display_settings');

  wp_register_style('sp-at-display-style', plugins_url('css/settings.css', __FILE__));
  wp_register_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

  wp_register_script('sp-at-display-settings', plugins_url('js/settings.js', __FILE__), array('jquery'));
}

function register_sp_at_display_settings(){
  register_setting('sp-at-display-settings', 'site-list');
}







function sp_at_display_page(){

    echo 'sup';
}


function sp_at_display_settings_page(){
    wp_enqueue_style('sp-at-display-style');
    wp_enqueue_style("fontawesome");
    wp_enqueue_script('sp-at-display-settings');

    $sitelist = get_option('site-list');

    print_r($sitelist);

    ?>
    <div class="wrap">
      <h2>File Tracker Display Settings</h2>

      <form method="post" action="options.php">
        <?php settings_fields('sp-at-display-settings'); ?>
        <?php do_settings_sections('sp-at-display-settings'); ?>
        <div class="form-row">
            <div class="repeater">
                <label>Sites</label>
                <table class="r-fields" cellspacing="0" cellpadding="0">

                    <?php foreach($sitelist as $site){

                        print_r($site);?>

                    <tr class="field-row">
                        <td class="count">1</td>
                        <td class="field-group">
                            <div class="field">
                                <label class="prepend" style="width:70px;">Site Name:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="text" data-type="name" data-req="1" name="site-list[site][name]" value="<?php echo $site['name'];?>" />
                                </div>
                            </div>

                            <div class="field">
                                <label class="prepend" style="width:70px;">Site URL:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="url" data-type="url" data-req="1" name="site-list[site][url]" />
                                </div>
                            </div>

                            <div class="field">
                                <label class="prepend" style="width:70px;">API Key:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="text" data-type="key" data-req="1" name="site-list[site][key]" />
                                </div>
                            </div>
                        </td>
                        <td class="remove">

                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="clonefrom" style="display:none;">
                    <tr class="field-row">
                        <td class="count">1</td>
                        <td class="field-group">
                            <div class="field">
                                <label class="prepend" style="width:70px;">Site Name:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="text" data-type="name" data-req="1" name="site-list[site][name]" value='' />
                                </div>
                            </div>

                            <div class="field">
                                <label class="prepend" style="width:70px;">Site URL:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="url" data-type="url" data-req="1" name="site-list[site][url]" value="" />
                                </div>
                            </div>

                            <div class="field">
                                <label class="prepend" style="width:70px;">API Key:</label>
                                <div class="append" title="Required"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="input-wrap">
                                    <input type="text" data-type="key" data-req="1" name="site-list[site][key]" value="" />
                                </div>
                            </div>
                        </td>
                        <td class="remove">

                        </td>
                    </tr>
                </div>
                <button class="button button-primary clone" data-clone=".field-row">Add Site</button>
            </div>
        </div>
       <?php submit_button(); ?>
    </form>
  </div>
    <?php
}

?>
