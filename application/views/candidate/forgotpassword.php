<?php $forgotpasswd_url = $this->lang->lang().'/candidate/sendforgotpwd'; ?>
<script type="text/javascript" src="/js/candidate/candidate_forgotpasswd.js"></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-1"></div>
<input type="hidden" id="inputcandforgotpwdUrl" value="<?php echo https_url($forgotpasswd_url); ?>"  />
<div class="site-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 vert-offset-top-12">
                <div class="panel panel-default">
					<div class="panel-body">
                        <h3><b><?=lang('candidatehome.labelforgotpasswd');?></b></h3><br />
                        <p><?=lang('candidatehome.labelforgotpwdtxt');?></p>
                        <form method="post" accept-charset="utf-8" role="form" enctype="multipart-form/data">                        
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="email" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('candidatehome.labelemail');?>" required />
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="button" type="submit" id="button-submit-password"><?=lang('candidatehome.forgotpasswordbtnlbl');?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>