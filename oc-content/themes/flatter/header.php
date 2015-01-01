<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
<meta charset="utf-8">
<title><?php echo meta_title(); ?></title>
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if( osc_get_preference('google_webmaster', 'flatter_theme') !== '0') { ?>
<meta name="google-site-verification" content="<?php echo osc_get_preference("g_webmaster", "flatter_theme"); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?><link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/><?php } ?>
<link rel="shortcut icon" href="<?php echo osc_current_web_theme_url('favicon.ico'); ?>">
<link href="<?php echo osc_current_web_theme_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/style.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />
<?php $getColorScheme = flatter_def_color(); ?>
<?php osc_enqueue_style(''.$getColorScheme.'green', osc_current_web_theme_url('css/'.$getColorScheme.'.css')); ?>
<link href="<?php echo osc_current_web_theme_url('css/animate.min.css'); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/owl.carousel.css'); ?>" type="text/css" media="screen" />
<link href="<?php echo osc_current_web_theme_url('css/responsivefix.css'); ?>" rel="stylesheet" type="text/css" />
<?php osc_run_hook('header'); ?>
<?php if(!osc_is_publish_page()) { ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/owl.carousel.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/global.js'); ?>"></script>
<?php } ?>
<!--[if lt IE 9]>
<script src="<?php echo osc_current_web_theme_url('js/html5shiv.min.js'); ?>"></script>
<script src="<?php echo osc_current_web_theme_url('js/respond.min.js'); ?>"></script>
<![endif]-->
</head>
<body class="<?php flatter_body_class(); ?>">
	<p id="back-top"><a href="#top"><span></span></a></p>
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="<?php echo osc_base_url(); ?>"><?php echo logo_header(); ?></a></h1>
        </div>
        <div class="navbar-collapse collapse">
         
          
          <ul class="nav navbar-nav navbar-right">
            <?php if( osc_users_enabled() ) { ?>
			<?php if( osc_is_web_user_logged_in() ) { ?>
                <li class="dropdown profilepic">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="">
                	<?php if (function_exists("profile_picture_show")) { ?>
						<?php current_user_picture(); ?>
                    <?php } else { ?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_logged_user_email() ) ) ); ?>?s=20&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" />
                    <?php } ?>
					<?php echo osc_logged_user_name(); ?>&nbsp;&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'flatter'); ?></a></li>
                        <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'flatter'); ?></a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'flatter') ; ?></a></li>
                <?php if(osc_user_registration_enabled()) { ?>
                <li><a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register for a free account', 'flatter'); ?></a></li>
                <?php }; ?>
            <?php } ?>
            <?php } ?>
            
            	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php _e('Help','flatter')?>&nbsp;&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">                    
                    	<?php osc_reset_static_pages();
                    		$i = 0;
                    	while( osc_has_static_pages() && $i<3 ) { ?>
                            <li><a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a></li>
                            <?php $i++; ?>
                        <?php } ?>
                    </ul>
                </li>
            <?php if ( osc_count_web_enabled_locales() > 1) { ?>
				<?php osc_goto_first_locale(); ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-globe"></i></a>
                <?php $i = 0;  ?>
                    <ul class="dropdown-menu" role="menu">
                    <?php while ( osc_has_web_enabled_locales() ) { 
                    <li><a id="<?php echo osc_locale_code(); ?>" rel="nofollow" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></li><?php if( $i == 0 ) { echo ""; } ?>
                        <?php $i++; ?>
                    <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
           		<li class="publish"><a href="<?php echo osc_item_post_url() ; ?>"><?php _e("Publish your ad for free", 'flatter');?></a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- Navbar -->
    <?php if (osc_show_flash_message()) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 notification">
                <?php osc_show_flash_message(); ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if (osc_search_page()) { ?>
	<?php osc_breadcrumb(); ?><!-- Don't Remove - Require for Refine Category-->
    <?php } ?>