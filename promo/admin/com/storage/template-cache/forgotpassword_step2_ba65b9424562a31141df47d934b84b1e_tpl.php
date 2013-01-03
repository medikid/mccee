<?php $IEM = $tpl->Get('IEM'); ?><style type="text/css">
	.popupContainer {
		border: 0px;
	}
</style>
<form action="index.php?Page=<?php print $IEM['CurrentPage']; ?>&Action=<?php if(isset($GLOBALS['SubmitAction'])) print $GLOBALS['SubmitAction']; ?>" method="post" name="frmLogin" id="frmLogin">
	<div id="box" class="loginBox">
		<table><tr><td style="border:solid 2px #DDD; padding:20px; background-color:#FFF; width:300px;">
		<table>
			<tr>
			<td class="Heading1">
				<img src="<?php print $IEM['ApplicationLogoImage']; ?>" alt="<?php echo GetLang('SendingSystem'); ?>" />
			</td>
		</tr>
		<tr>
			<td style="padding:10px 0px 5px 0px"><?php if(isset($GLOBALS['Message'])) print $GLOBALS['Message']; ?></td>
		</tr>
		<tr>
			<td>
				<table>

					<tr>
						<td class="SmallFieldLabel"><?php print GetLang('UserName'); ?>:</td>
						<td align="left">
							<?php if(isset($GLOBALS['UserName'])) print $GLOBALS['UserName']; ?>
						</td>
					</tr>
					<tr>
						<td class="SmallFieldLabel">
							<?php print GetLang('NewPassword'); ?>:
						</td>
						<td align="left">
							<input type="password" id="ss_password" name="ss_password" class="Field150" value="" autocomplete="off" />
						</td>
					</tr>
					<tr>
						<td class="SmallFieldLabel">
							<?php print GetLang('PasswordConfirm'); ?>:
						</td>
						<td align="left">
							<input type="password" name="ss_password_confirm" value="" class="Field150" autocomplete="off" />
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" name="SubmitButton" value="<?php print GetLang('ChangePassword'); ?>"  class="Field150">
						</td>
					</tr>

					<tr><td class="Gap"></td></tr>
				</table>
			</td>
			</tr>
		</table>
		</td></tr>
		</table>

	</div>

	</form>

	<script>

		$('#frmLogin').submit(function() {
			var f = document.frmLogin;

			if (f.ss_password.value == '') {
				alert('<?php print GetLang('NoPassword'); ?>');
				f.ss_password.focus();
				return false;
			}

			if (f.ss_password_confirm.value == "") {
				alert("<?php print GetLang('PasswordConfirmAlert'); ?>");
				f.ss_password_confirm.focus();
				return false;
			}

			if (f.ss_password.value != f.ss_password_confirm.value) {
				alert("<?php print GetLang('PasswordsDontMatch'); ?>");
				f.ss_password_confirm.select();
				f.ss_password_confirm.focus();
				return false;
			}

			// Everything is OK
			return true;
		});

		function sizeBox() {
			var w = $(window).width();
			var h = $(window).height();
			$('#box').css('position', 'absolute');
			$('#box').css('top', h/2-($('#box').height()/2)-50);
			$('#box').css('left', w/2-($('#box').width()/2));
		}

		$(document).ready(function() {
			sizeBox();
			$('#ss_username').focus();
			$('#ss_username').select();
		});

		$(window).resize(function() {
			//sizeBox();
		});

	document.getElementById('ss_password').focus();

	</script>