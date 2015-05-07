<?php

$sitelist = get_option('site-list');


?>
<div class="wrap">
    <h2>File Tracker</h2>

    <div class="form-row">
        <label class="full">Tracked Sites : </label>
        <select name="site-list-select" id="select-site">
            <?php foreach($sitelist as $site){

                echo '<option data-ajaxurl="'.$site['url'].'" data-api="'.$site['key'].'">'.$site['name'].'</option>';

            }?>
        </select>
    </div>
    <div class="form-row">
        <label class="full">Sort by : </label>
        <select name="sort-list-select" id="sort-list">
            <option value="name">File Name</option>
            <option value="ip">IP Address</option>
        </select>
    </div>
    <div class="form-row">
        <div class="data-output"></div>
    </div>

</div>
