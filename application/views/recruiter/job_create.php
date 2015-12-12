<?php 
$jobcreate_url = $this->lang->lang().'/recruiter/job_register';
$jobfunction_url = $this->lang->lang().'/recruiter/get_jobCatFunction';
$jobsubindustry_url = $this->lang->lang().'/recruiter/get_jobSubIndustry';
$login = $this->session->userdata('recruiter_login');
?>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-tagsinput.js" defer="true"></script>
<script type="text/javascript" src="/js/recruiter/recruiter_jobcreate.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
<input type="hidden" id="inputjobCreateUrl" value="<?php echo https_url($jobcreate_url); ?>" />
<input type="hidden" id="inputjobFunctionUrl" value="<?php echo https_url($jobfunction_url); ?>" />
<input type="hidden" id="inputjobSubIndustryUrl" value="<?php echo https_url($jobsubindustry_url); ?>" />
<div class="site-content">
    
    <form action="<?php echo https_url('/recruiter/job_register'); ?>" method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal" enctype="multipart/form-data" novalidate>
        
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
                    <h1 class="page-title font-1"><?=lang('recruiterlogin.createjob');?></h1>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="page-submenu"></div>
                </div>
            </div>
        </div>
    
        <div class="page-content container">
            <div class="new-job-form">
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobTitle"><?=lang('recruiterlogin.jobtitle');?><span style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobTitle" name="inputJobTitle" placeholder="<?=lang('recruiterlogin.jobtitle');?>" required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobMandatorySkl"><?=lang('candidatedash.skills');?><span style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobMandatorySkl" name="inputJobMandatorySkl" required data-role="tagsinput" placeholder="Add tags" />
                        <span class="desc">Please enter Tags and press enter to register</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobMinSalCurrCode"><?=lang('recruiterlogin.hometablecol3');?><span style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <select id="inputJobMinSalCurrCode" name="inputJobMinSalCurrCode" class="required">
                                    <option value="0">--None--</option>
                                    <?php
                                        $MinSalcurr_code_list = array("SGD","USD","GBP","INR","IDR","MYR","AUD","CNY","JPY"); 
                                        foreach($MinSalcurr_code_list as $minSalCode) {
                                            echo '<option value="'.$minSalCode.'">'.$minSalCode.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" id="inputJobMinSalary" name="inputJobMinSalary" placeholder="<?=lang('recruiterlogin.minmonthsalary');?>" required />
                            </div>
                            <div class="col-sm-1" style="padding-top:10px;">--to--</div>
                            <div class="col-sm-4">
                                <input type="number" id="inputJobMaxSalary" name="inputJobMaxSalary" placeholder="<?=lang('recruiterlogin.maxmonthsalary');?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobSalDisp"><?=lang('recruiterlogin.salarypublish')?><span style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispYes" value="yes" checked />Yes</label>
                        &nbsp;&nbsp;<label><input type="radio" name="inputJobSalDisp" id="inputJobSalDispNo" value="no" />No</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobHRcontactname">HR/TA Contact Name<span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobHRcontactname" name="inputJobHRcontactname" placeholder="HR/TA Contact" required />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobHRcontactemail">HR/TA Contact Email<span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="email" id="inputJobHRcontactemail" name="inputJobHRcontactemail" placeholder="HR/TA Contact Email" required />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobHiringMgrname">Hiring Manager Contact Name<span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobHiringMgrname" name="inputJobHiringMgrname" placeholder="Hiring Manager Contact" required />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobHiringMgremail">Hiring Manager Contact Email<span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="email" id="inputJobHiringMgremail" name="inputJobHiringMgremail" placeholder="Hiring Manager Contact Email" required />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobPriworklocctry"><?=lang('recruiterlogin.priworklocationctry');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <select id="inputJobPriworklocctry" name="inputJobPriworklocctry" class="required">
                            <option value="0">--Please Select--</option>
                            <?php                                
                                $emp_location_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                foreach($emp_location_list as $v) {
                                    echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                }                                    
                            ?>
                        </select>
                        <p class="help-block">This is in relation to the job and not (HR/TA) office location.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobPriworkloccity"><?=lang('recruiterlogin.priworklocationcity');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobPriworkloccity" name="inputJobPriworkloccity" placeholder="<?=lang('recruiterlogin.priworklocationcity');?>" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobCategory"><?=lang('recruiterlogin.jobcateg');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <select id="inputJobCategory" name="inputJobCategory" class="required">
                            <option>--None--</option>
                            <?php
                                $jobCategory = $this->login_database->get_jobCategory();
                                foreach($jobCategory as $jobCat) {
                                    echo '<option id="'.$jobCat['job_category_id'].'" value="'.$jobCat['job_category_name'].'">'.$jobCat['job_category_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobFunction"><?=lang('recruiterlogin.jobfunc');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <select id="inputJobFunction" name="inputJobFunction"><option>--None--</option></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobIndustry"><?=lang('recruiterlogin.jobindustry');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <select id="inputJobIndustry" name="inputJobIndustry">
                            <option>--None--</option>
                            <?php
                                $jobIndustry = $this->login_database->get_jobIndustry();
                                foreach($jobIndustry as $jobInd) {
                                    echo '<option id="'.$jobInd['job_industry_id'].'" value="'.$jobInd['job_industry_name'].'">'.$jobInd['job_industry_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobSubIndustry"><?=lang('recruiterlogin.jobsubindustry');?><span style="color: red;">*</span></label><br />
                    </div>
                    <div class="col-md-9">
                        <select id="inputJobSubIndustry" name="inputJobSubIndustry"><option>--None--</option></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobDescription"><?=lang('recruiterlogin.jobdesc');?><span style="color: red;">*</span></label><br />
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
                        <div id="editor" name="inputJobDescription"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobBenefits"><?=lang('recruiterlogin.jobbenefits');?></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobBenefits" name="inputJobBenefits" placeholder="<?=lang('recruiterlogin.jobbenefits');?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputJobWorkingHours"><?=lang('recruiterlogin.jobworkinghours');?></label><br />
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="inputJobWorkingHours" name="inputJobWorkingHours" placeholder="<?=lang('recruiterlogin.jobworkinghours');?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-9">
                        <input type="radio" name="inputJobMethod" value="off" checked="true" /><?=lang('recruiterlogin.jobsavedraft');?><br />
                        <input type="radio" name="inputJobMethod" value="on" /><?=lang('recruiterlogin.jobpublish');?>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-9">
                        <button class="button" type="submit" id="button-job-create"><?=lang('recruiterlogin.registerbuttonlabel')?></button>
                    </div>
                </div>
            
            </div><!-- end new job form -->	
        </div>
        <div class="clearfix"></div>
        
    </form>
    
</div> <!-- end site-content -->