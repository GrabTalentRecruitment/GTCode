<?php $jobcreate_url = $this->lang->lang().'/recruiter/job_register'; ?>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-tagsinput.js" defer="true"></script>
<script type="text/javascript" src="/js/recruiter/recruiter_jobcreate.js" defer="true"></script>
<input type="hidden" id="inputjobCreateUrl" value="<?php echo https_url($jobcreate_url); ?>" />
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-8 visible-sm"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="alert alert-success" role="alert" style="display: none;"></div>
                <div class="alert alert-danger" role="alert" style="display: none;"></div>                    
                <h3><b><img src="/images/icons/job.png" alt="<?=lang('recruiterlogin.createjob');?>" title="<?=lang('recruiterlogin.createjob');?>" height="50px" /> <?=lang('recruiterlogin.createjob');?></b></h3><br />
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">                    
                    <?php $login = $this->session->userdata('logged_in'); ?>
                    <form action="<?php echo https_url('/recruiter/job_register'); ?>" method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
                        <div class="form-group">
                            <label for="inputJobTitle" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobtitle');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobTitle" name="inputJobTitle" placeholder="<?=lang('recruiterlogin.jobtitle');?>" required autofocus>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobMandatorySkl" class="col-sm-2 control-label"><?=lang('recruiterlogin.mandatoryskills');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobMandatorySkl" name="inputJobMandatorySkl" required data-role="tagsinput" placeholder="Add tags" />
                                <p class="help-block">Please enter Tags and press enter to register.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJobDesiredSkl" class="col-sm-2 control-label"><?=lang('recruiterlogin.desiredskills');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobDesiredSkl" name="inputJobDesiredSkl" required data-role="tagsinput" placeholder="Add tags" />
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
                                            echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                        }                                    
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputJobMinSalary" name="inputJobMinSalary" placeholder="<?=lang('recruiterlogin.minmonthsalary');?>" required>
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
                                            echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                        }                                    
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputJobMaxSalary" name="inputJobMaxSalary" placeholder="<?=lang('recruiterlogin.maxmonthsalary');?>" required>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobHRcontactname" class="col-sm-2 control-label">HR/TA Contact Name<font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobHRcontactname" name="inputJobHRcontactname" placeholder="HR/TA Contact" required />
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobHRcontactemail" class="col-sm-2 control-label">HR/TA Contact Email<font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputJobHRcontactemail" name="inputJobHRcontactemail" placeholder="HR/TA Contact Email" required />
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
                                            echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                        }                                    
                                    ?>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobPriworkloccity" class="col-sm-2 control-label"><?=lang('recruiterlogin.priworklocationcity');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobPriworkloccity" name="inputJobPriworkloccity" placeholder="<?=lang('recruiterlogin.priworklocationcity');?>" required />
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobCategory" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobcateg');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <select id="inputJobCategory" name="inputJobCategory" class="required form-control">
                                    <option>--None--</option>
                                    <option>Executive</option>
                                    <option>Finance &amp; Accounting</option>
                                    <option>Financial Services</option>
                                    <option>HR &amp; GA</option>
                                    <option>Internal IT</option>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobFunction" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobfunc');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <select id="inputJobFunction" name="inputJobFunction" class="required form-control">
                                    <option>--None--</option>
                                    <option>CEO/Country Manager/MD</option>
                                    <option>GM</option>
                                    <option>CFO</option>
                                    <option>CTO</option>
                                    <option>CIO (IT)</option>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobIndustry" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobindustry');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <select id="inputJobIndustry" name="inputJobIndustry" class="required form-control">
                                    <option>--None--</option>
                                    <option>Financial Services</option>
                                    <option>Consumer/Retail</option>
                                    <option>Healthcare</option>
                                    <option>Services</option>
                                    <option>Technology/Online</option>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobSubIndustry" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobsubindustry');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
                                <select id="inputJobSubIndustry" name="inputJobSubIndustry" class="required form-control">
                                    <option>--None--</option>
                                    <option>Financial Services</option>
                                    <option>Consumer/Retail</option>
                                    <option>Healthcare</option>
                                    <option>Services</option>
                                    <option>Technology/Online</option>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobDescription" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobdesc');?><font color="red" size="4px">*</font> </label>
                            <div class="col-sm-10">
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
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobBenefits" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobbenefits');?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobBenefits" name="inputJobBenefits" placeholder="<?=lang('recruiterlogin.jobbenefits');?>" />
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="inputJobWorkingHours" class="col-sm-2 control-label"><?=lang('recruiterlogin.jobworkinghours');?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJobWorkingHours" name="inputJobWorkingHours" placeholder="<?=lang('recruiterlogin.jobworkinghours');?>" />
                            </div>
                        </div><br />
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="inputJobMethod" value="off" checked="true" /><?=lang('recruiterlogin.jobsavedraft');?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="inputJobMethod" value="on" /><?=lang('recruiterlogin.jobpublish');?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-job-create"><?=lang('recruiterlogin.registerbuttonlabel')?></button>
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