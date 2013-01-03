<?php $IEM = $tpl->Get('IEM'); ?><script>
	$(function() {
		$(SendPage.getFormObject().module_tracker_google_use).click(function() {
			if(this.checked) {
				$('.Module_Tracker_Google_Options').show();

				var frm = SendPage.getFormObject();
				var name = SendPage.getCampaignName();

				if(frm.module_tracker_google_options_name.value == '' && name != '') frm.name.value = name;
			} else $('.Module_Tracker_Google_Options').hide();
		});

		$(SendPage.getFormObject().newsletter).change(function() {
			if(this.selectedIndex == 0) return;

			var frm = SendPage.getFormObject();
			var change = false;

			if(SendPage.varPrevNewsletterIdx != 0) {
				if(frm.module_tracker_google_options_name.value == '' || frm.module_tracker_google_options_name.value == this[SendPage.varPrevNewsletterIdx].text)
					change = true;
			} else change = true;

			if(change) frm.module_tracker_google_options_name.value = this[this.selectedIndex].text;
		});

		$(SendPage.getFormObject().module_tracker_google_options_name).focus(function() { this.select(); });
	});

	$(function() {
		var frm = SendPage.getFormObject();
		if(frm.newsletter.selectedIndex != 0)
			frm.module_tracker_google_options_name.value = frm.newsletter[frm.newsletter.selectedIndex].text;
	});

	SendPage.addCheckFormObserver(function() {
		var frm = SendPage.getFormObject();

		if(!frm.tracklinks.checked) frm.module_tracker_google_use.checked = false;
		else {
			if(frm.module_tracker_google_use.checked) {
				if(frm.module_tracker_google_options_name.value.trim() == '') {
					alert("<?php print GetLang('MODULE_Tracker_Google_ErrorRequireCampaignName'); ?>");
					frm.module_tracker_google_options_name.focus();
					return false;
				}

				if(frm.module_tracker_google_options_source.value.trim() == '') {
					alert("<?php print GetLang('MODULE_Tracker_Google_ErrorRequireSourceName'); ?>");
					frm.module_tracker_google_options_source.focus();
					return false;
				}
			}
		}

		return true;
	});
</script>
<div id="module_tracker_google" class="Module_Tracker_Options">
	<div>
		<label for="module_tracker_google_use">
			<input type="checkbox" name="module_tracker_google_use" id="module_tracker_google_use" value="1" />
			<?php print GetLang('MODULE_Tracker_Google_UseExplain'); ?>
		</label>&nbsp;<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MODULE_Tracker_Google_UseTracker')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MODULE_Tracker_Google_UseTracker')); ?></span></span>
	</div>
	<div class="Module_Tracker_Google_Options" style="display: none; padding:5px 0px 0px 20px">
		<?php echo $tpl->Get('HTML','Required'); ?> <?php print GetLang('MODULE_Tracker_Google_CampaignNameExplain'); ?>:<br />
		&nbsp;&nbsp;&nbsp;<input type="text" name="module_tracker_google_options_name" id="module_tracker_google_options_name" value="" class="Field250"/>
		<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MODULE_Tracker_Google_CampaignName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MODULE_Tracker_Google_CampaignName')); ?></span></span>
	</div>
	<div class="Module_Tracker_Google_Options" style="display: none; padding:5px 0px 0px 20px">
		<?php echo $tpl->Get('HTML','Required'); ?> <?php print GetLang('MODULE_Tracker_Google_SourceNameExplain'); ?>:<br />
		&nbsp;&nbsp;&nbsp;<input type="text" name="module_tracker_google_options_source" id="module_tracker_google_options_source" value="<?php print GetLang('MODULE_Tracker_Google_DefaultSourceName'); ?>" class="Field250"/>
		<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('MODULE_Tracker_Google_SourceName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_MODULE_Tracker_Google_SourceName')); ?></span></span>
	</div>
</div>