<?php $IEM = $tpl->Get('IEM'); ?><link rel="stylesheet" type="text/css" href="includes/styles/thickbox.css" />
<style type="text/css">
	select#groupRecord_Permissions { height: 200px; }
	div.groupRecord_Access_Resource_List { padding: 5px 0px 5px 0px; }
	div.groupRecord_Access_Resource_List select { height: 80px; }
	
	.groupRecord_COMMON_NodeJoin {
		background: transparent url(images/nodejoin.gif) top left no-repeat scroll;
		padding-left: 25px;
		line-height: 25px;
	}
</style>

<form name="frmUsersGroups" method="post" action="index.php?Page=UsersGroups&Action=saveRecord">
	<input type="hidden" name="requestToken" value="<?php echo $tpl->Get('requestToken'); ?>" />
	<input type="hidden" name="record[groupid]" value="<?php echo $tpl->Get('record','groupid'); ?>" />
	<table cellspacing="0" cellpadding="0" width="100%" align="center">
		<tr><td class="Heading1">
			<?php if($tpl->Get('record','groupid')): ?>
				<?php echo GetLang('UsersGroups_Form_EditGroup'); ?>
			<?php else: ?>
				<?php echo GetLang('UsersGroups_Form_CreateGroup'); ?>
			<?php endif; ?>
		</td></tr>
		<tr><td class="body pageinfo"><p>
			<?php if($tpl->Get('record','groupid')): ?>
				<?php echo GetLang('UsersGroups_Form_EditGroup_Intro'); ?>
			<?php else: ?>
				<?php echo GetLang('UsersGroups_Form_CreateGroup_Intro'); ?>
			<?php endif; ?>
		</p></td></tr>
		<?php if(trim($tpl->Get('PAGE','messages')) != ''): ?><tr><td><?php echo $tpl->Get('PAGE','messages'); ?></td></tr><?php endif; ?>
		<tr>
			<td class="body">
				<input class="FormButton" type="submit" value="<?php echo GetLang('Save'); ?>"/>
				<input class="FormButton CancelButton" type="button" value="<?php echo GetLang('Cancel'); ?>"/>
			</td>
		</tr>
		<tr><td class="EmptyRow">&nbsp;</td></tr>
		<tr>
			<td>
				<table border="0" cellspacing="0" cellpadding="2" width="100%" class="Panel">
					<tr><td class=Heading2 colspan=2 style="padding-left:10px"><?php echo GetLang('UsersGroups_Form_Header_GroupDetails'); ?></td></tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_GroupName'); ?>:
						</td>
						<td>
							<input type="text" name="record[groupname]" value="<?php echo $tpl->Get('record','groupname'); ?>" class="Field450" />
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_GroupName')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_GroupName')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Permissions'); ?>:
						</td>
						<td>
							<input
								type="checkbox"
								id="isSystemAdministrator"
								name="record[permissions][]"
								value="system.system"
								
								<?php if($tpl->Get('isSystemAdmin')): ?>
								checked="checked"
								<?php endif; ?>
								
								<?php if($tpl->Get('isLastAdminWithUsers')): ?>
								disabled="disabled"
								<?php endif; ?>
							/>
							<label for="isSystemAdministrator"><?php echo GetLang('systemAdminLabel'); ?></label>
							<?php if($tpl->Get('isSystemAdmin') && $tpl->Get('isLastAdminWithUsers')): ?>
							<input type="hidden" name="record[permissions][]" value="system.system" />
							<p class="Message" style="margin: 2px 0; width: 446px;"><?php echo GetLang('UsersGroups_SystemAdminCheckboxDisabledMessage'); ?></p>
							<?php endif; ?>
							
							<div class="hideOnSystemAdminSelect groupRecord_COMMON_NodeJoin">
								<select id="groupRecord_Permissions" name="record[permissions][]" multiple="multiple" class="ISSelectReplacement">
									<?php if(!function_exists("foreach_191693")){ function foreach_191693(&$tpl, $array){ if(is_array($array)): foreach($array as $permissionGroupValue=>$permissionInGroups): $tpl->Assign('permissionGroupValue', $permissionGroupValue, false); $tpl->Assign('permissionInGroups', $permissionInGroups, false);  ?>
										<optgroup label="<?php echo $tpl->Get('permissionInGroups','text'); ?>">
											<?php if(!function_exists("foreach_11433")){ function foreach_11433(&$tpl, $array){ if(is_array($array)): foreach($array as $permissionAreaValue=>$permissionAreaItem): $tpl->Assign('permissionAreaValue', $permissionAreaValue, false); $tpl->Assign('permissionAreaItem', $permissionAreaItem, false);  ?>
												<?php ob_start(); ?><?php echo $tpl->Get('permissionGroupValue'); ?>.<?php echo $tpl->Get('permissionAreaValue'); ?><?php $tpl->Assign("permissionOptionKey", ob_get_contents()); ob_end_clean(); ?>
												<option value="<?php echo $tpl->Get('permissionOptionKey'); ?>" <?php if(in_array($tpl->Get('permissionOptionKey'), $tpl->Get('record','permissions_stupid_template'))): ?>selected="selected"<?php endif; ?>>
													<?php echo $tpl->Get('permissionAreaItem','text'); ?>
												</option>
											 <?php endforeach; endif;}} foreach_11433($tpl, $tpl->Get('permissionInGroups','children')); ?>
										</optgroup>
									 <?php endforeach; endif;}} foreach_191693($tpl, $tpl->Get('permissionList')); ?>
								</select>
							</div>
						</td>
					</tr>

					<tr class="hideOnSystemAdminSelect"><td class="EmptyRow" colspan="2">&nbsp;</td></tr>
					<tr class="hideOnSystemAdminSelect"><td class=Heading2 colspan=2 style="padding-left:10px"><?php echo GetLang('UsersGroups_Form_Header_GroupAccess'); ?></td></tr>
					<tr class="hideOnSystemAdminSelect">
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Access_Lists'); ?>:
						</td>
						<td>
							<select name="record[listadmin]" class="Field450 groupRecord_Access_Resource_Selector" <?php if(is_array($tpl->Get('record','permissions','system')) && (in_array('system', $tpl->Get('record','permissions','system')) || in_array('list', $tpl->Get('record','permissions','system')))): ?>disabled="disabled"<?php endif; ?>>
								<option value="1" <?php if($tpl->Get('record','listadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_lists_all'); ?></option>
								<option value="0" <?php if(!$tpl->Get('record','listadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_lists_custom'); ?></option>
							</select>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Access_Lists')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Access_Lists')); ?></span></span>
							<div id="groupRecord_record_listadmin_resources" class="groupRecord_Access_Resource_List">
								<?php if(count($tpl->Get('availableLists')) == 0): ?>
									<?php echo GetLang('UsersGroups_access_lists_none'); ?>
								<?php else: ?>
									<div <?php if($tpl->Get('record','listadmin')): ?>style="display:none;"<?php endif; ?>>
										<select name="record[access][lists][]" multiple="multiple" class="ISSelectReplacement ISSelectSearch">
											<?php $array = $tpl->Get('availableLists'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
												<option value="<?php echo $tpl->Get('each','listid'); ?>" <?php if(is_array($tpl->Get('record','access','lists')) && in_array($tpl->Get('each','listid'), $tpl->Get('record','access','lists'))): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','name'); ?></option>
											 <?php endforeach; endif; ?>
										</select>
									</div>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr class="hideOnSystemAdminSelect">
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Access_Segments'); ?>:
						</td>
						<td>
							<select name="record[segmentadmin]" class="Field450 groupRecord_Access_Resource_Selector" <?php if(is_array($tpl->Get('record','permissions','system')) && (in_array('system', $tpl->Get('record','permissions','system')))): ?>disabled="disabled"<?php endif; ?>>
								<option value="1" <?php if($tpl->Get('record','segmentadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_segments_all'); ?></option>
								<option value="0" <?php if(!$tpl->Get('record','segmentadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_segments_custom'); ?></option>
							</select>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Access_Segments')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Access_Segments')); ?></span></span>
							<div id="groupRecord_record_segmentadmin_resources"  class="groupRecord_Access_Resource_List">
								<?php if(count($tpl->Get('availableSegments')) == 0): ?>
									<?php echo GetLang('UsersGroups_access_segments_none'); ?>
								<?php else: ?>
									<div <?php if($tpl->Get('record','segmentadmin')): ?>style="display:none;"<?php endif; ?>>
										<select name="record[access][segments][]" multiple="multiple" class="ISSelectReplacement ISSelectSearch">
											<?php $array = $tpl->Get('availableSegments'); if(is_array($array)): foreach($array as $__key=>$each): $tpl->Assign('__key', $__key, false); $tpl->Assign('each', $each, false);  ?>
												<option value="<?php echo $tpl->Get('each','segmentid'); ?>" <?php if(is_array($tpl->Get('record','access','segments')) && in_array($tpl->Get('each','segmentid'), $tpl->Get('record','access','segments'))): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('each','segmentname'); ?></option>
											 <?php endforeach; endif; ?>
										</select>
									</div>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr class="hideOnSystemAdminSelect">
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Access_Templates'); ?>:
						</td>
						<td>
							<select name="record[templateadmin]" class="Field450 groupRecord_Access_Resource_Selector" <?php if(is_array($tpl->Get('record','permissions','system')) && (in_array('system', $tpl->Get('record','permissions','system')) || in_array('template', $tpl->Get('record','permissions','system')))): ?>disabled="disabled"<?php endif; ?>>
								<option value="1" <?php if($tpl->Get('record','templateadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_templates_all'); ?></option>
								<option value="0" <?php if(!$tpl->Get('record','templateadmin')): ?>selected="selected"<?php endif; ?>><?php echo GetLang('UsersGroups_access_templates_custom'); ?></option>
							</select>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Access_Templates')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Access_Templates')); ?></span></span>
							<div id="groupRecord_record_templateadmin_resources" class="groupRecord_Access_Resource_List">
								<?php if(count($tpl->Get('availableTemplates')) == 0): ?>
									<?php echo GetLang('UsersGroups_access_templates_none'); ?>
								<?php else: ?>
									<div <?php if($tpl->Get('record','templateadmin')): ?>style="display:none;"<?php endif; ?>>
										<select name="record[access][templates][]" multiple="multiple" class="ISSelectReplacement ISSelectSearch">
											<?php $array = $tpl->Get('availableTemplates'); if(is_array($array)): foreach($array as $templateid=>$templateName): $tpl->Assign('templateid', $templateid, false); $tpl->Assign('templateName', $templateName, false);  ?>
												<option value="<?php echo $tpl->Get('templateid'); ?>" <?php if(is_array($tpl->Get('record','access','templates')) && in_array($tpl->Get('templateid'), $tpl->Get('record','access','templates'))): ?>selected="selected"<?php endif; ?>><?php echo $tpl->Get('templateName'); ?></option>
											 <?php endforeach; endif; ?>
										</select>
									</div>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					
					<tr><td class="EmptyRow" colspan="2">&nbsp;</td></tr>
					<tr><td class=Heading2 colspan=2 style="padding-left:10px"><?php echo GetLang('UsersGroups_Form_Header_GroupRestrictions'); ?></td></tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restriction_MailingList'); ?>:
						</td>
						<td>
							<div>
								<input type="checkbox" id="recordGroup_Restriction_limit_list_flag" class="recordGroup_Restrictions_Flag" <?php if($tpl->Get('record','limit_list') == 0): ?>checked="checked"<?php endif; ?>/>
								<label for="recordGroup_Restriction_limit_list_flag"><?php echo GetLang('UsersGroups_Restrictions_Lists_Unlimited'); ?></label>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restriction_MailingList')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restriction_MailingList')); ?></span></span>
							</div>
							<div id="recordGroup_Restriction_limit_list_container" class="groupRecord_COMMON_NodeJoin" <?php if($tpl->Get('record','limit_list') == 0): ?>style="display:none;"<?php endif; ?>>
								<?php echo GetLang('UsersGroups_Restrictions_Lists_Finite'); ?>
								<input type="text" class="Field50" value="<?php echo $tpl->Get('record','limit_list'); ?>" name="record[limit_list]"/>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Restrictions_Lists_Finite')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Restrictions_Lists_Finite')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restriction_EmailsPerHour'); ?>:
						</td>
						<td>
							<div>
								<input type="checkbox" id="recordGroup_Restriction_hourlyemailsrate_flag" class="recordGroup_Restrictions_Flag" <?php if($tpl->Get('record','limit_hourlyemailsrate') == 0): ?>checked="checked"<?php endif; ?>/>
								<label for="recordGroup_Restriction_hourlyemailsrate_flag"><?php echo GetLang('UsersGroups_Restrictions_EmailsPerHour_Unlimited'); ?></label>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restriction_EmailsPerHour')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restriction_EmailsPerHour')); ?></span></span>
							</div>
							<div id="recordGroup_Restriction_hourlyemailsrate_container" class="groupRecord_COMMON_NodeJoin" <?php if($tpl->Get('record','limit_hourlyemailsrate') == 0): ?>style="display:none;"<?php endif; ?>>
								<?php echo GetLang('UsersGroups_Restrictions_EmailsPerHour_Finite'); ?>
								<input type="text" class="Field50" value="<?php echo $tpl->Get('record','limit_hourlyemailsrate'); ?>" name="record[limit_hourlyemailsrate]"/>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Restrictions_EmailsPerHour_Finite')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Restrictions_EmailsPerHour_Finite')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restriction_EmailsPerMonth'); ?>:
						</td>
						<td>
							<div>
								<input type="checkbox" id="recordGroup_Restriction_emailspermonth_flag" class="recordGroup_Restrictions_Flag" <?php if($tpl->Get('record','limit_emailspermonth') == 0): ?>checked="checked"<?php endif; ?>/>
								<label for="recordGroup_Restriction_emailspermonth_flag"><?php echo GetLang('UsersGroups_Restrictions_EmailsPerMonth_Unlimited'); ?></label>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restriction_EmailsPerMonth')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restriction_EmailsPerMonth')); ?></span></span>
							</div>
							<div id="recordGroup_Restriction_emailspermonth_container" class="groupRecord_COMMON_NodeJoin" <?php if($tpl->Get('record','limit_emailspermonth') == 0): ?>style="display:none;"<?php endif; ?>>
								<?php echo GetLang('UsersGroups_Restrictions_EmailsPerMonth_Finite'); ?>
								<input type="text" class="Field50" value="<?php echo $tpl->Get('record','limit_emailspermonth'); ?>" name="record[limit_emailspermonth]"/>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Restrictions_EmailsPerMonth_Finite')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Restrictions_EmailsPerMonth_Finite')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restriction_TotalEmails'); ?>:
						</td>
						<td>
							<div>
								<input type="checkbox" id="recordGroup_Restriction_totalemailslimit_flag" class="recordGroup_Restrictions_Flag" <?php if($tpl->Get('record','limit_totalemailslimit') == 0): ?>checked="checked"<?php endif; ?>/>
								<label for="recordGroup_Restriction_totalemailslimit_flag"><?php echo GetLang('UsersGroups_Restrictions_TotalEmails_Unlimited'); ?></label>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restriction_TotalEmails')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restriction_TotalEmails')); ?></span></span>
							</div>
							<div id="recordGroup_Restriction_totalemailslimit_container" class="groupRecord_COMMON_NodeJoin" <?php if($tpl->Get('record','limit_totalemailslimit') == 0): ?>style="display:none;"<?php endif; ?>>
								<?php echo GetLang('UsersGroups_Restrictions_TotalEmails_Finite'); ?>
								<input type="text" class="Field50" value="<?php echo $tpl->Get('maximumNumberOfEmails'); ?>" name="record[limit_totalemailslimit]"/>
								<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Restrictions_TotalEmails_Finite')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Restrictions_TotalEmails_Finite')); ?></span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restrictions_ForceDoubleOptIn'); ?>
						</td>
						<td>
							<input type="checkbox" id="recordGroup_Restriction_ForceDoubleOptIn" name="record[forcedoubleoptin]" value="1" <?php if($tpl->Get('record','forcedoubleoptin')): ?>checked="checked"<?php endif; ?> />
							<label for="recordGroup_Restriction_ForceDoubleOptIn"><?php echo GetLang('UsersGroups_Restrictions_ForceDoubleOptIn_Explain'); ?></label>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restrictions_ForceDoubleOptIn')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restrictions_ForceDoubleOptIn')); ?></span></span>
						</td>
					</tr>
					<tr>
						<td class="FieldLabel">
							<?php $tmpTplFile = $tpl->GetTemplate();
			$tmpTplData = $tpl->TemplateData;
			$tpl->ParseTemplate("Not_Required");
			$tpl->SetTemplate($tmpTplFile);
			$tpl->TemplateData = $tmpTplData; ?>
							<?php echo GetLang('UsersGroups_Field_Restrictions_ForceSpamCheck'); ?>
						</td>
						<td>
							<input type="checkbox" id="recordGroup_Restriction_ForceSpamCheck" name="record[forcespamcheck]" value="1" <?php if($tpl->Get('record','forcespamcheck')): ?>checked="checked"<?php endif; ?> />
							<label for="recordGroup_Restriction_ForceSpamCheck"><?php echo GetLang('UsersGroups_Restrictions_ForceSpamCheck_Explain'); ?></label>
							<span class="HelpToolTip"><img src="images/help.gif" alt="?" width="24" height="16" border="0" /><span class="HelpToolTip_Title" style="display:none;"><?php print stripslashes(GetLang('UsersGroups_Field_Restrictions_ForceSpamCheck')); ?></span><span class="HelpToolTip_Contents" style="display:none;"><?php print stripslashes(GetLang('HLP_UsersGroups_Field_Restrictions_ForceSpamCheck')); ?></span></span>
						</td>
					</tr>

					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input class="FormButton" type="submit" value="<?php echo GetLang('Save'); ?>"/>
							<input class="FormButton CancelButton" type="button" value="<?php echo GetLang('Cancel'); ?>"/>
						</td>
					</tr>
				</table>
			</td>
		</tr>

	</table>
</form>

<script src="includes/js/jquery/thickbox.js"></script>
<script>

(function($) {

Application.Page.UsersGroups_Form = {
	eventReady: function() {
		$(document.frmUsersGroups).submit(Application.Page.UsersGroups_Form.eventSubmitForm);
		$('input.CancelButton', document.frmUsersGroups).click(Application.Page.UsersGroups_Form.eventCancelForm);
		$('option', document.frmUsersGroups['record[permissions][]']).click(Application.Page.UsersGroups_Form.eventPermissionsClick);
		$('select.groupRecord_Access_Resource_Selector').change(Application.Page.UsersGroups_Form.eventResourceSelectorChanged);
		$('input.recordGroup_Restrictions_Flag').click(Application.Page.UsersGroups_Form.eventRestrictionsFlagClicked);
		$('input[type=text]').focus(Application.Page.UsersGroups_Form.eventTextBoxFocus);

		/*
		 * If the user is checked as a system administrator, then they have access to all
		 * permissions, so remove the ability to change permissions by hiding the UI to
		 * do so and disabling the input fields inside of it.
		 */
		$('#isSystemAdministrator').bind('click', _togglePermissionsSelector);

		// we must toggle this on load to initialize it
		_togglePermissionsSelector();

		document.frmUsersGroups['record[groupname]'].focus();
	},

	eventSubmitForm: function(event) {
		var isSystemAdmin   = $('#isSystemAdministrator').is(':checked');
		var form            = document.frmUsersGroups;
		var groupName       = form['record[groupname]'];
		var permissions     = form['record[permissions][]'];
		var options         = $('option', permissions);
		var selectedOptions = options.filter(':selected');
		
		if (groupName.value.trim() == '') {
			groupName.focus();

			alert('<?php echo GetLang('UsersGroups_Form_JS_Alert_GroupName_Empty'); ?>');
			
			return false;
		}

		if (!isSystemAdmin && selectedOptions.size() == 0) {
			if (!confirm('<?php echo GetLang('UsersGroups_Form_JS_Confirm_Permissions_Empty'); ?>')) {
				return false;
			}
		}

		$('select.groupRecord_Access_Resource_Selector', form).attr('disabled', false);

		return true;
	},

	eventCancelForm: function(event) {
		if (confirm('<?php echo GetLang('ConfirmCancel'); ?>'))
			document.location.href='index.php?Page=UsersGroups';
	},

	eventResourceSelectorChanged: function(event) {
		try {
			var name = event.target.name.replace(/\[|\]/g, '_');
			
			$('#groupRecord_' + name + 'resources > div')[$(event.target).val() == 1? 'hide' : 'show']();
		} catch(e) {
			
		}
	},

	eventRestrictionsFlagClicked: function(event) {
		try {
			var id = event.target.id.replace(/_flag$/, '_container');

			if (event.target.checked) $('div#' + id).hide().children('input').val(0);
			else $('div#' + id).show().children('input').focus();
		} catch(e) {
			
		}
	},

	eventPermissionsClick: function(event) {
		var regex = new RegExp('^system\.(.+)');

		if (!regex.test(event.target.value))
			return true;

		var admin_permission_name = event.target.value.replace(regex, '$1');
		var associations          = [
			{option_value: 'system', list_name: 'record[segmentadmin]'},
			{option_value: 'list', list_name: 'record[listadmin]'},
			{option_value: 'template', list_name: 'record[templateadmin]'}
		];

		var system_system = $('#isSystemAdministrator').is(':checked');
		
		if (admin_permission_name != 'system' && system_system)
			return true;
		
		for (var i = 0, j = associations.length; i < j; ++i) {
			var disabled = event.target.selected;
			
			if (admin_permission_name != 'system' && associations[i].option_value != admin_permission_name)
				continue;
			
			if (admin_permission_name == 'system' && associations[1].option_value != 'system' && !system_system)
				disabled = $('option[value="system.' + associations[i].option_value + '"]', document.frmUsersGroups['record[permissions][]']).get(0).selected;

			$(document.frmUsersGroups[associations[i].list_name]).val(disabled? '1' : '0').change().attr('disabled', disabled);
		}
	},

	eventTextBoxFocus: function(event) {
		event.target.select();
	}
};

Application.init.push(Application.Page.UsersGroups_Form.eventReady);



/**
 * Toggles the permissions selector based on if the system admin
 * checkbox is checked or not.
 * 
 * @return void
 */
function _togglePermissionsSelector() {
	var cb  = $('#isSystemAdministrator');
	var sel = $('.hideOnSystemAdminSelect');
	
	if (cb.is(':checked')) {
		sel
			.hide()
			.find(':input')
			.attr('disabled', 'disabled');
	} else {
		sel
			.show()
			.find(':input')
			.removeAttr('disabled');
	}
}

})(jQuery);

</script>
