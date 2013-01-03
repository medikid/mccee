<?php $IEM = $tpl->Get('IEM'); ?><li class="SortableRow no-nesting" id="ele-<?php if(isset($GLOBALS['List'])) print $GLOBALS['List']; ?>">
	<table cellpadding="0" cellspacing="0" width="100%" class="Text" style="margin:0; padding:0;">
		<tr class="GridRow">
			<td width="28" align="center">
				<input type="checkbox" name="Lists[]" value="<?php if(isset($GLOBALS['List'])) print $GLOBALS['List']; ?>" class="UICheckboxToggleRows">
			</td>
			<td width="22" class="DragMouseDown sort-handle">
				<img src="images/m_lists.gif" />
			</td>
			<td width="*" class="DragMouseDown sort-handle">
				<?php if(isset($GLOBALS['Name'])) print $GLOBALS['Name']; ?>
			</td>
			<td width="120" class="HideOnDrag">
				<?php if(isset($GLOBALS['Created'])) print $GLOBALS['Created']; ?>
			</td>
			<td width="120" class="HideOnDrag">
				<?php if(isset($GLOBALS['SubscriberCount'])) print $GLOBALS['SubscriberCount']; ?>
			</td>
			<td width="120" class="HideOnDrag">
				<?php if(isset($GLOBALS['Fullname'])) print $GLOBALS['Fullname']; ?>
			</td>
			<td width="40" align="center" class="HideOnDrag">
				<a href="../rss.php?List=<?php if(isset($GLOBALS['List'])) print $GLOBALS['List']; ?>" target="_blank"><img src="images/rss.gif" border="0" title="<?php print GetLang('RSS_Tip'); ?>"></a>
			</td>
			<td width="240" class="HideOnDrag">
				<?php if(isset($GLOBALS['ListAction'])) print $GLOBALS['ListAction']; ?>
			</td>
		</tr>
	</table>
</li>
