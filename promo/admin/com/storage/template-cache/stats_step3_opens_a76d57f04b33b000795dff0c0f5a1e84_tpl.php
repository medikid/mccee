<?php $IEM = $tpl->Get('IEM'); ?><div id="div2" style="display:none">
	<div class="body">
		<br><?php if(isset($GLOBALS['DisplayOpensIntro'])) print $GLOBALS['DisplayOpensIntro']; ?>
		<br><br>
	</div>

	<div>
		<?php if(isset($GLOBALS['Calendar'])) print $GLOBALS['Calendar']; ?>
	</div>

	<br>

	<table width="100%" border="0" class="Text">
		<tr><td valign=top width="250" rowspan="2">
		<div class="MidHeading" style="width:100%"><img src="images/m_stats.gif" width="20" height="20" align="absMiddle">&nbsp;<?php print GetLang('Opens_Summary'); ?></div>
				<ul class="Text">
					<li><?php print GetLang('TotalEmails'); ?><?php if(isset($GLOBALS['TotalEmails'])) print $GLOBALS['TotalEmails']; ?></li>
					<li>
						<span class="HelpText" onmouseover="ShowHelp('total_open_explain', '<?php print GetLang('TotalOpens'); ?>', '<?php print GetLang('Stats_TotalOpens_Description'); ?>');" onmouseout="HideHelp('total_open_explain');"><?php print GetLang('TotalOpens'); ?><?php if(isset($GLOBALS['TotalOpens'])) print $GLOBALS['TotalOpens']; ?></span>
						<div id="total_open_explain" style="display:none;"></div>
					</li>
					<li><?php print GetLang('MostOpens'); ?><?php if(isset($GLOBALS['MostOpens'])) print $GLOBALS['MostOpens']; ?></li>
					<li>
						<span class="HelpText" onmouseover="ShowHelp('total_uniqueopen_explain', '<?php print GetLang('TotalUniqueOpens'); ?>', '<?php print GetLang('Stats_TotalUniqueOpens_Description'); ?>');" onmouseout="HideHelp('total_uniqueopen_explain');"><?php print GetLang('TotalUniqueOpens'); ?><?php if(isset($GLOBALS['TotalUniqueOpens'])) print $GLOBALS['TotalUniqueOpens']; ?></span>
						<div id="total_uniqueopen_explain" style="display:none;"></div>
					</li>
					<li><?php print GetLang('AverageOpens'); ?><?php if(isset($GLOBALS['AverageOpens'])) print $GLOBALS['AverageOpens']; ?></li>
					<li><?php print GetLang('OpenRate'); ?><?php if(isset($GLOBALS['OpenRate'])) print $GLOBALS['OpenRate']; ?></li>
				</ul>
		</td>
		<td><?php if(isset($GLOBALS['OpenChart'])) print $GLOBALS['OpenChart']; ?></td>
		</tr>
	</table>

        <?php if(isset($GLOBALS['Loading_Indicator'])) print $GLOBALS['Loading_Indicator']; ?>
        <div id="adminTable<?php if(isset($GLOBALS['TableType'])) print $GLOBALS['TableType']; ?>"></div>

        <script>
          REMOTE_admin_table($("#adminTable<?php if(isset($GLOBALS['TableType'])) print $GLOBALS['TableType']; ?>"),'<?php if(isset($GLOBALS['TableURL'])) print $GLOBALS['TableURL']; ?>','','<?php if(isset($GLOBALS['TableType'])) print $GLOBALS['TableType']; ?>','<?php if(isset($GLOBALS['TableToken'])) print $GLOBALS['TableToken']; ?>',1,'opened','down');
        </script>
</div>
