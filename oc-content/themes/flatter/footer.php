    <?php
        $breadcrumb = osc_breadcrumb('', false, get_breadcrumb_lang());
        if( $breadcrumb !== '') { ?>
        <div id="breadcrumb">
        <div class="container">
            <div class="row">
                    <?php echo $breadcrumb; ?>
                </div>
        	</div>
    	</div>
	<?php } ?>
    <div id="footer">
        <div class="footer-top">
            <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6 morelinks">
                    <h4>More Information</h4>
                    <div class="fb-content links">
                        <ul>
                        	<?php osc_reset_static_pages();
                        	while( osc_has_static_pages() ) { ?>
                            <li><a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a></li>
                        	<?php } ?>
                            <li><a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact Us', 'flatter'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 followus">
                    <h4>Follow Us</h4>
                    <div class="fb-content social">
                        <ul>
                            <li><a href="https://www.facebook.com/<?php echo osc_get_preference("facebook_page", "flatter_theme"); ?>" target="_blank"><i class="fa fa-facebook-square fa-lg"></i> Follow on Facebook</a></li>
                            <li><a href="https://twitter.com/<?php echo osc_get_preference("twitter_page", "flatter_theme"); ?>" target="_blank"><i class="fa fa-twitter fa-lg"></i> Follow on Twitter</a></li>
                            <li><a href="https://plus.google.com/<?php echo osc_get_preference("gplus_page", "flatter_theme"); ?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i> Follow on Google+</a></li>
                            <!--li><a href="http://www.pinterest.com/<?php //echo osc_get_preference("pinterest_page", "flatter_theme"); ?>" target="_blank"><i class="fa fa-pinterest fa-lg"></i> Follow on Pinterest</a></li-->
                            <!--li><a href="<?php //echo osc_base_url (); ?>feed" target="_blank"><i class="fa fa-rss fa-lg"></i> RSS Feed</a></li-->
                        </ul>
                    </div>
                </div>
                <?php if (function_exists("popular_ads")) { ?>
                <div class="col-md-3 hidden-xs">
                	<?php popular_ads(30); ?>
                    <h4><?php _e('Popular Listings', 'flatter'); ?></h4>
                    <div class="fb-content latest">
                        <ul>
                        <?php if( osc_count_custom_items() == 0) { ?>
                            <li><?php _e('No Popular Listings', 'flatter'); ?></li>
                            <?php } else { ?>
                            <?php while ( osc_has_custom_items() ) { ?>
                            <li><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_field('s_title'); ?></a></li>
                            <?php } ?>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-4 hidden-xs hidden-sm">
                    <?php if( osc_get_preference('facebook_likebox', 'flatter_theme') !== '0') { ?>
                    <div class="fb-content flikebox">
                    <div id="fb-root"></div>
					<script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/<?php echo str_replace('_', '-', osc_current_user_locale()); ?>/sdk.js#xfbml=1&appId=1467813233460882&version=v2.0";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="foot-content">
                    	<div class="fb-like-box" data-href="https://www.facebook.com/<?php echo osc_get_preference("facebook_page", "flatter_theme"); ?>" data-height="200" data-width="250" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            </div>
        </div><!-- Footer Top -->
        <div class="footer-bottom">
            <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 copyright">
                    &copy; <?php echo date('Y'); ?> <a href="#"><?php echo osc_page_title(); ?></a>. All Rights Reserved. 
                    <?php if( osc_get_preference('footer_link', 'flatter_theme') !== '0') { echo 'Powered by <a title="Osclass" target="_blank" rel="nofollow" href="http://osclass.org/">Osclass</a>'; } ?>
                </div>				
            </div>
            </div>
        </div>
        
    </div>
    <!-- Footer -->
    <?php osc_run_hook('footer'); ?>
    <?php if( osc_get_preference('google_analytics', 'flatter_theme') !== '0') { ?>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', '<?php echo osc_get_preference("g_analytics", "flatter_theme"); ?>', 'auto');
	  ga('send', 'pageview');
	</script>
    <?php } ?>
    <script type="text/javascript">
		$(".flashmessage .ico-close").click(function(){$(this).parent().hide();});
    </script>
    <?php if(!osc_is_publish_page()) { ?>
    <script src="<?php echo osc_current_web_theme_url('js/wow.min.js') ; ?>"></script>
	<script>
       new WOW().init();
    </script>
    <?php } else { ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/global.js') ; ?>"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/bootstrap.min.js') ; ?>"></script>
</body>
</html>