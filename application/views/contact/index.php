<script src="/js/contact/contact.js"></script>
<div class="visible-md vert-offset-top-5"></div>
<div class="contactus-wrapper">
    <div class="container">
        <div class="row">            
            <div class="col-md-6 text-left">
                <h1 class="cover-heading"><?=lang('contact.heading1');?></h1>
                <p><?=lang('contact.label7');?>&nbsp;+65 62244390</p>
                <p><a href="mailto:sales@grab-talent.com">sales@grab-talent.com</a></p>
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=1,%20Cross%20Street,SG&zoom=18&size=600x300&maptype=roadmap%20&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:red%7Clabel:C%7C1.2821075,103.8487531" class="col-md-12 col-sm-12 col-xs-12" />
            </div>
            
            <div class="col-md-6 vert-offset-top-2">
                <div class="alert alert-success" role="alert" style="display: none;"></div>
                <div class="alert alert-danger" role="alert" style="display: none;"></div>
                <form action="/contact" method="post" accept-charset="utf-8" class="form-horizontal contact" role="form">
                    <div class="form-group">
                        <p class="col-xs-12"><?=lang('contact.headercontent');?></p>
                        <label class="col-xs-4"><?=lang('contact.label1');?>*</label>
                        <div class="col-xs-8">
                            <input name="firstname" type="text" class="form-control<?php if (form_error('firstname')) echo " error" ?>" id="inputFirstName" placeholder="<?=lang('contact.label1_1');?>" value="<?php echo set_value('firstname'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label2');?>*</label>
                        <div class="col-xs-8">
                            <input name="lastname" type="text" class="form-control<?php if (form_error('lastname')) echo " error" ?>" id="inputLastName" placeholder="<?=lang('contact.label2_1');?>" value="<?php echo set_value('lastname'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label3');?>*</label>
                        <div class="col-xs-8">
                            <input name="email" type="email" class="form-control<?php if (form_error('email')) echo " error" ?>" id="inputEmail" placeholder="<?=lang('contact.label3_1');?>" value="<?php echo set_value('email'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label4');?></label>
                        <div class="col-xs-8">
                            <input name="phonenumber" type="tel" class="form-control<?php if (form_error('phonenumber')) echo " error" ?>" id="inputTel" placeholder="<?=lang('contact.label4_1');?>" value="<?php echo set_value('phonenumber'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label5');?>*</label>
                        <div class="col-xs-8">
                            <input name="reason" type="text" class="form-control<?php if (form_error('reason')) echo " error" ?>" id="inputReason" placeholder="<?=lang('contact.label5_1');?>" value="<?php echo set_value('reason'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4"><?=lang('contact.label6');?>*</label>
                        <div class="col-xs-8">
                            <textarea name="message" class="form-control<?php if (form_error('message')) echo " error" ?>" id="inputMessage" placeholder="<?=lang('contact.label6_1');?>"><?php echo set_value('message'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary pull-right" id="button-contact-send">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>