<?php $sess_data = $this->session->userdata('user_data'); $uriArr = $this->uri->segment_array(); ?>
<input type="hidden" value="<?php echo $uriArr[4];?>" id="inputQueryString" />
<input type="hidden" value="<?php echo $sess_data[0]['candidate_email'];?>" name="candidate-email" />
<input type="hidden" value="<?php echo $sess_data[0]['candidate_ref_id'];?>" name="candrefid" />
<?php if( count($uriArr)>4 ) { ?>
<input type="hidden" value="<?php echo $uriArr[5];?>" id="postcandcoderefid" />
<input type="hidden" value="<?php echo $uriArr[6];?>" id="postrefid" />
<?php } ?>
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_skill');?>" id="inputCandAddSkillURL" />

<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_candidate_ref');?>" id="inputCandaddRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_candidate_ref');?>" id="inputCandfetchRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_candidate_ref');?>" id="inputCandeditRefURL" />

<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_academic_details');?>" id="inputCandAcaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_academic_details');?>" id="inputCandfetchacaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_academic_details');?>" id="inputCandeditacaddetURL" />

<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_Workexp');?>" id="inputCandaddWorkexURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_work_exp');?>" id="inputCandfetchWorkexURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_work_exp');?>" id="inputCandeditWorkexURL" />

<!-- Skill Modal Window -- Start -->
<div id="skillModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="skillModalLabel"><?=lang('candidatedash.skilltblheadingpopup');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="recipient-name" class="control-label"><?=lang('candidatedash.skilltblheading1');?>:</label>
                    <input type="text" id="skill-name" name="skill-name"/>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.skilltblheading2');?>:</label>
                    <select id="skill-level" name="skill-level">
                        <option value="0">--None--</option>
                        <option value="Basic">Basic</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.skilltblheading3');?>:</label>
                    <select id="skill-rating" name="skill-rating">
                        <option value="0">--None--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="button" id="skill-btn-save">Save</button>
            <button type="button" class="button" id="back1_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Skill Modal Window -- End -->
        
<!-- Candidate References Modal Window -- Start -->
<div id="candRefModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="candRefModalLabel"><?=lang('candidatedash.candidatereferencepopup');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="candRef-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="candref-name"><?=lang('candidatedash.candidaterefheading1');?>:</label>
                    <input type="text" id="candref-name" name="candref-name">
                </div>
                <div class="form-group">
                    <label for="candref-company"><?=lang('candidatedash.candidaterefheading2');?>:</label>
                    <input type="text" id="candref-company" name="candref-company">
                </div>
                <div class="form-group">
                    <label for="candref-email"><?=lang('candidatedash.candidaterefheading3');?>:</label>
                    <input type="email" id="candref-email" name="candref-email">
                </div>
                <div class="form-group">
                    <label for="candref-contactnumber"><?=lang('candidatedash.candidaterefheading4');?>:</label>
                    <select id="candref-NumberCode" name="candref-NumberCode">
                        <option value="0">--Please Select--</option>
                        <?php                                
                            $visa_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                            foreach($visa_status_list as $v) {
                                echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].' (+'.$v['country_phone_code'].')</option>';
                            }                                    
                        ?>
                    </select><br /><br />
                    <input type="number" min="1" id="candref-contactnumber" name="candref-contactnumber"/>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="button" id="cand-ref-btn-save">Save</button>
            <button type="button" class="button" id="back2_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Candidate References Modal Window -- End -->
        
<!-- Candidate References Update Modal Window -- Start -->
<div id="candRefUpdModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="candRefUpdModalLabel"><?=lang('candidatedash.candidatereferencepopup');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="candRefUpd-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="candref-name" class="control-label"><?=lang('candidatedash.candidaterefheading1');?>:</label>
                    <input type="text" id="candrefUpd-name" name="candrefUpd-name"/>
                </div>
                <div class="form-group">
                    <label for="candref-company" class="control-label"><?=lang('candidatedash.candidaterefheading2');?>:</label>
                    <input type="text" id="candrefUpd-company" name="candrefUpd-company"/>
                </div>
                <div class="form-group">
                    <label for="candref-email" class="control-label"><?=lang('candidatedash.candidaterefheading3');?>:</label>
                    <input type="email" id="candrefUpd-email" name="candrefUpd-email"/>
                </div>
                <div class="form-group">
                    <label for="candref-contactnumber" class="control-label"><?=lang('candidatedash.candidaterefheading4');?>:</label>
                    <select id="candrefUpd-NumberCode" name="candrefUpd-NumberCode" class="required">
                        <option value="0">--Please Select--</option>
                        <?php                                
                            $visa_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                            foreach($visa_status_list as $v) {
                                echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].' (+'.$v['country_phone_code'].')</option>';
                            }                                    
                        ?>
                    </select><br /><br />
                    <input type="text" id="candrefUpd-contactnumber" name="candrefUpd-contactnumber"/>
                    <?php if( count($uriArr)>4 ) { ?>
                        <input type="hidden" value="<?php echo $uriArr[6];?>" id="candrefUpd-refCode" name="candrefUpd-refCode" />
                    <?php } ?>                        
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="button" id="candref-btn-update">Update</button>
            <button type="button" class="button" id="back3_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Candidate References Update Modal Window -- End -->
        
<!-- Education Level Modal Window -- Start -->
<div id="eduLvlModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="eduLvlModalLabel"><?=lang('candidatesignup.addeducationpopuplbl');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="eduLvl-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="educLvl-School" class="control-label"><?=lang('candidatesignup.educationcolumn1');?>:</label>
                    <input type="text" id="educLvl-School" name="educLvl-School" required/>
                </div>
                <div class="form-group">
                    <label for="educLvl-Degree" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                    <select id="educLvl-Degree" name="educLvl-Degree" class="required">
                        <option value="0">None</option>
                        <?php echo view_education_level(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                    <input type="text" id="educLvl-FieldofStudy" name="educLvl-FieldofStudy" required/>
                </div>
                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                <div class="form-group">                                    
                    <div class="col-sm-4">
                        <select id="educLvl-startDate" name="educLvl-startDate">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                            <?php
                                for($dt=1; $dt <= 31; $dt++) {
                                    if($dt < 10) {
                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                    } else {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }
                                }                                    
                            ?>
                        </select>
                    </div>                                    
                    <div class="col-sm-4">
                        <select id="educLvl-startMonth" name="educLvl-startMonth">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                            <?php
                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                foreach($month_list as $key => $mth) {
                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                }                                     
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="educLvl-startYear" name="educLvl-startYear">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                            <?php                                            
                                for($i = 1910; $i <= 2015; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }                                    
                            ?>
                        </select>
                    </div>
                </div><br /><br />
                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                <div class="form-group">                                    
                    <div class="col-sm-4">
                        <select id="educLvl-endDate" name="educLvl-endDate">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                            <?php
                                for($dt=1; $dt <= 31; $dt++) {
                                    if($dt < 10) {
                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                    } else {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }
                                }                                   
                            ?>
                        </select>                                        
                    </div>                                    
                    <div class="col-sm-4">
                        <select id="educLvl-endMonth" name="educLvl-endMonth">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                            <?php
                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                foreach($month_list as $key => $mth) {
                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                }                                     
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="educLvl-endYear" name="educLvl-endYear">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                            <?php                                            
                                for($i = 1910; $i <= 2015; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }                                    
                            ?>
                        </select>
                    </div>
                </div><br /><br />
                <input type="hidden" id="educLvl-refCode" name="educLvl-refCode" />
            </form>
        </div><br />
        <div class="modal-footer">
            <button type="button" class="button" id="eduLvl-btn-add">Save</button>
            <button type="button" class="button" id="back4_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Education Level Update Modal Window -- End -->
        
<!-- Education Level Modal Window -- Start -->
<div id="eduLvlUpdModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="eduLvlUpdModalLabel"><?=lang('candidatesignup.addeducationpopuplbl');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="educLvlUpd-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="educLvlUpd-School" class="control-label"><?=lang('candidatesignup.educationcolumn1');?>:</label>
                    <input type="text" id="educLvlUpd-School" name="educLvlUpd-School" required/>
                </div>
                <div class="form-group">
                    <label for="educLvlUpd-Degree" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                    <select id="educLvlUpd-Degree" name="educLvlUpd-Degree" class="required">
                        <option value="0">None</option>
                        <?php                                
                            $Highdegree_list = array(
                                "Doctorate" => "Doctorate", "Master" => "Master", "Degree" => "Degree",
                                "Diploma" => "Diploma", "Professional Certification" => "Professional Certification",
                                "Higher Nitec" => "Higher Nitec", "Nitec" => "Nitec", "A-Level" => "A-Level",
                                "O-Level" => "O-Level", "N-Level" => "N-Level", "Primary" => "Primary", "N/A" => "N/A"
                            );
                            foreach($Highdegree_list as $k => $v) {
                                echo '<option value="'.$k.'">'.$v.'</option>';
                            }                                    
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                    <input type="text" id="educLvlUpd-FieldofStudy" name="educLvlUpd-FieldofStudy" required/>
                </div>
                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                <div class="form-group">                                    
                    <div class="col-sm-4">
                        <select id="educLvlUpd-startDate" name="educLvlUpd-startDate">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                            <?php
                                for($dt=1; $dt <= 31; $dt++) {
                                    if($dt < 10) {
                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                    } else {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }
                                }                                    
                            ?>
                        </select>
                    </div>                                    
                    <div class="col-sm-4">
                        <select id="educLvlUpd-startMonth" name="educLvlUpd-startMonth">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                            <?php
                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                foreach($month_list as $key => $mth) {
                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                }                                     
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="educLvlUpd-startYear" name="educLvlUpd-startYear">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                            <?php                                            
                                for($i = 1910; $i <= 2015; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }                                    
                            ?>
                        </select>
                    </div>
                </div><br /><br />
                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                <div class="form-group">                                    
                    <div class="col-sm-4">
                        <select id="educLvlUpd-endDate" name="educLvlUpd-endDate">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                            <?php
                                for($dt=1; $dt <= 31; $dt++) {
                                    if($dt < 10) {
                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                    } else {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }
                                }                                   
                            ?>
                        </select>                                        
                    </div>                                    
                    <div class="col-sm-4">
                        <select id="educLvlUpd-endMonth" name="educLvlUpd-endMonth">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                            <?php
                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                foreach($month_list as $key => $mth) {
                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                }                                     
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select id="educLvlUpd-endYear" name="educLvlUpd-endYear">
                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                            <?php                                            
                                for($i = 1910; $i <= 2015; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }                                    
                            ?>
                        </select>
                    </div>
                </div><br /><br />
                <?php if( count($uriArr)>4 ) { ?>
                    <input type="hidden" value="<?php echo $uriArr[6];?>" id="educLvlUpd-refCode" name="educLvlUpd-refCode" />
                <?php } ?>
            </form>
        </div><br />
        <div class="modal-footer">
            <button type="button" class="button" id="eduLvlUpd-btn-update">Update</button>
            <button type="button" class="button" id="back5_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Education Level Update Modal Window -- End -->

<!-- Work Experience Modal Window -- Start -->
<div id="workExpModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="workExpModalLabel"><?=lang('candidatedash.workexptblheadingpopup');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="workExp-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="employer-name" class="control-label"><?=lang('candidatedash.workexptblheading1');?>:</label>
                    <input type="text" id="employer-name" name="employer-name"/>
                </div>
                <div class="form-group">
                    <label for="employer-designation" class="control-label"><?=lang('candidatedash.workexptblheading2');?>:</label>
                    <input type="text" id="employer-designation" name="employer-designation"/>
                </div>
                <div class="form-group">
                    <label for="designation" class="control-label"><?=lang('candidatedash.workexptblheading3');?>:</label>
                    <input type="text" id="employer-salary" name="employer-salary"/>
                </div>
                <div class="form-group">
                    <label for="employer-country" class="control-label"><?=lang('candidatedash.workexptblheading4');?>:</label>
                    <select id="employer-country" name="employer-country">
                        <option value="0">--None--</option>
                        <?php
                            $nationality_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                            foreach($nationality_status_list as $v) {
                                echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                            }                                    
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading5');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-sm-4">
                            <select id="employer-startDate" name="employer-startDate">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                    for($dt=1; $dt <= 31; $dt++) {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>                                    
                        <div class="col-sm-4">
                            <select id="employer-startMonth" name="employer-startMonth">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                    $i = 1;
                                    $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                    foreach($month_list as $mth) {
                                        echo '<option value="'.$i.'">'.$mth.'</option>';
                                        $i++;
                                    }                                    
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="employer-startYear" name="employer-startYear">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                    for($i = 1910; $i <= 2015; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                    </div>
                </div><br /><br />
                <?php 
                    foreach($sess_data as $usrdt){
                        $condition = "candidate_curr_job ='true' AND candidate_email='".$usrdt['candidate_email']."'";
                        $this->db->select('*')->from('candidate_employment')->where($condition);
                        $query = $this->db->get();
                    }
                    if( $query->num_rows() <= 0) {
                ?>
                <div class="form-group">                                    
                    <label for="employer-currJob" class="control-label"><?=lang('candidatedash.workexpCurrentjob');?>:</label>
                    <input type="checkbox" name="employer-currJob" id="employer-currJob" />
                </div>
                <?php        
                    }
                ?>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading6');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-sm-4">
                            <select id="employer-endDate" name="employer-endDate">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                    for($dt=1; $dt <= 31; $dt++) {
                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>                                    
                        <div class="col-sm-4">
                            <select id="employer-endMonth" name="employer-endMonth">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                    $i = 1;
                                    $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                    foreach($month_list as $mth) {
                                        echo '<option value="'.$i.'">'.$mth.'</option>';
                                        $i++;
                                    }                                    
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="employer-endYear" name="employer-endYear">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                    for($i = 1910; $i <= 2015; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                    </div>
                </div><br />
            </form>
        </div><br /><br />
        <div class="modal-footer">
            <button type="button" class="button" id="workExp-btn-save">Save</button>
            <button type="button" class="button" id="back6_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Work Experience Modal Window -- End -->
        
<!-- Work Experience Update Modal Window -- Start -->
<div id="workExpUpdModal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="workExpUpdModalLabel"><?=lang('candidatedash.workexptblheadingpopup');?></h4>
        </div>
        <div class="modal-body">
            <center><span id="workExpUpd-modal-error-msg" style="color: red;"></span></center>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                <div class="form-group">
                    <label for="employerUpd-name" class="control-label"><?=lang('candidatedash.workexptblheading1');?>:</label>
                    <input type="text" id="employerUpd-name" name="employerUpd-name"/>
                </div>
                <div class="form-group">
                    <label for="employerUpd-designation" class="control-label"><?=lang('candidatedash.workexptblheading2');?>:</label>
                    <input type="text" id="employerUpd-designation" name="employerUpd-designation"/>
                </div>
                <div class="form-group">
                    <label for="employerUpd-salary" class="control-label"><?=lang('candidatedash.workexptblheading3');?>:</label>
                    <input type="text" id="employerUpd-salary" name="employerUpd-salary"/>
                </div>
                <div class="form-group">
                    <label for="employerUpd-country" class="control-label"><?=lang('candidatedash.workexptblheading4');?>:</label>
                    <select id="employerUpd-country" name="employerUpd-country">
                        <option value="0">--None--</option>
                        <?php
                            $employerUpd_status_list = $this->db->query('SELECT * FROM candidate_country')->result_array();
                            foreach($employerUpd_status_list as $empCtry) {
                                echo '<option value="'.$empCtry['country_name'].'">'.$empCtry['country_name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading5');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-sm-4">
                            <select id="employerUpd-startDate" name="employerUpd-startDate">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                    for($dt=1; $dt <= 31; $dt++) {
                                        if($dt < 10) {
                                            echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                        } else {
                                            echo '<option value="'.$dt.'">'.$dt.'</option>';
                                        }
                                    }                                    
                                ?>
                            </select>
                        </div>                                    
                        <div class="col-sm-4">
                            <select id="employerUpd-startMonth" name="employerUpd-startMonth">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                    $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                    foreach($month_list as $key => $mth) {
                                        echo '<option value="'.$key.'">'.$mth.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="employerUpd-startYear" name="employerUpd-startYear">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                    for($i = 1910; $i <= 2015; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                    </div>
                </div><br /><br />
                <div class="form-group">
                    <label for="employerUpd-currJob" class="control-label"><?=lang('candidatedash.workexpCurrentjob');?>:</label>
                    <input type="checkbox" name="employerUpd-currJob" id="employerUpd-currJob" />
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading6');?>:</label>
                    <div class="form-group">                                    
                        <div class="col-sm-4">
                            <select id="employerUpd-endDate" name="employerUpd-endDate">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                <?php
                                    for($dt=1; $dt <= 31; $dt++) {
                                        if($dt < 10) {
                                            echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                        } else {
                                            echo '<option value="'.$dt.'">'.$dt.'</option>';
                                        }
                                    }                                    
                                ?>
                            </select>
                        </div>                                    
                        <div class="col-sm-4">
                            <select id="employerUpd-endMonth" name="employerUpd-endMonth">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                <?php
                                    $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                    foreach($month_list as $key => $mth) {
                                        echo '<option value="'.$key.'">'.$mth.'</option>';
                                    }                                     
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select id="employerUpd-endYear" name="employerUpd-endYear">
                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                <?php                                            
                                    for($i = 1910; $i <= 2015; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }                                    
                                ?>
                            </select>
                        </div>
                    </div>
                </div><br />
                <?php if( count($uriArr)>4 ) { ?>
                    <input type="hidden" value="<?php echo $uriArr[6];?>" id="employerUpd-refCode" name="employerUpd-refCode" />
                <?php } ?>
            </form>
        </div><br /><br />
        <div class="modal-footer">
            <button type="button" class="button" id="workExp-btn-update">Update</button>
            <button type="button" class="button" id="back7_link">Back to Home</button>
        </div>
    </div>
</div>
<!-- Work Experience Update Modal Window -- End -->

<script type="text/javascript">
 $(function(){ 
    var queryStr =  $("#inputQueryString").val();
    if(queryStr == "skill") { $("#skillModal").css("display","block"); } 
    else if(queryStr == "candidatereference") { $("#candRefModal").css("display","block"); }
    else if(queryStr == "candidatereferenceedit") { $("#candRefUpdModal").css("display","block"); invokeCandRef(); }
    else if(queryStr == "academicdetails") { $("#eduLvlModal").css("display","block"); }
    else if(queryStr == "academicdetailsedit") { $("#eduLvlUpdModal").css("display","block"); invokeCandEduc(); }
    else if(queryStr == "workexp") { $("#workExpModal").css("display","block"); }
    else if(queryStr == "workexpedit") { $("#workExpUpdModal").css("display","block"); invokeWorkExp(); }
    
    //Invoke Candidate Reference from DB.
    function invokeCandRef(){
        var cRid = $("#postrefid").val();
        $.ajax({
            type: "POST",
            url: $("#inputCandfetchRefURL").val(),
            data: {
                candidaterefsId: cRid
            },
            dataType: "json",
            crossDomain: !0
        }).done(function(e) {
            if (null != e) {
                var d = e.candidate_ref_contact.split("-");
                $('input[name="candrefUpd-name"]').val(e.candidate_ref_name);
                $('input[name="candrefUpd-company"]').val(e.candidate_ref_company);
                $('input[name="candrefUpd-email"]').val(e.candidate_ref_email);
                $("#candrefUpd-NumberCode option").filter(function() {
                    return this.text == d[0]
                }).prop("selected", !0);
                $('input[name="candrefUpd-contactnumber"]').val(d[1]);
            }
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        });
    }
    
    //Invoke Candidate Academic Details from DB.
    function invokeCandEduc(){
        
        var a = $("#postrefid").val();
        var cRid = $("#postcandcoderefid").val();        
        $.ajax({
            type: "POST",
            url: $("#inputCandfetchacaddetURL").val(),
            data: {
                candidatecodrefsId: cRid,
                candidaterefsId: a
            },
            dataType: "json",
            crossDomain: !0
        }).done(function(e) {
            $('input[name="educLvlUpd-School"]').val(e.candidate_univ_name);
            $("#educLvlUpd-Degree option").filter(function() {
                return this.text == e.candidate_degree
            }).prop("selected", !0);
            $('input[name="educLvlUpd-FieldofStudy"]').val(e.candidate_field_of_study);
            var n = e.candidate_edu_startDt.split("-");
            $("#educLvlUpd-startDate option").filter(function() {
                return this.text == n[2]
            }).prop("selected", !0),$("#educLvlUpd-startMonth option").filter(function() {
                return this.value == n[1]
            }).prop("selected", !0), $("#educLvlUpd-startYear option").filter(function() {
                return this.text == n[0]
            }).prop("selected", !0);
            var r = e.candidate_edu_endDt.split("-");
            $("#educLvlUpd-endDate option").filter(function() {
                return this.text == r[2]
            }).prop("selected", !0), $("#educLvlUpd-endMonth option").filter(function() {
                return this.value == r[1]
            }).prop("selected", !0), $("#educLvlUpd-endYear option").filter(function() {
                return this.text == r[0]
            }).prop("selected", !0), $('input[name="educLvlUpd-refCode"]').val(a);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        });
                
    }
    
    //Invoke Candidate Work Experience Details from DB.
    function invokeWorkExp(){
        
        var a = $("#postrefid").val();
        var cRid = $("#postcandcoderefid").val();
        $.ajax({
            type: "POST",
            url: $("#inputCandfetchWorkexURL").val(),
            data: {
                candidatecodrefsId: cRid,
                candidaterefsId: a
            },
            dataType: "json",
            crossDomain: !0
        }).done(function(e) {
            if (null != e) {
                var d = e.candidate_curr_job;
                $('input[name="employerUpd-name"]').val(e.candidate_emp_name);
                $('input[name="employerUpd-designation"]').val(e.candidate_curr_designation);
                $("#employerUpd-country option").filter(function() {
                    return this.value == e.candidate_emp_location
                }).prop("selected", !0);
                $('input[name="employerUpd-salary"]').val(e.candidate_salary);
                var r = e.candidate_emp_startDt.split("-");
                if ($("#employerUpd-startDate option").filter(function() {
                        return this.text == r[2]
                    }).prop("selected", !0), $("#employerUpd-startMonth option").filter(function() {
                        return this.value == r[1]
                    }).prop("selected", !0), $("#employerUpd-startYear option").filter(function() {
                        return this.text == r[0]
                    }).prop("selected", !0), "true" == d) {
                    $("#employerUpd-currJob").prop("checked", !0);
                    var o = e.candidate_emp_endDt.split("-");
                    $("#employerUpd-endDate").prop("disabled", !0);
                    $("#employerUpd-endDate option").filter(function() {
                        return this.text == o[2]
                    }).prop("selected", !0);
                    $("#employerUpd-endMonth").prop("disabled", !0);
                    $("#employerUpd-endMonth option").filter(function() {
                        return this.value == o[1]
                    }).prop("selected", !0);
                    $("#employerUpd-endYear").prop("disabled", !0);
                    $("#employerUpd-endYear option").filter(function() {
                        return this.text == o[0]
                    }).prop("selected", !0);
                } else {
                    $("#employerUpd-currJob").prop("checked", !1);
                    var o = e.candidate_emp_endDt.split("-");
                    $("#employerUpd-endDate").prop("disabled", !1);
                    $("#employerUpd-endDate option").filter(function() {
                        return this.text == o[2]
                    }).prop("selected", !0);
                    $("#employerUpd-endMonth").prop("disabled", !1);
                    $("#employerUpd-endMonth option").filter(function() {
                        return this.value == o[1]
                    }).prop("selected", !0);
                    $("#employerUpd-endYear").prop("disabled", !1);
                    $("#employerUpd-endYear option").filter(function() {
                        return this.text == o[0]
                    }).prop("selected", !0)
                }
                $('input[name="employerUpd-refCode"]').val(a);
            }
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        });
                
    }
  
    $("button[id*='back']").on("click",function(){ window.location="/en/candidate_dashboard"; });
    $("button#skill-btn-save").click(function(e) {
        var a = $("input[name^='candrefid']").val(),
            d = $("input[name^='skill-name']").val(),
            t = $("#skill-level option:selected").val(),
            n = $("#skill-rating option:selected").val();
        0 == d.length && $("input[name^='skill-name']").addClass("error"), $("input[name^='skill-name']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t && $("#skill-level").addClass("error"), $("#skill-level").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n && $("#skill-rating").addClass("error"), $("#skill-rating").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var r = $(".modal-body").find("input.error, select.error").length;
        return 0 != r ? !1 : ($(this).html('<img src="/images/loading.gif" height="20" width="20" />'), $.ajax({
            type: "POST",
            url: $("#inputCandAddSkillURL").val(),
            data: {
                candidateRefId: a,
                skillname: d,
                skilllevel: t,
                skillrating: n
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#skillModal").find("#modal-error-msg").html(resp[1]);
            setTimeout(function() {
                $("#skillModal").modal("hide"), window.location="/en/candidate_dashboard";
            }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), void e.preventDefault())
    }), $("#skillModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error")
    }), $("button#cand-ref-btn-save").click(function(e) {
        var a = $("input[name^='candrefid']").val(),
            d = $("input[name^='candref-name']").val(),
            t = $("input[name^='candref-company']").val(),
            n = $("input[name^='candref-email']").val(),
            r = $("#candref-NumberCode option:selected").val(),
            o = $("input[name^='candref-contactnumber']").val(),
            l = r + "-" + o; 
        0 == d.length && $("input[name^='candref-name']").addClass("error"), $("input[name^='candref-name']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t.length && $("input[name^='candref-company']").addClass("error"), $("input[name^='candref-company']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n.length && $("input[name^='candref-email']").addClass("error"), $("input[name^='candref-email']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#candref-NumberCode").addClass("error"), $("#candref-NumberCode").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o.length && $("input[name^='candref-contactnumber']").addClass("error"), $("input[name^='candref-contactnumber']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var i = $(".modal-body").find("input.error, select.error").length;
        return 0 != i ? !1 : ($(this).html('<img src="/images/loading.gif" height="20" width="20" />'), 
        $.ajax({
            type: "POST",
            url: $("#inputCandaddRefURL").val(),
            data: {
                candRefName: d,
                candRefCompany: t,
                candRefEmail: n,
                candRefContact: l,
                candidateRefId: a
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#candRef-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault())
    }), $("#candRefModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error")
    }), $("button#candref-btn-update").click(function(e) {
        var a = $("input[name^='candidate-email']").val(),
            d = $("input[name^='candrefUpd-name']").val(),
            t = $("input[name^='candrefUpd-company']").val(),
            n = $("input[name^='candrefUpd-email']").val(),
            r = $("#candrefUpd-NumberCode option:selected").text(),
            o = $("input[name^='candrefUpd-contactnumber']").val(),
            l = r + "-" + o,
            i = $("input[name^='candrefUpd-refCode']").val();
        0 == d.length && $("input[name^='candrefUpd-name']").addClass("error"), $("input[name^='candrefUpd-name']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t.length && $("input[name^='candrefUpd-company']").addClass("error"), $("input[name^='candrefUpd-company']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n.length && $("input[name^='candrefUpd-email']").addClass("error"), $("input[name^='candrefUpd-email']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#candrefUpd-NumberCode").addClass("error"), $("#candrefUpd-NumberCode").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o.length && $("input[name^='candrefUpd-contactnumber']").addClass("error"), $("input[name^='candrefUpd-contactnumber']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var s = $(".modal-body").find("input.error, select.error").length;
        return 0 != s ? !1 : ($(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />'), $.ajax({
            type: "POST",
            url: $("#inputCandeditRefURL").val(),
            data: {
                candRefName: d,
                candRefCompany: t,
                candRefEmail: n,
                candRefContact: l,
                candidateemail: a,
                candidateRefCode: i
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#candRefUpd-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault())
    }), $("#candRefUpdModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error")
    }), $("button#eduLvl-btn-add").click(function() {
        var p = $("input[name^='candrefid']").val(),
            e = $("input[name^='educLvl-School']").val(),
            a = $("#educLvl-Degree").find("option:selected").val(),
            d = $("input[name^='educLvl-FieldofStudy']").val(),
            t = $("#educLvl-startDate").find("option:selected").val(),
            n = $("#educLvl-startMonth").find("option:selected").val(),
            r = $("#educLvl-startYear").find("option:selected").val(),
            o = $("#educLvl-endDate").find("option:selected").val(),
            l = $("#educLvl-endMonth").find("option:selected").val(),
            i = $("#educLvl-endYear").find("option:selected").val(),
            s = r + "-" + n + "-" + t,
            c = i + "-" + l + "-" + o;            
        0 == e.length && $("input[name^='educLvl-School']").addClass("error"), $("input[name^='educLvl-School']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == a && $("#educLvl-Degree").addClass("error"), $("#educLvl-Degree").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == d.length && $("input[name^='educLvl-FieldofStudy']").addClass("error"), $("input[name^='educLvl-FieldofStudy']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t && $("#educLvl-startDate").addClass("error"), $("#educLvl-startDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n && $("#educLvl-startMonth").addClass("error"), $("#educLvl-startMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#educLvl-startYear").addClass("error"), $("#educLvl-startYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o && $("#educLvl-endDate").addClass("error"), $("#educLvl-endDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == l && $("#educLvl-endMonth").addClass("error"), $("#educLvl-endMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == i && $("#educLvl-endYear").addClass("error"), $("#educLvl-endYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), $("#eduLvl-modal-error-msg").text(r > i && 0 != i ? "Education End Year cannot be less than Start Year" : "");
        var m = $(".modal-body").find("input.error, select.error").length,
            u = $("#eduLvl-modal-error-msg").text().length;
        return 0 != m || 0 != u ? !1 : ($(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />'),
        $.ajax({
            type: "POST",
            url: $("#inputCandAcaddetURL").val(),
            data: {
                CandUnivname: e,
                CandDegree: a,
                CandFieldofStdy: d,
                CandAcadStartDt: s,
                CandAcadEndDt: c,
                candidateRefId: p
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#eduLvl-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }))
    }), $("#eduLvlModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error"), $("#eduLvl-modal-error-msg").text("")
    }), $("button#eduLvlUpd-btn-update").click(function(e) {
        var a = ($("input[name^='candidate-email']").val(), $("input[name^='educLvlUpd-School']").val()),
            d = $("#educLvlUpd-Degree").find("option:selected").val(),
            t = $("input[name^='educLvlUpd-FieldofStudy']").val(),
            n = $("#educLvlUpd-startDate").find("option:selected").val(),
            r = $("#educLvlUpd-startMonth").find("option:selected").val(),
            o = $("#educLvlUpd-startYear").find("option:selected").val(),
            l = $("#educLvlUpd-endDate").find("option:selected").val(),
            i = $("#educLvlUpd-endMonth").find("option:selected").val(),
            s = $("#educLvlUpd-endYear").find("option:selected").val(),
            c = o + "-" + r + "-" + n,
            p = s + "-" + i + "-" + l,
            z = $("#postcandcoderefid").val(),
            m = $("input[name^='educLvlUpd-refCode']").val();
        0 == a.length && $("input[name^='educLvlUpd-School']").addClass("error"), $("input[name^='educLvlUpd-School']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == d && $("#educLvlUpd-Degree").addClass("error"), $("#educLvlUpd-Degree").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t.length && $("input[name^='educLvlUpd-FieldofStudy']").addClass("error"), $("input[name^='educLvlUpd-FieldofStudy']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n && $("#educLvlUpd-startDate").addClass("error"), $("#educLvlUpd-startDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#educLvlUpd-startMonth").addClass("error"), $("#educLvlUpd-startMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o && $("#educLvlUpd-startYear").addClass("error"), $("#educLvlUpd-startYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == l && $("#educLvlUpd-endDate").addClass("error"), $("#educLvlUpd-endDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == i && $("#educLvlUpd-endMonth").addClass("error"), $("#educLvlUpd-endMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == s && $("#educLvlUpd-endYear").addClass("error"), $("#educLvlUpd-endYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), $("#educLvlUpd-modal-error-msg").text(o > s && 0 != s ? "Education End Year cannot be less than Start Year" : "");
        var u = $(".modal-body").find("input.error, select.error").length,
            h = $("#educLvlUpd-modal-error-msg").text().length;
        return 0 != u || 0 != h ? !1 : ($(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />'),
        $.ajax({
            type: "POST",
            url: $("#inputCandeditacaddetURL").val(),
            data: {
                CandUnivname: a,
                CandDegree: d,
                CandFieldofStdy: t,
                CandAcadStartDt: c,
                CandAcadEndDt: p,
                candidateRefId: z,
                candidateRefCode: m
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#educLvlUpd-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault())
    }), $("#eduLvlUpdModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error"), $("#educLvlUpd-modal-error-msg").text("")
    }), $("#employer-currJob").on("change", function() {
        0 == $(this).is(":checked") ? ($("#employer-endDate").removeAttr("disabled"), $("#employer-endMonth").removeAttr("disabled"), $("#employer-endYear").removeAttr("disabled")) : ($("#employer-endDate").attr("disabled", "disabled"), $("#employer-endMonth").attr("disabled", "disabled"), $("#employer-endYear").attr("disabled", "disabled"))
    }), $("button#workExp-btn-save").click(function(e) {
        var a = $("input[name^='candrefid']").val(),
            d = $("input[name^='employer-name']").val();
        0 == d.length && $("input[name^='employer-name']").addClass("error"), $("input[name^='employer-name']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var t = $("input[name^='employer-designation']").val();
        0 == t.length && $("input[name^='employer-designation']").addClass("error"), $("input[name^='employer-designation']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var n = $("input[name^='employer-salary']").val();
        0 == n.length && $("input[name^='employer-salary']").addClass("error"), $("input[name^='employer-salary']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var r = $("#employer-country").find("option:selected").val();
        0 == r && $("#employer-country").addClass("error"), $("#employer-country").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var o = $("#employer-startDate").find("option:selected").val();
        0 == o && $("#employer-startDate").addClass("error"), $("#employer-startDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var l = $("#employer-startMonth").find("option:selected").val();
        0 == l && $("#employer-startMonth").addClass("error"), $("#employer-startMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var i = $("#employer-startYear").find("option:selected").val();
        0 == i && $("#employer-startYear").addClass("error"), $("#employer-startYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        });
        var s = $("#employer-currJob").prop("checked");
        if (1 == s) var c = new Date,
            p = c.getDate(),
            m = c.getMonth() + 1,
            u = c.getFullYear();
        else {
            var p = $("#employer-endDate").find("option:selected").val();
            0 == p && $("#employer-endDate").addClass("error"), $("#employer-endDate").bind("change", function() {
                0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
            });
            var m = $("#employer-endMonth").find("option:selected").val();
            0 == m && $("#employer-endMonth").addClass("error"), $("#employer-endMonth").bind("change", function() {
                0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
            });
            var u = $("#employer-endYear").find("option:selected").val();
            0 == u && $("#employer-endYear").addClass("error"), $("#employer-endYear").bind("change", function() {
                0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
            })
        }
        var h = i + "-" + l + "-" + o,
            v = u + "-" + m + "-" + p;
        $("#workExp-modal-error-msg").text(i > u && 0 != u ? "End Year cannot be less than Start Year" : "");
        var f = $(".modal-body").find("input.error, select.error").length,
            y = $("#workExp-modal-error-msg").text().length;
        return 0 != f || 0 != y ? !1 : ($(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />'), 
        $.ajax({
            type: "POST",
            url: $("#inputCandaddWorkexURL").val(),
            data: {
                candidateRefId: a,
                employername: d,
                employerdesig: t,
                employersal: n,
                employerctry: r,
                employerStartDt: h,
                employerEndDt: v,
                Candemp_currJob: s
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#workExp-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault())
    }), $("#workExpModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error"), $("#workExp-modal-error-msg").text("")
    }), $("#employerUpd-currJob").on("change", function() {
        0 == $(this).is(":checked") ? ($("#employerUpd-endDate").removeAttr("disabled"), $("#employerUpd-endMonth").removeAttr("disabled"), $("#employerUpd-endYear").removeAttr("disabled")) : ($("#employerUpd-endDate").attr("disabled", "disabled"), $("#employerUpd-endMonth").attr("disabled", "disabled"), $("#employerUpd-endYear").attr("disabled", "disabled"))
    }), $("button#workExp-btn-update").click(function(e) {
        var a = $("input[name^='candidate-email']").val(),
            d = $("input[name^='employerUpd-name']").val(),
            t = $("input[name^='employerUpd-designation']").val(),
            n = $("input[name^='employerUpd-salary']").val(),
            r = $("#employerUpd-country").find("option:selected").val(),
            o = $("#employerUpd-startDate").find("option:selected").val(),
            l = $("#employerUpd-startMonth").find("option:selected").val(),
            i = $("#employerUpd-startYear").find("option:selected").val(),
            s = $("#employerUpd-endDate").find("option:selected").val(),
            c = $("#employerUpd-endMonth").find("option:selected").val(),
            p = $("#employerUpd-endYear").find("option:selected").val(),
            m = i + "-" + l + "-" + o,
            s = p + "-" + c + "-" + s,
            u = $("input[name^='employerUpd-refCode']").val();
        0 == d.length && $("input[name^='employerUpd-name']").addClass("error"), $("input[name^='employerUpd-name']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == t.length && $("input[name^='employerUpd-designation']").addClass("error"), $("input[name^='employerUpd-designation']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n.length && $("input[name^='employerUpd-salary']").addClass("error"), $("input[name^='employerUpd-salary']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#employerUpd-country").addClass("error"), $("#employerUpd-country").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o && $("#employerUpd-startDate").addClass("error"), $("#employerUpd-startDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == l && $("#employerUpd-startMonth").addClass("error"), $("#employerUpd-startMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == i && $("#employerUpd-startYear").addClass("error"), $("#employerUpd-startYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == s && $("#employerUpd-endDate").addClass("error"), $("#employerUpd-endDate").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == c && $("#employerUpd-endMonth").addClass("error"), $("#employerUpd-endMonth").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == p && $("#employerUpd-endYear").addClass("error"), $("#employerUpd-endYear").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), $("#workExpUpd-modal-error-msg").text(i > p && 0 != p ? "End Year cannot be less than Start Year" : "");
        var h = $(".modal-body").find("input.error, select.error").length,
            v = $("#workExpUpd-modal-error-msg").text().length;
        return 0 != h || 0 != v ? !1 : ($(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />'), $.ajax({
            type: "POST",
            url: $("#inputCandeditWorkexURL").val(),
            data: {
                candidateemail: a,
                employername: d,
                employerdesig: t,
                employersal: n,
                employerctry: r,
                employerStartDt: m,
                employerEndDt: s,
                candidateRefCode: u,
                Candemp_currJob: $("#employerUpd-currJob").is(":checked")
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#workExpUpd-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location="/en/candidate_dashboard"; }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), void e.preventDefault())
    }), $("#workExpUpdModal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error"), $("#workExpUpd-modal-error-msg").text("")
    });
});
</script>