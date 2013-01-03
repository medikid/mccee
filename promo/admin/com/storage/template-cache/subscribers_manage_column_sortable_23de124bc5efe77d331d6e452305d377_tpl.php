<?php $IEM = $tpl->Get('IEM'); ?><td <?php if(isset($GLOBALS['Width'])) print $GLOBALS['Width']; ?>>
	<?php if(isset($GLOBALS['FieldName'])) print $GLOBALS['FieldName']; ?>&nbsp;<a href='index.php?Page=Subscribers&Action=Manage&SubAction=Step3&SortBy=<?php if(isset($GLOBALS['SortName'])) print $GLOBALS['SortName']; ?>&Direction=Up&'><img src="images/sortup.gif" border=0></a>&nbsp;<a href='index.php?Page=Subscribers&Action=Manage&SubAction=Step3&SortBy=<?php if(isset($GLOBALS['SortName'])) print $GLOBALS['SortName']; ?>&Direction=Down&'><img src="images/sortdown.gif" border=0></a>
</td>
