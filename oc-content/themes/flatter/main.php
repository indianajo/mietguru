
<?php 
osc_enqueue_style('jquery-ui', osc_assets_url('css/jquery-ui/jquery-ui.css'));
osc_enqueue_script('jquery-ui');
?>
<?php osc_current_web_theme_path('header.php'); ?>
    <?php if (function_exists("osc_slider")) { ?>
    	<?php osc_slider(); ?>  
    <?php } else {?>
    	<div class="container">
        	Slider plugin is Missing
        </div>
    <?php } ?>
	<!-- Slider -->
    
    <div class="container">
    	<div class="row">
        	<div class="col-md-12">
        	<div class="bigsearch">
            	<form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
                    <input type="hidden" name="page" value="search"/>
                    <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'flatter_theme'), 'flatter')); ?>" />                    
                    <input type="text" class="input-text autocomplete-search" id="sCity" placeholder="<?php echo _e('Where do you want to rent?', 'flatter'); ?>" name="sCity" value="" />
                    
                    <button class="btn btn-default"><i class="fa fa-search fa-lg"></i><?php //_e("Search", 'flatter');?></button>
                </form>
                            
            </div>
            </div>
        </div>
    </div>
    <!-- Big Search -->
    
    
        </div><!-- Section 1 -->
        <div class="section">
			<?php osc_get_premiums(osc_get_preference('premium_count', 'flatter_theme')); if( osc_count_premiums() >= 1) { ?>
            <div class="featuredlistings">
                <div class="container">
                    <!--<div class="row">
                        <h3><i class="fa fa-fire"></i> <?php //_e('Premium Listings', 'flatter') ; ?></h3>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12">
                        <div id="fuListings" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                
                                <?php while ( osc_has_premiums() ) { ?>
                                <div class="item clearfix">
                                    <div class="col-md-5 col-sm-5">
                                        <?php if( osc_images_enabled_at_items() ) { ?>
                                            <?php if(osc_count_premium_resources()) { ?>
                                            <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_premium_title(); ?>" class="img-responsive" /></a>
                                            <?php } else { ?>
                                            <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-photo.jpg'); ?>" alt="<?php echo osc_premium_title(); ?>" class="img-responsive"></a>
                                            <?php } ?>
                                            <?php } ?>
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <h3><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_premium_title(); ?></a></h3>
                                        <p class="description"><?php echo osc_highlight( strip_tags( osc_premium_description() ), 320 ) ; ?></p>
                                        <p class="premium-price"><?php if( osc_price_enabled_at_items() ) { ?><a href="<?php echo osc_premium_url(); ?>"><span class="price"><?php echo osc_format_price(osc_item_price()); ?></span></a><?php } ?> <!--<a href="<?php echo osc_premium_url(); ?>"><i class="fa fa-link"></i> More details</a>--></p>
                                    </div>
                                </div><!-- Item -->
                                <?php } ?>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div><!-- Section 2 -->
        <div class="section">
        	<div class="maincategory">
            <div class="container">
                <div class="row"><h3><?php _e('Categories', 'flatter') ; ?></h3></div>
                <div class="row mc  wow fadeInUp animated clearfix">
                <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                <?php osc_goto_first_category(); ?>
                <?php if ( osc_count_categories() >= 0 ) { ?>
                <?php while ( osc_has_categories() ) { ?>
                    <div class="col-md-3 col-sm-4 col-xs-6 cating">
                        <div class="catsingle">
                            <div class="pull-left">
                                <i class="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?> fa-2x"></i>
                            </div>
                            <div class="category">
                                <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url() ; ?>">
                                <h4><?php echo osc_category_name() ; ?></h4>
                                <p><?php echo osc_category_description(); ?></p>
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
        </div><!-- Section 3 -->
        <div class="section">
        	<div class="latestListing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <h3><!--<i class="fa fa-bullhorn hidden-xs"></i> --><?php _e('Latest Listings', 'flatter') ; ?></h3>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div id="owl-popular" class="owl-carousel">
                        <?php
                        if( osc_count_latest_items() == 0) { ?>
                            <?php _e('No Latest Listings', 'flatter'); ?>
                        <?php } else { ?>
                        <?php while ( osc_has_latest_items() ) { ?>
                        <div class="item wow fadeInUp animated">
                            <div class="list">
                                <?php if( osc_images_enabled_at_items() ) { ?>
                                <div class="image">
                                    <div>
                                    <?php if(osc_count_item_resources()) { ?>
                                    <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_preview_url(); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive" /></a>
                                    <?php } else { ?>
                                    <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-image.jpg'); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive"></a>
                                    <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="caption">
                                    <h3><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h3>
                                    <p class="user"><?php _e('by', 'flatter') ?> <?php if( osc_item_user_id() != null ) { ?><a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a><?php } else { ?><?php echo osc_item_contact_name(); ?><?php } ?></p>
                                    <p class="description"><?php echo osc_highlight( strip_tags( osc_item_description() ), 110 ) ; ?></p>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-5 price">
                                            <?php if( osc_price_enabled_at_items() ) { ?><span><?php echo osc_format_price(osc_item_price()); ?></span><?php } ?>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7 location">
                                            <i class="glyphicon glyphicon-map-marker"></i><?php if(osc_item_region()) { ?> <?php echo osc_item_region(); ?><?php } else { ?> <?php echo osc_item_country(); ?><?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div><!-- owl carousel -->
                    </div>
                </div><!-- row -->
            </div>
        </div>
        </div><!-- Section 4 -->
        <div class="section">
        	<div class="postadspace">
                <div class="container">
                    <h2><?php echo osc_get_preference("fpromo_text", "flatter_theme"); ?></h2>
                    
                    <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
                        <a class="btn btn-success btn-lg" href="<?php echo osc_item_post_url() ; ?>"><?php _e("Publish your ad for free", 'flatter');?></a>
                    <?php } ?>
                </div>
            </div>
        </div><!-- Section 5 -->
    </div>
<script type="text/javascript" name="locationAutocomplete">
jQuery(document).ready(function(){		
		$( "#sCity" ).autocomplete({
			source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
			minLength: 2,
			select: function( event, ui ) {
				$("#sCity").attr("value", ui.item.region);
				
			}
		});
	});
</script>

<?php osc_current_web_theme_path('locationfind.php'); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>