<?php $employernumber = $this->uri->segment(4); $employer_detail = $this->login_database->read_employer_information($employernumber); ?>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <ol class="breadcrumb visible-lg-block">
                <li><a href="<?php echo https_url($this->lang->lang().'/site_admin/dashboard')?>">Home</a></li>
                <li><a href="<?php echo https_url($this->lang->lang().'/site_admin/employer_list')?>">Employers</a></li>                        
            </ol>
            <?php if($employer_detail) {
                foreach($employer_detail as $job) {
                    $Vidresume = $job['employer_video_url'];
                    if($job['employer_active'] == "off") {
                        $jobPost = '[<font color="red">DRAFT</font>]';
                    } else {
                        $jobPost = '';
                    }
            ?>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2><?php echo $job['employer_name'].",".$job['employer_country']; ?></h2>
                        <p>
                            <?php 
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiteraddress')."</strong>: <br />".$job['employer_address']."<br/>";
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiterphone')."</strong>: ".$job['employer_phone']."&nbsp;&nbsp;&nbsp;";
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiterfax')."</strong>: ".$job['employer_fax']."<br/>";
                                echo "<strong style='line-height: 40px;'>Client since </strong>: ".date("d-M-Y", strtotime($job['employer_created_date']) )."<br/>";
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiterdescription')."</strong>: <br />".$job['employer_description']."<br/>";
                                
                            ?>
                        </p>
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