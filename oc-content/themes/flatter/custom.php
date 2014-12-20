<?php
	osc_add_hook('header','flatter_nofollow_construct');
	
    flatter_add_body_class('custompage');
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div id="columns">
	<div class="container">
    	<div class="row">
			<?php osc_render_file(); ?>
		</div>
    </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>