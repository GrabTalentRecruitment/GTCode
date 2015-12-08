<?php 
$jobedit_url = $this->lang->lang().'/recruiter/job_update';
$jobfunction_url = $this->lang->lang().'/recruiter/get_jobCatFunction';
$jobsubindustry_url = $this->lang->lang().'/recruiter/get_jobSubIndustry';
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
<div class="site-wrapper vert-offset-top-5">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <?php 
                $jobnumber = $this->uri->segment(4);
		$jobNumcond = "job_number='".$jobnumber."'";
		$this->db->select('job_number,job_title,job_salarydisplay,job_minsalary_currency,job_minmonth_salary,job_maxsalary_currency,job_maxmonth_salary,job_mandatory_skills,job_primaryworklocation_country,job_primaryworklocation_city,job_category,job_function,job_industry,job_sub_industry,job_benefits,job_workinghours,job_posted, job_hrcontactname,job_hrcontactemail,job_hiringmgrcontactname,job_hiringmgrcontactemail')->from('jobs')->where('job_number',$jobnumber);
		$query = $this->db->get();
		$jobs = $query->result_array();
                
                //$jobs = $this->session->userdata('job_detail'); ?>
                <div class="alert alert-success" role="alert" style="display: none;"></div>
                <div class="alert alert-danger" role="alert" style="display: none;"></div>                    
                <h3><b><img src="/images/icons/edit.png" alt="<?=lang('recruiterlogin.editjob');?>" title="<?=lang('recruiterlogin.editjob');?>" height="50px" /> <?=lang('recruiterlogin.editjob');?></b></h3><br />
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">                    
                    <?php $login = $this->session->userdata('recruiter_login'); ?>
                    <form action="<?php echo https_url('/recruiter/job_update'); ?>" method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal" enctype="multipart/form-data" novalidate>
                        <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
                        <?php foreach($jobs as $job) { ?>
                            <div class="form-group">
                                <label for="inputJobTitle" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobnumber');?></label>
                                <div class="col-sm-9">
                                    <label class="control-label"><?php echo $job['job_number'];?></label>
                                    <input type="hidden" id="inputJobNumber" name="inputJobNumber" value="<?php echo $job['job_number'];?>" />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobTitle" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobtitle');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobTitle" name="inputJobTitle" value="<?php echo $job['job_title'];?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobMandatorySkl" class="col-sm-3 control-label"><?=lang('candidatedash.skills');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobMandatorySkl" name="inputJobMandatorySkl" required data-role="tagsinput" placeholder="Add tags" value="<?php echo $job['job_mandatory_skills']; ?>"/>
                                    <p class="help-block">Please enter Tags and press enter to register.</p>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobMinSalary" class="col-sm-3 control-label"><?=lang('recruiterlogin.hometablecol3');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-2">
                                    <select id="inputJobMinSalCurrCode" name="inputJobMinSalCurrCode" class="required form-control">
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
                                <div class="col-sm-6">
                                	<div class="col-sm-5">
		                                <input type="text" class="form-control" id="inputJobMinSalary" name="inputJobMinSalary" value="<?php echo $job['job_minmonth_salary']; ?>" required />
		                        </div>
		                        <div class="col-sm-2 text-center"><label for="inputJobMinSalary" class="control-label">to</label></div>
		                        <div class="col-sm-5">
		                               <input type="text" class="form-control" id="inputJobMaxSalary" name="inputJobMaxSalary" value="<?php echo $job['job_maxmonth_salary']; ?>" required />
		                        </div>
                                </div>                            
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobSalaryDisp" class="col-sm-3 control-label"><?=lang('recruiterlogin.salarypublish')?><font color="red" size="4px">*</font> </label>
                                <div class="col-lg-9">
                                    <div class="radio">
                                        <label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispYes" value="yes"
                                        <?php if($job['job_salarydisplay'] == 'yes') { ?>
                                            checked />Yes</label>
                                        <?php } else { ?>
                                            />Yes</label>
                                        <?php } ?>&nbsp;&nbsp;
                                        <label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispNo" value="no"
                                        <?php if($job['job_salarydisplay'] == 'no') { ?>
                                            checked />No</label>
                                        <?php } else { ?>
                                            />No</label>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobHRcontactname" class="col-sm-3 control-label">HR/TA Contact Name<font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobHRcontactname" name="inputJobHRcontactname" placeholder="HR/TA Contact" value="<?php echo $job['job_hrcontactname']; ?>"  required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobHRcontactemail" class="col-sm-3 control-label">HR/TA Contact Email<font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputJobHRcontactemail" name="inputJobHRcontactemail" placeholder="HR/TA Contact Email" value="<?php echo $job['job_hrcontactemail']; ?>" required />
                                </div>
                            </div><br />
	                        <div class="form-group">
	                            <label for="inputJobHiringMgrname" class="col-sm-3 control-label">Hiring Manager Contact Name<font color="red" size="4px">*</font> </label>
	                            <div class="col-sm-9">
	                                <input type="text" class="form-control" id="inputJobHiringMgrname" name="inputJobHiringMgrname" value="<?php echo $job['job_hiringmgrcontactname']; ?>" placeholder="Hiring Manager Contact" required />
	                            </div>
	                        </div><br />
	                        <div class="form-group">
	                            <label for="inputJobHiringMgremail" class="col-sm-3 control-label">Hiring Manager Contact Email<font color="red" size="4px">*</font> </label>
	                            <div class="col-sm-9">
	                                <input type="email" class="form-control" id="inputJobHiringMgremail" name="inputJobHiringMgremail" value="<?php echo $job['job_hiringmgrcontactemail']; ?>" placeholder="Hiring Manager Contact Email" required />
	                            </div>
	                        </div><br />
                            <div class="form-group">
                                <label for="inputJobPriworklocctry" class="col-sm-3 control-label"><?=lang('recruiterlogin.priworklocationctry');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <select id="inputJobPriworklocctry" name="inputJobPriworklocctry" class="required form-control">
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
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobPriworkloccity" class="col-sm-3 control-label"><?=lang('recruiterlogin.priworklocationcity');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobPriworkloccity" name="inputJobPriworkloccity" value="<?php echo $job['job_primaryworklocation_city'];?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobCategory" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobcateg');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <select id="inputJobCategory" name="inputJobCategory" class="required form-control">
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
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobFunction" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobfunc');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <select id="inputJobFunction" name="inputJobFunction" class="required form-control">
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
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobIndustry" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobindustry');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <select id="inputJobIndustry" name="inputJobIndustry" class="required form-control">
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
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobSubIndustry" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobsubindustry');?> </label>
                                <div class="col-sm-9">
                                    <select id="inputJobSubIndustry" name="inputJobSubIndustry" class="required form-control">
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
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobDescription" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobdesc');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-9">
                                    <!--<textarea class="form-control" rows="16" id="inputJobDescription" name="inputJobDescription" placeholder="Job Description" required></textarea>-->
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
	                        	//echo htmlentities($jobDesc[0]['job_description'], ENT_QUOTES, "UTF-8");
	                            ?>
                                    </div>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobBenefits" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobbenefits');?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobBenefits" name="inputJobBenefits" value="<?php echo $job['job_benefits'];?>">
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobWorkingHours" class="col-sm-3 control-label"><?=lang('recruiterlogin.jobworkinghours');?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputJobWorkingHours" name="inputJobWorkingHours" value="<?php echo $job['job_workinghours'];?>">
                                </div>
                            </div><br />
                            <!--<div class="form-group">
                                <label for="inputVideoResume" class="col-sm-3 control-label"><?=lang('recruiterlogin.videointrotxt');?></label>
                                <div class="col-sm-8">
                                    <input type="file" name="userfile" id="userfile" value="" />
                                    <p class="help-block">Supported formats: .mp4, .mov (max. file size 2MB)<br />(width=560px, height=320px)</p>              
                                </div>
                                <div class="col-sm-2">
                                    <input type="hidden" id="FileUploadStatus" name="FileUploadStatus" value="" />
                                    <div id="response"></div>
                                </div>
                            </div>-->
                            <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="inputJobMethod" value="off" 
                                        <?php if($job['job_posted'] == 'off'){ ?>
                                            checked="true"
                                        <?php
                                            } 
                                        ?>
                                         ><?=lang('recruiterlogin.jobsavedraft');?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="inputJobMethod" value="on" 
                                        <?php if($job['job_posted'] == 'on'){ ?>
                                            checked="true"
                                        <?php
                                            }
                                        ?>
                                         ><?=lang('recruiterlogin.jobpublish');?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-job-create"><?=lang('recruiterlogin.jobupdatebuttonlabel')?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End of Row -->
            </div>  
        </div>
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - End -->