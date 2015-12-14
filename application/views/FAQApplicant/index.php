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
    		     <h1 class="page-title font-1">FAQ Applicant</h1>
    		</div>
    	</div>
    </div>
    <div class="page-content container">
    
        <ol>
            <li><strong>Why is Grab Talent different from job boards?</strong><br /><br />
            <p>Unlike a job board, your details are simply not visible to anyone until you apply for a job that your skills match. Upon application, your details will still only be seen by the organization that posted the job, and no one else. We further differentiate our service due to our proprietary conditional probability-based matching algorithms.</p></li>
            
            <li><strong>Is it free to create a profile?</strong><br /><br />
            <p>Grab Talent is free for candidates to use. There are no hidden costs - when you create a profile you will have full access to the candidate platform.</p></li>
            
            <li><strong>I am currently not looking for a new role. Should I still sign up?</strong><br /><br />
            <p>Grab Talent is suitable for both passive and active candidates. You will receive job match alerts from us via email, so that you can keep a close eye on the job market, even though you are not actively looking to move, and with the assurance that your profile is 100% private.</p></li>
            
            <li><strong>Will my current employer/colleagues know that I am using Grab Talent
to find a new job?</strong><br /><br />
            <p>In short, no.</p></li>
            
            <li><strong>I created a profile but I have not matched any jobs. Why?</strong><br /><br />
            <p>New jobs are being added all the time. Our proprietary matching technology works around the clock to match candidates to roles. It is important to complete your profile and update it when necessary, as when jobs are posted or requirements change, match results are instantly updated. This saves valuable time and ensures that you don't miss that next opportunity.</p></li>
            
            <li><strong>Who uses Grab Talent?</strong><br /><br />
            <p>There are two types of users of Grab Talent; the first being companies looking to hire, the second
being candidates looking for their next role.<br /><br />Whether you are a global IT company looking for a software developer, or a management accountant looking for that next opportunity, Grab Talent is the intelligent choice in each case.</p></li>
        </ol>
        
    </div>
    
</div><br /><br />
<div class="clearfix"></div>