<script type="text/javascript">
$(document).ready(function(){
    $(".btn-sub").click(function(){
        $.post('<?php echo osc_base_url(true); ?>', {email:$("#alert_email").val(), userid:$("#alert_userId").val(), alert:$("#alert").val(), page:"ajax", action:"alerts"},
            function(data){
                if(data==1) { alert('<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'flatter')); ?>'); }
                else if(data==-1) { alert('<?php echo osc_esc_js(__('Invalid email address', 'flatter')); ?>'); }
                else { alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'flatter')); ?>');
                };
        });
        return false;
    });

    var sQuery = '<?php echo osc_esc_js(AlertForm::default_email_text()); ?>';

    if($('input[name=alert_email]').val() == sQuery) {
        $('input[name=alert_email]').css('color', 'gray');
    }
    $('input[name=alert_email]').click(function(){
        if($('input[name=alert_email]').val() == sQuery) {
            $('input[name=alert_email]').val('');
            $('input[name=alert_email]').css('color', '');
        }
    });
    $('input[name=alert_email]').blur(function(){
        if($('input[name=alert_email]').val() == '') {
            $('input[name=alert_email]').val(sQuery);
            $('input[name=alert_email]').css('color', 'gray');
        }
    });
    $('input[name=alert_email]').keypress(function(){
        $('input[name=alert_email]').css('background','');
    })
});
</script>

<div class="widget subscribe hidden-xs hidden-sm">
    <h3><?php _e('Subscribe to this search', 'flatter'); ?></h3>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert" class="nocsrf">
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>

            <?php if(osc_is_web_user_logged_in()) { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <div class="form-group">
                <input type="text" class="form-control" value="<?php echo osc_logged_user_email() ?>" name="alert_email" id="alert_email">
                </div>
                <?php //AlertForm::email_hidden(); ?>

            <?php } else { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php //AlertForm::email_text(); ?>
                <div class="form-group">
				<input type="text" class="form-control" placeholder="<?php _e('Enter your e-mail'); ?>" name="alert_email" id="alert_email">
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-default btn-sub"><?php _e('Subscribe now', 'flatter'); ?></button>
    </form>
</div>