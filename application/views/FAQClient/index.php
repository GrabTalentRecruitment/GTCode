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
    		     <h1 class="page-title font-1">FAQ Client</h1>
    		</div>
    	</div>
    </div>
    <div class="page-content container">
    
        <ol>
            <li><strong>Why is Grab Talent different from job boards?</strong><br /><br />
            <p>Unlike job boards, candidate details are simply not visible to anyone until they apply for a job that their skills match. Upon application the candidate details will still only be seen by the organization
that posted the matched job, and no one else. We further differentiate our service due to our proprietary conditional probability-based matching algorithms.</p></li>

            <li><strong>Why should I use Grab Talent?</strong><br /><br />
            <p>Grab Talent delivers significant benefits by way of large cost savings due to improved efficiency and lower charges.</p></li>
            
            <li><strong>Who uses Grab Talent?</strong><br /><br />
            <p>There are two types of users of Grab Talent; the first being companies looking to hire, the second
being candidates looking for their next role.<br /><br />Whether you are a global IT company looking for a software developer, or a management accountant looking for that next opportunity, Grab Talent is the intelligent choice for each users.</p></li>

            <li><strong>I already have LinkedIn so why do I need Grab Talent?</strong><br /><br />
            <p>Grab Talent is a very different platform. Grab Talent provides a unique way to access candidates in a controlled and confidential fashion. It is not a candidate "database"; it is a talent market place where candidates are in control. Both Grab Talent and LinkedIn are complementary platforms that address different needs.</p></li>
            
            <li><strong>What are the fees?</strong><br /><br />
            <p>Grab Talent is a subscription-based service. Please refer to our website for details or contact us at <a href="mailto:<?php echo GT_SALES; ?>"><?php echo GT_SALES; ?></a>.</p></li>
            
            <li><strong>Can I use Grab Talent to search for candidates?</strong><br /><br />
            <p>One key difference between Grab Talent and other platforms is that candidates are in control. This means that candidates apply for roles that you create therefore, the accuracy and completeness of your specification is a key factor when candidates become matched to your roles.</p></li>
            
            <li><strong>Is Grab Talent only for recruiters or can HR/TA teams use it?</strong><br /><br />
            <p>Grab Talent can be used by anyone who is looking to hire talent. Whether you are a recruiter looking for candidates for your clients, or a hiring manager within a global MNC, Grab Talent has the reach to suit you.</p></li>
            
            <li><strong>I am not located in Singapore. Can I still use Grab Talent?</strong><br /><br />
            <p>Yes, Grab Talent is an international Internet-based platform, and is accessible from almost all countries around the world.</p></li>
            
            <li><strong>I posted a job but I have not had any applicants. Why is this?</strong><br /><br />
            <p>Our proprietary matching technology works around the clock to notify suitable candidates of your role. The candidate has complete control over their applications; therefore you will only see suitable applicants that have applied for your job.<br /><br />With this in mind, it is important to carefully draft your requirements and update them when necessary, so as to attract suitable talent.</p></li>
        
    </div>
    
</div><br /><br />
<div class="clearfix"></div>