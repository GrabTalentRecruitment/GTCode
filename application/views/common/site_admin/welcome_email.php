<?php $this->load->helper('language'); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>Greetings! We have completed your account setup on Grab Talent portal!<br />Please use the below login details to access our site.<br /><br />Email address:<br />".$recruiterEmailAdd."<br /><br />Temporary Password:<br />".$recruitertmpPwd."<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/recruiter' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Login Now!</a></span><br /><br />Sincerely,<br /><strong>Grab Talent Team.</strong><br /><br />For security reasons, please change your password once you login for first time.</p>";
                                                } else if ($this->lang->lang() == 'fr') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>G chaleur entendre oh! Nous avons terminé configuration du compte de quelqu'un sur G comme AB TA prêté portail!<br />S'il vous plaît utiliser les informations de connexion ci-dessous pour accéder à notre site.<br /><br />Adresse e-mail:<br />".$recruiterEmailAdd."<br /><br />Mot de passe temporaire:<br />".$recruitertmpPwd."<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/recruiter' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Connecte-toi maintenant!</a></span><br /><br />Sincèrement,<br /><strong>Grab Talent Team.</strong><br /><br />Pour des raisons de sécurité, s'il vous plaît changer votre mot de passe une fois que vous vous connectez pour la première fois.</p>";
                                                } else if ($this->lang->lang() == 'ch') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>&#24744;&#22909;&#65281;&#25105;&#20204;&#24050;&#32463;&#23436;&#25104;&#20102;&#25250;&#20154;&#25165;&#38376;&#25143;&#32593;&#31449;&#24080;&#25143;&#35774;&#32622;&#65281;<br />&#35831;&#20351;&#29992;&#20197;&#19979;&#30331;&#24405;&#20449;&#24687;&#26469;&#35775;&#38382;&#25105;&#20204;&#30340;&#32593;&#31449;&#12290;<br /><br />&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;&#65306;<br />".$recruiterEmailAdd."<br /><br />&#20020;&#26102;&#23494;&#30721;&#65306;<br />".$recruitertmpPwd."<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/recruiter' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>&#29616;&#22312;&#30331;&#24405;&#65281;</a></span><br /><br />&#27492;&#33268;,<br /><strong>Grab Talent Team.</strong><br /><br />&#20026;&#20102;&#23433;&#20840;&#36215;&#35265;&#65292;&#35831;&#19968;&#26086;&#20320;&#30331;&#24405;&#21518;&#39318;&#27425;&#26356;&#25913;&#23494;&#30721;&#12290;</p>";
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
                                                14 Robinson Road<br />#13-00 Far East Finance Building<br /> Singapore 048545<br /> +65-6334 2552<br /><br />
                                                <a href="mailto:support@grab-talent.net" style="text-decoration: none; color: #848484; font-weight: normal;">support@grab-talent.net</a>
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