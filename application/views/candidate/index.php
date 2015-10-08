<?php 
$forgoturl = $this->lang->lang().'/candidate/forgotpassword'; 
$newuserurl = $this->lang->lang().'/candidate/register';
$candidateLogin = $this->lang->lang().'/candidate/candidate_login';
?>
<script src="/js/candidate/candidate_index.js"></script>
<div class="jobseeker-wrapper-index">
    <div class="container">
        <div class="row">
            <div class="vert-offset-top-5 visible-xs"></div>
            <div class="vert-offset-top-12 hidden-xs hidden-md hidden-sm visible-lg"></div>
            <div class="vert-offset-top-5 visible-md hidden-xs hidden-lg visible-sm"></div>
            <input type="hidden" id="inputCandLoginURL" value="<?php echo https_url($candidateLogin); ?>" />
			<div class="col-xs-12 col-md-4 col-lg-4 pull-right">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><?=lang('candidatehome.heading');?></h2>
                        <form method="post" accept-charset="utf-8" role="form" name="login-form">
                            <label for="name" class="sr-only">Email Address</label>
                            <input type="email" class="form-control" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('candidatehome.labelemail');?>" required /><br />
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputpassword" name="inputpassword" class="form-control" placeholder="<?=lang('candidatehome.labelpasswd');?>" required><br />
                            <button class="btn btn-md btn-primary btn-block" type="submit" id="button-sign-in"><?=lang('candidatehome.signinuserlabeltxt');?></button>
                        </form>
                    </div>
                    <div class="panel-footer"><br />
                        <a href="<?php echo https_url($forgoturl); ?>" target="_parent"><?=lang('candidatehome.labelforgotpasswd');?></a><br />
                        Don't have an account <a href="<?php echo https_url($newuserurl);?>"><?=lang('candidatehome.newuserlabeltxt');?></a><br /><br />                        
                    </div>
                </div>
            </div>                        
        </div>            
    </div> <!-- /container -->
</div>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-md" id="candIndexModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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