<script type="text/javascript" src="/js/bootstrap/jquery.steps.js"></script>
<script type="text/javascript" src="/js/bootstrap/jquery.validate_1.13.1.js"></script>
<script type="text/javascript" src="/js/candidate/candidate_signup.js"></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-6"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="<?php echo https_url($this->lang->lang().'/signup/register_submit'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal application" role="form" id="example-form">
                        <div>
                            <h3><?=lang('candidatesignup.header1');?></h3>
                            <section>
                                <p style="text-align: right;"><font color="red"><font color="red" size="4px">*</font> <?=lang('candidatesignup.mandatory');?></font></p>
                                <label for="inputfirstName"><?=lang('candidatesignup.firstname');?>: <font color="red" size="4px">*</font></label>
                                    <input type="text" id="inputfirstName" name="inputfirstName" class="required form-control"/><br />
                                <label for="inputlastName"><?=lang('candidatesignup.lastname');?>: <font color="red" size="4px">*</font></label>
                                    <input type="text" id="inputlastName" name="inputlastName" class="required form-control"/><br />                                
                                <label for="email"><?=lang('candidatesignup.email');?>:</label>
                                    <input type="email" value="<?php echo $this->session->userdata('emailaddress'); ?>" class="form-control" disabled /><br />
                                <label for="inputphoneNumberCode"><?=lang('candidatesignup.countryofresidence');?>: <font color="red" size="4px">*</font></label>
                                    <select id="inputphoneNumberCode" name="inputphoneNumberCode" class="required form-control">
                                        <option value="0">----</option>
                                        <?php                                
                                            $visa_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($visa_status_list as $v) {
                                                echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].'</option>';
                                            }                                    
                                        ?>
                                    </select><br />
                                <label for="inputphoneNumber"><?=lang('candidatesignup.phonenumber');?>: <font color="red" size="4px">*</font></label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="id_phone_country_code"></span>
                                        <input type="text" id="inputphoneNumber" min="1" name="inputphoneNumber" class="required form-control" maxlength="20"/>
                                    </div><br />
                                <label for="inputGender" class="required"><?=lang('candidatesignup.gender');?>: <font color="red" size="4px">*</font></label>
                                <label class="radio-inline">
                                    <input type="radio" name="inputGender" id="inlineRadio1" value="Male" class="required" /> <?=lang('candidatesignup.genderoptn1');?>
                                </label>
                                <label class="radio-inline required">
                                    <input type="radio" name="inputGender" id="inlineRadio2" value="Female" class="required" /> <?=lang('candidatesignup.genderoptn2');?>
                                </label><br /><br />                                
                                <label for="inputNationality"><?=lang('candidatesignup.nationality');?>: <font color="red" size="4px">*</font></label>
                                <select id="inputNationality" name="inputNationality" class="required form-control">
                                    <option value="0">----</option>
                                    <?php                                
                                        $nationality_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                        foreach($nationality_status_list as $v) {
                                            echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                        }                                    
                                    ?>
                                </select><br />
                            </section>
                            <h3><?=lang('candidatesignup.header2');?></h3>
                            <section>
                                <p style="text-align: right;"><font color="red"><font color="red" size="4px">*</font> <?=lang('candidatesignup.mandatory');?></font></p>
                                <label for="inputCurrentposition"><?=lang('candidatesignup.currentposition');?>: <font color="red" size="4px">*</font></label>
                                    <input type="text" name="inputCurrentposition" class="form-control required" id="inputCurrentposition"/><br />
                                <label for="inputCurrentcompany"><?=lang('candidatesignup.currentemployer');?>: <font color="red" size="4px">*</font></label>
                                    <input type="text" name="inputCurrentcompany" class="form-control required" id="inputCurrentcompany"/><br />
                                <label for="inputCompanylocation"><?=lang('candidatesignup.employerlocation');?>: <font color="red" size="4px">*</font></label>
                                    <select id="inputCompanylocation" name="inputCompanylocation" class="required form-control">
                                        <option value="0">--Please Select--</option>
                                        <?php                                
                                            $emp_location_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($emp_location_list as $v) {
                                                echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                            }                                    
                                        ?>
                                    </select><br />
                                <label for="inputcurrentAnnualSal"><?=lang('candidatesignup.currentmonthsalary');?> <font color="red" size="4px">*</font></label>
                                <div class="row">
                                    <div class="col-xs-3 col-md-2">
                                        <select id="inputcurrAnnualSalCode" name="inputcurrAnnualSalCode" class="required form-control">
                                            <option value="0">--None--</option>
                                            <?php                                
                                                $AnnualSalcurr_code_list = $this->db->query('SELECT distinct(country_currency_code) FROM candidate_country order by country_currency_code')->result_array();
                                                foreach($AnnualSalcurr_code_list as $v) {
                                                    echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-3 col-md-10">
                                        <input type="text" id="inputcurrentAnnualSal" name="inputcurrentAnnualSal" class="required form-control" aria-label="Amount (to the nearest dollar)"/>
                                    </div>
                                </div><br />
                                <label for="inputexpAnnualSal"><?=lang('candidatesignup.expectmonthsalary');?></label>
                                <div class="row">
                                    <div class="col-xs-3 col-md-2">
                                        <select id="inputexpAnnualSalCode" name="inputexpAnnualSalCode" class="form-control">
                                            <option value="0">--None--</option>
                                            <?php                                
                                                $expAnnualSalcurr_code_list = $this->db->query('SELECT distinct(country_currency_code) FROM candidate_country order by country_currency_code')->result_array();
                                                foreach($expAnnualSalcurr_code_list as $v) {
                                                    echo '<option value="'.$v['country_currency_code'].'">'.$v['country_currency_code'].'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-3 col-md-10">
                                        <input type="text" id="inputexpAnnualSal" name="inputexpAnnualSal" class="form-control" aria-label="Amount (to the nearest dollar)"/>
                                    </div>
                                </div><br />
                                <label for="inputExperience"><?=lang('candidatesignup.totyearsexperience');?> <font color="red" size="4px">*</font></label>
                                <input type="text" name="inputTotExperience" id="inputTotExperience" maxlength="2" class="form-control required"/><br />
                            </section>
                            <h3><?=lang('candidatesignup.header3');?></h3>
                            <section>
                                <p style="text-align: right;"><font color="red"><font color="red" size="4px">*</font> <?=lang('candidatesignup.mandatory');?></font></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eduLvlModal"><?=lang('candidatesignup.addeducationbtnlbl');?></button><br /><br />
                                <table class="table table-bordered table-hover" id="eduLvl_table">
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
                                <input type="text" name="inputEducationLvl" id="inputEducationLvl" value="" style="visibility: hidden;" />
                                <label for="inputbriefDesc"><?=lang('candidatesignup.briefdescription');?>:</label>
                                <textarea id="inputbriefDesc" name="inputbriefDesc" rows="7" class="form-control"></textarea><br />
                                <label>
                                    <input type="checkbox" id="inputjobalertagreement" name="inputjobalertagreement"/> <?=lang('candidatesignup.jobalertagreement');?>
                                </label><br /><br />
                                <label id="lblTermsagreement" data-toggle="tooltip" data-placement="top" title="Please choose this option">
                                    <input type="checkbox" id="termsagreement" name="termsagreement"/> <?=lang('candidatesignup.termsandconditions');?>&nbsp;<a data-toggle="modal" data-target="#getMsgModal"><?=lang('candidatesignup.termsandconditionstxt');?></a>
                                </label><br /><br />
                            </section>
                        </div>
                    </form>
                    <!-- End of Form -->    
                </div>
                <!-- End of Row -->
            </div>
            
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
                                    <input type="text" class="form-control" id="inputSchool" name="inputSchool" required/>
                                </div>
                                <div class="form-group">
                                    <label for="educationlvl" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                                    <select id="educationlvl" name="educationlvl" class="required form-control">
                                        <option value="0">None</option>
                                        <?php echo view_education_level(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                                    <input type="text" class="form-control" id="inputFieldofStudy" name="inputFieldofStudy" required/>
                                </div>
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-xs-12 col-md-4">
                                        <select id="edustart-date" name="edustart-date" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-xs-12 col-md-4">
                                        <select id="edustart-month" name="edustart-month" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                foreach($month_list as $mth) {
                                                    echo '<option value="'.$mth.'">'.$mth.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <select id="edustart-year" name="edustart-year" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 2015; $i >= 1910; $i--) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                </div><br /><br />
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-xs-12 col-md-4">
                                        <select id="eduend-date" name="eduend-date" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                }                                    
                                            ?>
                                        </select>                                        
                                    </div>                                    
                                    <div class="col-xs-12 col-md-4">
                                        <select id="eduend-month" name="eduend-month" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                foreach($month_list as $mth) {
                                                    echo '<option value="'.$mth.'">'.$mth.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <select id="eduend-year" name="eduend-year" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 2015; $i >= 1910; $i--) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
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
        </div>
    </div>
</div>