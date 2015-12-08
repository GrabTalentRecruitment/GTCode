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
        
        <body lang=EN-SG link=blue vlink=purple style='tab-interval:36.0pt'>

<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center;mso-pagination:none;
mso-layout-grid-align:none;text-autospace:none'><b><span lang=EN-US
style='mso-bidi-font-family:Arial'>PRIVACY STATEMENT<o:p></o:p></span></b></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>NOTICE
PURSUANT TO THE PERSONAL DATA PROTECTION ACT 2012</span></b><span lang=EN-US
style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Your
data privacy is important to us.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Please
be assured that Grab Talent Private Limited considers the privacy of your
personal data a subject of utmost importance.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Personal
data includes but is not limited to your name, telephone number, email address,
home address as well as any information you have provided to Grab Talent
Private Limited.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Please
scroll down to view our Personal Data Protection Policy.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>The
Personal Data Protection Policy will enable you to understand how we use the
personal information we may collect from you. By providing your personal
information to us, you are consenting to our Personal Data Protection Policy
and the collection, use, access, transfer, storage and processing of your
personal information as described in our Personal Data Protection Policy.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Should
you wish to limit or be excluded from our engagements, please contact us at the
following:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>Email
Address: </span></b><span lang=EN-US><a
href="mailto:contact.privacy@grab-talent.com"><b><span style='mso-bidi-font-family:
Arial'>: contact.privacy@grab-talent.com</span></b></a></span><b><span
lang=EN-US style='mso-bidi-font-family:Arial'> </span></b><span class=GramE><span
lang=EN-US style='mso-bidi-font-family:Arial'>By</span></span><span lang=EN-US
style='mso-bidi-font-family:Arial'> not contacting us, we take it that you have
consented to the overall use of your personal data as set out in our Personal
Data Protection Policy.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>All
updates to our Personal Data Protection Policy will be regularly posted on our
website. We encourage you to continually visit us for the latest updates and
news.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>PERSONAL
DATA PROTECTION POLICY</span></b><span lang=EN-US style='mso-bidi-font-family:
Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>This
Personal Data Protection Policy (PDPP) is issued to all our valued candidates
pursuant to the requirements of the Singapore Personal Data Protection Act
2012.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>We
treat and view your personal data seriously. Please read the following Policy
to understand how Grab Talent Private Limited (“Grab Talent Private Limited ”) 
uses the personal data we may collect from you. By providing your personal data to
us, you are consenting to this PDPP and the collection, use, access, transfer,
storage and processing of your personal information as described in the Policy.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>1.
Personal Data</span></b><span lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Personal
data is any information that concerns you individually and would permit us to
contact you, for example, your name, address, telephone/fax number, email
address, resume or any information you submit to Grab Talent Private Limited, <span
class=GramE>our ,</span> website, tablet and smartphone applications
(&quot;Applications&quot;) that identifies you individually.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>The
Websites or the Applications cannot collect any personal information about you
unless you provide it.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>You
can visit and browse the Grab Talent Private Limited Website and the
Applications without revealing personal information about yourself, but not all
functions will be available to you. You may also choose to disclose personal
information about yourself. We may collect personal information from you when
you:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.1
Communicate with us through the different platforms of registering:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.2
Through website<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.3
Through mobile applications<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.4
Through telephone/call <span class=SpellE>centre</span><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.5
Through our offices<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.6
Register or subscribe to any products/services e.g.: newsletter.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.7
Participate in any of our surveys done internally or via an appointed third
party.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.8
Enter into /participate/win in any contest/competition/loyalty programs run by
us.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.9
Register interest and /or request for information regarding opportunities.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.10
Respond to any job opportunity/marketing materials we send out.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.11
Commence a business relationship with us.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.12
Visit any of our offices<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.13
Visit or browse our website<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span class=GramE><span lang=EN-US style='mso-bidi-font-family:
Arial'>1.14 &nbsp;Lodge</span></span><span lang=EN-US style='mso-bidi-font-family:
Arial'> a complaint with us<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span class=GramE><span lang=EN-US style='mso-bidi-font-family:
Arial'>1.15 &nbsp;Provide</span></span><span lang=EN-US style='mso-bidi-font-family:
Arial'> feedback to us<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1.16
Apply for a job<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>If you
provide us with any Personal Data relating to a third party (e.g. information
of your spouse, children, parents, and/or employees), by submitting such
Personal Data to us, you represent to us that you have obtained the consent of
the third party to provide us with their Personal Data for the purposes as
listed below.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>2.
Purpose of Collection, Use and Disclosure of Your Personal Data</span></b><span
lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Grab
Talent Private Limited may use the personal information collected through its
Website or Applications primarily for the following purposes:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1. To
verify your identity<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>2. To
assess and process your application(s)/request(s) for our products or service<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>3. To
provide you with the products and /or services you have requested<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>4. To
administer and manage the products and/or services we provide you (including
but not limited to job opportunities, market intelligence, complaints, follow
up and feedbacks)<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>5. To
investigate and resolve any job opportunities, market intelligence, complaints
or other inquiries that you submit to us regarding our products and services<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>6. To
detect and prevent fraudulent activities<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>7. To
keep in contact with you and provide you with any information you have
requested<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>8. To
engage in business transactions in respect of products and/or services to be
offered and provided to you<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>9. To
establish and better manage any business relationship we may have with you<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>10. To
process any communications you send us (e.g.: answering any queries and dealing
with any complaints or feedbacks<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>11. To
help us monitor and improve our product and service performances<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>12. To
maintain and develop our business system and infrastructure, including testing
and upgrading of these systems as we are always working on continuous
improvement.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>13. To
manage staff training and quality assurance<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>14. To
notify you about benefits and changes to the features of our products and/or
services<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>15. To
determine how we can improve services to you<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>16. To
produce data, reports and <span class=GramE>statistics which shall be <span
class=SpellE>anonymized</span> or aggregated in a manner</span> that does not
identify you as an individual<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>17. To
investigate, respond to, or defend claims against Grab Talent Private Limited <span
class=SpellE>Pte</span> Ltd<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>18. To
conduct marketing activities (for example, market research, sending latest
information on employers, new products/services<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>19. To
maintain records required for internal investigations, audit or security
purposes.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>3. <span
class=GramE>Disclosure</span> and Transferring of Data</span></b><span
lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>We may
disclose your personal data to the following third parties as may be required
for any of the above purposes:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1. Law
enforcement agencies and such bodies in compliance with the law and Order of a
Court<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>2.
Companies and/or <span class=SpellE>organisations</span> that act as our
agents, contractors, service providers and/or professional advisers<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>3.
Companies and/or <span class=SpellE>organisations</span> that assist us in
processing the personal information<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>4. Our
business associates and other parties for purposes that are related to the
purpose of collecting your personal information<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>5.
Other parties in respect of whom you have given your consent<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>4.
&quot;Cookies&quot; and Advertisers</span></b><span lang=EN-US
style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>A
cookie may be used in the processing of your personal information. A cookie is
a text file placed into the memory of your computer and/or device by Grab
Talent Private Limited’s computers. <span class=GramE>A copy of this text file
is sent by your computer and/or device</span> whenever it communicates with Grab
Talent Private Limited’s server. Grab Talent Private Limited use cookies to
identity you. Grab Talent Private Limited may also collect the following
information during your visit to the Websites<span class=GramE>:-</span><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>The
date and time you accessed each page on the Websites; The URL of any webpage
from which you accessed the Websites<span class=GramE>;</span> The web browser
that you are using and the pages you accessed<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Some
web pages may require you to provide a limited amount of personal data in order
to enjoy certain services on the Websites (system login credentials, email
address and contact, etc.). <span class=GramE>These personal data will only be
used by Grab Talent Private Limited</span> for its intended purpose only, i.e.
to respond to your message and deliver the requested services.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>5.
External Links</span></b><span lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Grab
Talent Private Limited Websites and Applications may contain links to other web
sites not maintained or related to Grab Talent Private Limited. These links are
provided as a service to users and are not sponsored by or affiliated with the
Websites, Applications, or Grab Talent Private Limited. These websites may have
their own privacy statement in place and we recommend that you review those
statements if you visit any linked web sites. Grab Talent Private Limited is
not responsible for the contents on the linked sites or any use of the sites.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>6.
Security</span></b><span lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Grab
Talent Private Limited shall take reasonable steps to safeguard your personal
information against any loss, misuse, modification, unauthorized or accidental
access or disclosure, alteration or destruction by having regard:<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>1. <span
class=GramE>to</span> the nature of the personal data and the harm that would
arise;<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>2. <span
class=GramE>to</span> the place or location where the personal data is stored;<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>3. <span
class=GramE>to</span> any security measures incorporated into any equipment in
which the personal data is stored;<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>4. <span
class=GramE>to</span> the measures taken for ensuring the reliability,
integrity and competence of personnel having access to the personal data; and<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>5. <span
class=GramE>to</span> the measures taken for ensuring the secure transfer of
the personal data.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Grab
Talent Private Limited shall ensure that any security policy developed or
implemented by Grab Talent Private Limited complies with the security standard
required under the Act and any applicable law that may from time to time be in
force.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Grab
Talent Private Limited places great importance on the security of your personal
information and ensures <span class=SpellE>organisational</span> security
measures when processing your personal data.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>7.
Retention</span></b><span lang=EN-US style='mso-bidi-font-family:Arial'><o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><span lang=EN-US style='mso-bidi-font-family:Arial'>Any
personal information supplied by you will be retained by Grab Talent Private <span
class=GramE>Limited&nbsp; for</span> such period as is necessary for the
purposes set out in this Policy or as may be deemed necessary by Grab Talent
Private Limited&nbsp; or where otherwise required by law.<o:p></o:p></span></p>

<p class=MsoNormal style='mso-pagination:none;mso-layout-grid-align:none;
text-autospace:none'><b><span lang=EN-US style='mso-bidi-font-family:Arial'>8.
Changes to our Privacy Policy</span></b><span lang=EN-US style='mso-bidi-font-family:
Arial'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-family:Arial'>This
Privacy Policy is effective as of 14 October 2015. From time to time, it may be
necessary for Grab Talent Private Limited to change this Privacy Policy. If we
change our policy, we will post the revised version here, so we suggest that
you check here periodically for the most up-to-date version of our Privacy
Policy. Rest assured, however, that any changes will not be retroactively
applied and will not alter how we handle previously collected information</span></p>

</div>

</body>

        
    </div>
    
</div>
<div class="clearfix"></div>