<?php $employernumber = $this->uri->segment(4); $employer_detail = $this->login_database->read_employer_information($employernumber); ?>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.employerListheading');?></h1>
			</div>
			<div class="col-md-6 no-padding">
                <div class="subpage-breadcrumbs">
					<a href="<?php echo https_url($this->lang->lang().'/site_admin/dashboard')?>">Home</a>&nbsp;/&nbsp;<a href="<?php echo https_url($this->lang->lang().'/site_admin/employer_list')?>">Employers</a>
				</div>
            </div>
		</div>
	</div>
    
    <div class="page-content container">
        <div class="row">
            <?php if($employer_detail) {
                foreach($employer_detail as $job) {
                    $Vidresume = $job['employer_video_url'];
            ?>
                <div class="row">
                    <div class="col-md-1">
                        <!-- Profile Picture Row - Start -->
                        <?php if( empty($job['employer_logo_url']) ) { ?>
                            <img alt="Avatar" src="/images/icons/employers.png" width="70px" />
                        <?php } else { ?>
                            <?php echo "<img src=/images/recruiter/logo/".$job['employer_logo_url']." alt='Recruiter_Avatar' width='70px' style='float:right;' /><br/>"; ?>
                        <?php } ?>
                        <!-- Profile Picture Row - End -->
                        
                    </div>
                    <div class="col-md-11">
                        <h2><?php echo $job['employer_name'].",".$job['employer_country']; ?></h2>
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    echo "<strong>".lang('siteadminusers.recruiteraddress')."</strong>:";
                                ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $job['employer_address']; ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    echo "<strong>".lang('siteadminusers.recruiterphone')."</strong>:";
                                ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $job['employer_phone']; ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    echo "<strong>".lang('siteadminusers.recruiterfax')."</strong>:";
                                ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $job['employer_fax']; ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    echo "<strong>Client since</strong>:";
                                ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo date("d-M-Y", strtotime($job['employer_created_date']) ); ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    echo "<strong>".lang('siteadminusers.recruiterdescription')."</strong>:";
                                ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $job['employer_description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3>No clients available.</h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
            
        </div>
    </div>
    
</div>