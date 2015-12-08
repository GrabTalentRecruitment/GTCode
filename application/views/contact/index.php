<script src="/js/contact/contact.js"></script>
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
		   <h1 class="page-title font-1"><?=lang('contact.heading1');?></h1>
	        </div>
            </div>
	</div>
    <div class="page-content container">
        <div class="row">            
            <div class="col-md-6 text-left">
                <p><a href="mailto:sales@grab-talent.com">sales@grab-talent.com</a></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8192827133153!2d103.84866901475397!3d1.2822155990648003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190e81029a3b%3A0x88af1d48e5dc27d7!2sFar+East+Finance+Building!5e0!3m2!1sen!2ssg!4v1448504449377" width="560"height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                
            </div>
            
            <div class="col-md-6 vert-offset-top-2">
                <div class="alert alert-success" role="alert" style="display: none;"></div>
                <div class="alert alert-danger" role="alert" style="display: none;"></div>
                <form action="/contact" method="post" accept-charset="utf-8" class="form-horizontal contact" role="form">
                    <div class="form-group">
                        <p class="col-xs-12"><?=lang('contact.headercontent');?></p>
                        <label class="col-xs-4"><?=lang('contact.label1');?>*</label>
                        <div class="col-xs-8">
                            <input name="firstname" type="text" class="<?php if (form_error('firstname')) echo " error" ?>" id="inputFirstName" value="<?php echo set_value('firstname'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label2');?>*</label>
                        <div class="col-xs-8">
                            <input name="lastname" type="text" class="<?php if (form_error('lastname')) echo " error" ?>" id="inputLastName" value="<?php echo set_value('lastname'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label3');?>*</label>
                        <div class="col-xs-8">
                            <input name="email" type="email" class="<?php if (form_error('email')) echo " error" ?>" id="inputEmail" value="<?php echo set_value('email'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label4');?></label>
                        <div class="col-xs-8">
                            <input name="phonenumber" type="number" min="0" class="<?php if (form_error('phonenumber')) echo " error" ?>" id="inputTel" value="<?php echo set_value('phonenumber'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label5');?>*</label>
                        <div class="col-xs-8">
                            <input name="reason" type="text" class="<?php if (form_error('reason')) echo " error" ?>" id="inputReason" value="<?php echo set_value('reason'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label6');?>*</label>
                        <div class="col-xs-8">
                            <textarea name="message" class="<?php if (form_error('message')) echo " error" ?>" id="inputMessage"><?php echo set_value('message'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary pull-right" id="button-contact-send">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>