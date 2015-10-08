<?php $this->load->helper('language'); $email_encoded = rtrim(strtr(base64_encode($this->input->post('email')), '+/','-_'), '='); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<style type="text/css">
	.ReadMsgBody {width: 100%; background-color: #ffd454;}
	.ExternalClass {width: 100%; background-color: #ffd454;}
	body {width: 100%; background-color: #ffd454; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
	table {border-collapse: collapse;}

	@media only screen and (max-width: 640px)  {
					body[yahoo] .deviceWidth {width:440px!important; padding:0;}
					body[yahoo] .center {text-align: center!important;}
			}

	@media only screen and (max-width: 479px) {
					body[yahoo] .deviceWidth {width:280px!important; padding:0;}
					body[yahoo] .center {text-align: center!important;}
			}

</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Georgia, Times, serif">
<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td width="100%" valign="top" bgcolor="#ffd454" style="padding-top:20px">
			<!-- Start Header-->
			<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
				<tr>
					<td width="100%">
                        <!-- Logo -->
                        <table border="0" cellpadding="0" cellspacing="0" align="left" class="deviceWidth">
                            <tr>
                                <td class="center">
                                    <img src="http://grab-talent.com/images/email_header.png" alt="" border="0" width="100%" />
                                </td>
                            </tr>
                        </table><!-- End Logo -->                        
					</td>
				</tr>
			</table><!-- End Header -->

			<!-- One Column -->
			<table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#eeeeed" style="margin:0 auto;">
                <tr>
                    <td style="font-size: 13px; color: #000; font-weight: normal; text-align: left; font-family: Georgia, Times, serif; line-height: 24px; vertical-align: top; padding:10px 8px 10px 8px" bgcolor="#eeeeed">

                        <table>
                            <tr>
                                <td valign="middle" style="padding:0 10px 10px 0">
                                <?php
                                    if ($this->lang->lang() == 'en') {
                                        echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;'>Dear Recruiter,<br />We received a request to reset the password for your Grab Talent account. Please use the link below to set a new password. If you did not request a password change, please contact us at <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><div style='text-align: center;'><span style='border-radius:3px;background-color:#79b657;border-width:0px;border-style:solid;border-color:#2a74a0;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.com/en/recruiter/resetpassword?ed=". $email_encoded ."' style='color:#fff;font-size:16px;font-weight:400;text-decoration:none;letter-spacing:1px' target='_blank'>Reset your password</a></span></div><br /><p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;'>(If the above link does not work, please copy the full address and paste it into your browser.)<br />Sincerely,<br />Grab Talent Team.</p>";
                                    } else if ($this->lang->lang() == 'fr') {
                                        echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;text-align: center;'>Cher recruteur,<br />Nous avons reçu une demande de réinitialiser le mot de passe pour votre compte Grab Talent. S'il vous plaît utilisez le lien ci-dessous pour définir un nouveau mot de passe. Si vous ne l'avez pas demandé un changement de mot de passe, s'il vous plaît contactez-nous au <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><div style='text-align: center;'><span style='border-radius:3px;background-color:#79b657;border-width:0px;border-style:solid;border-color:#2a74a0;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.com/fr/recruiter/resetpassword?ed=". $email_encoded ."' style='color:#fff;font-size:16px;font-weight:400;text-decoration:none;letter-spacing:1px' target='_blank'>Réinitialisez votre mot de passe</a></span></div><br /><p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;text-align: center;'>(Si le lien ci-dessus ne fonctionne pas, s'il vous plaît copier l'adresse complète et le coller dans votre navigateur.)<br />Sincèrement,<br />Grab Talent Team.</h3>";
                                    } else if ($this->lang->lang() == 'ch') {
                                        echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;text-align: center;'>&#35242;&#24859;&#30340;&#25307;&#32856;&#20154;&#21729;,<br />&#25105;&#20497;&#25910;&#21040;&#30340;&#35531;&#27714;&#37325;&#32622;&#30340;&#23494;&#30908;&#25654;&#20154;&#25165;&#30340;&#24115;&#25142;&#12290; &#35531;&#20351;&#29992;&#20197;&#19979;&#37832;&#25509;&#20358;&#35373;&#32622;&#26032;&#23494;&#30908;&#12290; &#22914;&#26524;&#20320;&#27794;&#26377;&#35201;&#27714;&#23494;&#30908;&#26356;&#25913;&#65292;&#35531;&#33287;&#25105;&#20497;&#32879;&#32363; <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><div style='text-align: center;'><span style='border-radius:3px;background-color:#79b657;border-width:0px;border-style:solid;border-color:#2a74a0;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.com/ch/recruiter/resetpassword?ed=". $email_encoded ."' style='color:#000;font-size:16px;font-weight:400;text-decoration:none;letter-spacing:1px' target='_blank'>&#37325;&#32622;&#23494;&#30908;</a></span></div><br /><p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;text-align: center;'>(&#22914;&#26524;&#19978;&#38754;&#30340;&#37832;&#25509;&#19981;&#36215;&#20316;&#29992;&#65292;&#35531;&#35079;&#35069;&#23436;&#25972;&#30340;&#22320;&#22336;&#65292;&#20006;&#23559;&#20854;&#31896;&#36028;&#21040;&#28687;&#35261;&#22120;&#12290;)<br />&#35488;&#25711;,<br />&#25654;&#20154;&#25165;&#38538;&#20237;</h3>";
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
			</table><!-- End One Column -->
            
<div style="height:35px;margin:0 auto;">&nbsp;</div><!-- spacer -->

			<!-- 4 Columns -->
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td style="padding:30px 0; border-top: 2px solid grey;">
                        <table width="580" border="0" cellpadding="10" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
                            <tr>
                                <td>
                                    <table width="45%" cellpadding="0" cellspacing="0"  border="0" align="left" class="deviceWidth">
                                        <tr>
                                            <td valign="top" style="font-size: 11px; color: #000; font-family: Arial, sans-serif; padding-bottom:20px" class="center">&nbsp;</td>
                                        </tr>
                                    </table>

                                    <table width="40%" cellpadding="0" cellspacing="0"  border="0" align="right" class="deviceWidth">
                                        <tr>
                                            <td valign="top" style="font-size: 11px; color: #000; font-weight: normal; font-family: Georgia, Times, serif; line-height: 26px; vertical-align: top; text-align:right" class="center">
                                            
                                                <a href="#"><img src="http://grab-talent.com/images/email_footer.png" alt="" border="0" height="50px" /></a><br/>
                                                <span style="text-decoration: none; font-weight: normal;">+65-6334 2552</span><br/>
                                                <span style="text-decoration: none; font-weight: normal;">support@grab-talent.com</span>
                                            </td>
                                        </tr>
                                    </table>
                        		</td>
                        	</tr>
                        </table>
                    </td>
                </tr>
            </table><!-- End 4 Columns -->

		</td>
	</tr>
</table> <!-- End Wrapper -->
<div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
</div>
</body></html>