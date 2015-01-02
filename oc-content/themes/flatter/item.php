<?php
	// meta tag robots
    if( osc_item_is_spam() || osc_premium_is_spam() ) {
        osc_add_hook('header','flatter_nofollow_construct');
    } else {
        osc_add_hook('header','flatter_follow_construct');
    }

    //responsive tabs
    osc_register_script('responsive-tabs', osc_current_web_theme_url('js/responsive-tabs.js'), array('jquery'));
    osc_enqueue_script('responsive-tabs');
    osc_enqueue_script('jquery-validate');

    flatter_add_body_class('item');

    $location = array();
    /*if( osc_item_city_area() !== '' ) {
        $location[] = osc_item_city_area();
    }*/
    if( osc_item_city() !== '' ) {
        $location[] = osc_item_city();
    }
    /*if( osc_item_region() !== '' ) {
        $location[] = osc_item_region();
    }
    if( osc_item_country() !== '' ) {
        $location[] = osc_item_country();
    }*/

    osc_current_web_theme_path('header.php');
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 item-title">
        		<h2><?php echo osc_item_title(); ?></h2>
        		<?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                        	<div class="pull-right edit">
                        	<a href="<?php echo osc_item_edit_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e('Edit item', 'flatter'); ?>" rel="nofollow"><i class="fa fa-pencil"></i></a>
                            </div>
                        <?php }  ?>
                <span class="location"><i class="glyphicon glyphicon-map-marker"></i><a href="<?php echo osc_item_url(); ?>#gmap"><?php echo implode(', ', $location); ?></a></span>&nbsp;&nbsp;&nbsp;<span class="category hidden-xs"><i class="glyphicon glyphicon-folder-open"></i> <?php echo osc_item_category(); ?></span>&nbsp;&nbsp;&nbsp;<span class="posted"><i class="glyphicon glyphicon-calendar"></i> <?php echo osc_format_date( osc_item_pub_date() ); ?></span><?php echo voting_item_detail() ?>
            </div>
                
        </div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12">
            	<div id="content">
	            	<ul class="nav nav-tabs" id="myTab">
						<li class="test-class active"><a href="#rent-object">Artikel</a></li>
				        <li class="test-class"><a href="#features">Bedingungen</a></li>
				        <li><a class="deco-none" href="#contact">Vermieter</a></li>
				    </ul>
			    <div class="tab-content">
					<div class="tab-pane active" id="rent-object">   
						<?php if( osc_images_enabled_at_items() ) { ?>
	                    <?php if( osc_count_item_resources() >= 2 ) { ?> 
	                    <div id="carousel-bounding-box"> 
	                        <div class="carousel slide" id="pixCarousel" data-interval="false">
	                        <div class="carousel-inner">
	                        <div class="active item" data-slide-number="0">
	                        	<img class="img-responsive" src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" />
	                        </div>
							<?php for ( $i > 1; osc_has_item_resources(); $i++ ) { ?>
	                            <?php if( $i >= 1 ) { ?>
	                                <div class="item" data-slide-number="<?php print $i; ?>">
	                                    <img src="<?php echo osc_resource_url(); ?>" class="img-responsive" alt="<?php echo osc_item_title(); ?>" />
	                                </div>
	                            <?php } ?>
	                        <?php } ?>
	                        </div>
	                        <a class="carousel-control left" data-slide="prev" href="#pixCarousel"><i class="fa fa-chevron-left fa-lg"></i></a> <a class="carousel-control right" data-slide="next" href="#pixCarousel"><i class="fa fa-chevron-right fa-lg"></i></a>
	                        </div>
	                    </div>
	                    <div class="slider-thumbs clearfix">
	                        <ul>
	                        <?php osc_reset_resources(); ?>
	                            <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
	                                <?php if( $i >= 0 ) { ?>
	                                <li><a id="carousel-selector-<?php print $i; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" /></a></li>
	                                <?php } ?>
	                            <?php } ?>
	                        </ul>
	                    </div>
						<script>
	                    jQuery(document).ready(function($) {
							$('#pixCarousel').carousel({
									interval: false
							});
							
							//Handles the carousel thumbnails
							$('[id^=carousel-selector-]').click( function(){
									var id_selector = $(this).attr("id");
									var id = id_selector.substr(id_selector.lastIndexOf("-")+1);
									var id = parseInt(id);
									$('#pixCarousel').carousel(id);
							});
	                    });
	                    </script>
	                    <?php } else if( osc_count_item_resources() == 1 ) { ?>
	                    	<div class="singleimage">
	                    		<img class="img-responsive" src="<?php echo osc_resource_url(); ?>" alt="<?php osc_item_title(); ?>" />
	                    	</div>
	                    <?php } else { ?>
	                    <?php } ?>
	                    <?php } ?>
	                    <!-- Photos End -->

	                    <div id="description">
	                    	<div class="row">
	                        	<div id="des" class="">
	                           		<?php echo osc_item_description(); ?>
	                         	</div>
	                       	<div id="custom_fields" class="col-md-4"><?php if( osc_count_item_meta() >= 1 ) { ?>
								<h3><?php _e('Additional Details', 'flatter'); ?></h3>
									<table>
										<?php while ( osc_has_item_meta() ) { ?>
											<tr>
											<?php if(osc_item_meta_value()!='') { ?>
												<td><strong><?php echo osc_item_meta_name(); ?>:</strong></td><td><?php echo osc_item_meta_value(); ?></td>
											<?php } ?>
											</tr>
										<?php } ?>
									</table>
								<?php } ?>
								<?php //osc_run_hook('item_detail', osc_item() ); ?></div><!-- Custom fields -->
							</div>
	                    </div> <!-- Description End -->
	                    <?php //if (function_exists("location")) { ?>
				        <div class="widget">
				            <h3 id="gmap"><?php _e('Listing Location', 'flatter'); ?></h3>
				            <?php if(osc_item_address()){?>
				            <div class="item_address"><p><?php echo osc_item_address().', '.osc_item_city(); ?></p></div>
				            <?php }?>
				            <div class="googlemap wblock">
				                <?php osc_run_hook('location'); ?>
				            </div>
				        </div>
	        			<?php //} ?>
	        			<div class="row item-bottom">
                	<div class="col-md-6">
	                    <ul class="social-share">
	                        <li class="facebook">
	                           <a data-toggle="tooltip" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo osc_item_url(); ?>'), 'facebook-share-dialog', 'height=279, width=575'); return false;" title="<?php _e("Share on Facebook", 'flatter'); ?>"><i class="fa fa-facebook"></i>
	                           </a>
	                         </li>
	                        <li class="twitter">
	                             <a title="" href="https://twitter.com/intent/tweet?text=<?php echo osc_item_title(); ?>&url=<?php echo osc_item_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Share on Twitter", 'flatter'); ?>"><i class="fa fa-twitter"></i>
	                             </a>
	                         </li>
	                        <li class="googleplus">
	                            <a title="" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,height=600,width=600');return false;" href="https://plus.google.com/share?url=<?php echo osc_item_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Share on Google Plus", 'flatter'); ?>">
	                                <i class="fa fa-google-plus"></i>
	                            </a>
	                       </li>
	                        <li class="sendmail">
	                            <a title="" rel="nofollow" href="<?php echo osc_item_send_friend_url(); ?>" data-toggle="tooltip" data-original-title="<?php _e("Send to a Friend", 'flatter'); ?>">
	                            <i class="fa fa-envelope"></i>
	                            </a>
	                        </li>
	                    </ul><!-- Social Share End -->
                	</div>                
                </div>
                </div><!-- Item Content End -->
                <!-- END of first tab -->
                

                <div class="tab-pane" id="features">
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
			                            <h5><?php echo voting_item_detail_user() ?></h5>
			                            
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
			                <p><?php _e("You must log in or register a new account in order to contact the advertiser", 'flatter'); ?></p>
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
			             <!-- Seller Related listings-->
        <?php osc_current_web_theme_path('sellerlistings.php'); ?>
        			</div>
                </div>
			</div>
		</div>
                <!-- Comments Template -->
                <?php osc_current_web_theme_path('comments.php'); ?>
                
            </div><!-- Item Content -->
            
            <!-- Sidebar Template -->
            <?php //osc_current_web_theme_path('item-sidebar.php'); ?>
            
        </div>
        
        <!-- Related Listing Template -->
        <?php osc_current_web_theme_path('related-items.php'); ?>
                
	</div>
</div>
<script>
$(document).ready(function() {
	// Item Custom fields
	if ($('#custom_fields').html()) {
		$('#des').addClass('col-md-8');
	}
	else
	{
		$('#custom_fields').remove();
		$('#des').addClass('col-md-12 col-sm-12');
		
	}
	
	// Remove current seller item
	$(".current").remove();

	// Grey color for Custom fields
	$("#custom_fields tr:nth-child(2n+2)").addClass("grey")
});
</script>
<script type="text/javascript">
  (function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);
  $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );
</script>
<?php osc_current_web_theme_path('footer.php'); ?>