<?php
 
    // meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','flatter_nofollow_construct');
    } else {
        osc_add_hook('header','flatter_follow_construct');
    }

    flatter_add_body_class('searchpage');
    $listClass = '';
    $buttonClass = '';
    if(osc_search_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
	osc_enqueue_style('jquery-ui', osc_assets_url('css/jquery-ui/jquery-ui.css'));
	osc_enqueue_script('jquery-ui');
	?>
    
<?php osc_current_web_theme_path('header.php') ; ?>
<div id="columns">
	<div class="container">
    	<?php //osc_run_hook('search_ads_listing_top'); ?>
    	<div class="row sbreadcrumb">
        	<?php $breadcrumb = osc_breadcrumb('', false, get_breadcrumb_lang());
				if( $breadcrumb !== '') { ?>
					<?php echo $breadcrumb; ?>
			<?php } ?>
        </div>
        
    	<div class="row">
        	<div class="col-md-3 col-sm-4 hidden-xs">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            
        	<div class="col-md-9 col-sm-8">
            	<div class="page-title">
					<?php if(search_title()) { ?>
                    <h2><?php echo search_title(); ?></h2>
                    <?php } else { ?>
                    <h2><?php _e('Search results'); ?></h2>
                    <?php } ?>
                    <span class="counter-search">
                    <?php $search_number = flatter_search_number();
                    printf(__('%1$d - %2$d of %3$d listings', 'flatter'), $search_number['from'], $search_number['to'], $search_number['of']); ?>
                    </span>
                </div>
            	<?php if(osc_count_items() >= 1) { ?>
            	<div class="actions clearfix">
                	<div class="togglebutton <?php echo $buttonClass; ?> pull-left hidden-xs">
                       <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>" class="list-button" data-class-toggle="listing-list" data-destination="#listing-card-list"><i class="fa fa-th-list"></i> <?php _e('List','flatter'); ?></a>
                       <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><i class="fa fa-th"></i> <?php _e('Grid','flatter'); ?></a>
                  	</div><!-- Togglebutton -->
                	<div class="sortby pull-right">
						<?php
                          $orders = osc_list_orders();
                          $current = '';
                          foreach($orders as $label => $params) {
                              $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                              if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                                  $current = $label;
                              }
                          }
                          ?>
						<div class="btn-group">
                          <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo $current; ?><span><i class="fa fa-sort"></i></span></button>
                          <?php $i = 0; ?>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <?php
                              foreach($orders as $label => $params) {
                                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                      <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                  <?php } else { ?>
                                      <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                  <?php } ?>
                                  <?php $i++; ?>
                              <?php } ?>
                            </ul>
						</div>
                	</div><!-- SortBy -->
                </div>
                <?php } ?>
            	
				<?php if(osc_count_items() == 0) { ?>
                <div id="content">
                	<p class="empty"><?php printf(__('There are no results matching "%s"', 'flatter'), osc_search_pattern()) ; ?></p>
                </div>
                <?php } else { ?>
                <div id="content premium">
                
                <?php
                    $i = 0;
                    osc_get_premiums('3');
                    if(osc_count_premiums() > 0) {
                    //echo '<h5>'.__('Premium listings','flatter').'</h5>';
                    View::newInstance()->_exportVariableToView("listType", 'premiums');
                    View::newInstance()->_exportVariableToView("listClass",$listClass.' premium-list');
                    osc_current_web_theme_path('loop.php');
                    }
                ?>
                </div>
                <div id="content">
                 <?php if(osc_count_items() > 0) {
                    //echo '<h5>'.__('Listings','flatter').'</h5>';
                    View::newInstance()->_exportVariableToView("listType", 'items');
                    View::newInstance()->_exportVariableToView("listClass",$listClass);
                    osc_current_web_theme_path('loop.php');
                    }
                ?>
                </div>
                <div class="pagination" >
                      <?php echo osc_search_pagination(); ?>
                 </div>
                <?php } ?>
                <!-- Search Content End -->
            </div>
            
            <!-- Only for Mobile View -->
            <div class="col-md-3 col-sm-4 visible-xs">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            
        </div>
	</div>
</div>
     
<?php osc_current_web_theme_path('footer.php') ; ?>