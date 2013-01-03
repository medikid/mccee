<?php $IEM = $tpl->Get('IEM'); ?><script>
	cf_bucket = <?php if(isset($GLOBALS['CustomFieldJSON'])) print $GLOBALS['CustomFieldJSON']; ?>
	$('a.CustomFieldLink').click(function() {
		key = this.id;
		InsertLink(cf_bucket[key], '<?php if(isset($GLOBALS['ContentArea'])) print $GLOBALS['ContentArea']; ?>', '<?php if(isset($GLOBALS['EditorName'])) print $GLOBALS['EditorName']; ?>');
		linkWin.close();
		return false;
	});
</script>
