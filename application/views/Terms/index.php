<header class="site-header">
<div class="container">
	<div class="row">
		<div class="col-md-3" style="padding:10px;">
			<a href="<?php echo http_url($this->lang->lang().'/home'); ?>" rel="home"><img src="/images/logo.png" width="200" /></a>
		</div>
		<div class="col-md-9">
			<ul class="site-menu alignright">
				<?php
				    if( ($this->uri->segment(2) == 'home') ) {
				        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/home').'">'.lang('home.index').'</a></li>';
				    } else {
				        echo '<li><a href="'.http_url($this->lang->lang().'/home').'">'.lang('home.index').'</a></li>';
				    }
				                                
				    if( $this->uri->segment(2) == 'aboutus'){
				        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/aboutus').'">'.lang('home.about').'</a></li>';
				    } else {
				        echo '<li><a href="'.http_url($this->lang->lang().'/aboutus').'">'.lang('home.about').'</a></li>';
				    }
				                                
				    if( $this->uri->segment(2) == 'contact'){
				        echo '<li class="current-menu-item"><a href="'.http_url($this->lang->lang().'/contact').'">'.lang('home.contact').'</a></li>';
				    } else {
				        echo '<li><a href="'.http_url($this->lang->lang().'/contact').'">'.lang('home.contact').'</a></li>';
				    }
				?>
				<li><a href="<?php echo https_url($this->lang->lang().'/candidate', true); ?>" class="button" style="border: 1px solid #F6BA33;">Login</a></li>
				<li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				    <?php 
				        if($this->lang->lang() == 'en') { 
				            echo "<img src='/images/flags/united-kingdom.png'/>&nbsp;&nbsp;&nbsp;English"; 
				        } else if($this->lang->lang() == 'fr') {
				            echo "<img src='/images/flags/france.png'/>&nbsp;&nbsp;&nbsp;French"; 
				        } else if($this->lang->lang() == 'ch') {
				            echo "<img src='/images/flags/china.png'/>&nbsp;&nbsp;&nbsp;&#20013;&#22269;"; 
				        }
				    ?><span class="caret"></span></a>
				    <ul class="dropdown-menu dropdown-cart" role="menu">
				        <li style="<?php if($this->lang->lang() == 'en'){ echo "background-color: #f5f5f5;"; } ?>" >
				            <a href="<?php echo http_url($this->lang->switch_uri('en'),'English');?>">
				                <img src="/images/flags/united-kingdom.png"/>&nbsp;&nbsp;&nbsp;English
				            </a>
				        </li>
				        <li style="<?php if($this->lang->lang() == 'fr'){ echo "background-color: #f5f5f5;"; } ?>" >
				            <a href="<?php echo http_url($this->lang->switch_uri('fr'),'French');?>">
				                <img src="/images/flags/france.png"/>&nbsp;&nbsp;&nbsp;French
				            </a>
				        </li>
				        <li style="<?php if($this->lang->lang() == 'ch'){ echo "background-color: #f5f5f5;"; } ?>" >
				            <a href="<?php echo http_url($this->lang->switch_uri('ch'),'Chinese');?>">
				                <img src='/images/flags/china.png'/>&nbsp;&nbsp;&nbsp;&#20013;&#22269;
				            </a>
				        </li>
				    </ul>
				</li>                        
			</ul>
		</div>
	</div>
</div>
</header>

<div class="site-content">
    <div class="container page-header">
	<div class="row">
		<div class="col-md-6 no-padding">
		     <!-- h1 class="page-title font-1"><?=lang('about.heading');?></h1-->
		</div>
	</div>
    </div>
    <div class="page-content container">
        
        <body bgcolor=white lang=EN-SG link=blue vlink=purple style='tab-interval:36.0pt'>

<div class=WordSection1>

<p class=MsoNormal><b><span lang=EN-AU style='font-size:15.0pt;mso-bidi-font-size:
11.0pt;line-height:115%;font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<div style='mso-element:para-border-div;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;
mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
padding:1.0pt 0cm 1.0pt 0cm'>

<p class=MsoNormal align=center style='text-align:center;border:none;
mso-border-top-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
padding:0cm;mso-padding-alt:1.0pt 0cm 1.0pt 0cm'><b><span lang=EN-AU
style='font-size:22.0pt;mso-bidi-font-size:18.0pt;line-height:115%;font-family:
Calibri'>GRAB-TALENT.COM TERMS OF SERVICE</span></b><b><span lang=EN-AU
style='font-size:26.0pt;mso-bidi-font-size:22.0pt;line-height:115%;font-family:
Calibri'><o:p></o:p></span></b></p>

</div>

<p><span style='font-family:Calibri;mso-bidi-font-weight:bold'>This agreement (“Terms
of Service”</span><span lang=EN-US style='font-family:Calibri;mso-ansi-language:
EN-US;mso-bidi-font-weight:bold'>) govern your access to and use of
Grab-Talent.com (“Grab Talent”) website and services (the “Service”). Your
access to use the Service is condidtioned on your acceptance of the compliance
with these Terms of Service. These terms of Service apply to all visitors,
users and others, whether as a guest or member, who access or use the Service.<o:p></o:p></span></p>

<p><span style='font-size:14.0pt;font-family:Calibri;mso-bidi-font-family:Arial;
color:#394549'>IMPORTANT - READ THE FOLLOWING TERMS OF SERVICE CAREFULLY BEFORE
CONTINUING REGISTRATION TO USE THE SERVICE. BY ACCESSING OR USING THIS SITE IN
ANY WAY, INCLUDING BROWSING THE SITE, AND/OR LOGGING IN AND USING THE SERVICE
AS A MEMBER, YOU ACCEPT AND AGREE TO BE BOUND BY THESE TERMS OF SERVICE AND OUR
PRIVACY POLICY, FOUND AT &nbsp;</span><span style='font-size:14.0pt;font-family:
Calibri;mso-bidi-font-family:Arial;color:#FC7208'><a
href="http://www.grab-talent.com/PrivacyPolicy"><span style='mso-bidi-font-family:
Arial'>http://www.grab-talent.com/PrivacyPolicy</span></a></span><span
style='font-size:14.0pt;font-family:Calibri;mso-bidi-font-family:Arial;
color:#394549'>, AND YOU AGREE THAT YOU ARE OF LEGAL AGE TO FORM A BINDING
AGREEMENT WITH GRAB TALENT. IF YOU DO NOT AGREE TO BE BOUND BY THESE TERMS OF
SERVICE OR OUR PRIVACY POLICY, YOU MAY NOT ACCESS OR USE THIS SITE OR THE
SERVICE.</span><b><span lang=EN-US style='font-size:14.0pt;font-family:Calibri;
mso-bidi-font-family:Arial;mso-ansi-language:EN-US'><o:p></o:p></span></b></p>

</div>

<b><span lang=EN-AU style='font-size:12.0pt;line-height:150%;font-family:Calibri;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Times New Roman";
mso-ansi-language:EN-AU;mso-fareast-language:EN-US;mso-bidi-language:AR-SA'><br
clear=all style='page-break-before:always;mso-break-type:section-break'>
</span></b>

<div class=WordSection2>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-AU
style='font-size:18.0pt;line-height:115%;font-family:Calibri'>WEBSITE TERMS OF
SERVICE<o:p></o:p></span></b></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
lang=EN-AU style='font-family:Calibri'>In this agreement, “we” “us” and “our”
refers to Grab Talent.<span style="mso-spacerun:yes">&nbsp; </span>Your access
to and use of all information on this website including purchase of our
product/s is provided subject to the following Terms of Service.<span
style="mso-spacerun:yes">&nbsp; </span><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
lang=EN-AU style='font-family:Calibri'>We reserve the right to amend this
Notice at any time and your use of the Service following any amendments will
represent your agreement to be bound by these terms and conditions as
amended.<span style="mso-spacerun:yes">&nbsp; </span>We therefore recommend
that each time you access our website you read these Terms of Service.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Members<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>In order
to access the services provided on this website, you must become a member. You
must complete registration by providing certain information as set out on our
membership/registration page.<span style="mso-spacerun:yes">&nbsp; </span>This
information is and not limited to your name, email address, telephone number,
skills, compensation details, Curriculum Vitae, other documentation, video of
yourself, either upon request or otherwise. Please refer to our Privacy Policy
linked on our home page for information relating to our collection, storage and
use of the details you provide on registration.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>You
agree to ensure that your registration details are true and accurate at all
times and you undertake to update your registration details from time to time
when they change.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>On
registration, we provide you with a password.<span
style="mso-spacerun:yes">&nbsp; </span>We encourage you to change this password
that uses a combination of upper and lowercase letters, numbers and symbols.
You agree to not disclose your password to any third party. Grab Talent cannot
and will not be liable for any loss or damage arising from your failure to
comply with the above requirements. You must notify Grab Talent immediately
upon becoming aware of any breach of security or unauthorised use of your
account. You retain full ownership to your content. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We will
not share your content with others unless: a) you direct us to; b) we are
required by law or by a valid legal process; c) we need to in order to provide
you the Service. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>How we
collect and use your information generally is also explained in our Privacy
Policy.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We
reserve the right to terminate your membership at any time if you breach the
Terms of Service.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Employers<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri;
mso-bidi-font-weight:bold'>Employing companies that are seeking to access
information about prospective employees, who are registered members on this
site, will need to do so by contacting sales@grab-talent.com and agree to separate
Terms of Service.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Our
Website Services<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>By
proceeding to register through our website, you acknowledge that you are of a
legal age to form a binding agreement. <b><span
style="mso-spacerun:yes">&nbsp;</span></b><span
style="mso-spacerun:yes">&nbsp;</span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Site
Access<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>When you
visit our website, we give you a limited licence to access and use our
information for personal use. You are solely responsible for your conduct, the
content of your files and folders, and your communications with others while
using the Services. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We may
choose to review content for compliance purposes, but you acknowledge that Grab
Talent has no obligation to monitor any information on the Services. We are not
responsible for the accuracy, completeness, appropriateness, or legality of
files, user posts, or any other information you may be able to access using the
Service.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'>You are permitted to download a copy of the
information on this website to your computer for your personal use only
provided that you do not delete or change any copyright symbol, trade mark or
other proprietary notice.<span style="mso-spacerun:yes">&nbsp; </span>Your use
of our content in any other way infringes our intellectual property rights.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'>You agree to not post Content that: a) may create a
risk of any loss or damage to any person or property; b) is deemed
inappropriate content; c) may constitute or contribute to a crime or tort; d) contains
any information or content that we deem to be unlawful, harmful, abusive,
racially or ethnically offensive, defamatory, infringing, invasive of personal
privacy or publicity rights, harassing, humiliating to other people (publically
or otherwise), libellous, threatening, profane, or otherwise objectionable; e) contains
any information or connect that is illegal (including, without limitation, the
disclosure or insider information under securities law or of anther party’s
trade secrets); f) contains any information or content that you do not have the
right to make available under any law or under contractual or fiduciary
relationships; or contains any information or content that you know is not
correct and current. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>The
licence to access and use the information on our website does not include the
right to use any data mining robots or other extraction tools.<span
style="mso-spacerun:yes">&nbsp; </span>The licence also does not permit you to
metatag or mirror our website without our prior written permission. We reserve
the right to serve you with notice if we become aware of your metatag or
mirroring of our website. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We
reserve the right at all times, but are not obligated, to remove or refuse to
distribute any Content on the Service, that we believe, in our sole discretion,
violates these provisions.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Hyperlinks<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>This
website may from time to time contain hyperlinks to other websites.<span
style="mso-spacerun:yes">&nbsp; </span>Such links are provided for convenience
only and we take no responsibility for the content and maintenance of or
privacy compliance by any linked website.<span style="mso-spacerun:yes">&nbsp;
</span>Any hyperlink on our website to another website does not imply our
endorsement, support, or sponsorship of the operator of that website nor of the
information and/or products which they provide.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>You may
link our website without our consent.<span style="mso-spacerun:yes">&nbsp;
</span>Any such linking will be entirely your responsibility and at your
expense.<span style="mso-spacerun:yes">&nbsp; </span>By linking, you must not
alter any of our website's contents including any intellectual property notices
and you must not frame or reformat any of our pages, files, images, text or
other materials.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Intellectual
Property Rights<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>The
copyright to all content on this website including applets, graphics, images,
layouts and text belongs to us or we have a licence to use those materials.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'>You agree that any Content that you post does not
and will not violate rights of any kind, including without limitation any
intellectual property rights or rights of privacy or contain anything else
which could bring Grab Talent into disrepute.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:widow-orphan'><span lang=EN-AU
style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>All
trade marks, brands and logos which are used on this website are either owned
by us or we have a licence to use them. Your access to our website does not
license you to use those marks in any commercial way without our prior written
permission.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>Except
as permitted under the <i style='mso-bidi-font-style:normal'>Copyright</i> <i
style='mso-bidi-font-style:normal'>Act</i>, you are not permitted to copy,
reproduce, republish, distribute or display any of the information on this
website without our prior written permission.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>Any
comment, feedback, idea or suggestion (called “Comments”) which you provide to
us through this website becomes our property.<span
style="mso-spacerun:yes">&nbsp; </span>If in future we use your Comments in
promoting our website or in any other way, we will not be liable for any similarities
which may appear from such use.<span style="mso-spacerun:yes">&nbsp; </span>Furthermore,
you agree that we are entitled to use your Comments for any commercial or
non-commercial purpose without compensation to you or to any other person who
has transmitted your Comments. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:lines-together'><span lang=EN-AU
style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;mso-pagination:lines-together'><span lang=EN-AU
style='font-family:Calibri'>If you provide us with Comments, you acknowledge
that you are responsible for the content of such material including its
legality, originality and copyright. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Disclaimers<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>Whilst
we take all due care in providing our services, we do not provide any warranty
either express or implied including without limitation warranties of
merchantability or fitness for a particular purpose. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>To the
extent permitted by law, any condition or warranty, which would otherwise be
implied into this agreement, is excluded.<span style="mso-spacerun:yes">&nbsp;
</span><o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We also
take all due care in ensuring that our website is free of any virus, worm,
Trojan horse and/or malware, however we are not responsible for any damage to
your computer system which arises in connection with your use of our website or
any linked website.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Limitation
of Liability<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>To the
full extent permitted by law, our liability for breach of an implied warranty
or condition is limited to the supply of the services again or payment of the
costs of having those services supplied again. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We
accept no liability for any loss whatsoever including consequential loss
suffered by you arising from services we have supplied. <o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;page-break-after:avoid'><b><span lang=EN-AU
style='font-family:Calibri'>Indemnity<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>By
accessing our website, you agree to indemnify and hold us harmless from all
claims, actions, damages, costs and expenses including legal fees arising from
or in connection with your use of our website.<span
style="mso-spacerun:yes">&nbsp; </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;page-break-after:avoid'><b><span lang=EN-AU
style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%;page-break-after:avoid'><b><span lang=EN-AU
style='font-family:Calibri'>Jurisdiction<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>These
terms and conditions are to be governed by and construed in accordance with the
laws of Singapore and any claim made by either party against the other which in
any way arises out of these terms and conditions will be heard in Singapore and
you agree to submit to the jurisdiction of those Courts.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>If any
provision in these terms and conditions is invalid under any law the provision
will be limited, narrowed, construed or altered as necessary to render it valid
but only to the extent necessary to achieve such validity.<span
style="mso-spacerun:yes">&nbsp; </span>If necessary the invalid provision will
be deleted from these terms and conditions and the remaining provisions will
remain in full force and effect.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><b><span lang=EN-AU style='font-family:Calibri'>Privacy
<o:p></o:p></span></b></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>We
undertake to take all due care with any information which you may provide to us
when accessing our website. However we do not warrant and cannot ensure the
security of any information, which you may provide to us.<span
style="mso-spacerun:yes">&nbsp; </span>Information you transmit to us is
entirely at your own risk although we undertake to take reasonable steps to
preserve such information in a secure manner.<o:p></o:p></span></p>

<p class=MsoListParagraph style='margin:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:150%'><span lang=EN-AU style='font-family:Calibri'>Our
compliance with privacy legislation is set out in our separate Privacy Policy <a
href="http://www.grab-talent.com/PrivacyPolicy">http://www.grab-talent.com/PrivacyPolicy</a></span><b
style='mso-bidi-font-weight:normal'><span lang=EN-AU style='font-size:16.0pt;
line-height:150%;font-family:Calibri'><o:p></o:p></span></b></p>

</div>

<b style='mso-bidi-font-weight:normal'><span lang=EN-AU style='font-size:16.0pt;
line-height:150%;font-family:Calibri;mso-fareast-font-family:"Times New Roman";
mso-bidi-font-family:"Times New Roman";mso-ansi-language:EN-AU;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA'><br clear=all style='page-break-before:auto;
mso-break-type:section-break'>
</span></b>

<div class=WordSection3>

<p class=MsoNormal><span lang=EN-AU style='font-family:Calibri'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

        
    </div>
    
</div>
<div class="clearfix"></div>