<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link href="<?php echo osc_current_web_theme_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo osc_current_web_theme_url('js/bootstrap.min.js'); ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="http://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
<style type="text/css" media="screen">
	.flatter-admin {}
	.flatter-admin .flatter-head h2 { background:#59BD56; color:#fff; margin-bottom:0px; padding:10px; font-size:22px; border:1px solid #4ab247; }
	.flatter-admin .flatter-head h2 span { font-size:12px; }
	.flatter-admin .flatter-head h2 span a { color:#fff;}
	.flatter-admin .flatter-content { background:#fff; border:1px solid #ddd; border-top:0; }
	.flatter-admin .flatter-content ul { background:#f9f9f9;}
	.flatter-admin .flatter-content ul li a { border-radius: 0px; border-top:0; }
	.flatter-admin .flatter-content ul li.active a {  color:#59BD56; }
	.flatter-admin .flatter-content ul li:first-child a { border-left:0; }
	.flatter-admin .flatter-content .tab-content { padding:15px 15px 0 15px; }
	.flatter-admin .form-actions { margin: 0 -15px; padding: 15px;}
	.flatter-admin .tab-content .flashmessage { margin-bottom:10px!important; width:100%; border-radius:0!important; padding:10px; }
	#content-head { height:auto;}
    .form-control { height:auto!important; padding:7px!important; width:100%!important; }
	label { font-weight:normal; }
	input, select, textarea { border-radius:0 !important; }
	.select-box select { opacity:10!important;}
	.select-box.form-control { border:0;}
	small { font-size:11px; color:#888;}
	a { color:#444; }
	a:hover, a:focus { color:#59BD56; }
	a, a:hover, a:focus { outline:none; }
	.navbar { border-radius: 0px; }
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus { border-top:0;}
</style>
<div class="flatter-admin">
	<div class="flatter-head">
        <h2><?php _e('Flatter Settings', 'flatter'); ?> <span>Designed and Developed by <a href="http://www.drizzledesigns.in" target="_blank">DrizzleDesigns</a></span></h2>
    </div>
    <div class="flatter-content">
    	<!-- Nav tabs -->
        <ul class="nav nav-tabs" id="adminTab">
          <li class="active"><a href="#general" data-toggle="tab">General</a></li>
          <li><a href="#page" data-toggle="tab">Page / Social Link</a></li>
          <li><a href="#logo" data-toggle="tab">Logo</a></li>
          <li><a href="#category" data-toggle="tab">Category Icons</a></li>
          <li><a href="#adsense" data-toggle="tab">Adsense</a></li>
          <li><a href="#footerwidget" data-toggle="tab">Footer</a></li>
          <li><a href="#others" data-toggle="tab">Others</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="general">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
            	<input type="hidden" name="action_specific" value="settings" />
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Colors Option', 'flatter'); ?></label>
                    <div class="col-sm-4">
                        <select name="defaultColor@all" class="form-control">
                            <option value="green" <?php if(flatter_def_color() == 'green'){ echo 'selected="selected"' ; } ?>><?php _e('Default','flatter'); ?></option>
                            <option value="orange" <?php if(flatter_def_color() == 'orange'){ echo 'selected="selected"' ; } ?>><?php _e('Burnt Red','flatter'); ?></option>
                            <option value="yellow" <?php if(flatter_def_color() == 'yellow'){ echo 'selected="selected"' ; } ?>><?php _e('Gold','flatter'); ?></option>                
                            <option value="blue" <?php if(flatter_def_color() == 'blue'){ echo 'selected="selected"' ; } ?>><?php _e('Yale','flatter'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Search placeholder', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'flatter_theme') ); ?>">
                    </div>
                </div>
                
				<div class="form-group">
                    <label for="display" class="col-sm-2 control-label"><?php _e('Show lists as', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <select name="defaultShowAs@all" class="form-control">
                        <option value="gallery" <?php if(flatter_default_show_as() == 'gallery'){ echo 'selected="selected"' ; } ?>><?php _e('Gallery','flatter'); ?></option>
                        <option value="list" <?php if(flatter_default_show_as() == 'list'){ echo 'selected="selected"' ; } ?>><?php _e('List','flatter'); ?></option>
                     </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Premium shown', 'flatter'); ?></label>
                    <div class="col-sm-1">
                      <input type="text" class="form-control" name="premium_count" value="<?php echo osc_esc_html( osc_get_preference('premium_count', 'flatter_theme') ); ?>">
                      <small>Set 0 to all</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Promo Text', 'flatter'); ?></label>
                    <div class="col-sm-4">
                <input class="form-control" name="fpromo_text" placeholder="Post your ad Today. It's totally free!" value="<?php echo osc_esc_html( osc_get_preference('fpromo_text', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Contact Address', 'flatter'); ?></label>
                    <div class="col-sm-4">
                    	<input type="checkbox" name="contact_enable" value="1" <?php echo (osc_get_preference('contact_enable', 'flatter_theme') ? 'checked' : ''); ?> > Enable<br />
                    	<textarea class="form-control" rows="6" name="contact_address"><?php echo osc_esc_html( osc_get_preference('contact_address', 'flatter_theme') ); ?></textarea>
                        <small>HTML tag support</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Address Map', 'flatter'); ?></label>
                    <div class="col-sm-4">
                    	<input type="text" class="form-control" id="geocomplete" name="address_map" placeholder="Disneyland, Paris" value="<?php echo (osc_get_preference('address_map', 'flatter_theme')); ?>">
                        <div class="map_canvas"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Google Analytics</label>
                    <div class="col-sm-3">
                    	<input type="checkbox" name="google_analytics" value="1" <?php echo (osc_get_preference('google_analytics', 'flatter_theme') ? 'checked' : ''); ?> > Enable<br />
                    	<input class="form-control" name="g_analytics" placeholder="Enter Tracking ID" value="<?php echo osc_esc_html( osc_get_preference('g_analytics', 'flatter_theme') ); ?>" />
                        <small>ie.UA-47816636-1 (<a href="http://www.google.com/analytics/" rel="nofollow" target="_blank">Get it here</a>)</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Google Webmaster Tools</label>
                    <div class="col-sm-4">
                    	<input type="checkbox" name="google_webmaster" value="1" <?php echo (osc_get_preference('google_webmaster', 'flatter_theme') ? 'checked' : ''); ?> > Enable<br />
                    	<input class="form-control" name="g_webmaster" placeholder="Enter Meta Content" value="<?php echo osc_esc_html( osc_get_preference('g_webmaster', 'flatter_theme') ); ?>" />
                        <small>ie.QErL1uhzvjGYHQbu3lWgkic2UHryRLEo8gngTYmraFo - (<a href="http://www.google.com/webmasters/" rel="nofollow" target="_blank">Get it here</a>)</small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- General Settings -->
          
          <div class="tab-pane" id="page">
          	  <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" class="form-horizontal nocsrf" role="form" method="post">
				<input type="hidden" name="action_specific" value="page_settings" />
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Terms of use', 'flatter'); ?></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="terms_link" placeholder="<?php echo osc_base_url(); ?>terms-ofuse" value="<?php echo osc_esc_html( osc_get_preference('terms_link', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Privacy Policy', 'flatter'); ?></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="privacy_link" placeholder="<?php echo osc_base_url(); ?>privacy-policy" value="<?php echo osc_esc_html( osc_get_preference('privacy_link', 'flatter_theme') ); ?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Facebook', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="facebook_page" value="<?php echo osc_esc_html( osc_get_preference('facebook_page', 'flatter_theme') ); ?>">
                      <small>Facebook Page Name. <a href="https://www.facebook.com/pages/create/" rel="nofollow" target="_blank">Get it here</a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Twitter', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="twitter_page" value="<?php echo osc_esc_html( osc_get_preference('twitter_page', 'flatter_theme') ); ?>">
                      <small>Twitter Profile Name. <a href="https://twitter.com/signup" rel="nofollow" target="_blank">Get it here</a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Google+', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="gplus_page" value="<?php echo osc_esc_html( osc_get_preference('gplus_page', 'flatter_theme') ); ?>">
                      <small>Google+ Page Name. <a href="https://plus.google.com/pages/create" rel="nofollow" target="_blank">Get it here</a></small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php _e('Pinterest', 'flatter'); ?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pinterest_page" value="<?php echo osc_esc_html( osc_get_preference('pinterest_page', 'flatter_theme') ); ?>">
                      <small>Pinterest Page Name. <a href="https://www.pinterest.com/business/create/" rel="nofollow" target="_blank">Get it here</a></small>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
              </form>
          </div><!-- Page Settings -->
          
          <div class="tab-pane" id="logo">
          	<?php $logo_prefence = osc_get_preference('logo', 'flatter_theme'); ?>
				<?php if( is_writable( osc_uploads_path()) ) { ?>
                    <?php if($logo_prefence) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong><?php _e('Logo Preview', 'flatter') ?></strong></div>
                            <div class="panel-body">
                            <img border="0" alt="<?php echo osc_esc_html( osc_page_title() ); ?>" src="<?php echo flatter_logo_url();?>" />
                            <br /><br />
                            <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php');?>" method="post" class="form-horizontal nocsrf" enctype="multipart/form-data" >
                                <input type="hidden" name="action_specific" value="remove" />
                                <div class="form-group">
                                    <div class="col-sm-4">
                                      <button type="submit" id="button_remove" class="btn btn-danger"><?php echo osc_esc_html(__('Remove logo','flatter')); ?></button>
                                    </div>
                                </div>
                                <!-- field end -->
                            </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="flashmessage flashmessage-info flashmessage-inline" style="display: block;">
                            <p><?php _e('No logo has been uploaded yet', 'flatter'); ?></p>
                        </div>
                    <?php } ?>
                    <div class="panel panel-default">
                            <div class="panel-heading"><strong><?php _e('Upload logo', 'flatter') ?></strong></div>
                            <div class="panel-body">
                            <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal nocsrf">
                            <input type="hidden" name="action_specific" value="upload_logo" />
                            <div class="form-group">
                                <label for="search" class="col-sm-3 control-label"><?php _e('Logo image (png,gif,jpg)','flatter'); ?></label>
                                <div class="col-sm-4">
                                  <input type="file" name="logo" id="package" />
                                  <small><?php _e('Flatter theme preferred size of the logo is 200x50.', 'flatter'); ?></small>
                                </div>
                            </div>
                            <!-- field end -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-4">
                                  <button type="submit" id="button_save" class="btn btn-success"><?php echo osc_esc_html(__('Upload','flatter')); ?></button>
                                </div>
                            </div>
                            </form>
                            </div>
                    </div>
                    <?php } else { ?>
                    <div class="flashmessage flashmessage-error" style="display: block;">
                        <p>
                            <?php
                                $msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server', 'flatter'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                                $msg .= __("Osclass can't upload the logo image from the administration panel.", 'flatter') . ' ';
                                $msg .= __('Please make the aforementioned image folder writable.', 'flatter') . ' ';
                                echo $msg;
                            ?>
                        </p>
                        <p>
                            <?php _e('To make a directory writable under UNIX execute this command from the shell:','flatter'); ?>
                        </p>
                        <p class="command">
                            chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if( $logo_prefence ) { ?>
                    <div class="flashmessage flashmessage-inline flashmessage-warning"><?php _e('<strong>Note:</strong> Uploading another logo will overwrite the current logo.', 'flatter'); ?></div>
                    <?php } ?>
          </div><!-- Logo Settings -->
          
          <div class="tab-pane" id="category">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="category_settings" />
                <div class="flashmessage flashmessage-info flashmessage-inline" style="display: block;">
                	<h4 style="margin:0 0 5px 0">You can use <a href="http://fortawesome.github.io/Font-Awesome/icons/" rel="nofollow" target="_blank">FontAwesome Icons <i class="fa fa-external-link"></i></a> and <a href="http://getbootstrap.com/components/#glyphicons" rel="nofollow" target="_blank">Glyphicons <i class="fa fa-external-link"></i></a></h4>
                    <small>Example: <strong>fa fa-star</strong> or <strong>glyphicon glyphicon-star</strong></small>
                </div>
				<?php echo category_icons();?>
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Category Icon Settings -->
          
          <div class="tab-pane" id="adsense">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="adsense_settings" />
                <div class="form-group">
                    <label class="col-sm-2" style="text-align:right;">Google Adsense</label>
                    <div class="col-sm-4">
                        <div class="">
                		<label><input type="checkbox" name="google_adsense" value="1" <?php echo (osc_get_preference('google_adsense', 'flatter_theme') ? 'checked' : ''); ?> > Enable</label>
                        </div>
                	</div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Adsense Publisher ID</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ads_pubid" placeholder="ie.ca-pub-9187648588853292" value="<?php echo osc_esc_html( osc_get_preference('ads_pubid', 'flatter_theme') ); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Adsense Slot ID</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ads_slotid" placeholder="ie.3098786166" value="<?php echo osc_esc_html( osc_get_preference('ads_slotid', 'flatter_theme') ); ?>">
                    </div>
                </div>
                
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
          	</form>
          </div>
          
          <div class="tab-pane" id="footerwidget">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="footer_settings" />
                <div class="form-group">
                    <label class="col-sm-2">Facebook Like Box</label>
                    <div class="col-sm-4">
                    	<div class="">
                            <label><input type="checkbox" name="facebook_likebox" value="1" <?php echo (osc_get_preference('facebook_likebox', 'flatter_theme') ? 'checked' : ''); ?> > Enable</label>
                    	</div>
                    	
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2"><?php _e('Footer credit to Osclass', 'flatter'); ?></label>
                    <div class="col-sm-4">
                        <div class="">
                            <label><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'flatter_theme') ? 'checked' : ''); ?> > <?php _e('I want to help Osclass by linking to <a href="http://osclass.org/" target="_blank">osclass.org</a>', 'flatter'); ?></label>
                            </div>
                    </div>
                </div>
                
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Footer Settings -->
          
          <div class="tab-pane" id="others">
          	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>" method="post" class="form-horizontal nocsrf">
    			<input type="hidden" name="action_specific" value="other_settings" />
                <div class="form-group">
                    <label class="col-sm-2" style="text-align:right;">Subscription on search</label>
                    <div class="col-sm-4">
                        <div class="">
                		<label><input type="checkbox" name="subscribe_show" value="1" <?php echo (osc_get_preference('subscribe_show', 'flatter_theme') ? 'checked' : ''); ?> > Enable</label>
                        </div>
                	</div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" style="text-align:right;">Useful Information</label>
                    <div class="col-sm-4">
                        <div class="">
                		<label><input type="checkbox" name="usefulinfo_show" value="1" <?php echo (osc_get_preference('usefulinfo_show', 'flatter_theme') ? 'checked' : ''); ?> > Enable</label><textarea class="form-control" rows="6" name="usefulinfo_msg"><?php echo osc_esc_html( osc_get_preference('usefulinfo_msg', 'flatter_theme') ); ?></textarea>
                        <small>HTML tag support</small>
                        </div>
                	</div>
                </div>
                
                <div class="form-actions">
                	<button type="submit" class="col-sm-offset-2 btn btn-success"><?php _e('Save changes', 'flatter'); ?></button>
                </div>
        	</form>
          </div><!-- Footer Settings -->
        </div>
    </div>
</div>

<script>
  $(function(){
  	var options = {
          map: ".map_canvas",
          //location: "NYC"
        };
	$("#geocomplete").geocomplete();
  });
</script>
<script>
$(document).ready(function() {
    var text_max = 300;
    $('#textarea_limit').html(text_max + ' characters remaining');

    $('#welcome_text').keyup(function() {
        var text_length = $('#welcome_text').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_limit').html(text_remaining + ' characters remaining');
    });
});
$('#adminTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#adminTab a[href="' + hash + '"]').tab('show');
</script>