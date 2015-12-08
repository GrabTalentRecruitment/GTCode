<?php $this->load->helper('language'); ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Change Email | Grab Talent</title>
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
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>Dear Candidate,<br />Good to hear from you! Thanks for staying in touch with Grab Talent.<br /><br />We received your request to change your registered email address from ".$this->input->post("oldEmailAddress")." to ".$this->input->post("newEmailAddress")." and updated our records.<br /><br />From now on you can log in using ".$this->input->post("newEmailAddress")." to access your Grab Talent account.<br /><br />Looking for a better job? Visit our website and start exploring your opportunities.<br /><br />Sincerely,<br /><strong>Grab Talent Team.</strong><br /><br />If you did not request the above change, please forward this email along with any details or call us to follow up. Please ignore this activation request if you do not want to complete the registration process.</p>";
                                                } else if ($this->lang->lang() == 'fr') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>Cher Candidat,<br />Cela fait plaisir d'avoir de vos nouvelles! Merci pour rester en contact avec Grab Talent.<br /><br />Nous avons reçu votre demande de changement de votre adresse e-mail enregistrée à partir de ".$this->input->post("oldEmailAddress")." à ".$this->input->post("newEmailAddress")." et mis à jour nos dossiers.<br /><br />A partir de maintenant, vous pouvez vous connecter en utilisant ".$this->input->post("newEmailAddress")." pour accéder à votre compte Grab Talent.<br /><br />Vous cherchez un meilleur emploi? Visitez notre site et commencer à explorer vos possibilités.<br /><br />Sincèrement,<br /><strong>Grab Talent Team.</strong><br /><br />Si vous ne l'avez pas demandé le changement ci-dessus, s'il vous plaît transmettre cet email avec tous les détails ou appelez-nous pour assurer le suivi. S'il vous plaît ignorer cette demande d'activation si vous ne voulez pas terminer le processus d'inscription.</p>";
                                                } else if ($this->lang->lang() == 'ch') {
                                                    echo "<p style='font-size: 12px;line-height: 25px;'>&#20146;&#29233;&#30340;&#20505;&#36873;,<br />&#24456;&#39640;&#20852;&#21548;&#21040;&#20320;&#30340;&#28040;&#24687;&#65281;&#24863;&#35874;&#20303;&#22312;&#25250;&#20154;&#25165;&#32852;&#31995;&#12290;<br /><br />&#25105;&#20204;&#25910;&#21040;&#24744;&#30340;&#35201;&#27714;&#65292;&#20174;&#25913;&#21464;&#20320;&#30340;&#27880;&#20876;&#37038;&#31665;&#22320;&#22336; ".$this->input->post("oldEmailAddress")." &#33267; ".$this->input->post("newEmailAddress")." &#21644;&#26356;&#26032;&#25105;&#20204;&#30340;&#35760;&#24405;.<br /><br />&#20174;&#29616;&#22312;&#36215;&#65292;&#20320;&#21487;&#20197;&#30331;&#24405;&#20351;&#29992; ".$this->input->post("newEmailAddress")." &#35775;&#38382;&#24744;&#25250;&#20154;&#25165;&#30340;&#24080;&#25143;&#12290;<br /><br />&#25214;&#19968;&#20221;&#26356;&#22909;&#30340;&#24037;&#20316;&#65311;&#35831;&#35775;&#38382;&#25105;&#20204;&#30340;&#32593;&#31449;&#65292;&#24182;&#24320;&#22987;&#25506;&#32034;&#20320;&#30340;&#26426;&#20250;&#12290;<br /><br />&#35802;&#25370;,<br /><strong>&#25250;&#20154;&#25165;&#38431;&#20237;.</strong><br /><br />&#22914;&#26524;&#24744;&#27809;&#26377;&#35201;&#27714;&#19978;&#36848;&#21464;&#21270;&#65292;&#35831;&#27839;&#36716;&#21457;&#27492;&#37038;&#20214;&#30340;&#20219;&#20309;&#32454;&#33410;&#25110;&#33268;&#30005;&#36319;&#36827;&#12290;&#35831;&#24573;&#30053;&#27492;&#28608;&#27963;&#35831;&#27714;&#65292;&#22914;&#26524;&#24744;&#19981;&#24819;&#23436;&#25104;&#27880;&#20876;&#36807;&#31243;&#12290;</p>";
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