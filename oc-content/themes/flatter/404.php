<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');
    flatter_add_body_class('page not-found');
    osc_current_web_theme_path('header.php') ;
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 item-title">
        		<h2><?php _e("Sorry but I can't find the page you're looking for", 'flatter') ; ?></h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div id="content">
                	<h4><?php _e("<strong>Look</strong> for it in the most popular categories.", 'flatter') ; ?></h4>
                    
                    <div class="allcategories clearfix">
                        <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                        <?php osc_goto_first_category(); ?>
                        <?php if ( osc_count_categories() >= 0 ) { ?>
                        <?php while ( osc_has_categories() ) { ?>
                            <div class="col-md-3 col-sm-4 col-xs-6 cats">
                                <div class="catsingle">
                                    <div class="pull-left">
                                        <i class="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?> fa-2x"></i>
                                    </div>
                                    <div class="category">
                                        <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url() ; ?>">
                                        <h4><?php echo osc_category_name() ; ?></h4>
                                        <?php if ( osc_count_subcategories() > 0 ) { ?>
                                        </a>
                                        <ul>
                                        <?php while ( osc_has_subcategories() ) { ?>
                                            <?php if( osc_category_total_items() >= 0 ) { ?>
                                                <li><a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> (<?php echo osc_category_total_items() ; ?>)</a></li>
                                            <?php } ?>
                                        <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php } ?>
                	</div>
                </div>
			</div>
        </div>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>