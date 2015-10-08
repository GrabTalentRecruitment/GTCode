<?php $jobs = $this->session->userdata('job_detail'); ?>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <ol class="breadcrumb visible-lg-block">
                <li><a href="<?php echo https_url($this->lang->lang().'/candidate_dashboard',true); ?>"><?=lang('candidateJob.breadcrumblbl1');?></a></li>
                <li><a href="<?php echo https_url($this->lang->lang().'/candidate/jobs',true); ?>"><?=lang('candidateJob.breadcrumblbl2');?></a></li>
            </ol>
            <?php if($jobs) {
                foreach($jobs as $job) {
                    $Vidresume = $job['job_video_url'];                            
            ?>
                <div class="row">
                    <div class="col-xs-12 col-md-7 col-lg-7">
                        <h2><?php echo $job['job_title']; ?></h2>
                        <p><?php echo $job['job_primaryworklocation_city'].",".$job['job_primaryworklocation_country']; ?></p>
                        <p><strong><?=lang('candidateJob.catfunclbl');?>:</strong> <?php echo $job['job_category'].",".$job['job_function']; ?></p>
                        <p><strong><?=lang('candidateJob.indlbl');?>:</strong> <?php echo $job['job_industry'].",".$job['job_sub_industry']; ?></p>
                        <p><strong><?=lang('candidateJob.postDt');?>:</strong> <?php echo date("d-M-Y",strtotime($job['job_postdate'])); ?></p>
                        <p><strong><?=lang('candidateJob.salaryinfo');?>:</strong> <?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxsalary_currency']." ".$job['job_maxmonth_salary']; ?></p>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        <?php if( $Vidresume != "" || !empty($Vidresume) ) { ?>
                            <video width="520" height="350" controls class="col-xs-12 col-md-12 col-lg-12">
                                <source src="<?php echo "../../public/recruiter/".$job['job_video_url']; ?>" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>        
                        <?php } else { ?><br />
                            <img src="/images/no-video-pic.jpg" style="border: 1px solid black;" class="col-xs-12 col-md-12 col-lg-12" />
                        <?php } ?>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <p><strong><?=lang('candidateJob.jobdesc');?>:</strong></p>
                        <p><?php echo html_entity_decode($job['job_description']);?></p><br />
                        <p><strong><?=lang('candidateJob.benefits'); ?>:</strong></p>
                        <p><?php echo $job['job_benefits'];?></p><br />
                        <p><strong><?=lang('candidateJob.workhrs');?>:</strong></p>
                        <p><?php echo $job['job_workinghours'];?></p>
                    </div>
                </div>
            <?php } ?><hr />
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p><strong><?=lang('candidateJob.aboutclient');?>:</strong></p>
                    <?php $result = $this->login_database->fetch_job_details($this->session->userdata('job_detail')[0]['job_created_by']);?>
                    <p><?php echo $result[0]['employer_description'];?></p><br />
                    <p><strong><?=lang('candidateJob.empaddress');?>:</strong></p>
                    <p><?php echo $result[0]['employer_address'];?></p>
                    <iframe width="100%" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAQ5tk0I2Gu_FiK7MeotzNeNQi37LS01SE&q=<?php echo $result[0]['employer_address'];?>&attribution_source=Google+Maps+Embed+API&attribution_web_url=http://www.butchartgardens.com/&attribution_ios_deep_link_id=comgooglemaps://?daddr=Butchart+Gardens+Victoria+BC"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3><?=lang('candidateJob.404');?></h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>