<script type="text/javascript" src="/js/candidate/candidate_signup.js"></script>
<div class="site-content" >

    <div class="page-content container">
    
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 visible-xs-block hidden-md-block hidden-sm-block hidden-lg-block">
                <table style="text-align: center;">
                    <tr>
                        <td style="text-align: center; font-size:120%; color: grey;">
                            <span class="badge" style="font-size:120%;">1</span>&nbsp;&nbsp;Upload your CV
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size:200%">
                            <span class="fa fa-arrow-down"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size:120%; color: green;">
                            <span class="badge" style="font-size:120%; background-color: green;">2</span>&nbsp;&nbsp;Fill signup form
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size:200%">
                            <span class="fa fa-arrow-down"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size:120%; color: grey;">
                            <span class="badge" style="font-size:120%">3</span>&nbsp;&nbsp;Signup Complete
                        </td>
                    </tr>
                </table>
            </div>
		<div class="col-md-12 col-md-offset-1 col-sm-12 hidden-lg-block visible-md-block visible-sm-block hidden-xs-block">
                    <ul>
                        <li class="arrow_td" style="min-width:170px !important; width:0px !important;">1. Upload your CV</li>
                        <li class="arrow_td current" style="min-width:170px !important;">2. Fill signup form</li>
                        <li class="arrow_td" style="min-width:170px !important;">3. Signup Complete</li>
                    </ul>
                </div>
                
                <div class="col-lg-12 col-lg-offset-1 visible-lg-block hidden-md-block hidden-sm-block hidden-xs-block">
                    <ul>
                        <li class="arrow_td col-md-2">1. Upload your CV</li>
                        <li class="arrow_td current col-md-2">2. Fill signup form</li>
                        <li class="arrow_td col-md-3">3. Signup Complete</li>
                    </ul>
                </div>
        </div>
    
        <div class="candidate-register-form">
        
            <div class="row">
                <div class="col-md-12">                    
                    <form action="<?php echo https_url($this->lang->lang().'/signup/register_submit'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" autocomplete="off">
                    <h2 class="font-1">Candidate Registration</h2>
                    <div class="alert alert-danger" role="alert" id="modal-error-msg" style="display: none;"></div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                    <font color="red"><font color="red" size="4px">*</font> <?=lang('candidatesignup.mandatory');?><br />Email, Phonenumber + country phone code, Agree to our Terms &amp; Conditions</font>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="email" class="col-md-3">Your Resume</label>
                                <div class="col-md-9">
                                    <a href="<?php echo https_url($this->lang->lang()."/signup/candidate_resumedownload?id=".$this->input->get('id', TRUE)); ?>" target="_blank" />
                                        <img src="/images/icons/icon_resume.jpg" title="<?=lang('candidateprofile.viewResumeBtn')?>" style="cursor: pointer; height:40px !important;"/>Resume
                                    </a>
                                    <input type="hidden" id="inputresumeURL" name="inputresumeURL" value="<?php echo $this->input->get('id', TRUE); ?>" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="email" class="col-md-3 control-label">
                                    <?=lang('candidatesignup.email');?> <font color="red" size="4px">*</font>
                                </label>
                                <div class="col-md-9">
                                    <input type="email" id="inputemailAddress" name="inputemailAddress" value="<?php echo $candidateEmail; ?>" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputfirstName" class="col-md-3">
                                    <?=lang('candidatesignup.firstname');?>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" id="inputfirstName" name="inputfirstName" class="required"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputlastName" class="col-md-3">
                                    <?=lang('candidatesignup.lastname');?>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" id="inputlastName" name="inputlastName" class="required"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputphoneNumberCode" class="col-md-3">
                                    <?=lang('candidatesignup.countryofresidence');?>
                                </label>
                                <div class="col-md-9">
                                    <select id="inputphoneNumberCode" name="inputphoneNumberCode" class="required">
                                        <option value="0">Please Select</option>
                                        <?php                                
                                            $visa_status_list = $this->login_database->set_candCountry();
                                            foreach($visa_status_list as $v) {
                                                if($candidateResCountry != null || $candidateResCountry != "") {
                                                    echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')"';
                                                    if($v['country_name'] == $candidateResCountry) {
                                                        echo "selected";
                                                    }
                                                    echo '>'.$v['country_name'].'</option>';
                                                } else {
                                                    echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].'</option>';
                                                }                                                    
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputphoneNumber" class="col-xs-12 col-md-3">
                                    <?=lang('candidatesignup.phonenumber');?> <font color="red" size="4px">*</font>
                                </label>
                                <div class="col-sm-2 col-xs-4">
                                    <select id="id_phone_country_code" name="id_phone_country_code" class="required">
                                        <option value="0">Please Select</option>
                                        <?php                                
                                            $visa_status_list = $this->login_database->set_candCountry();
                                            foreach($visa_status_list as $v) {
                                                if($candidateCurrCode != null || $candidateCurrCode != "") {
                                                    echo '<option name="'.$v['country_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')"';
                                                    if($v['country_code'].' (+'.$v['country_phone_code'].')' == $candidateCurrCode) {
                                                        echo "selected";
                                                    }
                                                    echo '>'.$v['country_code'].' (+'.$v['country_phone_code'].')</option>';
                                                } else {
                                                    echo '<option name="'.$v['country_code'].' (+'.$v['country_phone_code'].') value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].'</option>';
                                                }                                                    
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-7 col-xs-8">
                                    <input type="text" id="inputphoneNumber" min="1" name="inputphoneNumber" class="required" maxlength="20" value="<?php echo $candidatephonenumber; ?>" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputGender" class="col-md-3">
                                    <?=lang('candidatesignup.gender');?>
                                </label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="radio" name="inputGender" id="inlineRadio1" value="Male" class="required" /> <?=lang('candidatesignup.genderoptn1');?>&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="inputGender" id="inlineRadio2" value="Female" class="required" /> <?=lang('candidatesignup.genderoptn2');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputNationality" class="col-md-3">
                                    <?=lang('candidatesignup.nationality');?>
                                </label>
                                <div class="col-md-9">
                                    <select id="inputNationality" name="inputNationality" class="required">
                                        <option value="0">Please Select</option>
                                        <?php                                
                                            $nationality_status_list = $this->login_database->set_candCountry();
                                            foreach($nationality_status_list as $v) {
                                                echo '<option value="'.$v['country_name'].'"';
                                                if($v['country_name'] == 'Singapore') {
                                                    echo "selected";
                                                }
                                                echo '>'.$v['country_name'].'</option>';
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputCurrentposition" class="col-md-3">
                                    <?=lang('candidatesignup.currentposition');?>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="inputCurrentposition" class="required" id="inputCurrentposition"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputCurrentcompany" class="col-md-3">
                                    <?=lang('candidatesignup.currentemployer');?>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="inputCurrentcompany" class="required" id="inputCurrentcompany"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputCompanylocation" class="col-md-3">
                                    <?=lang('candidatesignup.employerlocation');?>
                                </label>
                                <div class="col-md-9">
                                    <select id="inputCompanylocation" name="inputCompanylocation" class="required">
                                        <option value="0">Please Select</option>
                                        <?php                                
                                            $emp_location_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($emp_location_list as $v) {
                                                echo '<option value="'.$v['country_name'].'"';
                                                if($v['country_name'] == 'Singapore') {
                                                    echo "selected";
                                                }
                                                echo '>'.$v['country_name'].'</option>';
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputcurrentAnnualSal" class="col-xs-12 col-md-3 col-sm-12">
                                    <?=lang('candidatesignup.currentmonthsalary');?>
                                </label>
                                <div class="col-sm-2 col-xs-4 col-sm-4">
                                    <select id="inputcurrAnnualSalCode" name="inputcurrAnnualSalCode" class="required">
                                        <option value="0">--None--</option>
                                        <?php 
                                            $AnnualSalcurr_code_list = array("SGD", "USD", "GBP", "MYR", "INR", "IDR", "AUD", "JPY", "CNY");
                                            foreach($AnnualSalcurr_code_list as $annualSalCode) {
                                                echo '<option value="'.$annualSalCode.'">'.$annualSalCode.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-7 col-xs-8 col-sm-12">
                                    <input type="text" id="inputcurrentAnnualSal" name="inputcurrentAnnualSal" class="required" aria-label="Amount (to the nearest dollar)"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputexpAnnualSal" class="col-xs-12 col-md-3 col-sm-12">
                                    <?=lang('candidatesignup.expectmonthsalary');?>
                                </label>
                                <div class="col-sm-2 col-xs-4 col-sm-4">
                                    <select id="inputexpAnnualSalCode" name="inputexpAnnualSalCode">
                                        <option value="0">--None--</option>
                                        <?php
                                            $expAnnualSalcurr_code_list = array("SGD", "USD", "GBP", "MYR", "INR", "IDR", "AUD", "JPY", "CNY");
                                            foreach($expAnnualSalcurr_code_list as $expAnnualCode) {
                                                echo '<option value="'.$expAnnualCode.'">'.$expAnnualCode.'</option>';
                                            }                                   
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-7 col-xs-8 col-sm-12">
                                    <input type="text" id="inputexpAnnualSal" name="inputexpAnnualSal" aria-label="Amount (to the nearest dollar)"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputExperience" class="col-md-3">
                                    <?=lang('candidatesignup.totyearsexperience');?>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="inputTotExperience" id="inputTotExperience" maxlength="2" class="required"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <div class="col-sm-12">
                                    <table class="table-center" id="eduLvl_table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center"><?=lang('candidatesignup.educationcolumn1');?></th>
                                                <th class="text-center"><?=lang('candidatesignup.educationcolumn2');?></th>
                                                <th class="text-center"><?=lang('candidatesignup.educationcolumn3');?></th>
                                                <th class="text-center"><?=lang('candidatesignup.educationcolumn4');?></th>
                                                <th class="text-center"><?=lang('candidatesignup.educationcolumn5');?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="eduLvl_table_tbody">
                                            <tr id="addr0"></tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="button pull-right" data-toggle="modal" data-target="#eduLvlModal"><?=lang('candidatesignup.addeducationbtnlbl');?></button>
                                    <input type="text" name="inputEducationLvl" id="inputEducationLvl" value="" style="visibility: hidden;" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputcandSkills" class="col-md-3"> Skills </label>
                                <div class="col-md-6">
                                    <table class="skill-table">
                                        <thead>
                                            <tr>
                                                <th><?=lang('candidatedash.skilltblheading1');?></th>
                                                <th><?=lang('candidatedash.skilltblheading2');?></th>
                                                <th><?=lang('candidatedash.skilltblheading3');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $candSkillsstring = [];
                                                if( !empty($candidateSkills) ) {
                                                    $json_string = json_decode($candidateSkills, true);
                                                    foreach ($json_string as $key=>$value) {
                                                        echo "<tr>";
                                                        echo "<td>".$key."</td>";
                                                        echo "<td>".$this->login_database->candidate_skillrating($value)."</td>";
                                                        echo "<td>".$value."</td>";
                                                        echo "</tr>";
                                                        $tmpSkillsstring = $key.",".$this->login_database->candidate_skillrating($value).",".$value;
                                                        array_push($candSkillsstring, $tmpSkillsstring);           
                                                    }
                                                }
                                                
                                                $comma_separated = implode(";", $candSkillsstring);
                                            ?>
                                        </tbody>
                                    </table>
                                    <p class="help-block">Above tags were parsed from your resume, you can add more (or) remove them after login.</p>
                                </div>
                                <input type="hidden" name="inputCandSkills" id="inputCandSkills" value="<?php echo $comma_separated;?>" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group clearfix">
                                <label for="inputbriefDesc" class="col-md-3">
                                    <?=lang('candidatesignup.briefdescription');?>
                                </label>
                                <div class="col-md-9">
                                    <textarea id="inputbriefDesc" name="inputbriefDesc" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<p><input type="checkbox" id="inputjobalertagreement" name="inputjobalertagreement" rows="8" /> <?=lang('candidatesignup.jobalertagreement');?></p>
					<p><input type="checkbox" id="termsagreement" name="termsagreement" rows="8" /> <?=lang('candidatesignup.termsandconditions');?>&nbsp;<a data-toggle="modal" data-target="#getMsgModal" style="cursor: pointer;"><?=lang('candidatesignup.termsandconditionstxt');?></a></p>
				</div>
			</div>
			
                        <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<input type="submit" class="button" id="button-candidate-register-bottom" value="Save &amp; Create">
				</div>
			</div>
			
                    </form>
                    
                </div>
                
            </div>
            
        </div>
                
    </div>
    
</div> <!-- end site-content -->
<!-- Modal Dialog for Privacy Policy - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> <?=lang('candidatesignup.termsandconditionstxt');?> </h4>
            </div>
            <div class="modal-body" id="getCode"><?=lang('candidatesignup.termsandcond');?></div>
        </div>
    </div>
</div>
<!-- Modal Dialog for Privacy Policy - End -->

<!-- Education Level Modal Window -- Start -->
<div class="modal fade" id="eduLvlModal" tabindex="-1" role="dialog" aria-labelledby="eduLvlModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="eduLvlModalLabel"><?=lang('candidatesignup.addeducationpopuplbl');?></h4>
            </div>
            <div class="modal-body">
                <center><span id="modal-error-msg" style="color: red;"></span></center>
                <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                    <div class="form-group">
                        <label for="inputSchool" class="control-label"><?=lang('candidatesignup.educationcolumn1');?>:</label>
                        <input type="text" id="inputSchool" name="inputSchool" required/>
                    </div>
                    <div class="form-group">
                        <label for="educationlvl" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                        <select id="educationlvl" name="educationlvl" class="required">
                            <option value="0">None</option>
                            <?php echo view_education_level(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                        <input type="text" id="inputFieldofStudy" name="inputFieldofStudy" required/>
                    </div>
                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-xs-4 col-md-4">
                            <select id="edustart-date" name="edustart-date">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                    for($dt=1; $dt <= 31; $dt++) { echo '<option value="'.$dt.'">'.$dt.'</option>'; }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select id="edustart-month" name="edustart-month">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                foreach($month_list as $mth) { echo '<option value="'.$mth.'">'.$mth.'</option>'; }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select id="edustart-year" name="edustart-year">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                for($i = 2015; $i >= 1910; $i--) { echo '<option value="'.$i.'">'.$i.'</option>'; }
                                ?>
                            </select>
                        </div>
                    </div><br /><br />
                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-xs-4 col-md-4">
                            <select id="eduend-date" name="eduend-date">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                for($dt=1; $dt <= 31; $dt++) { echo '<option value="'.$dt.'">'.$dt.'</option>'; }
                                ?>
                            </select>
                        </div>                                    
                        <div class="col-xs-4 col-md-4">
                            <select id="eduend-month" name="eduend-month">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                foreach($month_list as $mth) { echo '<option value="'.$mth.'">'.$mth.'</option>'; }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select id="eduend-year" name="eduend-year">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                for($i = 2015; $i >= 1910; $i--) { echo '<option value="'.$i.'">'.$i.'</option>'; }
                                ?>
                            </select>
                        </div>
                    </div><br /><br />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="eduLvl-btn-add">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- Education Level Modal Window -- End -->

<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getErrMsgModal" tabindex="-1" role="dialog" aria-labelledby="myErrMsgModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myErrMsgModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getErrMsgCode"></div>
        </div>
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - End -->