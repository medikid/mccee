<?php $IEM = $tpl->Get('IEM'); ?><script>
	Application.Page.Subscriber_Manage = {
		_defaultIntroText: '<?php print GetLang('SubscriberQuickSearch_Description'); ?>',
		_stateIntro: false,

		_displayIntro: function() {
			var elm = document.ActionSearchContacts.emailaddress;
			if(elm.value.trim() == '') {
				$(elm).css('color', '#999999');
				elm.value = Application.Page.Subscriber_Manage._defaultIntroText;
				Application.Page.Subscriber_Manage._stateIntro = true;
			}
		},

		segmentID: '<?php if(isset($GLOBALS['Segment'])) print $GLOBALS['Segment']; ?>',

		eventDocumentReady: function() {
			Application.Ui.Menu.PopDown('.PopDownMenu_Resize', {maxHeight: 370});
			$(document.ActionMembersForm.cmdAddContact).click(Application.Page.Subscriber_Manage.eventAddContactCommandClick);
			$(document.ActionSearchContacts.emailaddress).focus(Application.Page.Subscriber_Manage.eventQuickSearchFocus);
			$(document.ActionSearchContacts.emailaddress).blur(Application.Page.Subscriber_Manage.eventQuickSearchBlur);

			Application.Ui.CheckboxSelection(	'table#SubscribersManageList',
												'input.UICheckboxToggleSelector',
												'input.UICheckboxToggleRows');

			if(document.ActionSearchContacts.emailaddress.value.trim() != '') $('#AdvanceSearchClearLink').show();
			Application.Page.Subscriber_Manage._displayIntro();
			$(document.ActionSearchContacts.emailaddress).blur();
		},
		eventAddContactCommandClick: function(event) {
			document.location.href='<?php if(isset($GLOBALS['AddButtonURL'])) print $GLOBALS['AddButtonURL']; ?>';
		},
		eventQuickSearchFocus: function(event) {
			if(Application.Page.Subscriber_Manage._stateIntro) {
				this.value = '';
			}
			$(this).css('color', '');
			this.select();
			Application.Page.Subscriber_Manage._stateIntro = false;
		},
		eventQuickSearchBlur: function(event) { Application.Page.Subscriber_Manage._displayIntro(); }
	};

	Application.init.push(Application.Page.Subscriber_Manage.eventDocumentReady);
</script>
<link rel="stylesheet" href="includes/styles/ui.datepicker.css" type="text/css">
<link rel="stylesheet" href="includes/styles/timepicker.css" type="text/css">
<script src="includes/js/jquery/ui.js"></script>
<script>
<?php if(isset($GLOBALS['DatePickerJavascript'])) print $GLOBALS['DatePickerJavascript']; ?>
</script>
<script src="includes/js/jquery/timepicker.js"></script>
<script src="includes/js/jquery/form.js"></script>
<script><?php if(isset($GLOBALS['EventJavascript'])) print $GLOBALS['EventJavascript']; ?></script>
<div id="eventAddFormDiv" style="display:none;">
<?php if(isset($GLOBALS['EventAddForm'])) print $GLOBALS['EventAddForm']; ?>
</div>
<table cellspacing="0" cellpadding="0" width="100%" align="center">
	<tr>
		<td>
			 <div style="margin: 10px 5px 0 0; float: right;">
			 	<div style="text-align: left;">
				 	<form name="ActionSearchContacts" method="post" action="index.php?Page=Subscribers&Action=Manage&SubAction=SimpleSearch<?php if(isset($GLOBALS['URLQueryString'])) print $GLOBALS['URLQueryString']; ?>">
				 		<input type="text" class="Field250" size="20" value="<?php if(isset($GLOBALS['Search'])) print $GLOBALS['Search']; ?>" name="emailaddress" title="<?php print GetLang('Subscribers_SimpleSearch_Title'); ?>" />
						<input type="image" border="0" src="images/searchicon.gif" id="SearchButton" style="padding-left: 10px; vertical-align: top;" name="SearchButton" />
				 	</form>
					<a href="index.php?Page=Subscribers&Action=Manage&SubAction=AdvancedSearch"><?php print GetLang('AdvancedSearch'); ?></a>
					&nbsp;
					<a href="index.php?Page=Subscribers&Action=Manage&Lists=any" id="AdvanceSearchClearLink" style="display:none;"><?php print GetLang('SubscriberQuickSearch_ClearSearch'); ?></a>
				</div>
			 </div>
			<div class="Heading1">
				<?php print GetLang('View'); ?>:
				<a href="#" id="SubscriberViewPickerButton" class="PopDownMenu_Resize">
					<span id="SubscriberViewPicker_Caption"><?php if(isset($GLOBALS['SubscribersManage'])) print $GLOBALS['SubscribersManage']; ?></span>
					<img width="8" height="5" border="0" src="images/arrow_blue.gif" />
				</a>
			</div>
		</td>
	</tr>
	<tr>
		<td class="body pageinfo"><p><?php print GetLang('Help_SubscribersManage'); ?></p></td>
	</tr>
	<tr>
		<td>
			<?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?>
		</td>
	</tr>
	<tr>
		<td class="body">
		</td>
	</tr>
	<tr>
		<td class="body">
			<form name="ActionMembersForm" method="post" action="index.php?Page=Subscribers&Action=Manage&SubAction=Change&List=<?php if(isset($GLOBALS['List'])) print $GLOBALS['List']; ?>" onsubmit="return ConfirmChanges();">
				<table width="100%" border="0">
					<tr>
						<td style="display:<?php if(isset($GLOBALS['AddButtonDisplay'])) print $GLOBALS['AddButtonDisplay']; ?>"><input type="button" name="cmdAddContact" value="<?php print GetLang('Subscribers_Add_Button'); ?>" class="Text" /></td>
					</tr>
					<tr>
						<td valign="bottom">
							<div>
								<select name="ChangeType">
									<option value="" SELECTED><?php print GetLang('ChooseAction'); ?></option>
									<option value="Delete"><?php print GetLang('DeleteSelectedContacts'); ?></option>
									<option value="ChangeFormat_Text"><?php print GetLang('ChangeFormat_Text'); ?></option>
									<option value="ChangeFormat_HTML"><?php print GetLang('ChangeFormat_HTML'); ?></option>
									<option value="ChangeStatus_Confirm"><?php print GetLang('ChangeStatus_Confirm'); ?></option>
									<option value="ChangeStatus_Unconfirm"><?php print GetLang('ChangeStatus_Unconfirm'); ?></option>
								</select>
								<input type="submit" name="cmdChangeType" value="<?php print GetLang('Go'); ?>" class="Text" />
							</div>
						</td>
						<td align="right" valign="bottom">
							%%TPL_Paging%%
						</td>
					</tr>
				</table>
				<span><?php if(isset($GLOBALS['SubscribersReport'])) print $GLOBALS['SubscribersReport']; ?></span>
				<table border="0" cellspacing="0" cellpadding="0" width="100%" class="Text" id="SubscribersManageList">
					<tr class="Heading3">
						<td width="5" nowrap align="center">
							<input type="checkbox" name="toggle" class="UICheckboxToggleSelector">
						</td>
						<td width="5">&nbsp;</td>
						<?php if(isset($GLOBALS['Columns'])) print $GLOBALS['Columns']; ?>
						<td size="75" nowrap>
							<?php print GetLang('Action'); ?>
						</td>
					</tr>
					%%TPL_Subscribers_Manage_Row%%
				</table>
				%%TPL_Paging_Bottom%%
			</form>
		</td>
	</tr>
</table>
<?php if(isset($GLOBALS['SubscriberViewPickerMenu'])) print $GLOBALS['SubscriberViewPickerMenu']; ?>

<script>
	function ConfirmDelete(EmailID, List, SegmentID) {
		if (!EmailID) {
			return false;
		}
		if (confirm("<?php print GetLang('DeleteSubscriberPrompt'); ?>")) {
			var temp = 'index.php?Page=Subscribers&Action=Manage&SubAction=Delete&List=' + List + '&id=' + EmailID;
			if (SegmentID && SegmentID != 0) temp += '&SegmentID=' + SegmentID
			document.location = temp;
			return true;
		}
	}

	function ConfirmChanges() {
		var found_members = false;

		formObj = document.ActionMembersForm;

		if (formObj.ChangeType.selectedIndex == 0) {
			alert("<?php print GetLang('PleaseChooseAction'); ?>");
			formObj.ChangeType.focus();
			return false;
		}

		for (var i=0;i < formObj.length;i++)
		{
			fldObj = formObj.elements[i];
			if (fldObj.type == 'checkbox')
			{
				if (fldObj.checked) {
					found_members = true;
					break;
				}
			}
		}

		if (!found_members) {
			alert("<?php print GetLang('ChooseSubscribers'); ?>");
			return false;
		}

		if (confirm("<?php print GetLang('ConfirmSubscriberChanges'); ?>")) {
			return true;
		}
		return false;
	}
</script>
