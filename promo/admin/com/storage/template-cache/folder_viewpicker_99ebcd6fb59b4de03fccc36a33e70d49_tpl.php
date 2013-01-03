<?php $IEM = $tpl->Get('IEM'); ?><?php ob_start(); ?><?php if(isset($GLOBALS['Mode'])) print $GLOBALS['Mode']; ?><?php $tpl->Assign("mode", ob_get_contents()); ob_end_clean(); ?>
<div style="position:relative; display:inline; top:4px;">
	<?php if($tpl->Get('mode') == 'Folder'): ?>
		<a href="index.php?Page=<?php echo $tpl->Get('IEM','CurrentPage'); ?>&amp;Mode=List"><img src="images/list_mode_off.gif" width="25" height="20" alt="<?php print GetLang('Folders_SwitchTo'); ?> <?php print GetLang('Folders_ListMode'); ?>" title="<?php print GetLang('Folders_SwitchTo'); ?> <?php print GetLang('Folders_ListMode'); ?>" border="0" /></a>
		<img src="images/folder_mode_on.gif" width="25" height="20" alt="<?php print GetLang('Folders_CurrentlyIn'); ?> <?php print GetLang('Folders_FolderMode'); ?>" title="<?php print GetLang('Folders_CurrentlyIn'); ?> <?php print GetLang('Folders_FolderMode'); ?>" border="0" />
		<a href="#" onclick="tb_show('<?php print GetLang('Folders_AddFolder'); ?>', 'index.php?Page=Folders&Action=Add&FolderType=list&keepThis=true&TB_iframe=true&height=80&width=325', '');"><img src="images/folder_add.gif" width="25" height="20" alt="<?php print GetLang('Folders_AddFolder'); ?>" title="<?php print GetLang('Folders_AddFolder'); ?>" border="0" /></a>
	<?php else: ?>
		<img src="images/list_mode_on.gif" width="25" height="20" alt="<?php print GetLang('Folders_CurrentlyIn'); ?> <?php print GetLang('Folders_ListMode'); ?>" title="<?php print GetLang('Folders_CurrentlyIn'); ?> <?php print GetLang('Folders_ListMode'); ?>" border="0" />
		<a href="index.php?Page=<?php echo $tpl->Get('IEM','CurrentPage'); ?>&amp;Mode=Folder"><img src="images/folder_mode_off.gif" width="25" height="20" alt="<?php print GetLang('Folders_SwitchTo'); ?> <?php print GetLang('Folders_FolderMode'); ?>" title="<?php print GetLang('Folders_SwitchTo'); ?> <?php print GetLang('Folders_FolderMode'); ?>" border="0" /></a>
	<?php endif; ?>
</div>
