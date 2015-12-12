<?php $tblName = $this->uri->segment(4); $menuadd_URL = $this->lang->lang().'/site_admin/dropdown_addtblItem'; ?>
<script src="/js/site_admin/siteAdmin_dropdownadd.js" type="text/javascript"></script>
<input type="hidden" id="menuDropdownaddURL" value="<?php echo https_url($menuadd_URL); ?>" />
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1">Add item <?php echo $tblName; ?></h1>
			</div>
			<div class="col-md-6 no-padding">
				<div class="subpage-breadcrumbs">
					<a href="<?php echo https_url($this->lang->lang().'/site_admin/dashboard')?>"><?=lang('home.index')?></a>&nbsp;/&nbsp;<a href="<?php echo https_url($this->lang->lang().'/site_admin/dropdown_settings')?>"><?=lang('siteadminusers.settingslabel3');?></a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="page-content container">
        <div class="row">
            <table class="table table-striped">
                <tbody>
                    <form action="" method="post">
                        <?php
                            $columnarr = [];
                            $rowhdr = '';
                            $query = $this->db->query('DESC '.$tblName);
                            if($query->num_rows() > 0) {
                                echo "<tr><td colspan='2'><button type='button' class='button' id='btn_savedropdownitem'>Save</button></td></tr>";
                                foreach ($query->result_array() as $candids) {
                                    echo "<tr>";
                                    echo "<td>".$candids['Field']."</td>";
                                    if( strstr($candids['Type'], '(', true) == 'varchar' && $candids['Field'] != "keyword_created_by" && $candids['Field'] != "keyword_last_modified_by") {
                                        echo "<td><input type='text' id='input".$candids['Field']."' value='' /></td>";
                                    } else if( $candids['Field'] == "keyword_created_by" || $candids['Field'] == "keyword_last_modified_by") {
                                        echo "<td><input type='text' id='input".$candids['Field']."' value='".$this->session->userdata('logged_in')."' disabled /></td>";
                                    } else if( strstr($candids['Type'], '(', true) == 'int') {
                                        if( preg_match('/id/',$candids['Field'])  == 1) {
                                            echo "<td><input type='number' id='input".$candids['Field']."' value='' disabled /></td>";
                                        } else {
                                            echo "<td><input type='number' id='input".$candids['Field']."' value='' /></td>";   
                                        }
                                    } else if( strstr($candids['Type'], '(') == '' || $candids['Type'] == 'datetime') {
                                        echo "<td><input type='text' id='input".$candids['Field']."' value='".date('d-M-Y h:m:s',strtotime('now'))."' disabled /></td>";
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