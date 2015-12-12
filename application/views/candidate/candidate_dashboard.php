<link href="/css/percircle.css" rel="stylesheet" />
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
<?php 
    $sess_data = $this->session->userdata('user_data'); $video_url = '';
    $candRefId = $sess_data[0]['candidate_ref_id']; $candCodeRefId = $sess_data[0]['candidate_coderefs_id'];
    $candRefcount = $this->login_database->get_candidateRef_cnt( $sess_data[0]['candidate_ref_id'] );
    $candWorkExpcount = $this->login_database->get_workExp_cnt( $sess_data[0]['candidate_ref_id'], $sess_data[0]['candidate_email'] );
    $profilePercent = $this->login_database->candidate_profilepercent( strlen( $sess_data[0]['candidate_skills']), $candRefcount[0]['cnt'], '5', $candWorkExpcount[0]['cnt'] );
    //$candAcadDetcount = $this->login_database->get_academicDate_cnt( $sess_data[0]['candidate_ref_id'], $sess_data[0]['candidate_email'] );
    //$profilePercent = $this->login_database->candidate_profilepercent( strlen( $sess_data[0]['candidate_skills']), $candRefcount[0]['cnt'], $candAcadDetcount[0]['cnt'], $candWorkExpcount[0]['cnt'] );    
?>
<input type="hidden" value="<?php echo $candRefId;?>" name="candrefid" />
<div class="site-content" >

    <?php foreach($sess_data as $usrdt){ ?>
    
    <div class="container page-header">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1 class="page-title font-1">Welcome <?php echo $usrdt['candidate_firstname']." ".$usrdt['candidate_lastname'];?></h1>
            </div>
            <div class="col-md-6 no-padding"></div>
        </div>
    </div>
    
    <div class="page-content container">
    
        <div class="row">
            <div class="col-md-6 ">
                <div class="candidate-profile">
                    
                    <input type="hidden" value="<?php echo $usrdt['candidate_email'];?>" name="skill-email" id="skill-email"/>
                    <table class="candidate-table">
                        <tr>
                            <td><strong>Phone Number</strong></td>
                            <td><?php echo $usrdt['candidate_phonenumber']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email Address</strong></td>
                            <td><?php echo $usrdt['candidate_email']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Profile Level</strong></td>
                            <td><?php echo $profilePercent."%"; ?></td>
                        </tr>
                    </table>
                    
                </div>
            </div>
            
        <?php } ?>
        
            <div class="col-md-6 candidate-attribute">
                <h4><?=lang('candidatedash.skills')?> 
                    <a href="<?php echo https_url($this->lang->lang().'/candidate/candidate_modal/skill');?>" class="add-more">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </h4>
                <span id="skill-modal-error-msg" style="color: red;"></span>
                <table>
                    <tr>
                        <th><?=lang('candidatedash.skilltblheading1');?></th>
                        <th><?=lang('candidatedash.skilltblheading2');?></th>
                        <th><?=lang('candidatedash.skilltblheading3');?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $query = $this->db->select('candidate_skill_ref_id, candidate_skill_name, candidate_skill_level, candidate_skill_rating')->where('candidate_ref_id', $candRefId )->get('candidate_skills');
                        foreach ($query->result_array() as $row) {
                            echo "<tr>";
                            echo "<td>".$row['candidate_skill_name']."</td>";
                            echo "<td>".$row['candidate_skill_level']."</td>";
                            echo "<td>".$row['candidate_skill_rating']."</td>";
                            echo "<td class='textcenter'>
                            <a id='skill-btn-delete' title='".$row["candidate_skill_ref_id"]."' name='".$candCodeRefId."' class='red-btn button with-icons' style='cursor:pointer;'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    ?>
                    
                </table>
            </div>
            
        </div>
        
        <div class="row candidate-attribute">
            
            <div class="col-md-6 ">
                <h4><?=lang('candidatedash.candidatereference');?>
                    <a href="<?php echo https_url($this->lang->lang().'/candidate/candidate_modal/candidatereference');?>" class="add-more">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </h4>
                <span id="candRef-modal-error-msg" style="color: red;"></span>
                <table>
                    <tr>
                        <th><?=lang('candidatedash.candidaterefheading1');?></th>
                        <th><?=lang('candidatedash.candidaterefheading2');?></th>
                        <th><?=lang('candidatedash.candidaterefheading3');?></th>
                        <th><?=lang('candidatedash.candidaterefheading4');?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $query = $this->db->select('*')->where('candidate_ref_id', $candRefId )->get('candidate_references');
                        foreach ($query->result_array() as $row) {
                            
                            echo "<tr>";
                            echo "<td>".$row["candidate_ref_name"]."</td>";
                            echo "<td>".$row["candidate_ref_company"]."</td>";
                            echo "<td>".$row["candidate_ref_email"]."</td>";
                            
                            $candContact = $row["candidate_ref_contact"];
                            $tmp = explode('-',$candContact);
                            $ctryCode = $tmp[0];
                            $ctntNum = $tmp[1];
                            preg_match("/\(([^\)]*)\)/", $candContact, $tmp);
                            
                            echo "<td>".$tmp[0]." ".$ctntNum."</td>";
                            echo "<td style='width:10%;'>
                            <a href='".https_url($this->lang->lang().'/candidate/candidate_modal/candidatereferenceedit/'.$candRefId.'/'.$row["Id"])."' class='green-btn button with-icons'><i class='fa fa-pencil'></i></a><a id='candRef-btn-delete' title='".$row["Id"]."' name='".$candCodeRefId."' class='red-btn button with-icons' style='cursor:pointer;'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            
            <div class="col-md-6 ">
                <h4><?=lang('candidatedash.academicdetails')?>
                    <a href="<?php echo https_url($this->lang->lang().'/candidate/candidate_modal/academicdetails');?>" class="add-more">
                        <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </h4>
                <span id="eduLvl-modal-error-msg" style="color: red;"></span>
                <table>
                    <tr>
                        <th><?=lang('candidatesignup.educationcolumn1')?></th>
                        <th><?=lang('candidatesignup.educationcolumn2')?></th>
                        <th><?=lang('candidatesignup.educationcolumn3')?></th>
                        <th><?=lang('candidatesignup.educationcolumn4')?></th>
                        <th><?=lang('candidatesignup.educationcolumn5')?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $query = $this->db->select('*')->where('candidate_email', $this->session->userdata('logged_in') )->get('candidate_education');
                        foreach ($query->result_array() as $row) {
                            echo "<tr>";
                            echo "<td>".$row["candidate_univ_name"]."</td>";
                            echo "<td>".$row["candidate_degree"]."</td>";
                            echo "<td>".$row["candidate_field_of_study"]."</td>";
                            echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_startDt"]))."</td>";
                            echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_endDt"]))."</td>";
                            echo "<td class='textcenter'>
                            <a href='".https_url($this->lang->lang().'/candidate/candidate_modal/academicdetailsedit/'.$row["candidate_coderefs_id"].'/'.$row["Id"])."' class='green-btn button with-icons'><i class='fa fa-pencil'></i></a><a id='AcadEdu-btn-delete' title='".$row["Id"]."' name='".$candCodeRefId."' class='red-btn button with-icons' style='cursor:pointer;'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                            
                        }
                    ?>
                </table>
            </div>
        </div><!-- end row -->
    
        <div class="row candidate-attribute">
            <div class="col-md-12 ">
                <h4><?=lang('candidatedash.workexp')?>
                    <a href="<?php echo https_url($this->lang->lang().'/candidate/candidate_modal/workexp');?>" class="add-more">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </h4>
                <span id="workExp-modal-error-msg" style="color: red;"></span>
                <table>
                    <tr>
                        <th><?=lang('candidatedash.workexptblheading1');?></th>
                        <th><?=lang('candidatedash.workexptblheading2');?></th>
                        <th><?=lang('candidatedash.workexptblheading3');?></th>
                        <th><?=lang('candidatedash.workexptblheading4');?></th>
                        <th><?=lang('candidatedash.workexptblheading5');?></th>
                        <th><?=lang('candidatedash.workexptblheading6');?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $query = $this->db->select('*')->where('candidate_email', $this->session->userdata('logged_in') )->get('candidate_employment');
                        foreach ($query->result_array() as $row) {
                            echo "<tr>";
                            echo "<td>".$row["candidate_emp_name"]."</td>";
                            echo "<td>".$row["candidate_curr_designation"]."</td>";
                            echo "<td>".$row["candidate_salary"]."</td>";
                            echo "<td>".$row["candidate_emp_location"]."</td>";
                            echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_startDt"]))."</td>";
                            echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_endDt"]))."</td>";
                            echo "<td class='textcenter'>
                            <a href='".https_url($this->lang->lang().'/candidate/candidate_modal/workexpedit/'.$row["candidate_coderefs_id"].'/'.$row["Id"])."' class='green-btn button with-icons'><i class='fa fa-pencil'></i></a><a id='workExp-btn-delete' title='".$row["Id"]."' name='".$candCodeRefId."' class='red-btn button with-icons' style='cursor:pointer;'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div><!-- end row -->
    
        <div class="row candidate-attribute">
            <div class="col-md-12 ">
                <h4><?=lang('candidatedash.mypastapplication')?></h4>
                <table>
                    <tr>
                        <th><?=lang('candidatedash.mypastapplnheading1');?></th>
                        <th><?=lang('candidatedash.mypastapplnheading4');?></th>
                        <th><?=lang('candidatedash.mypastapplnheading2');?></th>
                        <th><?=lang('candidatedash.mypastapplnheading3');?></th>
                        <th><?=lang('candidatedash.mypastapplnheading5');?></th>
                        <th><?=lang('candidatedash.mypastapplnheading6');?></th>
                    </tr>
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_application');
                        foreach ($query->result_array() as $row) {
                            $jobDetails = $this->login_database->read_job_information($row['candidate_appln_job_id']);
                            echo "<tr>";
                            echo "<td><a href='".https_url($this->lang->lang()."/candidate/job/".$row['candidate_appln_job_id'])."'>".$jobDetails[0]['job_title']."</a></td>";
                            $client_name = $this->login_database->read_client_information($jobDetails[0]['job_created_by']);
                            echo "<td>".$client_name[0]['employer_name']."</td>";
                            echo "<td>".date("d-M-Y h:m:s",strtotime($row['cand_appln_created_date']))."</td>";
                            echo "<td>".date("d-M-Y",strtotime($jobDetails[0]['job_postdate']))."</td>";
                            echo "<td>".$row['candidate_appln_stage']."</td>";
                            if( strtotime($row['cand_appln_last_modified_date']) != "") {
                                echo "<td>".date("d-M-Y h:m:s",strtotime($row['cand_appln_last_modified_date']))."</td>";    
                            } else {
                                echo "<td>-</td>";
                            }                                    
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div><!-- end row -->
    
    </div>
    <div class="clearfix"></div>
</div><br /> 
<!-- end site-content -->
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/remove_skill');?>" id="inputCandDelSkillURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_candidate_ref');?>" id="inputCanddelRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_academic_details');?>" id="inputCanddelacaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_Workexp');?>" id="inputCanddelWorkexURL" />

<script type="text/javascript">
 $(function(){
    $("#skill-btn-delete").click(function(e) {
        e.preventDefault()
        $(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />');
        var a = $("input[name^='candrefid']").val(),
            d = $(this).attr("title");
        $.ajax({
            type: "POST",
            url: $("#inputCandDelSkillURL").val(),
            data: {
                candidateRefId: a,
                skilldelvalue: d
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#skill-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location.reload(); }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        });
    }), $("#candRef-btn-delete").click(function(e) {
        $(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />');
        var a = $(this).attr("name"),b = $(this).attr("title");
        $.ajax({
            type: "POST",
            url: $("#inputCanddelRefURL").val(),
            data: {
                candidate_coderefs_id: a,
                refId: b
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#candRef-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location.reload(); }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault()
    }), $("#AcadEdu-btn-delete").click(function(e) {
        $(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />');
        var a = $(this).attr("name"),b = $(this).attr("title");
        $.ajax({
            type: "POST",
            url: $("#inputCanddelacaddetURL").val(),
            data: {
                candidatecodrefsId: a,
                refId: b
            },
            crossDomain: !0
        }).done(function(e) {
            "success" == e && window.location.reload(!0)
            var resp = e.split(";");
            $("#eduLvl-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location.reload(); }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault()
    }), $("#workExp-btn-delete").click(function(e) {
        $(this).prop("disabled", "true").html('<img src="/images/loading.gif" height="20" width="20" />');
        var a = $("#candidate-email").val(), x = $(this).attr("name"),
            d = $(this).attr("title");
        $.ajax({
            type: "POST",
            url: $("#inputCanddelWorkexURL").val(),
            data: {
                candidateemail: a,
                refId: d,
                candidatecodrefsId: x
            },
            crossDomain: !0
        }).done(function(e) {
            var resp = e.split(";");
            $("#workExp-modal-error-msg").html(resp[1]);
            setTimeout(function() { window.location.reload(); }, 2000);
        }).fail(function() {
            alert("Something went wrong, Please try again!.")
        }), e.preventDefault()
    });
 });
</script>