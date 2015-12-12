<?php
$clientusrcreateURL = $this->lang->lang().'/site_admin/clientuser_create';
$clientusrredirectURL = $this->lang->lang().'/site_admin/employers';
?>
<script type="text/javascript" src="/js/site_admin/siteAdmin_users.js"></script>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.recruitercreate');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
    <div class="page-content container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php $login = $this->session->userdata('logged_in'); ?>
                <form method="post" accept-charset="utf-8" role="form" id="joborderform" class="form-horizontal">
                    <input type="hidden" id="inputEmail" name="inputEmail" value="<?php echo $login; ?>" />
                    <input type="hidden" id="inputClientUsrCreateURL" name="inputClientUsrCreateURL" value="<?php echo https_url($clientusrcreateURL); ?>" />
                    <input type="hidden" id="inputClientredirectURL" name="inputClientredirectURL" value="<?php echo https_url($clientusrredirectURL); ?>" />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterName"><?=lang('siteadminusers.recruitername');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterName" name="inputRecruiterName" placeholder="<?=lang('siteadminusers.recruitername');?>" required autofocus>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterWebAddress"><?=lang('siteadminusers.recruiterwebAddress');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterWebAddress" name="inputRecruiterWebAddress" placeholder="<?=lang('siteadminusers.recruiterwebAddress');?>" required />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterPhone"><?=lang('siteadminusers.recruiterphone');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterPhone" name="inputRecruiterPhone" placeholder="<?=lang('siteadminusers.recruiterphone');?>" required />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterFax"><?=lang('siteadminusers.recruiterfax');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterFax" name="inputRecruiterFax" placeholder="<?=lang('siteadminusers.recruiterfax');?>" required />
                        </div>
                    </div
                    ><br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterAddress"><?=lang('siteadminusers.recruiteraddress');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <textarea rows="7" id="inputRecruiterAddress" name="inputRecruiterAddress"></textarea>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterCountry"><?=lang('siteadminusers.recruitercountry');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <select id="inputRecruiterCountry" name="inputRecruiterCountry" class="required">
                                <option value="0">--Please Select--</option>
                                <?php                                
                                    $emp_location_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                    foreach($emp_location_list as $v) {
                                        echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterDescription"><?=lang('siteadminusers.recruiterdescription');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <textarea rows="7" id="inputRecruiterDescription" name="inputRecruiterDescription"></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterContactFName"><?=lang('siteadminusers.recruiterfirstname');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterContactFName" name="inputRecruiterContactFName" placeholder="<?=lang('siteadminusers.recruiterfirstname');?>" required />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterContactLName"><?=lang('siteadminusers.recruiterlastname');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterContactLName" name="inputRecruiterContactLName" placeholder="<?=lang('siteadminusers.recruiterlastname');?>" required />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputRecruiterContactEmail"><?=lang('siteadminusers.recruitercontactemail');?><font color="red" size="4px">*</font> </label>
                        </div>
                        
                        <div class="col-md-9">
                            <input type="text" id="inputRecruiterContactEmail" name="inputRecruiterContactEmail" placeholder="<?=lang('siteadminusers.recruitercontactemail');?>" required />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-9">
                            <button class="button" type="submit" id="button-client-create"><?=lang('siteadminusers.createclientbutton')?></button>
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