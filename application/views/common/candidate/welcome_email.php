<?php $this->load->helper('language'); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<style type="text/css">
	.ReadMsgBody {width: 100%; background-color: #ffd454;}
	.ExternalClass {width: 100%; background-color: #ffd454;}
	body	 {width: 100%; background-color: #ffd454; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
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
                                    <img src="http://grabtalent.ricemerchant.com/images/email_header.png" alt="" border="0" width="100%" />
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
                                            echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;'>Dear Candidate,<br />Your recent sign-up was successful and now you are part of our Talent Pool.<br />You may start exploring for new opportunities on our portal using your email address<br />Click the button below to login.<br /><center><a href='http://grabtalent.ricemerchant.com/en/candidate' target='_blank'>Click Me</a></center><br /><br />Sincerely,<br />Grab Talent Team.</p>";
                                        } else if ($this->lang->lang() == 'fr') {
                                            echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;'>Cher Candidat,<br />Votre récente inscription a réussi et maintenant vous faites partie de notre pool de talents.<br />Vous pouvez commencer à explorer de nouvelles opportunités sur notre portail en utilisant votre adresse e-mail<br />Cliquez sur le bouton ci-dessous pour vous identifier.<br /><a href='http://grabtalent.ricemerchant.com/fr/candidate' target='_blank'>Cliquez-moi</a><br /><br />Sincèrement,<br />Grab Talent Team.</p>";
                                        } else if ($this->lang->lang() == 'ch') {
                                            echo "<p style='color: #000;font-family: Georgia,serif;font-size: 16px;line-height: 32px;'>&#20146;&#29233;&#30340;&#20505;&#36873;,<br />&#24744;&#26368;&#36817;&#30340;&#27880;&#20876;&#26159;&#25104;&#21151;&#30340;&#65292;&#29616;&#22312;&#20320;&#26159;&#25105;&#20204;&#30340;&#20154;&#25165;&#24211;&#30340;&#19968;&#37096;&#20998;&#12290;<br />&#20320;&#21487;&#20197;&#24320;&#22987;&#25506;&#32034;&#25105;&#20204;&#30340;&#38376;&#25143;&#32593;&#31449;&#30340;&#26032;&#26426;&#20250;&#20351;&#29992;&#24744;&#30340;&#30005;&#23376;&#37038;&#20214;&#22320;&#22336;<br />&#28857;&#20987;&#19979;&#38754;&#30340;&#25353;&#38062;&#36827;&#34892;&#30331;&#24405;&#12290;<br /><a href='http://grabtalent.ricemerchant.com/ch/candidate' target='_blank'>&#28857;&#20987;&#25105;</a><br /><br />&#35802;&#25370;,<br />Grab Talent Team.</p>";
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
                                                <td valign="top" style="font-size: 11px; color: #000; font-family: Arial, sans-serif; padding-bottom:20px" class="center">
                                                    You are receiving this email because<br/>
                                                    1.) You application for a job has moved stage or<br/>
                                                    2.) Recruiter has invited for a interview<br/>

                                                    <br/><br/>
                                                    Want to be removed? No problem, <a href="" style="text-decoration:underline;">click here</a> and we won't bug you again.

                                                </td>
                                            </tr>
                                        </table>

                                        <table width="40%" cellpadding="0" cellspacing="0"  border="0" align="right" class="deviceWidth">
                                            <tr>
                                                <td valign="top" style="font-size: 11px; color: #000; font-weight: normal; font-family: Georgia, Times, serif; line-height: 26px; vertical-align: top; text-align:right" class="center">
                                                
                                                    <a href="#"><img src="http://grabtalent.ricemerchant.com/images/email_footer.png" alt="" border="0" height="50px" /></a><br/>
                                                    <span style="text-decoration: none; font-weight: normal;">+65-6334 2552</span><br/>
                                                    <span style="text-decoration: none; font-weight: normal;">email@email.com</span>
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