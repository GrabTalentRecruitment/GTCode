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
    		     <h1 class="page-title font-1">PRIVACY STATEMENT</h1>
    		</div>
    	</div>
    </div>
    
    <div class="page-content container">
    
        <h5>NOTICE PURSUANT TO THE PERSONAL DATA PROTECTION ACT 2012</h5>
        
        <p>Your data privacy is important to us.<br /><br />Please be assured that Grab Talent Private Limited considers the privacy of your personal data a subject of utmost importance.<br /><br />Personal data includes but is not limited to your name, telephone number, email address, home address as well as any information you have provided to Grab Talent Private Limited.<br /><br />The Personal Data Protection Policy will enable you to understand how we use the personal information we may collect from you.<br /><br />By providing your personal information to us, you are consenting to our Personal Data Protection Policy and the collection, use, access, transfer, storage and processing of your personal information as described in our Personal Data Protection Policy.<br /><br />Should you wish to limit or be excluded from our engagements, please contact us at the
following:</p>

        <p><b>Email Address:&nbsp;&nbsp;</b><a href="mailto:<?php echo GT_CONTACT_PRIVACY; ?>"><b><?php echo GT_CONTACT_PRIVACY; ?></b></a>&nbsp;&nbsp;not contacting us, we take it that you have consented to the overall use of your personal data as set out in our Personal Data Protection Policy.<br /><br />All updates to our Personal Data Protection Policy will be regularly posted on our website. We encourage you to continually visit us for the latest updates and news.</p>
        
        <h5><strong>PERSONAL DATA PROTECTION POLICY</strong></h5>
        
        <p>This Personal Data Protection Policy (PDPP) is issued to all our valued candidates pursuant to the requirements of the Singapore Personal Data Protection Act 2012.<br /><br />We treat and view your personal data seriously. Please read the following Policy to understand how Grab Talent Private Limited ("Grab Talent Private Limited") uses the personal data we may collect from you. By providing your personal data to us, you are consenting to this PDPP and the collection, use, access, transfer, storage and processing of your personal information as described in the Policy.</p>
        
        <ol>
            <li><strong>Personal Data</strong><br /><br /><p>Personal data is any information that concerns you individually and would permit us to contact you, for example, your name, address, telephone/fax number, email address, resume or any information you submit to Grab Talent Private Limited, our , website, tablet and smartphone applications ("Applications") that identifies you individually.<br /><br />The Websites or the Applications cannot collect any personal information about you unless you provide it.<br /><br />You
can visit and browse the Grab Talent Private Limited Website and the Applications without revealing personal information about yourself, but not all functions will be available to you. You may also choose to disclose personal information about yourself. We may collect personal information from you when you:</p>
                <ol>
                    <li>Communicate with us through the different platforms of registering</li><br />
                    <li>Through website</li><br />
                    <li>Through mobile applications</li><br />
                    <li>Through telephone/call centre</li><br />
                    <li>Through our offices</li><br />
                    <li>Register or subscribe to any products/services e.g.: newsletter.</li><br />
                    <li>Participate in any of our surveys done internally or via an appointed third
party.</li><br />
                    <li>Enter into /participate/win in any contest/competition/loyalty programs run by
us.</li><br />
                    <li>Register interest and /or request for information regarding opportunities.</li><br />
                    <li>Respond to any job opportunity/marketing materials we send out.</li><br />
                    <li>Visit any of our offices</li><br />
                    <li>Visit or browse our website</li><br />
                    <li>Lodge a complaint with us</li><br />
                    <li>Provide feedback to us</li><br />
                    <li>Apply for a job</li>                    
                </ol>
            </li><br />
            
            <p>If you provide us with any Personal Data relating to a third party (e.g. information of your spouse, children, parents, and/or employees), by submitting such Personal Data to us, you represent to us that you have obtained the consent of the third party to provide us with their Personal Data for the purposes as listed below.</p>
            
            <li><strong>Changes to our Privacy Policy</strong><br /><br /><p>This Privacy Policy is effective as of 14 October 2015. From time to time, it may be necessary for Grab Talent Private Limited to change this Privacy Policy. If we change our policy, we will post the revised version here, so we suggest that you check here periodically for the most up-to-date version of our Privacy Policy. Rest assured, however, that any changes will not be retroactively applied and will not alter how we handle previously collected information</p>
                <ol>
                    <li>To verify your identity</li><br />
                    <li>To assess and process your application(s)/request(s) for our products or service</li><br />
                    <li>To provide you with the products and /or services you have requested</li><br />
                    <li>To administer and manage the products and/or services we provide you (including
but not limited to job opportunities, market intelligence, complaints, follow up and feedbacks)</li><br />
                    <li>To investigate and resolve any job opportunities, market intelligence, complaints
or other inquiries that you submit to us regarding our products and services</li><br />
                    <li>To detect and prevent fraudulent activities</li><br />
                    <li>To keep in contact with you and provide you with any information you have
requested</li><br />
                    <li>To engage in business transactions in respect of products and/or services to be
offered and provided to you</li><br />
                    <li>To establish and better manage any business relationship we may have with you</li><br />
                    <li>To process any communications you send us (e.g.: answering any queries and dealing
with any complaints or feedbacks</li><br />
                    <li>To help us monitor and improve our product and service performances</li><br />
                    <li>To maintain and develop our business system and infrastructure, including testing
and upgrading of these systems as we are always working on continuous improvement.</li><br />
                    <li>To manage staff training and quality assurance</li><br />
                    <li>To notify you about benefits and changes to the features of our products and/or services</li><br />
                    <li>To produce data, reports and statistics which shall be anonymized or aggregated in a manner that does not identify you as an individual</li><br />
                    <li>To investigate, respond to, or defend claims against Grab Talent Private Limited Pte Ltd</li><br />
                    <li>To conduct marketing activities (for example, market research, sending latest information on employers, new products/services</li><br />
                    <li>To maintain records required for internal investigations, audit or security purposes.</li><br />
                    
                </ol>
            </li>
            
            <li><strong>Disclosure and Transferring of Data</strong><br /><br /><p>We may disclose your personal data to the following third parties as may be required for any of the above purposes:</p>
                <ol>
                    <li>Law enforcement agencies and such bodies in compliance with the law and Order of a Court</li><br />
                    <li>Companies and/or organisations that act as our agents, contractors, service providers and/or professional advisers</li><br />
                    <li>Companies and/or organisations that assist us in processing the personal information</li><br />
                    <li>Our
business associates and other parties for purposes that are related to the purpose of collecting your personal information</li><br />
                    <li>Other parties in respect of whom you have given your consent</li>
                    
                </ol>
            </li><br />
            
            <li><strong>Cookies and Advertisers</strong><br /><br /><p>A cookie may be used in the processing of your personal information. A cookie is a text file placed into the memory of your computer and/or device by Grab
Talent Private Limited's computers. A copy of this text file is sent by your computer and/or device whenever it communicates with Grab Talent Private Limited's server. Grab Talent Private Limited use cookies to identity you. Grab Talent Private Limited may also collect the following information during your visit to the Websites<br /><br />The date and time you accessed each page on the Websites; The URL of any webpage from which you accessed the Websites; The web browser that you are using and the pages you accessed<br /><br />Some web pages may require you to provide a limited amount of personal data in order to enjoy certain services on the Websites (system login credentials, email address and contact, etc.). These personal data will only be used by Grab Talent Private Limited for its intended purpose only, i.e. to respond to your message and deliver the requested services.</p></li>

            <li><strong>External Links</strong><br /><br /><p>Grab Talent Private Limited Websites and Applications may contain links to other web sites not maintained or related to Grab Talent Private Limited. These links are provided as a service to users and are not sponsored by or affiliated with the Websites, Applications, or Grab Talent Private Limited. These websites may have their own privacy statement in place and we recommend that you review those statements if you visit any linked web sites. Grab Talent Private Limited is not responsible for the contents on the linked sites or any use of the sites.</p>
            </li>
            
            <li><strong>Security</strong><br /><br /><p>Grab Talent Private Limited shall take reasonable steps to safeguard your personal information against any loss, misuse, modification, unauthorized or accidental access or disclosure, alteration or destruction by having regard:</p>
                <ol>
                    <li>to the nature of the personal data and the harm that would
arise;</li><br />
                    <li>to the place or location where the personal data is stored;</li><br />
                    <li>to any security measures incorporated into any equipment in which the personal data is stored;</li><br />
                    <li>to the measures taken for ensuring the reliability, integrity and competence of personnel having access to the personal data; and</li><br />
                    <li>to the measures taken for ensuring the secure transfer of the personal data.</li>        
                </ol><br />
                <p>Grab Talent Private Limited shall ensure that any security policy developed or
implemented by Grab Talent Private Limited complies with the security standard required under the Act and any applicable law that may from time to time be in force.<br />Grab Talent Private Limited places great importance on the security of your personal information and ensures organisational security measures when processing your personal data.</p>
            </li>
            
            <li><strong>Retention</strong><br /><br /><p>Any personal information supplied by you will be retained by Grab Talent Private Limited for such period as is necessary for the purposes set out in this Policy or as may be deemed necessary by Grab Talent Private Limited&nbsp; or where otherwise required by law.</p>
            
            <li><strong>Purpose of Collection, Use and Disclosure of Your Personal Data</strong><br /><br /><p>This Privacy Policy is effective as of 14 October 2015. From time to time, it may be necessary for Grab Talent Private Limited to change this Privacy Policy. If we change our policy, we will post the revised version here, so we suggest that you check here periodically for the most up-to-date version of our Privacy Policy. Rest assured, however, that any changes will not be retroactively applied and will not alter how we handle previously collected information</p>
            </li>
            
            <li><strong>Changes to our Privacy Policy</strong><br /><br /><p>Grab Talent Private Limited may use the personal information collected through its Website or Applications primarily for the following purposes:</p>
            </li>
            
        </ol>
                      
    </div>
    
</div><br /><br />
<div class="clearfix"></div>