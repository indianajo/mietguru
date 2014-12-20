<?php
    osc_add_hook('header','flatter_nofollow_construct');
	
	osc_enqueue_script('tabber');
	osc_enqueue_style('tabs', osc_current_web_theme_url('css/tabs.css'));
    flatter_add_body_class('userpage user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Dashboard', 'flatter');
    }
 	$locales   = __get('locales');
    $osc_user = osc_user();
?>

<?php osc_current_web_theme_path('header.php') ; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".form-group input, .form-group select, .form-group textarea").addClass("form-control");
	});
</script>
<div id="columns">
	<div class="container">
    	<div class="row">
			<div class="col-sm-3 hidden-xs">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            <div class="col-sm-9">
            	<div class="page-title">
                	<h2><?php _e('Dashboard', 'flatter'); //Update account ?></h2>
                </div>
                <div id="content">
                	<!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#editprofile" role="tab" data-toggle="tab"><?php _e('Account', 'flatter'); ?></a></li>
                      <li><a href="#editusername" role="tab" data-toggle="tab"><?php _e('Username', 'flatter'); ?></a></li>
                      <li><a href="#editemail" role="tab" data-toggle="tab"><?php _e('Email', 'flatter'); ?></a></li>
                      <li><a href="#editpassword" role="tab" data-toggle="tab"><?php _e('Password', 'flatter'); ?></a></li>
                      <li><a href="#deleteprofile" role="tab" data-toggle="tab"><?php _e('Delete account', 'flatter'); ?></a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="editprofile">
                      	<?php UserForm::location_javascript(); ?>
                        <div class="edit-profile">
                            <?php //profile_picture_upload(); ?>
                            <ul id="error_list"></ul>
                            <form action="<?php echo osc_base_url(true); ?>" class="form-horizontal" method="post">
                                <input type="hidden" name="page" value="user" />
                                <input type="hidden" name="action" value="profile_post" />
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name"><?php _e('Name', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" name="s_name" id="s_name" value="<?php echo osc_user_name(); ?>" class="form-control"><?php //UserForm::name_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="user_type"><?php _e('User type', 'flatter'); ?></label>
                                    <div class="col-md-3">
                                        <?php UserForm::is_company_select(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="phoneMobile"><?php _e('Cell phone', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_phone_mobile(); ?>" name="s_phone_mobile" id="s_phone_mobile" class="form-control"><?php //UserForm::mobile_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="phoneLand"><?php _e('Phone', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_phone_land(); ?>" name="s_phone_land" id="s_phone_land" class="form-control"><?php //UserForm::phone_land_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="country"><?php _e('Country', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="region"><?php _e('Region', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="city"><?php _e('City', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="city_area"><?php _e('City area', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_city_area();?>" name="cityArea" id="cityArea" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"l for="address"><?php _e('Address', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_address();?>" name="address" id="address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="webSite"><?php _e('Website', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_website(); ?>" name="s_website" id="s_website" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="s_info"><?php _e('Description', 'flatter'); ?></label>
                                    <div class="col-md-8">
                                        <?php UserForm::multilanguage_info($locales, osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-6">
                                        <button type="submit" class="btn btn-primary"><?php _e("Update", 'flatter');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div><!-- Edit Profile -->
                      <div class="tab-pane" id="editusername">
                      	<h4><?php _e('Change username', 'flatter'); ?></h4>
                        <div class="change-username">
                            <ul id="error_list"></ul>
                            <form action="<?php echo osc_base_url(true); ?>" class="form-horizontal" method="post" id="change-username">
                                <input type="hidden" name="page" value="user" />
                                <input type="hidden" name="action" value="change_username_post" />
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="s_username"><?php _e('Username', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" name="s_username" id="s_username" value="" />
                                        <div id="available"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-6">
                                        <button type="submit" class="btn btn-primary"><?php _e("Update", 'flatter');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('form#change-username').validate({
                                rules: {
                                    s_username: {
                                        required: true
                                    }
                                },
                                messages: {
                                    s_username: {
                                        required: '<?php echo osc_esc_js(__("Username: this field is required", "flatter")); ?>.'
                                    }
                                },
                                errorLabelContainer: "#error_list",
                                wrapper: "li",
                                invalidHandler: function(form, validator) {
                                    $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
                                },
                                submitHandler: function(form){
                                    $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                                    form.submit();
                                }
                            });
                        
                            var cInterval;
                            $("#s_username").keydown(function(event) {
                                if($("#s_username").attr("value")!='') {
                                    clearInterval(cInterval);
                                    cInterval = setInterval(function(){
                                        $.getJSON(
                                            "<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
                                            {"s_username": $("#s_username").attr("value")},
                                            function(data){
                                                clearInterval(cInterval);
                                                if(data.exists==0) {
                                                    $("#available").text('<?php echo osc_esc_js(__("The username is available", "flatter")); ?>');
                                                } else {
                                                    $("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "flatter")); ?>');
                                                }
                                            }
                                        );
                                    }, 1000);
                                }
                            });
                        
                        });
                        </script>
                      </div>
                      <div class="tab-pane" id="editemail">
                      	<h4><?php _e('Change e-mail', 'flatter'); ?></h4>
                        <div class="change-email">
                            <ul id="error_list"></ul>
                            <form action="<?php echo osc_base_url(true); ?>" class="form-horizontal" id="change-email" method="post">
                                <input type="hidden" name="page" value="user" />
                                <input type="hidden" name="action" value="change_email_post" />
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email"><?php _e('Current e-mail', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" disabled="disabled" class="form-control" value="<?php echo osc_logged_user_email(); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="new_email"><?php _e('New e-mail', 'flatter'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="new_email" id="new_email" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-6">
                                        <button type="submit" class="btn btn-primary"><?php _e("Update", 'flatter');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('form#change-email').validate({
                                    rules: {
                                        new_email: {
                                            required: true,
                                            email: true
                                        }
                                    },
                                    messages: {
                                        new_email: {
                                            required: '<?php echo osc_esc_js(__("Email: this field is required", "flatter")); ?>.',
                                            email: '<?php echo osc_esc_js(__("Invalid email address", "flatter")); ?>.'
                                        }
                                    },
                                    errorLabelContainer: "#error_list",
                                    wrapper: "li",
                                    invalidHandler: function(form, validator) {
                                        $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
                                    },
                                    submitHandler: function(form){
                                        $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                                        form.submit();
                                    }
                                });
                            });
                        </script>
                      </div>
                      <div class="tab-pane" id="editpassword">
                      	<h4><?php _e('Change password', 'flatter'); ?></h4>
                        <div class="form-container form-horizontal">
                            <div class="resp-wrapper">
                                <ul id="error_list"></ul>
                                <form action="<?php echo osc_base_url(true); ?>" method="post">
                                    <input type="hidden" name="page" value="user" />
                                    <input type="hidden" name="action" value="change_password_post" />
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="password"><?php _e('Current password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" id="password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="new_password"><?php _e('New password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="new_password" id="new_password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="new_password2"><?php _e('Repeat new password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="new_password2" id="new_password2" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-6">
                                            <button type="submit" class="btn btn-primary"><?php _e("Update", 'flatter');?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
</div>
                      </div>
                      <div class="tab-pane" id="deleteprofile">
                      	<div class="delete-profile">
                            <p><?php _e('Are you sure you want to delete your account?', 'flatter'); ?></p>
                            <a class="btn btn-danger" onclick="javascript:return confirm('<?php echo osc_esc_js(__('Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_base_url().'?page=user&action=delete&id='.osc_logged_user_id().'&secret='.osc_user_field("s_secret"); ?>" class="opt_delete_account">Delete</a>
                        </div>
                      </div>
                    </div>
                	
                </div>
            </div>
            
            <div class="col-sm-3 visible-xs" style="margin-top:15px;">
            	<?php osc_run_hook('before-main'); ?>
            </div>
		</div>
    </div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>