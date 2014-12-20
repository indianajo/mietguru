<div class="col-md-4 col-sm-5">
    <div id="sidebar">
    	<div class="widget">
        	<div class="price wblock">
            	<div class="row">
                	<?php if (function_exists("watchlist")) { ?>
                	<div class="col-sm-9 col-xs-9">
                    <?php } else { ?>
                    <div class="col-sm-12 col-xs-12">
                    <?php } ?>
        				<?php if( osc_price_enabled_at_items() ) { ?><span><?php echo osc_item_formated_price(); ?></span><?php } ?>
                	</div>
                    <?php if (function_exists("watchlist")) { ?>
                    <div class="col-md-3 col-sm-3 col-xs-3 fav">
						<?php if( osc_is_web_user_logged_in() ) { ?>
                            <?php watchlist(); ?>
                        <?php } else { ?>
                        	<span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <a title="<?php _e("Add to watchlist", 'watchlist'); ?>" rel="nofollow" href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-heart fa-stack-1x fa-inverse"></i></a>
                            </span>
                        <?php } ?>
                	</div>
                    <?php } ?>
            	</div>
            </div>
        </div>
        <div class="widget">
        	<div class="publisher wblock clearfix">
            	<div class="pull-left avatar">
					<?php if (function_exists("profile_picture_show")) { ?>
                        <?php profile_picture_show(); ?>
                    <?php } else { ?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_item_contact_email() ) ) ); ?>?s=80&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" />
                    <?php } ?>
                </div>
                <!-- Avatar -->
				<?php if( osc_item_is_expired () ) { ?>
                    <div class="not">
                    	<p><i class="fa fa-info-circle pull-left warning fa-2x"></i> <?php _e("The listing is expired. You can't contact the publisher.", 'flatter'); ?></p>
                    </div>
                <?php } else { ?>
                    <div class="pull-left pub-details">
                        <?php if( osc_item_user_id() != null ) { ?>
                            <h5><a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>"><?php echo osc_item_contact_name(); ?></a> </h5>
                            <small>Registered on <?php echo osc_format_date( osc_user_regdate() ); ?></small>
                        <?php } else { ?>
                            <h5><?php echo osc_item_contact_name(); ?></h5>
                        <?php } ?>
                    </div>
				<?php } ?>
                <!-- Publisher Details -->
            </div>
            
			<?php if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
            	<div class="nonregistered">
                <p><?php _e("You must login or register a new account in order to contact the advertiser", 'flatter'); ?></p>
                <a class="btn btn-green" href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'flatter'); ?></a>
                <a class="btn btn-green" href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'flatter'); ?></a>
            	</div>
            <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
            	<div class="details">
                	<div class="not">
                    	<p><i class="fa fa-info-circle pull-left info fa-2x"></i> <?php _e("It's your own listing, you can't contact the publisher.", 'flatter'); ?></p>
                    </div>
                </div>
            <?php } else if ( osc_item_is_expired () ) { ?>
            	<div class="details">
                    <div class="not">
                        <p><i class="fa fa-info-circle pull-left warning fa-2x"></i> <?php _e("The listing is expired. You can't contact the publisher.", 'flatter'); ?></p>
                    </div>
                </div>
            <?php } else { ?>
            	<div class="details">
                <?php if ( osc_user_phone() != '' ) { ?>
                	<script>
					$(document).ready(function(){
					  $("a#phonenumber").click(function(){
						$("a#phonenumber").addClass("disabled");
						
					  });
					});
					</script>
                    <div class="phone">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="#" id="phonenumber" data-last="<?php echo osc_user_phone(); ?>"><span></span></a>
                    </div>
                    <script>                    
					 $('#phonenumber').toggle(function() {
						$(this).find('span').text('<?php _e("Show phone number", 'flatter'); ?>');
					}, function() {
						$(this).find('span').text($(this).data('last'));
					})
					.click();
					</script>
                <?php } ?>
                <?php if( osc_item_show_email() ) { ?>
                    <div class="email">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="mailto:<?php echo osc_item_contact_email(); ?>?subject=<?php echo osc_item_title(); ?>" target="_blank" rel="nofollow"><?php echo osc_item_contact_email(); ?></a>
                    </div>
                <?php } ?>
                <?php if( osc_user_website() !== '' ) { ?>
                    <div class="website">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-external-link fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="<?php echo osc_user_website(); ?>" target="_blank" rel="nofollow"><?php echo osc_user_website(); ?></a>
                    </div>  
                <?php } ?>
                <script type='text/javascript'>
				$(document).ready(function(){
				  $("#contact").click(function(){
					$("#contact_form").show(100);
				  });
				  $("#contact").click(function(){
					$("#contact").hide();
				  });
				});
				</script>
                <div class="contactform">
                <button class="btn btn-success" type="button" id="contact"><?php _e("Contact publisher", 'flatter'); ?></button>
                
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" style="display:none;" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
                <ul id="error_list"></ul>
                <?php osc_prepare_user_info(); ?>
                 <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                    <div class="form-group">
                    <input type="text" class="form-control" name="yourName" id="yourName" placeholder="<?php _e('Your name', 'flatter'); ?>">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="yourEmail" id="yourEmail" placeholder="<?php _e('Your e-mail address', 'flatter'); ?>">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="<?php _e('Phone number', 'flatter'); ?> (<?php _e('optional', 'flatter'); ?>)">
                    </div>
                    <div class="form-group">
                    <textarea rows="5" class="form-control" name="message" id="message" placeholder="<?php _e('Message', 'flatter'); ?>"></textarea>
                    </div>

                	<?php if(osc_item_attachment()) { ?>
                    <div class="form-group">
                        <label class="control-label" for="attachment"><?php _e('Attachment', 'flatter'); ?>:</label>
                        <div class="controls"><?php ContactForm::your_attachment(); ?></div>
                    </div>
                	<?php } ?>
                
                    <div class="form-group">
                     <?php echo responsive_recaptcha(); ?>
                     <?php osc_show_recaptcha(); ?>
                   	</div>
                    
                    <button type="submit" class="btn btn-success"><?php _e("Send", 'flatter');?></button>
                </form>
                <?php ContactForm::js_validation(); ?>
                </div>
                </div>
            <?php } ?>
        </div>
        
        <?php //if (function_exists("location")) { ?>
        <div class="widget">
            <h3 id="gmap"><?php _e('Listing Location', 'flatter'); ?></h3>
            <div class="googlemap wblock">
                <?php osc_run_hook('location'); ?>
            </div>
        </div>
        <?php //} ?>
        
        <!-- Seller Related listings-->
        <?php osc_current_web_theme_path('sellerlistings.php'); ?>
        
        <?php if( osc_get_preference('usefulinfo_show', 'flatter_theme') !== '0') { ?>
        <div class="widget hidden-xs">
            <h3><?php _e('Useful information', 'flatter'); ?></h3>
            <div class="usefulinfo wblock">
            	<?php echo osc_get_preference("usefulinfo_msg", "flatter_theme"); ?>
            </div>
        </div>
        <?php } ?>
        <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0') { ?>
        <div class="widget">
            <div class="wblock gadsense">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Responsive -->
				<ins class="adsbygoogle responsive"
					 style="display:inline-block"
					 data-ad-client="<?php echo osc_get_preference("ads_pubid", "flatter_theme"); ?>"
                 	 data-ad-slot="<?php echo osc_get_preference("ads_slotid", "flatter_theme"); ?>"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
            </div>
        </div>
        <?php } ?>
    </div>
</div><!-- Item Sidebar -->
<script>
$(document).ready(function() {
	// Item Custom fields
	/*if ($('#custom_fields').html()) {
		$('#des').addClass('col-md-8');
	}
	else
	{
		$('#des').addClass('col-md-12');
		$('#custom_fields').remove();
	}*/
	
	// Remove current seller item
	//$(".current").remove();

	// Grey color for Custom fields
	//$("#custom_fields tr:nth-child(2n+2)").addClass("grey")
});
</script>