<?php $offtmplupd_url = $this->lang->lang().'/recruiter/offeremail_templupdate'; ?>
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
            <h1 class="page-title font-1"><?=lang('recruiterlogin.emailtemplate_2hdng');?></h1>
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
                <li>{employer_name} - Employer Name</li>
                <li>{employer_email} - Employer Email Address</li>
            </ol>
        </div>
    
        <div class="col-md-12">
        
            <form enctype="multipart/form-data">
            
                <input type="hidden" id="inputofferEmailUpdUrl" value="<?php echo https_url($offtmplupd_url); ?>" />
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
                    $this->db->select('template_offer');
                    $this->db->from('grabtalent_template');
                    $this->db->where($condition);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) { $tmploffr = $query->result_array(); } else { return false; } 
                    if($tmploffr) {
                        foreach($tmploffr as $tmpl_offr) {
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
                        <div id="editor" name="inputOfferTemplatetxtEdit"><?php echo $tmpl_offr['template_offer']; ?></div>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-lg-12 col-md-12" style="text-align: center;">
                        <button class="button" type="button" id="btnSaveoffrtmplate">Save</button>
                        <button class="button" type="button" onclick="window.location.reload()">Reset</button>
                    </div>
                </div>
                <?php 
                    }
                } else { ?>
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
                            <div id="editor" name="inputOfferTemplatetxtCreate"><?php echo $tmpl_offr['template_offer']; ?></div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-lg-12 col-md-12" style="text-align: center;">
                            <button class="button" type="button" id="btnCreateoffrtmplate">Create</button>
                            <button class="button" type="button" onclick="window.location.reload()">Reset</button>
                        </div>
                    </div>
                <?php } ?>
                
            </form>
            
        </div>
    </div>

</div><br/><br/>
<script type="text/javascript">
$(function(){
    $("#editor").wysiwyg();
    $("#btnSaveoffrtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputofferEmailUpdUrl').val(),
            data        : { 'templateOffer': $('div[name*="inputOfferTemplatetxtEdit"]').html(), 'employerEmail' : $('#inputofferEmailContact').val(), 'method': 'edit' }, // our data object
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
    
    $("#btnCreateoffrtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputofferEmailUpdUrl').val(),
            data        : { 'employerName': $('#inputintvwEmailCtnctName').val(), 'employerCode': $('#inputintvwEmailCtnctCode').val(),'templateOffer': $('div[name*="inputOfferTemplatetxtCreate"]').html(), 'employerEmail' : $('#inputofferEmailContact').val(), 'method': 'create' }, // our data object
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