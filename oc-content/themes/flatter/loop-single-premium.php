<?php //osc_get_premiums(3); ?>
<div class="listing-card col-md-4 col-sm-6 col-xs-6<?php echo $class; if(osc_item_is_premium()){ echo ' premium'; } ?>  wow fadeInUp animated">
	<div class="clearfix">
	<div class="listing-image">
    	<div class="image">
			<?php if( osc_images_enabled_at_items() ) { ?>
        	<?php if(osc_count_premium_resources()) { ?>
                <a href="<?php echo osc_premium_url(); ?>" title="<?php echo osc_premium_title(); ?>"><img src="<?php echo osc_resource_preview_url(); ?>" alt="<?php echo osc_premium_title() ; ?>" class="img-responsive" /></a>
            <?php } else { ?>
                <a href="<?php echo osc_premium_url(); ?>" title="<?php echo osc_premium_title(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-photo.jpg'); ?>" alt="<?php echo osc_premium_title() ; ?>" class="img-responsive" /></a>
            <?php } ?>
        	<?php } ?>
    	</div>
        <?php if(osc_premium_is_premium()){ ?><div class="status"><span class="premium">Premium</span></div><?php } ?>
    </div>
    
    <div class="listing-detail">
    	<h5><a href="<?php echo osc_premium_url() ; ?>" class="title" title="<?php echo osc_premium_title() ; ?>"><?php echo osc_premium_title() ; ?></a></h5>
        <p><?php echo osc_highlight( strip_tags( osc_premium_description()) ,150) ; ?></p>
        <?php if( osc_price_enabled_at_items() ) { ?><span class="price"><?php echo osc_format_price(osc_premium_price()); ?></span><?php } ?>
        <div class="listing-option">
            <?php if($admin) { ?>
                <span class="admin-options">
                    <a class="edit" href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow"><i class="fa fa-pencil"></i> <?php _e('Edit item', 'flatter'); ?></a>
                    <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_premium_delete_url();?>" ><i class="fa fa-times"></i> <?php _e('Delete', 'flatter'); ?></a>
                    <?php if(osc_premium_is_inactive()) {?>
                    <a class="active" href="<?php echo osc_premium_activate_url();?>" ><i class="fa fa-check"></i> <?php _e('Activate', 'flatter'); ?></a>
                    <?php } ?>
                </span>
            <?php } ?>
        </div>
    </div><!-- Detail -->
    </div>
</div>

<?php /*?><?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<li class="listing-card <?php echo $class; ?> premium">
    <?php if( osc_images_enabled_at_items() ) { ?>
        <?php if(osc_count_premium_resources()) { ?>
            <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_premium_title() ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_premium_title() ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
        <?php } else { ?>
            <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_premium_title() ; ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_premium_title() ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
        <?php } ?>
    <?php } ?>
    <div class="listing-detail">
        <div class="listing-cell">
            <div class="listing-data">
                <div class="listing-basicinfo">
                    <a href="<?php echo osc_premium_url() ; ?>" class="title" title="<?php echo osc_premium_title() ; ?>"><?php echo osc_premium_title() ; ?></a>
                    <div class="listing-attributes">
                        <span class="category"><?php echo osc_premium_category() ; ?></span> -
                        <span class="location"><?php echo osc_premium_city(); ?> (<?php echo osc_premium_region(); ?>)</span> <span class="g-hide">-</span> <?php echo osc_format_date(osc_premium_pub_date()); ?>
                        <?php if( osc_price_enabled_at_items() ) { ?><span class="currency-value"><?php echo osc_format_price(osc_premium_price()); ?></span><?php } ?>
                    </div>
                    <p><?php echo osc_highlight( strip_tags( osc_premium_description()) ,250) ; ?></p>
                </div>
                <?php if($admin){ ?>
                    <span class="admin-options">
                        <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'flatter'); ?></a>
                        <span>|</span>
                        <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_premium_delete_url();?>" ><?php _e('Delete', 'flatter'); ?></a>
                        <?php if(osc_premium_is_inactive()) {?>
                        <span>|</span>
                        <a href="<?php echo osc_premium_activate_url();?>" ><?php _e('Activate', 'flatter'); ?></a>
                        <?php } ?>
                    </span>
                <?php } ?>
            </div>
        </div>
    </div>
</li><?php */?>