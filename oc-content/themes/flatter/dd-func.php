<?php function responsive_recaptcha() { ?>
<script type="text/javascript">
 var RecaptchaOptions = {
	theme : 'custom',
	custom_theme_widget: 'responsive_recaptcha'
 };
</script>
<style type="text/css">
#responsive_recaptcha {
  background-color: #b71800;
  padding: 0.5em;
  border-radius: 1em;
  position: relative;
  overflow: auto;
  max-width: 480px;
  font: 13px "Roboto", Helvetica, Arial, sans-serif;
  color: #ffffff;
}
#responsive_recaptcha a {
  color: #ffffff;
  text-decoration: none;
}
#responsive_recaptcha img,
#responsive_recaptcha #recaptcha_image {
  width: 100% !important;
  height: auto !important;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  border-radius: 0.5em;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
#responsive_recaptcha .solution {
  margin-top: 0.5em;
  padding: 0.5em;
  padding-top: 1em;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  border-radius: 0.5em;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  background-color: #fbe098;
  color: #000000;
  display: block;
}
#responsive_recaptcha .solution input {
  display: block;
  width: 100%;
  margin: 0.5em auto;
  -webkit-appereance: none;
  border: 1px solid #f7c236;
  outline: none;
}
#responsive_recaptcha .solution input:focus {
  border-color: #b71800;
}
#responsive_recaptcha .options {
  margin-top: 0.5em;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  border-radius: 0.5em;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
#responsive_recaptcha .options a {
  background-color: #c5523d;
  display: block;
  padding: 3px 10px;
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
  border-right: 1px solid #000000;
}
#responsive_recaptcha .options a:first-child {
  border-radius: 0.5em 0.5em 0 0;
}
#responsive_recaptcha .options a:last-child {
  border-radius: 0 0 0.5em 0.5em;
  border-bottom: 1px solid #000000;
}
@media screen and (min-width: 480px) {
  #responsive_recaptcha .solution {
    float: left;
    width: 66%;
    margin-top: 0.5em;
    padding: 1em;
  }
  #responsive_recaptcha .solution input {
    margin: 0.35em auto;
    width: 90%;
  }
  #responsive_recaptcha .options {
    float: right;
    width: 34%;
    padding-left: 0.5em;
  }
}
</style>
<div id="responsive_recaptcha" style="display:none">
	<div id="recaptcha_image"></div>
	<div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
	<label class="solution">
		<!--<span class="recaptcha_only_if_image">Type the two words:</span>
		<span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>-->
		<input type="text" id="recaptcha_response_field" class="form-control" placeholder="Enter the words above" name="recaptcha_response_field" />
	</label>
	<div class="options">
		<a href="javascript:Recaptcha.reload()" id="icon-reload"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Reload</a>
		<a class="recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio"><i class="fa fa-volume-up"></i>&nbsp;&nbsp;Audio</a>
		<a class="recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')" id="icon-image"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Image</a>
		<a href="javascript:Recaptcha.showhelp()" id="icon-help"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Help</a>
	</div>
</div>
<?php } ?>