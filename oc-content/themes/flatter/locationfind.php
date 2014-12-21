<div class="modal fade" id="locationSelect" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            	<h4 class="modal-title" id="myModalLabel"><i class="fa fa-map-marker"></i> <?php echo _e('Find by location','flatter')?></h4>
          	</div>
          	
            <div class="modal-body clearfix">
            	<form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                <input type="hidden" name="page" value="search"/>
                <?php $conn = getConnection(); $aStates = $conn->osc_dbFetchResults("SELECT * FROM %st_country ", DB_TABLE_PREFIX); ?>
                <?php if (count($aStates) >= 0 ) { ?>
                <div class="col-md-4 col-sm-4">
                <select id="countryId" name="sCountry" class="form-control">
                    <option value=""><?php _e("Select a country..."); ?></option>
                    <?php foreach($aStates as $state) { ?> 
                    <option value="<?php echo $state['pk_c_code']; ?>"><?php echo $state['s_name'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?>
                
                <?php  if(count($aRegions) >= 0 ) { ?>
                <div class="col-md-4 col-sm-4">
                <select id="regionId" name="sRegion" class="form-control">
                    <option value=""><?php _e("Select a region..."); ?></option>
                    <?php foreach($aRegions as $region) { ?>
                    <option id="idregioni"  value="<?php echo $region['pk_i_id']; ?>"<?php if(Params::getParam('sRegion') == $region['pk_i_id']) { ?>selected<?php } ?>><?php echo $region['s_name']; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?>
                
                <?php if (count($aCities) >= 0 ) {?>
                <div class="col-md-4 col-sm-4">
                <select name="sCity" id="cityId" class="form-control"> 
                    <option value=""><?php _e("Select a city..."); ?></option>
                    <?php foreach($aCities as $city) { ?>      
                    <option value="<?php echo $city['pk_i_id']; ?>"<?php if(Params::getParam('sCity') == $city['pk_i_id']) { ?>selected<?php } ?>><?php echo $city['s_name'] ; ?></option>
                    <?php } ?>
                </select>
                </div>
                <?php } ?> 
                
          	</div>
          	<div class="modal-footer">
            	<button type="submit" id="submit" class="btn btn-success"><?php _e("Search", 'flatter');?></button>
          	</div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$("#countryId").live("change",function(){
		var pk_c_code = $(this).val();
		<?php if($path=="admin") { ?>
			var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
		<?php } else { ?>
			var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
		<?php }; ?>
		var result = '';

		if(pk_c_code != '') {

			$("#regionId").attr('disabled',false);
			$("#cityId").attr('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;
					
					if(length > 0) {

						result += '<option value=""><?php _e("Select a region..."); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("#region").before('<select class="form-control" name="regionId" id="regionId" ></select>');
						$("#region").remove();

						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();
						
						$("#regionId").val("");

					} else {

						$("#regionId").before('<input class="form-control" placeholder="<?php _e("Enter region..."); ?>"type="text" name="region" id="region" />');
						$("#regionId").remove();
						
						$("#cityId").before('<input class="form-control" placeholder="<?php _e("Enter city..."); ?>" type="text" name="city" id="city" />');
						$("#cityId").remove();
						
					}

					$("#regionId").html(result);
					$("#cityId").html('<option selected value=""><?php _e("Select a city..."); ?></option>');
				}
			 });

		 } else {

			 // add empty select
			 $("#region").before('<select name="regionId" class="form-control" id="regionId" ><option value=""><?php _e("Select a region..."); ?></option></select>');
			 $("#region").remove();
			 
			 $("#city").before('<select name="cityId" class="form-control" id="cityId" ><option value=""><?php _e("Select a city..."); ?></option></select>');
			 $("#city").remove();

			 if( $("#regionId").length > 0 ){
				 $("#regionId").html('<option value=""><?php _e("Select a region..."); ?></option>');
			 } else {
				 $("#region").before('<select name="regionId" class="form-control" id="regionId" ><option value=""><?php _e("Select a region..."); ?></option></select>');
				 $("#region").remove();
			 }
			 if( $("#cityId").length > 0 ){
				 $("#cityId").html('<option value=""><?php _e("Select a city..."); ?></option>');
			 } else {
				 $("#city").before('<select name="cityId" class="form-control" id="cityId" ><option value=""><?php _e("Select a city..."); ?></option></select>');
				 $("#city").remove();
			 }
			 $("#regionId").attr('disabled',true);
			 $("#cityId").attr('disabled',true);
		 }
	});

	$("#regionId").live("change",function(){
		var pk_c_code = $(this).val();
		<?php if($path=="admin") { ?>
			var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php } else { ?>
			var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php }; ?>

		var result = '';

		if(pk_c_code != '') {
			
			$("#cityId").attr('disabled',false);
			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;
					if(length > 0) {
						result += '<option selected value=""><?php _e("Select a city..."); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();
					} else {
						result += '<option value=""><?php _e('No results') ?></option>';
						$("#cityId").before('<input type="text" name="city" id="city" />');
						$("#cityId").remove();
					}
					$("#cityId").html(result);
				}
			 });
		 } else {
			$("#cityId").attr('disabled',true);
		 }
	});

	if( $("#regionId").attr('value') == "")  {
		$("#cityId").attr('disabled',true);
	}

	if($("#countryIds").length != 0) {
		if( $("#countryIds").attr('type').match(/select-one/) ) {
			if( $("#countryIds").attr('value') == "")  {
				$("#regionId").attr('disabled',true);
			}
		}
	}
});
</script>