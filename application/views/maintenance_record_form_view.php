<!-- @author Prasith Lakshan -->

<style type="text/css">
	legend {
	    width:inherit; /* Or auto */
	    padding:0 10px; /* To give a bit of padding on the left and right */
	    border-bottom:none;
	    font-size: 1.3em;
	}

	fieldset {
	    border-top: 1px groove #ddd !important;
	    padding: 0 0em 1.4em 1.4em !important;
	    margin: 0 10% !important;
	    -webkit-box-shadow:  0px 0px 0px 0px #000;
	            box-shadow:  0px 0px 0px 0px #000;
	}
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-exclamation-circle text-primary"></i>
		Computer Maintenance Records
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab" onclick=""> <i class="fa fa-plus-square-o"></i> Add Record</a></li>
			</ul>
			<div class="tab-content">
		  		<div class="tab-pane active" id="tab_1">

					<div class="row">

						<?php
							// Notification for record creation SUCCESS
							if (isset($result)) {
								if ($result == 1) {
						?>
									<div class="col-md-6 col-md-offset-3">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-check"></i>
												Done!
											</strong>

											 Record(s) added successfully.
											<br />
										</div>
									</div>
						<?php
								}
							}
						?>

						<?php
							// Notification for record creation ERROR
							if (isset($result)) {
								if ($result == -1) {
						?>
									<div class="col-md-6 col-md-offset-3">
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Error!
											</strong>

											One or more errors occured!
											<br />
										</div>
									</div>
						<?php
								}
							}
						?>

  					</div>

					<!-- new computer creation form comes here -->
					<div class="row">
						    <form class="form-horizontal" role="form"  method="POST" action="<?php echo base_url()."index.php/Computer_Maintenance/add_record" ?>">
						        <fieldset style="border-top: 0px solid white !important">
							        <!-- computer ID -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="computer_id"> Computer(s) </label>

							            <div class="col-sm-5">
							                <select class="form-control select2" name="computers[]" multiple="multiple" data-placeholder="Select one or more" style="width: 100%;" required>
							                    <?php
							                        foreach ($computers as $computer) {
							                    ?>
							                        <option value="<?php echo $computer->computer_id ?>"  ><?php echo $computer->computer_id ?></option>
							                    <?php
							                        }
							                    ?>
							                </select>

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							    </fieldset>

						        <fieldset>
						        	<legend>System Reboot :</legend>
							        <!-- Fresh Boot -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="fresh_boot"> Boot System from a fresh start </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="fresh_boot" name="fresh_boot" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Boot Errors -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="boot_errors"> Monitor for boot errors  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="boot_errors" name="boot_errors" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Boot Speed -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="boot_speed"> Speed of entire boot process  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="boot_speed" name="boot_speed" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>System Log-in :</legend>

							        <!-- Login Errors -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="login_errors"> Monitor for errors  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="login_errors" name="login_errors" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Login Scripts -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="login_script"> Monitor log-in script  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="login_script" name="login_script" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Network Settings :</legend>

							        <!-- Domain Name -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="domain_name"> Domain Name  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="domain_name" name="domain_name" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Security Settings -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="security_settings"> Security Settings  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="security_settings" name="security_settings" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Computer Name  -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="computer_name"> Computer Name   </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="computer_name" name="computer_name" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Browser/Proxy Settings :</legend>

							        <!-- Proxy Settings -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="proxy_settings"> Verify proper settings and operations  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="proxy_settings" name="proxy_settings" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Browser Plugins -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="browser_plugins"> Remove all unwanted Browser Plugins from Student Login  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="browser_plugins" name="browser_plugins" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Proper Software Loads :</legend>

							        <!-- Verify Software -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="verify_software"> Verify all required software is installed and operating correctly.  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="verify_software" name="verify_software" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Unauthorized SW -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="remove_unauth_sw"> Remove unauthorized software.  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="remove_unauth_sw" name="remove_unauth_sw" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Hard Disk :</legend>

							        <!-- Unwanted Data -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="unwanted_data"> Remove Unwanted Data - Use Disk Analyzer  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="unwanted_data" name="unwanted_data" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Disk Checkup -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="disk_checkup"> Disk Checkup  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="disk_checkup" name="disk_checkup" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>

							        <!-- Disk Defrag -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="disk_defrag"> Disk Defragmentation  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="disk_defrag" name="disk_defrag" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Virus Scan :</legend>

							        <!-- Virus Scan -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="virus_scan"> Full System Scan For Virus malware  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="virus_scan" name="virus_scan" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Hardware cleanup :</legend>

							        <!-- Hardware Cleanup -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="hw_cleanup"> Hardware component cleanup  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="hw_cleanup" name="hw_cleanup" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

							    <fieldset>
						        	<legend>Final Verification :</legend>

							        <!-- Verify -->
							        <div class="form-group">
							            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="final_verify"> Verify the System works after the Cleanup Process  </label>

							            <div class="col-sm-5">
							                <input type="text" class="form-control" id="final_verify" name="final_verify" placeholder="" required />

							            </div>
							            <span class="text-danger">*</span>
							        </div>
							    </fieldset>

						        <!-- Buttons -->
						        <div class="clearfix">
						            <div class="col-md-offset-6 col-md-7">
						                <button class="btn btn-primary" id="save" type="submit" >
						                    <i class="ace-icon fa fa-check bigger-110"></i>
						                    Save
						                </button>

						                &nbsp; &nbsp;
						                <button class="btn" id="reset" type="reset">
						                    <i class="ace-icon fa fa-undo bigger-110"></i>
						                    Reset
						                </button>
						            </div>
						        </div>

						    </form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets2/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">
	var current_page = "Add Maintenance Records";

	$(function() {
        $(".select2").select2();
    });

</script>
