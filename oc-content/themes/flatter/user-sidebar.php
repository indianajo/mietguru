<div id="sidebar">
    <div class="profile-section">
    	<?php if (function_exists("profile_picture_upload")) { ?>
    	<?php profile_picture_upload(); ?>
        <?php } else { ?>
        <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=120&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" class="img-responsive" />
        <?php } ?>
        <h4><?php echo osc_user_name(); ?></h4>
        <span class="pub-profile"><a href="<?php echo osc_user_profile_url(); ?>/<?php echo osc_logged_user_id(); ?>" target="_blank"><?php _e('Public Profile', 'flatter'); ?></a></span>
    </div>
    <div class="widget">
        <div class="wblock user-nav">
            <?php echo osc_private_user_menu( get_user_menu() ); ?>
        </div>
    </div>
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