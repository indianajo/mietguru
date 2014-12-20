<?php related_listings(); ?>
<?php if( osc_count_items() >= 1) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="relatedlistings">
        <div class="container">
            <div class="row"><h3><!--<i class="fa fa-newspaper-o hidden-xs"></i> --><?php _e('Related listings', 'flatter'); ?></h3></div>
            <div class="row">
                <div id="owl-popular" class="owl-carousel">
                    <?php while ( osc_has_items() ) { ?>
                    <div class="item">
                        <div class="list">
                            <?php if( osc_images_enabled_at_items() ) { ?>
                            <div class="image">
                            	<div>
								<?php if(osc_count_item_resources()) { ?>
                                <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive" /></a>
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
                </div><!-- owl carousel -->
            </div><!-- row -->
        </div>
    </div>
        
        <!--<?php if( osc_count_items() > 0 ) { ?>
        <div class="related-listings">
            <h2><?php _e('Related listings', 'flatter'); ?></h2>
            <?php
            View::newInstance()->_exportVariableToView("listType", 'items');
            osc_current_web_theme_path('loop.php');
            ?>
            <div class="clear"></div>
        </div>
        <?php } ?>-->
    </div>
</div><!-- Related Listings -->
<?php } ?>