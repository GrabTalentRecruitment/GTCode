<?php $jobs = $this->session->userdata('job_detail'); ?>
<style type="text/css">
    table { margin:auto; border-collapse: collapse; text-align:center; font-size: 15px; }
    .table-bordered>tbody>tr>td, .table-bordered>thead>tr>td  {
        width:80px; height:80px;
        border:1px solid #999;
        vertical-align:middle;
        text-align:center;
    }
    .table-bordered>tbody>tr>th, .table-bordered>thead>tr>th {
        width:80px; height:80px;
        border:1px solid #999;
        vertical-align:middle;
        text-align:center;
        background-color: #ffd300;
        font-size:30px;
    }
    .days { font-weight: bold; font-size:20px; }
    .content { font-size: 10px; }
    .badge { white-space: normal !important; font-size:20px; }
</style>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <br />
            <div class="row">
                <div class="col-lg-12 text-right">
                    <a href="<?php echo https_url($this->lang->lang().'/recruiter/export_calendar'); ?>" target="_blank">Export as CSV</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?php echo $calendar; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>