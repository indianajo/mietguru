<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('page contact');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 item-title">
        		<h2><?php _e('Contact us', 'flatter'); ?></h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-12">
            	<div id="content" class="clearfix">
                <?php if( osc_get_preference('contact_enable', 'flatter_theme') !== '0') { ?>
            	<div class="col-sm-7">
                <?php } else { ?>
                <div class="col-sm-12">
                <?php } ?>
                	<h4><?php _e('Enquiry/Feedback', 'flatter'); ?></h4>
                	<ul id="error_list"></ul>
                	<form name="contact_form" action="<?php echo osc_base_url(true); ?>" class="form-horizontal" method="post" >
                    <input type="hidden" name="page" value="contact" />
                    <input type="hidden" name="action" value="contact_post" />
                    <div class="form-group">
                        <label class="control-label col-md-3" for="yourName">
                            <?php _e('Your name', 'flatter'); ?>
                            (<?php _e('optional', 'flatter'); ?>)</label>
                        <div class="controls col-md-6">
                            <input type="text" value="<?php echo osc_logged_user_name(); ?>" class="form-control" name="yourName" id="yourName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="yourEmail">
                            <?php _e('Your email address', 'flatter'); ?></label>
                        <div class="controls col-md-6">
                            <input type="text" value="<?php echo osc_logged_user_email(); ?>" class="form-control" name="yourEmail" id="yourEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="subject">
                            <?php _e('Subject', 'flatter'); ?>
                            (<?php _e('optional', 'flatter'); ?>)</label>
                        <div class="controls col-md-8">
                            <input type="text" value="" name="subject" class="form-control" id="subject">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label  col-md-3" for="message">
                            <?php _e('Message', 'flatter'); ?></label>
                        <div class="controls col-md-8 textarea">
                            <textarea id="message" name="message" class="form-control" rows="9"></textarea></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-8">
                        	<div class="form-group">
                            <?php echo responsive_recaptcha(); ?>
                            <?php osc_show_recaptcha(); ?>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php _e("Send", 'flatter');?></button>
                        </div>
                    </div>
                </form>
                <?php ContactForm::js_validation(); ?>
                </div>
                <?php if( osc_get_preference('contact_enable', 'flatter_theme') !== '0') { ?>
                <div class="col-md-5">
                	<h4><?php _e('Address', 'flatter'); ?></h4>
                    <?php echo osc_get_preference('contact_address', 'flatter_theme'); ?>
                    
                    <div class="google-map">
                    	<iframe width="425" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo (osc_get_preference('address_map', 'flatter_theme')); ?>&amp;output=embed"></iframe>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>        
<script type="text/javascript">
	$(document).ready(function(){
		$(".form-group textarea").addClass("form-control");
	});
</script>
<?php osc_current_web_theme_path('footer.php') ; ?>