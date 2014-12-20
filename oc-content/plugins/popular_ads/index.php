<?php
/*
Plugin Name: Popular Ads
Plugin URI: http://www.osclass.org
Description: Determines and displays the most popular active ads
Version: 1.1
Author: Jesse - TurbineJesse@gmail.com
Author URI: http://www.osclass.org/
Short Name: popular_ads
*/




function popular_ads_install() {
      	osc_set_preference('popularads_num_ads', '5', 'plugin-popular_ads', 'INTEGER');
}



function popular_ads_uninstall() {
	osc_delete_preference('popularads_num_ads', 'plugin-popular_ads');
}




// Admin menu :: Help page
function popular_ads_admin_help() {
    echo '<h3><a href="#">Popular Ads</a></h3>
    <ul>
	<li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin_config.php') . '">&raquo; ' . __('Configure', 'Popular Ads') . '</a><li>
    </ul>';
}




// HELPER - retreives preference for number of ads to display
function popular_ads_num_ads() {
    return(osc_get_preference('popularads_num_ads', 'plugin-popular_ads')) ;
}





// function for displaying text on the Item page
function popular_ads($interval) {

    $num_ads = popular_ads_num_ads(); // SETS HOW MANY POPULAR ADS TO DISPLAY

    $conn = getConnection();
    $item_array=$conn->osc_dbFetchResults("SELECT i.*, l.*, d.*, SUM(s.i_num_views) AS total_views FROM %st_item_stats s
	JOIN %st_item i ON s.fk_i_item_id = i.pk_i_id
	JOIN %st_item_location l ON s.fk_i_item_id = l.fk_i_item_id
	JOIN %st_item_description d ON s.fk_i_item_id = d.fk_i_item_id
	WHERE i.dt_pub_date > CURDATE()-INTERVAL %d DAY
	AND i.b_enabled = 1 AND i.b_active = 1 AND i.b_spam = 0 AND (i.b_premium = 1 || i.dt_expiration >= CURDATE())
	GROUP BY s.fk_i_item_id
	ORDER BY total_views DESC
	LIMIT 0, %d", DB_TABLE_PREFIX, DB_TABLE_PREFIX, DB_TABLE_PREFIX, DB_TABLE_PREFIX, $interval, $num_ads);

    if(count($item_array) > 0) {
		View::newInstance()->_exportVariableToView('customItems', $item_array);
    } else echo 'No Results.';
}






/*function pop_ad_style(){
   	echo '<link href="' . osc_base_url() . "oc-content/plugins/popular_ads/pop_ads_style.css" . '" rel="stylesheet" type="text/css" />';
}*/

   
    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), 'popular_ads_install') ;

    // This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'popular_ads_uninstall') ;


    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), '') ;

    // This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', '') ;

    // Include our style sheet in the header
    //osc_add_hook('header', 'pop_ad_style');

    // Add the Help page to the admin menu
   osc_add_hook('admin_menu', 'popular_ads_admin_help');
    
?>