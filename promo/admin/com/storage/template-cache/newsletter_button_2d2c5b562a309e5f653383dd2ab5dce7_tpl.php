<?php $IEM = $tpl->Get('IEM'); ?><script>
	$('#AddSplitTestButton').attr('onclick', '');
	$('#AddSplitTestButton').click(function() {
		if ($('input.UICheckboxToggleRows:checked').length < 2) {
			alert('<?php echo $tpl->Get('alert_msg'); ?>');
			return false;
		}
		var ids = $('input.UICheckboxToggleRows:checked').map(function() { return $(this).val(); });
		Application.Util.submitPost('<?php echo $tpl->Get('url'); ?>', {'passthru_campaigns': $.makeArray(ids)});
		return false;
	});
</script>
