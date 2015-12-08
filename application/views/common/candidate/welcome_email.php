<?php $this->load->helper('language'); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Forgot Password | Grab Talent</title>
<style type="text/css">
.ReadMsgBody {width: 100%; background-color: #ffffff;}
.ExternalClass {width: 100%; background-color: #ffffff;}
body {width: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
table {border-collapse: collapse;}
@media only screen and (max-width: 640px) { body[yahoo] .deviceWidth {width:440px!important; padding:0;} body[yahoo] .center {text-align: center!important;} }
@media only screen and (max-width: 479px) { body[yahoo] .deviceWidth {width:280px!important; padding:0;} body[yahoo] .center {text-align: center!important;} }
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
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>Dear ".$candFirstName.",<br /><br />Congratulations for signing up with Grab Talent!<br />You can login using your email address and password.<br /><br />Email address:<br />".$candEmailAdd."<br /><br />Temporary Password:<br />".$candtmpPwd."<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/candidate' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Login Now!</a></span><br /><br />Sincerely,<br /><strong>Grab Talent Team.</strong></p>";
                                                } else if ($this->lang->lang() == 'fr') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>Cher ".$candFirstName.",<br /><br />Félicitations pour signer avec Grab talent!<br />Vous pouvez vous connecter en utilisant votre adresse e-mail et mot de passe.<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/candidate' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>Connecte-toi maintenant!</a></span><br /><br />Sincèrement,<br /><strong>Grab Talent Team.</strong></p>";
                                                } else if ($this->lang->lang() == 'ch') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>&#20146; ".$candFirstName.",<br /><br />&#24685;&#21916;&#31614;&#32626;&#20102;&#25250;&#20154;&#25165;&#65281;<br />&#24744;&#21487;&#20197;&#30331;&#24405;&#20351;&#29992;&#24744;&#30340;&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;&#21644;&#23494;&#30721;&#12290;<br /><br /><span style='border-radius:15px;background-color:#F5D328;border-width:0px;border-style:solid;border-color:#ccc;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:30px; text-align:center;'><a href='https://grab-talent.net/en/candidate' style='color:#000;font-size:16px;font-weight:bold;text-decoration:none;letter-spacing:1px' target='_blank'>&#29616;&#22312;&#30331;&#24405;&#65281;</a></span><br /><br />&#27492;&#33268;,<br /><strong>Grab Talent Team.</strong></p>";
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