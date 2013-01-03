<?php $IEM = $tpl->Get('IEM'); ?><form name="customDateForm" method="post" action="index.php?Page=<?php print $IEM['CurrentPage']; ?>&<?php if(isset($GLOBALS['FormAction'])) print $GLOBALS['FormAction']; ?>" style="margin: 0px;">
	<table border=0 cellspacing=0 cellpadding=0>
		<tr>
			<td class="Text" width=90 bgcolor=#EEEEEE style="padding-top:3pt" nowrap>&nbsp;<img src="images/dateicon.gif" width="20" height="20" align="absMiddle">&nbsp;<?php print GetLang('DateRange'); ?>: </td>
			<td width=90 bgcolor="#EEEEEE" style="padding-top:5pt">
				<select name="Calendar[DateType]" class="CalendarSelect" onChange="doCustomDate(this, <?php if(isset($GLOBALS['TabID'])) print $GLOBALS['TabID']; ?>)">
				<?php if(isset($GLOBALS['CalendarOptions'])) print $GLOBALS['CalendarOptions']; ?>
				</select>
			</td>
			<td width=50 bgcolor="#EEEEEE" style="padding-top:5pt"><input type=submit value=<?php print GetLang('Go'); ?> class="Text" style="margin-bottom:5px; margin-left:5px;"></td>
			<td bgcolor="#EEEEEE" nowrap style="padding-top:5pt">
				<span id=customDate<?php if(isset($GLOBALS['TabID'])) print $GLOBALS['TabID']; ?> style="display:<?php if(isset($GLOBALS['CustomDateDisplay'])) print $GLOBALS['CustomDateDisplay']; ?>">&nbsp;
				<select name="Calendar[From][Day]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomDayFrom'])) print $GLOBALS['CustomDayFrom']; ?></select>
				<select name="Calendar[From][Mth]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomMthFrom'])) print $GLOBALS['CustomMthFrom']; ?></select>
				<select name="Calendar[From][Yr]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomYrFrom'])) print $GLOBALS['CustomYrFrom']; ?></select>
				<span class=body><?php print GetLang('To'); ?></span>
				<select name="Calendar[To][Day]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomDayTo'])) print $GLOBALS['CustomDayTo']; ?></select>
				<select name="Calendar[To][Mth]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomMthTo'])) print $GLOBALS['CustomMthTo']; ?></select>
				<select name="Calendar[To][Yr]" class="CalendarSelect"Small style="margin-bottom:3px"><?php if(isset($GLOBALS['CustomYrTo'])) print $GLOBALS['CustomYrTo']; ?></select>
				</span>&nbsp;
			</td>
			<td nowrap class=body id="showDate<?php if(isset($GLOBALS['TabID'])) print $GLOBALS['TabID']; ?>" style="display:<?php if(isset($GLOBALS['ShowDateDisplay'])) print $GLOBALS['ShowDateDisplay']; ?>; padding-top: 6pt;">&nbsp;&nbsp;<i><?php if(isset($GLOBALS['DateRange'])) print $GLOBALS['DateRange']; ?></i></span></td>
		</tr>
	</table>
</form>
