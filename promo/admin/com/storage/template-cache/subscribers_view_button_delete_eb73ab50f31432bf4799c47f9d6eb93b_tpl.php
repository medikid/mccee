<?php $IEM = $tpl->Get('IEM'); ?><input class="FormButton" type="button" style="width: 100px;" value="<?php print GetLang('Subscribers_View_Button_Delete'); ?>" onClick="ConfirmDelete('<?php if(isset($GLOBALS['subscriberid'])) print $GLOBALS['subscriberid']; ?>', '<?php if(isset($GLOBALS['list'])) print $GLOBALS['list']; ?>', <?php if(isset($GLOBALS['SegmentID'])) print $GLOBALS['SegmentID']; ?>)">
<script>
	function ConfirmDelete(subid, listid, SegmentID) {
		if (!subid) {
			return false;
		}

		if (confirm("<?php print GetLang('DeleteSubscriberPrompt'); ?>")) {
			var temp = 'index.php?Page=Subscribers&Action=Manage&SubAction=Delete&List=' + listid + '&id=' + subid;
			if (SegmentID && SegmentID != 0) temp += 'SegmentID=' + SegmentID
			document.location = temp;
			return true;
		}
		return false;
	}
</script>
