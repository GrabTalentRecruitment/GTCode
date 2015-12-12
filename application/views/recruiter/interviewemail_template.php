<?php $intvwtmplupd_url = $this->lang->lang().'/recruiter/interviewemail_templupdate'; ?>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>

<!-- Alert message - start -->
<div class="page-content container" id="modal-window" style="display:none; background-color:white; margin-top:5px; border-radius:10px; height:15px;">
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
            <h1 class="page-title font-1"><?=lang('recruiterlogin.emailtemplate_1hdng');?></h1>
        </div>
        <div class="col-md-6 no-padding"></div>
    </div>
</div>

<div class="page-content container">
    
    <div class="row">
        <div class="col-md-12">
            <p><?=lang('recruiterlogin.emailtemplate_1hdng_1');?></p>
            <ol>
		<li>{candidate_name} - Candidate Name</li>
		<li>{job_title} - Job Title</li>
		<li>{interview_datetime} - Interview Details</li>
		<li>{interview_location} - Interview Location</li>
		<li>{employer_name} - Employer Name</li>
		<li>{employer_email} - Employer Email Address</li>
            </ol>
        </div>
    
        <div class="col-md-12">
        
            <form enctype="multipart/form-data">
            
                <input type="hidden" id="inputintvwEmailUpdUrl" value="<?php echo https_url($intvwtmplupd_url); ?>" />
                <?php
                    $empDet = $this->login_database->read_user_information( 
                        array('username' => $this->session->userdata('recruiter_login')), 'employer' 
                    );
                ?>
                <input type="hidden" id="inputintvwEmailContact" value="<?php echo $this->session->userdata('recruiter_login'); ?>" />
                <input type="hidden" id="inputintvwEmailCtnctCode" value="<?php echo $empDet[0]['employer_code']; ?>" />
                <input type="hidden" id="inputintvwEmailCtnctName" value="<?php echo $empDet[0]['employer_name']; ?>" />
                <?php
                    $condition = "employer_contact_email ='".$this->session->userdata('recruiter_login')."'";
                    $this->db->select('template_interview')->from('grabtalent_template')->where($condition);
                    $query = $this->db->get();
                    $tmplintvw = $query->result_array(); 
                    if($tmplintvw) {
                        foreach($tmplintvw as $tmpl_intvw) {
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                        <div id="editor" name="inputIntvwTemplatetxtSave"><?php echo $tmpl_intvw['template_interview']; ?></div>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-lg-12 col-md-12" style="text-align: center;">
                        <button class="button" type="button" id="btnSaveIntvwtmplate">Save</button>
                        <button class="button" type="button" onclick="window.location.reload()">Reset</button>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <?php } else { ?>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
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
                                        <div id="editor" name="inputIntvwTemplatetxtCreate"></div>
                                    </div>
                                </div><br />
                                <div class="row">
                                    <div class="col-lg-12 col-md-12" style="text-align: center;">
                                        <button class="button" type="button" id="btnCreateIntvwtmplate">Create</button>
                                        <button class="button" type="button" onclick="window.location.reload()">Reset</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>                
                    </div>
                </div>
                
            </form>
            
        </div>
    </div>

</div><br/><br/>
<script type="text/javascript">
$(function(){
    $("#editor").wysiwyg();
    $("#btnSaveIntvwtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputintvwEmailUpdUrl').val(),
            data        : { 'templateInterview': $('div[name*="inputIntvwTemplatetxtSave"]').html(), 'employerEmail' : $('#inputintvwEmailContact').val(), 'method': 'edit' }, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            $("#modal-window").css("display","block").find("#displayMsg").html(response[1]).delay(1000).fadeOut('slow');
            setTimeout(function() { window.location.reload(true); }, 2000 );
        })
        .fail(function(data) {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!.");
        });
        
    });
    
    $("#btnCreateIntvwtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputintvwEmailUpdUrl').val(),
            data        : { 'employerName': $('#inputintvwEmailCtnctName').val(), 'employerCode': $('#inputintvwEmailCtnctCode').val(), 'templateInterview': $('div[name*="inputIntvwTemplatetxtCreate"]').html(), 'employerEmail' : $('#inputintvwEmailContact').val(), 'method': 'create' }, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            $("#modal-window").css("display","block").find("#displayMsg").html(response[1]).delay(1000).fadeOut('slow');
            setTimeout(function() { window.location.reload(true); }, 2000 );
        })
        .fail(function(data) {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!.");
        });
        
    });
});
</script>