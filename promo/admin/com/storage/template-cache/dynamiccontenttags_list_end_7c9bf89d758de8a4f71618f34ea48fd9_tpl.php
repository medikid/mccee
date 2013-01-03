<?php $IEM = $tpl->Get('IEM'); ?><script>
	$('a.TagLink').click(function() {
		key = this.id;
		name = $(this).text();
		InsertLink('['+name+']', '<?php if(isset($GLOBALS['ContentArea'])) print $GLOBALS['ContentArea']; ?>', '<?php if(isset($GLOBALS['EditorName'])) print $GLOBALS['EditorName']; ?>');
		linkWin.close();
		return false;
	});
</script>
