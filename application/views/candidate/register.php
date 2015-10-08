<?php $applnSignup_url = $this->lang->lang().'/candidate/candidate_register'; ?>
<script src="/js/candidate/candidate_register.js"></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-1"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 vert-offset-top-6">
                    <div class="panel panel-default">
    					<div class="panel-body">
                            <div class="alert alert-success" role="alert" style="display: none;"></div>
                            <div class="alert alert-danger" role="alert" style="display: none;"></div>
                            <input type="hidden" id="inputCandsignupUrl" value="<?php echo https_url($applnSignup_url); ?>" />
                            <a href="javascript:history.back();" target="_self"> < <?=lang('candidatereg.backbtnlink');?></a><br />
                            <h3><b><?=lang('candidatereg.heading');?></b></h3><br />
                            <form method="post" accept-charset="utf-8" role="form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="inputregisteremailadd" id="inputregisteremailadd" placeholder="<?=lang('candidatereg.emailaddress');?>" required />
                                    </div>
                                </div><br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" id="inputregisterpassword" name="inputregisterpassword" class="form-control" placeholder="<?=lang('candidatereg.password');?>" required />
                                    </div>
                                </div><br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" id="inputregistercnfrmpassword" name="inputregistercnfrmpassword" class="form-control" placeholder="<?=lang('candidatereg.confirmpassword');?>" required />
                                    </div>
                                </div><br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-candidate-register"><?=lang('candidatereg.buttonlabel');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of Row -->
            </div>  
        </div>
    </div>
</div>