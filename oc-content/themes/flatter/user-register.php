<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
?>
<div class="registerbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Register an account for free', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                	<div class="form-group">
                    	<input type="text" name="s_name" class="form-control" id="s_name" placeholder="<?php _e('Name', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="text" name="s_email" class="form-control" id="s_email" placeholder="<?php _e('E-mail', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="s_password" class="form-control" id="s_password" placeholder="<?php _e('Password', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="s_password2" class="form-control" id="s_password2" placeholder="<?php _e('Repeat password', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<?php echo responsive_recaptcha(); ?>
                    	<?php osc_show_recaptcha('register'); ?>
                    </div>
                    <div class="clearfix">
                    	<button type="submit" class="btn btn-success cbtn"><?php _e("Create", 'flatter'); ?></button>
                        <div class="col-md-8 col-sm-8 col-xs-8 pull-right terms">
                            <small>By register, you agree to our <a href="<?php echo osc_get_preference("terms_link", "flatter_theme"); ?>">terms of use</a> and <a href="<?php echo osc_get_preference("privacy_link", "flatter_theme"); ?>">privacy policy</a>.<?php //_e('By register, you agree to our terms of use and privacy policy.', 'flatter'); ?></small>
                        </div>
                    </div>
                    <?php if (function_exists("fbc_button2")) { ?>
						<div class="divider">
                            <hr />
                            <span>OR</span>
                        </div>
                        <?php fbc_button2(); ?>
                        <!--<button type="submit" class="btn btn-primary fb"><i class="fa fa-facebook-square"></i> <?php //_e("Login with Facebook", 'flatter');?></button>-->
                    <?php } ?>
                    <div class="panel-footer">Have an account? <a href="<?php echo osc_user_login_url(); ?>"><strong><?php _e("Login", 'flatter'); ?></strong></a>
                    <!--<a class="pull-right" href="<?php echo osc_recover_user_password_url(); ?>" data-toggle="tooltip" data-placement="left" title="<?php _e("Forgot password?", 'flatter'); ?>"><i class="fa fa-question-circle"></i></a>--></div>
                </form>
    		</div>
            </div>
        </div>
    </div>
</div>

<?php UserForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>