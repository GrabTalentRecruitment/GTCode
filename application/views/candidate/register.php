<?php $applnSignup_url = $this->lang->lang().'/candidate/candidate_register'; ?>
<script src="/js/candidate/candidate_register.js"></script>
<input type="hidden" id="inputCandsignupUrl" value="<?php echo https_url($applnSignup_url); ?>" />
<form method="post" enctype="multipart/form-data">
<div class="site-content" >

	<div class="page-content container">
	    
	    <div class="row">
	    	<h3 class="page-title font-1 text-center"><?=lang('candidatereg.heading');?></h3><br />
	    	<div style="text-align: center;"><span id="modal-error-msg" style="color: red;"></span></div>
                <div class="col-xs-6 col-xs-offset-3 visible-xs-block hidden-md-block hidden-sm-block hidden-lg-block">
                    <table style="text-align: center;">
                        <tr>
                            <td style="text-align: center; font-size:120%; color: green;">
                                <span class="badge" style="font-size:120%; background-color: green;">1</span>&nbsp;&nbsp;Upload your CV
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-size:200%">
                                <span class="fa fa-arrow-down"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-size:120%; color: grey;">
                                <span class="badge" style="font-size:120%">2</span>&nbsp;&nbsp;Fill signup form
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
                        <li class="arrow_td current" style="min-width:170px !important; width:0px !important;">1. Upload your CV</li>
                        <li class="arrow_td" style="min-width:170px !important;">2. Fill signup form</li>
                        <li class="arrow_td" style="min-width:170px !important;">3. Signup Complete</li>
                    </ul>
                </div>
                
                <div class="col-lg-12 col-lg-offset-1 visible-lg-block hidden-md-block hidden-sm-block hidden-xs-block">
                    <ul>
                        <li class="arrow_td current col-md-2">1. Upload your CV</li>
                        <li class="arrow_td col-md-2">2. Fill signup form</li>
                        <li class="arrow_td col-md-3">3. Signup Complete</li>
                    </ul>
                </div>
            </div><br />
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
    			<div class="panel-body">                            
	                        <div class="row">
	                            <div class="col-md-12">
	                                <input type="file" id="fileToUpload" name="fileToUpload"/>
	                                <span>Allowed File extensions (*.docx), Max File size: 2MB</span>
	                            </div>
	                        </div><br />
	                        <div class="row">
	                            <div class="col-md-12 text-center">
	                                <button type="submit" id="button-candidate-register" class="button"><?=lang('candidatereg.buttonlabel');?></button>
	                                <button type="button" onclick="window.location.href = <?php echo "'".https_url($this->lang->lang().'/candidate')."'"; ?>" class="button"> < <?=lang('candidatereg.backbtnlink');?></button>
	                            </div>
	                        </div>                            
                        </div>
                    </div>
                </div>
                <!-- End of Row -->
            </div>
	</div>
</div>
</form>
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
<!-- Modal Dialog for Success & Failure Messages - End -->