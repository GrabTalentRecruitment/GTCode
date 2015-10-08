<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-tagsinput.js" defer="true"></script>
<script type="text/javascript" src="/js/recruiter/recruiter_jobedit.js" defer="true"></script>
<div class="site-wrapper vert-offset-top-5">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <?php $jobs = $this->session->userdata('job_detail'); ?>
                <div class="alert alert-success" role="alert" style="display: none;"></div>
                <div class="alert alert-danger" role="alert" style="display: none;"></div>                    
                <h3><b><img src="/images/icons/edit.png" alt="<?=lang('recruiterlogin.editjob');?>" title="<?=lang('recruiterlogin.editjob');?>" height="50px" /> <?=lang('recruiterlogin.editjob');?></b></h3><br />
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">                    
                    <?php $login = $this->session->userdata('logged_in'); ?>
                    <form action="<?php echo https_url('/recruiter/job_update'); ?>" method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
                        <?php foreach($jobs as $job) { ?>
                            <div class="form-group">
                                <label for="inputJobTitle" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobnumber');?></label>
                                <div class="col-sm-10">
                                    <label class="control-label"><?php echo $job['job_number'];?></label>
                                    <input type="hidden" id="inputJobNumber" name="inputJobNumber" value="<?php echo $job['job_number'];?>" />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobTitle" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobtitle');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobTitle" name="inputJobTitle" value="<?php echo $job['job_title'];?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobMandatorySkl" class="col-sm-2 control-label"><?=lang('recruiterlogin.mandatoryskills');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobMandatorySkl" name="inputJobMandatorySkl" required data-role="tagsinput" placeholder="Add tags" value="<?php echo $job['job_mandatory_skills']; ?>"/>
                                    <p class="help-block">Please enter Tags and press enter to register.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputJobDesiredSkl" class="col-sm-2 control-label"><?=lang('recruiterlogin.desiredskills');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobDesiredSkl" name="inputJobDesiredSkl" required data-role="tagsinput" placeholder="Add tags" value="<?php echo $job['job_desired_skills']; ?>" />
                                    <p class="help-block">Please enter Tags and press enter to register.</p>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobMinSalary" class="col-sm-2 control-label"><?=lang('recruiterlogin.minmonthsalary');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-2">
                                    <select id="inputJobMinSalCurrCode" name="inputJobMinSalCurrCode" class="required form-control">
                                        <option value="0">--None--</option>
                                        <?php                                
                                            $MinSalcurr_code_list = $this->db->query('SELECT distinct(country_currency_code) FROM candidate_country order by country_currency_code')->result_array();
                                            foreach($MinSalcurr_code_list as $v) {
                                                if($v['country_currency_code'] == $job['job_minsalary_currency']) {
                                                    echo '<option value="'.$v['country_currency_code'].'" selected>'.$v['country_currency_code'].'</option>';    
                                                } else {
                                                    echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                                }
                                                
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputJobMinSalary" name="inputJobMinSalary" value="<?php echo $job['job_minmonth_salary']; ?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobMaxSalary" class="col-sm-2 control-label"><?=lang('recruiterlogin.maxmonthsalary');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-2">
                                    <select id="inputJobMaxSalCurrCode" name="inputJobMaxSalCurrCode" class="required form-control">
                                        <option value="0">--None--</option>
                                        <?php                                
                                            $MinSalcurr_code_list = $this->db->query('SELECT distinct(country_currency_code) FROM candidate_country order by country_currency_code')->result_array();
                                            foreach($MinSalcurr_code_list as $v) {
                                                if($v['country_currency_code'] == $job['job_minsalary_currency']) {
                                                    echo '<option value="'.$v['country_currency_code'].'" selected>'.$v['country_currency_code'].'</option>';    
                                                } else {
                                                    echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                                }
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputJobMaxSalary" name="inputJobMaxSalary" value="<?php echo $job['job_maxmonth_salary']; ?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobHRcontactname" class="col-sm-2 control-label">HR/TA Contact Name<font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobHRcontactname" name="inputJobHRcontactname" placeholder="HR/TA Contact" value="<?php echo $job['job_hrcontactname']; ?>"  required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobHRcontactemail" class="col-sm-2 control-label">HR/TA Contact Email<font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputJobHRcontactemail" name="inputJobHRcontactemail" placeholder="HR/TA Contact Email" value="<?php echo $job['job_hrcontactemail']; ?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobPriworklocctry" class="col-sm-2 control-label"><?=lang('recruiterlogin.priworklocationctry');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
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
                                <label for="inputJobPriworkloccity" class="col-sm-2 control-label"><?=lang('recruiterlogin.priworklocationcity');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobPriworkloccity" name="inputJobPriworkloccity" value="<?php echo $job['job_primaryworklocation_city'];?>" required />
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobCategory" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobcateg');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <select id="inputJobCategory" name="inputJobCategory" class="required form-control">
                                        <option>--None--</option>
                                        <option value="Executive" <?php if ($job['job_category'] == 'Executive') { echo "selected"; } ?> >Executive</option>
                                        <option value="Finance & Accounting" <?php if ($job['job_category'] == 'Finance & Accounting') { echo "selected"; } ?> >Finance & Accounting</option>
                                        <option value="Financial Services" <?php if ($job['job_category'] == 'Financial Services') { echo "selected"; } ?> >Financial Services</option>
                                        <option value="HR & GA" <?php if ($job['job_category'] == 'HR & GA') { echo "selected"; } ?> >HR & GA</option>
                                        <option value="Internal IT" <?php if ($job['job_category'] == 'Internal IT') { echo "selected"; } ?> >Internal IT</option>
                                    </select>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobFunction" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobfunc');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <select id="inputJobFunction" name="inputJobFunction" class="required form-control">
                                        <option>--None--</option>
                                        <option value="CEO/Country Manager/MD" <?php if ($job['job_function'] == 'CEO/Country Manager/MD') { echo "selected"; } ?> >CEO/Country Manager/MD</option>
                                        <option value="GM" <?php if ($job['job_function'] == 'GM') { echo "selected"; } ?> >GM</option>
                                        <option value="CFO" <?php if ($job['job_function'] == 'CFO') { echo "selected"; } ?> >CFO</option>
                                        <option value="CTO" <?php if ($job['job_function'] == 'CTO') { echo "selected"; } ?> >CTO</option>
                                        <option value="CIO (IT)" <?php if ($job['job_function'] == 'CIO (IT)') { echo "selected"; } ?> >CIO (IT)</option>
                                    </select>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobIndustry" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobindustry');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <select id="inputJobIndustry" name="inputJobIndustry" class="required form-control">
                                        <option>--None--</option>
                                        <option value="Financial Services" <?php if ($job['job_industry'] == 'Financial Services') { echo "selected"; } ?> >Financial Services</option>
                                        <option value="Consumer/Retail" <?php if ($job['job_industry'] == 'Consumer/Retail') { echo "selected"; } ?> >Consumer/Retail</option>
                                        <option value="Healthcare" <?php if ($job['job_industry'] == 'Healthcare') { echo "selected"; } ?> >Healthcare</option>
                                        <option value="Services" <?php if ($job['job_industry'] == 'Services') { echo "selected"; } ?> >Services</option>
                                        <option value="Technology/Online" <?php if ($job['job_industry'] == 'Technology/Online') { echo "selected"; } ?> >Technology/Online</option>
                                    </select>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobSubIndustry" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobsubindustry');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
                                    <select id="inputJobSubIndustry" name="inputJobSubIndustry" class="required form-control">
                                        <option>--None--</option>
                                        <option value="Financial Services" <?php if ($job['job_sub_industry'] == 'Financial Services') { echo "selected"; } ?> >Financial Services</option>
                                        <option value="Consumer/Retail" <?php if ($job['job_sub_industry'] == 'Consumer/Retail') { echo "selected"; } ?> >Consumer/Retail</option>
                                        <option value="Healthcare" <?php if ($job['job_sub_industry'] == 'Healthcare') { echo "selected"; } ?> >Healthcare</option>
                                        <option value="Services" <?php if ($job['job_sub_industry'] == 'Services') { echo "selected"; } ?> >Services</option>
                                        <option value="Technology/Online" <?php if ($job['job_sub_industry'] == 'Technology/Online') { echo "selected"; } ?> >Technology/Online</option>
                                    </select>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobDescription" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobdesc');?><font color="red" size="4px">*</font> </label>
                                <div class="col-sm-10">
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
                                    <div id="editor" name="inputJobDescription"><?php echo html_entity_decode($job['job_description']); ?></div>
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobBenefits" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobbenefits');?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobBenefits" name="inputJobBenefits" value="<?php echo $job['job_benefits'];?>">
                                </div>
                            </div><br />
                            <div class="form-group">
                                <label for="inputJobWorkingHours" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobworkinghours');?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputJobWorkingHours" name="inputJobWorkingHours" value="<?php echo $job['job_workinghours'];?>">
                                </div>
                            </div><br />
                            <!--<div class="form-group">
                                <label for="inputVideoResume" class="col-sm-2 control-label"><?=lang('recruiterlogin.videointrotxt');?></label>
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
                            <div class="col-sm-offset-2 col-sm-5">
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
                            <div class="col-sm-offset-2 col-sm-5">
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