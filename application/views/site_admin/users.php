<?php
$clientusrcreateURL = $this->lang->lang().'/site_admin/clientuser_create';
$clientusrredirectURL = $this->lang->lang().'/site_admin/employers';
?>
<script type="text/javascript" src="/js/site_admin/siteAdmin_users.js"></script>
<div class="site-wrapper vert-offset-top-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3><img src="/images/icons/create.png" alt="<?=lang('siteadminusers.recruitercreate');?>" height="50px"/> <b><?=lang('siteadminusers.recruitercreate');?></b></h3><br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php $login = $this->session->userdata('logged_in'); ?>
                <form method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal">
                    <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
                    <input type="hidden" id="inputClientUsrCreateURL" name="inputClientUsrCreateURL" value="<?php echo https_url($clientusrcreateURL); ?>" />
                    <input type="hidden" id="inputClientredirectURL" name="inputClientredirectURL" value="<?php echo https_url($clientusrredirectURL); ?>" />
                    <div class="form-group">
                        <label for="inputRecruiterName" class="col-sm-2 control-label"><?=lang('siteadminusers.recruitername');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterName" name="inputRecruiterName" placeholder="<?=lang('siteadminusers.recruitername');?>" required autofocus>
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterWebAddress" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterwebAddress');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterWebAddress" name="inputRecruiterWebAddress" placeholder="<?=lang('siteadminusers.recruiterwebAddress');?>" required />
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterPhone" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterphone');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterPhone" name="inputRecruiterPhone" placeholder="<?=lang('siteadminusers.recruiterphone');?>" required />
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterFax" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterfax');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterFax" name="inputRecruiterFax" placeholder="<?=lang('siteadminusers.recruiterfax');?>" required />
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterAddress" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiteraddress');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <textarea rows="7" class="form-control" id="inputRecruiterAddress" name="inputRecruiterAddress"></textarea>
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterCountry" class="col-sm-2 control-label"><?=lang('siteadminusers.recruitercountry');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <select id="inputRecruiterCountry" name="inputRecruiterCountry" class="required form-control">
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
                        <label for="inputRecruiterDescription" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterdescription');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <textarea rows="7" class="form-control" id="inputRecruiterDescription" name="inputRecruiterDescription"></textarea>
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterContactFName" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterfirstname');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterContactFName" name="inputRecruiterContactFName" placeholder="<?=lang('siteadminusers.recruiterfirstname');?>" required />
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterContactLName" class="col-sm-2 control-label"><?=lang('siteadminusers.recruiterlastname');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterContactLName" name="inputRecruiterContactLName" placeholder="<?=lang('siteadminusers.recruiterlastname');?>" required />
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label for="inputRecruiterContactEmail" class="col-sm-2 control-label"><?=lang('siteadminusers.recruitercontactemail');?><font color="red" size="4px">*</font> </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputRecruiterContactEmail" name="inputRecruiterContactEmail" placeholder="<?=lang('siteadminusers.recruitercontactemail');?>" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="inputRecruiterStatus" value="off"><?=lang('siteadminusers.isActive');?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-client-create"><?=lang('siteadminusers.createclientbutton')?></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End of Row -->
        </div>  
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>