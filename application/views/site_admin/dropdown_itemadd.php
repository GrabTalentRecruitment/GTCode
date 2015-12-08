<?php $tblName = $this->uri->segment(4); $menuadd_URL = $this->lang->lang().'/site_admin/dropdown_addtblItem'; ?>
<script src="/js/site_admin/siteAdmin_dropdownadd.js" type="text/javascript"></script>
<input type="hidden" id="menuDropdownaddURL" value="<?php echo https_url($menuadd_URL); ?>" />
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li><a href="<?php echo https_url($this->lang->lang().'/site_admin/dashboard')?>"><?=lang('home.index')?></a></li>
                <li><a href="<?php echo https_url($this->lang->lang().'/site_admin/dropdown_settings')?>"><?=lang('siteadminusers.settingslabel3');?></a></li>
            </ol>
            <h2><img src="/images/icons/settings.png" alt="Drop-down items icon"/>Add item <?php echo $tblName; ?></h2>
            <!-- To display in Large Desktop mode - Start -->
            <div class="alert alert-warning" role="alert" id="modal-error-msg" style="display: none;"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
        				<div class="table-responsive">
        					<table class="table table-striped">
                                <tbody>
                                    <form action="" method="post">
                                        <?php
                                            $columnarr = [];
                                            $rowhdr = '';
                                            $query = $this->db->query('DESC '.$tblName);
                                            if($query->num_rows() > 0) {
                                                echo "<tr><td colspan='2'><button type='button' class='btn btn-primary' id='btn_savedropdownitem'>Save</button></td></tr>";
                                                foreach ($query->result_array() as $candids) {
                                                    echo "<tr>";
                                                    echo "<td>".$candids['Field']."</td>";
                                                    if( strstr($candids['Type'], '(', true) == 'varchar' && $candids['Field'] != "keyword_created_by" && $candids['Field'] != "keyword_last_modified_by") {
                                                        echo "<td><input type='text' id='input".$candids['Field']."' value='' class='form-control' /></td>";
                                                    } else if( $candids['Field'] == "keyword_created_by" || $candids['Field'] == "keyword_last_modified_by") {
                                                        echo "<td><input type='text' id='input".$candids['Field']."' value='".$this->session->userdata('logged_in')."' class='form-control' disabled /></td>";
                                                    } else if( strstr($candids['Type'], '(', true) == 'int') {
                                                        if( preg_match('/id/',$candids['Field'])  == 1) {
                                                            echo "<td><input type='number' id='input".$candids['Field']."' value='' class='form-control' disabled /></td>";
                                                        } else {
                                                            echo "<td><input type='number' id='input".$candids['Field']."' value='' class='form-control' /></td>";   
                                                        }
                                                    } else if( strstr($candids['Type'], '(') == '' || $candids['Type'] == 'datetime') {
                                                        echo "<td><input type='text' id='input".$candids['Field']."' class='form-control' value='".date('d-M-Y h:m:s',strtotime('now'))."' disabled /></td>";
                                                    }
                                                    echo "</tr>";
                                                    array_push($columnarr,$candids['Field']);
                                                }
                                            }
                                            foreach ($columnarr as $key=>$value) { $rowhdr .= $value.","; }
                                        ?>                                    
                                    <input type="hidden" id="menudropDowntblItemid" value="<?php echo substr($rowhdr, 0, -1); ?>" />
                                    <input type="hidden" id="menudropDowntblName" value="<?php echo $tblName; ?>" />
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
            <!-- To display in Large Desktop mode - End -->
        </div>
    </div>
</div>