<?php
/*
Theme Name: Flatter
Theme URI: http://www.drizzledesigns.in/
Description: <%- pkg.description %>
Version: <%- pkg.version %>
Author: <%- pkg.author %>
Author URI: http://www.drizzledesigns.in/
Widgets: Sidebar, Header
Theme update URI:
*/

    function flatter_theme_info() {
        return array(
             'name'        => 'flatter'
            ,'version'     => '<%- pkg.version %>'
            ,'description' => '<%- pkg.description %>'
            ,'author_name' => '<%- pkg.author %>'
            ,'author_url'  => 'http://www.drizzledesigns.in/'
            ,'locations'   => array()
        );
    }

?>