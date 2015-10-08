<?php $url = $this->lang->lang()."/site_admin/forgotpassword"; ?>
<script type="text/javascript" src="/js/site_admin/siteAdmin_index.js" defer></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-6"></div>
<div class="siteadmin-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <br /><br /><img src="/images/img_siteAdmin.jpg" class="pull-right" class="col-md-4" />
            </div>
            <div class="col-md-6">
                <h2><?=lang('siteadminhome.heading');?></h2>
                <form method="post" accept-charset="utf-8" role="form">
                    <input type="hidden" id="curr_lang" name="curr_lang" value="<?php echo $this->lang->lang();?>" />                            
                    <label for="emailaddress" class="sr-only">Email Address</label>
                    <input type="text" class="form-control" name="emailaddress" id="emailaddress" placeholder="<?=lang('recruiterhome.labelemail');?>" required autofocus /><br />
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="<?=lang('recruiterhome.labelpasswd');?>" required><br />
                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-sign-in">Sign in</button>
                </form>                                
            </div>
        </div>      
    </div> <!-- /container -->
</div>
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