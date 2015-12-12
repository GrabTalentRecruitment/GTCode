<?php 
$jobedit_url = $this->lang->lang().'/recruiter/job_update';
$jobfunction_url = $this->lang->lang().'/recruiter/get_jobCatFunction';
$jobsubindustry_url = $this->lang->lang().'/recruiter/get_jobSubIndustry';
$login = $this->session->userdata('recruiter_login');
?>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-tagsinput.js" defer="true"></script>
<script type="text/javascript" src="/js/recruiter/recruiter_jobedit.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
<input type="hidden" id="inputjobEditUrl" value="<?php echo https_url($jobedit_url); ?>" />
<input type="hidden" id="inputjobFunctionUrl" value="<?php echo https_url($jobfunction_url); ?>" />
<input type="hidden" id="inputjobSubIndustryUrl" value="<?php echo https_url($jobsubindustry_url); ?>" />
<?php 
    $jobnumber = $this->uri->segment(4);
    $jobNumcond = "job_number='".$jobnumber."'";
    $this->db->select('job_number,job_title,job_salarydisplay,job_minsalary_currency,job_minmonth_salary,job_maxsalary_currency,job_maxmonth_salary,job_mandatory_skills,job_primaryworklocation_country,job_primaryworklocation_city,job_category,job_function,job_industry,job_sub_industry,job_benefits,job_workinghours,job_posted, job_hrcontactname,job_hrcontactemail,job_hiringmgrcontactname,job_hiringmgrcontactemail')->from('jobs')->where('job_number',$jobnumber);
    $query = $this->db->get();
    $jobs = $query->result_array();
?>
<div class="site-content">   
        
        <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
        
        <!-- Alert message - start -->
        <div class="page-content container" id="modal-window" style="display:none; background-color:white; margin-top:5px; border-radius:10px;">
            <div class="modal-dialog modal-md">
                <div class="modal-header">
                    <h4 class="modal-title" id="displayMsg"></h4>
                </div>
            </div>
        </div>
        <!-- Alert message - end -->
    
        <div class="container page-header">
            <div class="row">
                <div class="col-md-6 no-padding">
                    <h1 class="page-title font-1"><?=lang('recruiterlogin.editjob');?></h1>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="page-submenu"></div>
                </div>
            </div>
        </div>
    
        
        <form action="<?php echo https_url('/recruiter/job_update'); ?>" method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal" enctype="multipart/form-data" novalidate>
    
        <?php foreach($jobs as $job) { ?>
        
            <div class="page-content container">
            
                <div class="new-job-form">
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobNumber"><?=lang('recruiterlogin.jobnumber');?></label>
                        </div>
                        <div class="col-md-9">
                            <label class="control-label"><?php echo $job['job_number'];?></label>
                            <input type="hidden" id="inputJobNumber" name="inputJobNumber" value="<?php echo $job['job_number'];?>" />
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobTitle"><?=lang('recruiterlogin.jobtitle');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobTitle" name="inputJobTitle" value="<?php echo $job['job_title'];?>" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobMandatorySkl"><?=lang('candidatedash.skills');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobMandatorySkl" name="inputJobMandatorySkl" required data-role="tagsinput" placeholder="Add tags" value="<?php echo $job['job_mandatory_skills']; ?>"/>
                            <span class="desc">Please enter Tags and press enter to register</span>
                        </div>
                    </div>
    
    		<div class="row">
                        <div class="col-md-3">
                            <label for="inputJobMinSalary"><?=lang('recruiterlogin.hometablecol3');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <select id="inputJobMinSalCurrCode" name="inputJobMinSalCurrCode">
                                        <option value="0">--None--</option>
                                        <?php                                
                                            $MinSalcurr_code_list = array("SGD","USD","GBP","INR","IDR","MYR","AUD","CNY","JPY"); 
                                            foreach($MinSalcurr_code_list as $minSalCode) {
                                                if($minSalCode == $job['job_minsalary_currency']) {
                                                    echo '<option value="'.$minSalCode.'" selected>'.$minSalCode.'</option>';    
                                                } else {
                                                    echo '<option value="'.$minSalCode.'">'.$minSalCode.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="inputJobMinSalary" name="inputJobMinSalary" value="<?php echo $job['job_minmonth_salary']; ?>" required />
                                </div>
                                <div class="col-sm-1" style="padding-top:10px;">--to--</div>
                                <div class="col-md-4">
                                    <input type="text" id="inputJobMaxSalary" name="inputJobMaxSalary" value="<?php echo $job['job_maxmonth_salary']; ?>" required />
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobSalaryDisp"><?=lang('recruiterlogin.salarypublish')?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="radio">
                                <label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispYes" value="yes"
                                <?php if($job['job_salarydisplay'] == 'yes') { ?> checked />Yes</label>
                                <?php } else { ?> />Yes</label>
                                <?php } ?>&nbsp;&nbsp;
                                <label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispNo" value="no"
                                <?php if($job['job_salarydisplay'] == 'no') { ?> checked />No</label>
                                <?php } else { ?> />No</label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobHRcontactname">HR/TA Contact Name<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobHRcontactname" name="inputJobHRcontactname" placeholder="HR/TA Contact" value="<?php echo $job['job_hrcontactname']; ?>" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobHRcontactemail">HR/TA Contact Email<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" id="inputJobHRcontactemail" name="inputJobHRcontactemail" placeholder="HR/TA Contact Email" value="<?php echo $job['job_hrcontactemail']; ?>" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobHiringMgrname">Hiring Manager Contact Name<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobHiringMgrname" name="inputJobHiringMgrname" value="<?php echo $job['job_hiringmgrcontactname']; ?>" placeholder="Hiring Manager Contact" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobHiringMgremail">Hiring Manager Contact Email<span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" id="inputJobHiringMgremail" name="inputJobHiringMgremail" value="<?php echo $job['job_hiringmgrcontactemail']; ?>" placeholder="Hiring Manager Contact Email" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobPriworklocctry"><?=lang('recruiterlogin.priworklocationctry');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select id="inputJobPriworklocctry" name="inputJobPriworklocctry">
                                <option value="0">--Please Select--</option>
                                <?php                                
                                    $emp_location_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                    foreach($emp_location_list as $v) {
                                        if($v['country_name'] == $job['job_primaryworklocation_country']) {
                                            echo '<option value="'.$v['country_name'].'" selected>'.$v['country_name'].'</option>';
                                        } else {
                                            echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobPriworkloccity"><?=lang('recruiterlogin.priworklocationcity');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobPriworkloccity" name="inputJobPriworkloccity" value="<?php echo $job['job_primaryworklocation_city'];?>" required />
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobCategory"><?=lang('recruiterlogin.jobcateg');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select id="inputJobCategory" name="inputJobCategory">
                                <option>--None--</option>
                                <?php
                                    $jobCategory = $this->login_database->get_jobCategory();
                                    $jobCatId = '';
                                    foreach($jobCategory as $jobCat) {                                                
                                        echo '<option id="'.$jobCat['job_category_id'].'" value="'.$jobCat['job_category_name'].'"';
                                        if($job['job_category'] == $jobCat['job_category_name']) {
                                            $jobCatId = $jobCat['job_category_id'];
                                            echo 'selected >';
                                        } else {
                                            echo '>';
                                        }
                                        echo $jobCat['job_category_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobFunction"><?=lang('recruiterlogin.jobfunc');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select id="inputJobFunction" name="inputJobFunction">
                                <option>--None--</option>
                                <?php
                                    $this->db->select('job_function_name')->from('job_function')->where('job_category_id', $jobCatId)->order_by("job_function_name", "asc");
                                    $query = $this->db->get();
                                    foreach ($query->result() as $row) { 
                                        echo "<option value='".$row->job_function_name."'";                                            
                                        if($job['job_function'] == $row->job_function_name) {
                                            echo "selected >";
                                        } else {
                                            echo ">";
                                        }
                                        echo $row->job_function_name."</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobIndustry"><?=lang('recruiterlogin.jobindustry');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select id="inputJobIndustry" name="inputJobIndustry">
                                <option>--None--</option>
                                <?php
                                    $jobIndustry = $this->login_database->get_jobIndustry();
                                    $jobIndId = '';
                                    foreach($jobIndustry as $jobInd) {
                                        echo '<option id="'.$jobInd['job_industry_id'].'" value="'.$jobInd['job_industry_name'].'"';
                                        if($job['job_industry'] == $jobInd['job_industry_name']) {
                                        $jobIndId = $jobInd['job_industry_id'];
                                            echo 'selected >';
                                        } else {
                                            echo '>';
                                        }
                                        echo $jobInd['job_industry_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobSubIndustry"><?=lang('recruiterlogin.jobsubindustry');?></label>
                        </div>
                        <div class="col-md-9">
                            <select id="inputJobSubIndustry" name="inputJobSubIndustry">
                                <option>--None--</option>
                                <?php
                                    $this->db->select('job_sub_industry_name')->from('job_sub_industry')->where('job_industry_id', $jobIndId)->order_by("job_sub_industry_name", "asc");
                                    $query = $this->db->get();
                                    foreach ($query->result() as $row) { 
                                        echo "<option value='".$row->job_sub_industry_name."'";                                            
                                        if($job['job_sub_industry'] == $row->job_sub_industry_name) {
                                            echo "selected >";
                                        } else {
                                            echo ">";
                                        }
                                        echo $row->job_sub_industry_name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobDescription"><?=lang('recruiterlogin.jobdesc');?><span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                                <div class="btn-group">
                                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-indent-left"></i></a>
                                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent-right"></i></a>
                                </div>
                            </div><br />
                            <div id="editor" name="inputJobDescription">
                                <?php 
                                    $this->db->select('job_description')->from('jobs')->where('job_number',$jobnumber);
                                    $jobDescquery = $this->db->get();
                                    $jobDesc = $jobDescquery->result_array();
                                    echo html_entity_decode($jobDesc[0]['job_description'], ENT_COMPAT, "UTF-8");
                                ?>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobBenefits"><?=lang('recruiterlogin.jobbenefits');?></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobBenefits" name="inputJobBenefits" value="<?php echo $job['job_benefits'];?>">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputJobWorkingHours"><?=lang('recruiterlogin.jobworkinghours');?></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputJobWorkingHours" name="inputJobWorkingHours" value="<?php echo $job['job_workinghours'];?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for=""></label>
                        </div>
                        <div class="col-md-9">
                            <label>
                                <input type="radio" name="inputJobMethod" value="off" <?php if($job['job_posted'] == 'off'){ ?> checked="true" <?php } ?> >&nbsp;&nbsp;<?=lang('recruiterlogin.jobsavedraft');?><br/>
                                <input type="radio" name="inputJobMethod" value="on" <?php if($job['job_posted'] == 'on'){ ?> checked="true" <?php } ?> >&nbsp;&nbsp;<?=lang('recruiterlogin.jobpublish');?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for=""></label>
                        </div>
                        <div class="col-md-9">
                            <button class="button" type="submit" id="button-job-update"><?=lang('recruiterlogin.jobupdatebuttonlabel')?></button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
    
        <?php } ?>
            
    </form>
        
</div>