<div id="sidebar">
	<div class="widget hidden-xs">
        <div class="profile-section">
        	<?php if (function_exists("profile_picture_show")) { ?>
				<?php profile_picture_show(); ?>
            <?php } else { ?>
                <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=150&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" class="img-responsive" />
            <?php } ?>
            
        </div>
    </div>
    <?php if(osc_logged_user_id() !=  osc_user_id()) { ?>
    <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
    <div class="widget">
    	<h3><?php _e("Contact", 'flatter'); ?></h3>
        <div class="wblock public-contact">
            <div id="contact" class="contactform">
                <ul id="error_list"></ul>
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                    <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
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
    </div> 
    <?php } } ?>
    <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0') { ?>
    <div class="widget">
        <div class="wblock gadsense">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Responsive -->
            <ins class="adsbygoogle responsive"
                 style="display:inline-block"
                 data-ad-client="<?php echo osc_get_preference("ads_pubid", "flatter_theme"); ?>"
                 data-ad-slot="<?php echo osc_get_preference("ads_slotid", "flatter_theme"); ?>">
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <?php } ?>
</div>

<div id="sidebar">
    

</div><!-- /sidebar -->