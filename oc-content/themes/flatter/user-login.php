<?php
	// meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('login');
	osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div class="loginbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Access to your account', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form action="<?php echo osc_base_url(true); ?>" name="login" id="login" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login_post" />
                    <div class="form-group">
                    	<input type="text" name="email" class="form-control" id="email" placeholder="<?php _e('E-mail', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="password" class="form-control" id="password" placeholder="<?php _e('Password', 'flatter'); ?>">
                  	</div>
                    <div class="clearfix">
                    	<button type="submit" class="btn btn-success"><?php _e("Log in", 'flatter');?></button>
                        <div class="checkbox pull-right">
                            <?php UserForm::rememberme_login_checkbox();?> <label for="remember"><?php _e('Remember me', 'flatter'); ?></label>
                        </div>
                    </div>
                    <?php if (function_exists("fbc_button")) { ?>
						<div class="divider">
                            <hr />
                            <span>OR</span>
                        </div>
                        <?php fbc_button(); ?>
                        <?php //echo osc_gconnnect_button(); ?>
                        <!--<button type="submit" class="btn btn-primary fb"><i class="fa fa-facebook-square"></i> <?php //_e("Login with Facebook", 'flatter');?></button>-->
                    <?php } ?>
                    <div class="panel-footer"><a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'flatter'); ?></a>
                    <a class="pull-right" href="<?php echo osc_recover_user_password_url(); ?>" data-toggle="tooltip" data-placement="left" title="<?php _e("Forgot password?", 'flatter'); ?>"><i class="fa fa-question-circle fa-lg"></i></a></div>
                </form>
    		</div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$("form[name=login]").validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		},
		messages: {
                email: {
                    required: "Email: this field is required.",
                    email: "Invalid email address."
                }
            },
		errorLabelContainer: "#error_list",
		wrapper: "li",
		invalidHandler: function(form, validator) {
			$('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
		},
		submitHandler: function(form){
			$('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
			form.submit();
		}
	});
}); 
</script>
<?php osc_current_web_theme_path('footer.php') ; ?>