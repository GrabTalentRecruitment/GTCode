<?php 
$jobnumber = $this->uri->segment(4);
$jobNumcond = "job_number='".$jobnumber."'";
$this->db->select('*')->from('jobs')->where('job_number',$jobnumber);
$query = $this->db->get();
$jobs = $query->result_array(); 
?>
<div class="site-content" >
    <?php if($jobs) {
        foreach($jobs as $job) {                        
    ?>
    <div class="container page-header">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1 class="page-title font-1"><?php echo $job['job_title']; ?></h1>
            </div>
            <div class="col-md-6 no-padding">
                <div class="subpage-breadcrumbs">
                    <a href="<?php echo https_url($this->lang->lang().'/candidate_dashboard',true); ?>"><?=lang('candidateJob.breadcrumblbl1');?></a>&nbsp;/&nbsp;<a href="<?php echo https_url($this->lang->lang().'/candidate/jobs',true); ?>"><?=lang('candidateJob.breadcrumblbl2');?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="job-description">
                    <table class="info-table">
                        <tr>
                            <td><strong><?=lang('candidateJob.catfunclbl');?> :</strong></td>
                            <td><?php echo $job['job_category'].",".$job['job_function']; ?></td>
                        </tr>
                        <tr>
                            <td><strong><?=lang('candidateJob.indlbl');?> :</strong></td>
                            <td><?php echo $job['job_industry'].",".$job['job_sub_industry']; ?></td>
                        </tr>
                        <tr>
                            <td><strong><?=lang('candidateJob.postDt');?> :</strong></td>
                            <td><?php echo date("d-M-Y",strtotime($job['job_postdate'])); ?></td>
                        </tr>
                        <?php if($job['job_salarydisplay'] != "no") { ?>
                        <tr>
                            <td><strong><?=lang('candidateJob.salaryinfo');?> :</strong></td>
                            <td><?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxmonth_salary']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2"><strong><?=lang('candidateJob.jobdesc');?> :</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    <?php 
                                        $this->db->select('job_description')->from('jobs')->where('job_number',$jobnumber);
                                        $jobDescquery = $this->db->get();
                                        $jobDesc = $jobDescquery->result_array();
                                        echo html_entity_decode($jobDesc[0]['job_description'], ENT_COMPAT, "UTF-8");
        	                        ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?=lang('candidateJob.benefits'); ?>: </strong></td>
                            <td><?php echo $job['job_benefits'];?></td>
                        </tr>
                        <tr>
                            <td><strong><?=lang('candidateJob.workhrs');?>: </strong></td>
                            <td><?php echo $job['job_workinghours'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
        
            <div class="col-md-6 ">
                <p><strong><?=lang('candidateJob.aboutclient');?>: </strong></p>
                <p><?php $result = $this->login_database->fetch_job_details($job['job_created_by']);?></p>
                <p>&nbsp;</p>
                <p><strong><?=lang('candidateJob.empaddress');?>: </strong></p>
                <p><?php echo $result[0]['employer_address'];?></p>
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $result[0]['employer_address'];?>&zoom=18&size=600x300&maptype=roadmap%20&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:red%7Clabel:C%7C1.2821075,103.8487531" class="col-md-12 col-sm-12 col-xs-12" />
            </div>
        </div>
    
    </div>
    <?php } ?>
    <?php } else { ?>
        <div class="container page-header">
            <div class="row">
                <div class="col-md-12 no-padding text-center">
                    <h1 class="page-title font-1"><?=lang('candidateJob.404');?></h1>
                </div>
            </div>
        </div>
    <?php } ?>    
    
    <div class="clearfix"></div>

</div> <!-- end site-content -->