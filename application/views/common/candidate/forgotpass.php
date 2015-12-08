<?php $this->load->helper('language'); $email_encoded = rtrim(strtr(base64_encode($email), '+/','-_'), '='); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Forgot Password | Grab Talent</title>
<style type="text/css">
	.ReadMsgBody {width: 100%; background-color: #ffffff;}
	.ExternalClass {width: 100%; background-color: #ffffff;}
	body {width: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix">
<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td width="100%" valign="top" bgcolor="#ffffff" style="padding-top:20px">

			<!-- 2 Column Images - text left -->
			<table width="650" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
				<tr>
					<td style="padding:10px 0">
                            
                            <table align="left" width="100%" cellpadding="0" cellspacing="0" border="0" class="deviceWidth">
                                <tr>
                                    <td>
                                        <table width="60%">
                                            <tr>
                                                <td valign="right" >
                                                    <img src="http://grab-talent.net/images/gt_logo.png" alt="" border="0" align="left" />
                                                </td>
                                                <td valign="middle"><strong>Grab Talent</strong> / The Hiring Revolution</td>
                                            </tr>
                                        </table>

                                        <p style="mso-table-lspace:0;mso-table-rspace:0; margin:0">
                                            <?php
                                                if ($this->lang->lang() == 'en') {
                                                    echo "<p style='line-height: 25px;'>Dear Candidate,<br /><br />We received a request to reset the password for your Grab Talent account. Please use the link below to set a new password. If you did not request a password change, please contact us at <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='http://grab-talent.net/en/candidate/resetpassword?ed=". $email_encoded ."' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Reset your password</a></span><br /><br /><p style='color: #000;line-height: 15px;'>(If the above link does not work, please copy the full address and paste it into your browser.)<br /><br />http://grab-talent.net/en/candidate/resetpassword?ed=". $email_encoded ."<br /><br />Sincerely,<br /><br /><strong>Grab Talent Team.</strong></p>";
                                                } else if ($this->lang->lang() == 'fr') {
                                                    echo "<p style='line-height: 25px;'>Cher Candidat,<br /><br />Nous avons reçu une demande de réinitialiser le mot de passe pour votre compte Grab Talent. S'il vous plaît utilisez le lien ci-dessous pour définir un nouveau mot de passe. Si vous ne l'avez pas demandé un changement de mot de passe, s'il vous plaît contactez-nous au <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='http://grab-talent.net/fr/candidate/resetpassword?ed=". $email_encoded ."' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Reset your password</a></span><br /><br /><p style='color: #000;line-height: 15px;'>(Si le lien ci-dessus ne fonctionne pas, s'il vous plaît copier l'adresse complète et le coller dans votre navigateur.)<br /><br />http://grab-talent.net/fr/candidate/resetpassword?ed=". $email_encoded ."<br /><br />Sincèrement,<br /><strong>Grab Talent Team.</strong></p>";
                                                } else if ($this->lang->lang() == 'ch') {
                                                    echo "<p style='line-height: 25px;'>&#20146;&#29233;&#30340;&#20505;&#36873;,<br /><br />&#25105;&#20497;&#25910;&#21040;&#30340;&#35531;&#27714;&#37325;&#32622;&#30340;&#23494;&#30908;&#25654;&#20154;&#25165;&#30340;&#24115;&#25142;&#12290; &#35531;&#20351;&#29992;&#20197;&#19979;&#37832;&#25509;&#20358;&#35373;&#32622;&#26032;&#23494;&#30908;&#12290; &#22914;&#26524;&#20320;&#27794;&#26377;&#35201;&#27714;&#23494;&#30908;&#26356;&#25913;&#65292;&#35531;&#33287;&#25105;&#20497;&#32879;&#32363; <a href='mailto:support@grab-talent.com' target='_blank'>support@grab-talent.com</a></p><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='http://grab-talent.net/ch/candidate/resetpassword?ed=". $email_encoded ."' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Reset your password</a></span><br /><br /><p style='color: #000;line-height: 15px;'>(&#22914;&#26524;&#19978;&#38754;&#30340;&#37832;&#25509;&#19981;&#36215;&#20316;&#29992;&#65292;&#35531;&#35079;&#35069;&#23436;&#25972;&#30340;&#22320;&#22336;&#65292;&#20006;&#23559;&#20854;&#31896;&#36028;&#21040;&#28687;&#35261;&#22120;&#12290;)<br /><br />http://grab-talent.net/ch/candidate/resetpassword?ed=". $email_encoded ."<br /><br />&#35488;&#25711;,<br /><strong>&#25654;&#20154;&#25165;&#38538;&#20237;</strong></p>";
                                                }
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                    </td>
                </tr>
            </table><!-- End 2 Column Images  - text left -->
<hr />
			<!-- 4 Columns -->
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td style="padding:30px 0">
                        <table width="650" border="0" cellpadding="10" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
                            <tr>
                                <td>
                                    <table width="45%" cellpadding="0" cellspacing="0"  border="0" align="left" class="deviceWidth">
                                        <tr>
                                            <td valign="top" style="font-size: 12px; padding-bottom:20px" class="center">

                                                You are receiving this email because<br/><br />
                                                1) You signed up to Grab Talent, or<br/>
                                                2) You application for a job has moved stage, or<br/>
                                                3) A recruiter has invited you for an interview<br />

                                                <br/>
                                                Want to be removed? No problem, <a href="" style="text-decoration:underline;">click here</a> and we won't bug you again.

                                            </td>
                                        </tr>
                                    </table>

                                    <table width="45%" cellpadding="5" cellspacing="0"  border="0" align="right" class="deviceWidth">
                                        <tr>
                                            <td style="text-align: right; vertical-align: top;">
                                                <img src="http://grab-talent.net/images/gt_logo.png" width="42" height="42" alt="RSS Feed" title="RSS Feed" border="0" />
                                                </td>
                                            <td valign="top" style="font-size:12px; line-height:15px; vertical-align: top; text-align:left" class="center">
                                                <strong>Grab Talent</strong> / The Hiring Revolution<br /><br />
                                                14 Robinson Road<br />#13-00 Far East Finance Building<br /> Singapore 048545<br /><br />
                                                <a href="mailto:support@grab-talent.com" style="text-decoration: none; color: #848484; font-weight: normal;">support@grab-talent.com</a>
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
</body>
</html>