<?php
/* plugin name:Covid Partner List */
/* Plugin URI: http://greencubes.co.in/ */
/* Description: this is plugin is used to add partner details.*/
/* Version: 1.1
   Author: Greencubes
   Author URI: http://greencubes.co.in/
*/

//admin menu code
add_action('admin_menu', 'covid_partner_list');
function covid_partner_list()
{
	add_menu_page('Covid Partner List', 'Covid Partner', 'publish_pages', 'covid-partner-view', 'covid_partner_manage_view', '', 10);

	add_submenu_page('covid-partner-view', 'Covid Partner List', 'Add Covid Hospital', 'publish_pages', 'covid-partner-add1', 'covid_partner_manage_add1');

	add_submenu_page('covid-partner-view', 'Covid Partner List', 'Add Remdesivir Injection', 'publish_pages', 'covid-partner-add2', 'covid_partner_manage_add2');

	add_submenu_page('covid-partner-view', 'Covid Partner List', 'Add Plasma', 'publish_pages', 'covid-partner-add3', 'covid_partner_manage_add3');

	add_submenu_page('covid-partner-view', 'Covid Partner List', 'Add Oxygen Cylinder', 'publish_pages', 'covid-partner-add4', 'covid_partner_manage_add4');

	add_submenu_page('covid-partner-import', 'Covid Partner List', 'Add Covid Partner', 'publish_pages', 'covid-partner-import', 'covid_partner_manage_import');
}
//back end css
//css
function partner_style2()
{
	wp_enqueue_style('partner_list_custom', plugins_url('/css/partner_custom.css', __FILE__), false, '1.0', 'all');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_style('bootstrap', plugins_url('/css/bootstrap.min.css', __FILE__), false, '1.0', 'all');
}
//js
function partner_script2()
{
	wp_enqueue_script('my-script-handle', plugins_url('js/my-script.js', __FILE__), array('wp-color-picker'), false, true);
}

//back end design & code for create
function covid_partner_manage_page()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	partner_style2();
	//url get
	$url = plugins_url();
	//js call function
	partner_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$table_name = "covidbank_partner";

		if ($DP_Statecovid == '') {
			$DP_Statecovid = 'FALSE';
		}

		if ($DP_TEFAP == '') {
			$DP_TEFAP = 'FALSE';
		}

		if ($DP_Senior_Box_Program == '') {
			$DP_Senior_Box_Program = 'FALSE';
		}

		if ($DP_Distribution_Site == '') {
			$DP_Distribution_Site = 'FALSE';
		}

		if ($DP_Direct_Service == '') {
			$DP_Direct_Service = 'FALSE';
		}

		if ($DP_Site_Active == '') {
			$DP_Site_Active = 'FALSE';
		}

		$arg = array(
			'Distribution_Partner_ID' => $Distribution_Partner_ID,
			'DP_Name' => $DP_Name,
			'DP_Billing_Address' => $DP_Billing_Address,
			'DP_Billing_Address_2' => $DP_Billing_Address_2,
			'DP_Billing_City' => $DP_Billing_City,
			'DP_Billing_State' => $DP_Billing_State,
			'DP_Billing_Postal' => $DP_Billing_Postal,
			'DP_Billing_County' => $DP_Billing_Country,
			'DP_Billing_Phone' => $DP_Billing_Phone,
			'DP_Billing_Phone_Ext' => $DP_Billing_Phone_Ext,
			'DP_Billing_Fax' => $DP_Billing_Fax,
			'DP_Billing_Contact' => $DP_Billing_Contact,
			'DP_Type' => $DP_Type,
			'DP_Notes' => $DP_Notes,
			'DP_Statecovid' => $DP_Statecovid,
			'DP_TEFAP' => $DP_TEFAP,
			'DP_Senior_Box_Program' => $DP_Senior_Box_Program,
			'DP_Distribution_Site' => $DP_Distribution_Site,
			'DP_Direct_Service' => $DP_Direct_Service,
			'DP_Site_Address' => $DP_Site_Address,
			'DP_Site_Address_2' => $DP_Site_Address_2,
			'DP_Site_City' => $DP_Site_City,
			'DP_Site_Zip' => $DP_Site_Zip,
			'DP_Site_Active' => $DP_Site_Active,
		);

		//echo "<pre>";
		//print_r($arg);
		//echo "</pre>";

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {

			$id = array('Id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] = 'edit') {
		global $wpdb;
		$table_name = "covidbank_partner";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	?>
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration  Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Partner Information</h3>

					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>

								<div class="col-md-6">
									<div class="form-group">
										<label>Distribution Partner Id</label>
										<input class="form-control" required value="<?php echo $result_edit->Distribution_Partner_ID; ?>" name="Distribution_Partner_ID" id="Distribution_Partner_ID" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Name; ?>" name="DP_Name" id="DP_Name" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Billing Address</label>
										<textarea class="form-control" placeholder="Billing Address" name="DP_Billing_Address"><?php echo nl2br($result_edit->DP_Billing_Address); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Billing Address - 2</label>
										<textarea class="form-control" placeholder="Billing Address - 2" name="DP_Billing_Address_2"><?php echo nl2br($result_edit->DP_Billing_Address_2); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>City</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_City; ?>" name="DP_Billing_City" id="DP_Billing_City" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>States</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_State; ?>" name="DP_Billing_State" id="DP_Billing_State" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Postal Code</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_Postal; ?>" name="DP_Billing_Postal" id="DP_Billing_Postal" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Country</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_County; ?>" name="DP_Billing_Country" id="DP_Billing_Country" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Phone</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_Phone; ?>" name="DP_Billing_Phone" id="DP_Billing_Phone" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Phone Extenstion</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_Phone_Ext; ?>" name="DP_Billing_Phone_Ext" id="DP_Billing_Phone_Ext" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Fax</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Billing_Fax; ?>" name="DP_Billing_Fax" id="DP_Billing_Fax" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Billing Contact</label>
										<textarea class="form-control" placeholder="Billing Contact" name="DP_Billing_Contact"><?php echo nl2br($result_edit->DP_Billing_Contact); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Type</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Type; ?>" name="DP_Type" id="DP_Type" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Notes</label>
										<textarea class="form-control" placeholder="Notes" name="DP_Notes"><?php echo nl2br($result_edit->DP_Notes); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>State Covid</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_Statecovid == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_Statecovid" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'state-covid'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'state-covid'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>TEFAP</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_TEFAP == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_TEFAP" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'TEFAP'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'TEFAP'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Senior Box Program</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_Senior_Box_Program == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_Senior_Box_Program" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'DP_Senior_Box_Program'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'DP_Senior_Box_Program'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Distribution Site</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_Distribution_Site == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_Distribution_Site" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'DP_Distribution_Site'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'DP_Distribution_Site'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Direct Service</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_Direct_Service == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_Direct_Service" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'DP_Direct_Service'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'DP_Direct_Service'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Site Address</label>
										<textarea class="form-control" placeholder="Site Address" name="DP_Site_Address"><?php echo nl2br($result_edit->DP_Site_Address); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Site Address - 2</label>
										<textarea class="form-control" placeholder="Site Address - 2" name="DP_Site_Address_2"><?php echo nl2br($result_edit->DP_Site_Address_2); ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Site City</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Site_City; ?>" name="DP_Site_City" id="DP_Site_City" type="text">
									</div>
								</div>
								<div class="clearfix"></div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Site Zip</label>
										<input class="form-control" value="<?php echo $result_edit->DP_Site_Zip; ?>" name="DP_Site_Zip" id="DP_Site_Zip" type="text">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Site Active</label>

										<div class="onoffswitch4">
											<?php if ($result_edit->DP_Site_Active == 'TRUE') {
													$checked = 'checked="checked"';
													$value = "TRUE";
												} else {
													$value = "TRUE";
													$checked = '';
												} ?>
											<input type="checkbox" name="DP_Site_Active" class="onoffswitch4-checkbox" data-id="<?php echo $result_edit->Id; ?>" id="<?php echo 'DP_Site_Active'; ?>" style="display:none" value="<?php echo $value; ?>" <?php echo $checked; ?>>

											<label class="onoffswitch4-label" for="<?php echo 'DP_Site_Active'; ?>">
												<span class="onoffswitch4-inner"></span>
												<span class="onoffswitch4-switch"></span>
											</label>
										</div>
									</div>
								</div>


								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit Partner Information">
								</div>

							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
		add_thickbox(); ?>

<?php

}
//view coupon page(backend)
function covid_partner_manage_view()
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	global $wpdb;
	$url = plugins_url();
	partner_style2();
	$tabel_name3 = 'wp_covidlistdetails';

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 10;
	$offset = ($pageno - 1) * $no_of_records_per_page;

	if (isset($_GET['orderby'])) {
		$orderby = $_GET['orderby'];
		$order = $_GET['order'];
	} else {
		$orderby = 'Id';
		$order = 'desc';
	}

	$s = '';
	$categoryId = 0;
	$bloodGroup = 0;
	$bloodGroup = !empty($_GET['bloodGroup']) ? $_GET['bloodGroup'] : 0;

	if ($bloodGroup == 1) {
		$sbloodGroup = 'A+';
	} elseif ($bloodGroup == 2) {
		$sbloodGroup = 'A-';
	} elseif ($bloodGroup == 3) {
		$sbloodGroup = 'B+';
	} elseif ($bloodGroup == 4) {
		$sbloodGroup = 'B-';
	} elseif ($bloodGroup == 5) {
		$sbloodGroup = 'O+';
	} elseif ($bloodGroup == 6) {
		$sbloodGroup = 'O-';
	} elseif ($bloodGroup == 7) {
		$sbloodGroup = 'AB+';
	} elseif ($bloodGroup == 8) {
		$sbloodGroup = 'AB-';
	} elseif ($bloodGroup == 0) {
		$sbloodGroup = 0;
	}

	if (!empty($_GET['s']) && !empty($_GET['categoryId'])) {

		$s = $_GET['s'];
		$categoryId = $_GET['categoryId'];
		// $bloodGroup = !empty($_GET['bloodGroup']) ? $_GET['bloodGroup'] : '';

		if ($sbloodGroup) {

			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where (title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%') AND categoryId IN ($categoryId) AND bloodGroup LIKE '" . $sbloodGroup . "' order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where (title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%') AND categoryId IN ($categoryId) AND bloodGroup LIKE '" . $sbloodGroup . "' order by id desc");
		} else {
			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where (title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%') AND categoryId IN ($categoryId) order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where (title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%') AND categoryId IN ($categoryId) order by id desc");
		}
	} else if (!empty($_GET['s'])) {

		$s = $_GET['s'];

		$allcoupons = $wpdb->get_results("select * from $tabel_name3 where title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

		$resultscount =  $wpdb->get_results("select * from $tabel_name3 where title LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by id desc");
	} else if (!empty($_GET['categoryId'])) {

		$categoryId = $_GET['categoryId'];

		// $bloodGroup = !empty($_GET['bloodGroup']) ? $_GET['bloodGroup'] : '';

		if ($sbloodGroup) {

			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where categoryId IN ($categoryId) AND bloodGroup LIKE '" . $sbloodGroup . "' order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where categoryId IN ($categoryId) AND bloodGroup LIKE '" . $sbloodGroup . "' order by id desc");
		} else {

			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where categoryId IN ($categoryId) order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where categoryId IN ($categoryId) order by id desc");
		}
	} else {

		$allcoupons = $wpdb->get_results("select * from $tabel_name3 order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

		$resultscount =  $wpdb->get_results("select * from $tabel_name3 order by id desc");
	}

	$total_rows = count($resultscount);
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	?>
	<br /><br />
	<div class="refresh_data">
		<?php
			if (isset($_GET) && $_GET['file'] == 'no') {
				?>
			<div class="container">

				<h5 style="display:inline; float:right;color: red;margin-right: 10px;"><b>Please select file for import.</b></h5><br>

			</div>
		<?php
			}
			?>
		<div class="container">

			<h4 style="display:inline; float:left;"><b>COVID PARTNERS</b></h4>

			<h4 style="display:inline; float:right;">


				<form enctype='multipart/form-data' style="display: inline;float: left;" action="admin.php?page=covid-partner-import" method="post">

					<input type="file" name="importexcel" style="display: inline;float: left;margin-left: 10px;width: 250px;margin-top: -3px;" />

					<input type="submit" class='btn btn-success btn-xs' value="Import" style="padding: 6px 12px;display: inline;float: left;margin-left: 10px">

					<a class='' style="padding: 6px 12px;display: inline;float: left;" href="https://zedaid.org/sampleexportdata.php"> Sample import file</a>

				</form>

			</h4>

			<br /><br /><br />

			<!-- <table class="table table-striped custab"> -->

			<form style="display: inline;float: left;width: 51%;" enctype='multipart/form-data' action="admin.php?page=covid-partner-view" method="get">

				<input value="covid-partner-view" name="page" type="hidden">

				<select style="display: inline;float: left;" class="form-control" id="ddcategoryId" name="categoryId">
					<option value="0" <?= $categoryId == 0 ? 'selected' : ''; ?>>Select Category</option>
					<option value="1" <?= $categoryId == 1 ? 'selected' : ''; ?>>Covid Hospital</option>
					<option value="2" <?= $categoryId == 2 ? 'selected' : ''; ?>>Remdesivir Injection</option>
					<option value="3" <?= $categoryId == 3 ? 'selected' : ''; ?>>Plasma</option>
					<option value="4" <?= $categoryId == 4 ? 'selected' : ''; ?>>Oxygen Cylinder</option>
				</select>

				<?php
					if ($categoryId == 3) {
						$style = "display: inline;float: left;margin-left: 10px;";
					} else {
						$style = "display: none;float: left;margin-left: 10px;";
					}
					?>

				<select id="ddbloodGroup" style="<?php echo $style; ?>" class="form-control" name="bloodGroup">

					<option value="0" <?= $bloodGroup == 0 ? 'selected' : ''; ?>>Select blood group</option>

					<option value="1" <?= $bloodGroup == 1 ? 'selected' : ''; ?>>A+</option>
					<option value="2" <?= $bloodGroup == 2 ? 'selected' : ''; ?>>A-</option>

					<option value="3" <?= $bloodGroup == 3 ? 'selected' : ''; ?>>B+</option>
					<option value="4" <?= $bloodGroup == 4 ? 'selected' : ''; ?>>B-</option>

					<option value="5" <?= $bloodGroup == 5 ? 'selected' : ''; ?>>O+</option>
					<option value="6" <?= $bloodGroup == 6 ? 'selected' : ''; ?>>O-</option>

					<option value="7" <?= $bloodGroup == 7 ? 'selected' : ''; ?>>AB+</option>
					<option value="8" <?= $bloodGroup == 8 ? 'selected' : ''; ?>>AB-</option>
				</select>

				<script>
					jQuery('#ddcategoryId').change(function() {
						// set the window's location property to the value of the option the user has selected
						if (jQuery(this).val() == 3) {
							jQuery('#ddbloodGroup').css('display', 'inline');
						} else {
							jQuery('#ddbloodGroup').css('display', 'none');
						}
					});

					function changestatus(id) {
						jQuery('#loadingdiv' + id).css('display', '');
						jQuery('#acceptdivmain' + id).css('display', 'none');
						jQuery.ajax({
							type: "POST",
							url: '../adminchangestatus.php',
							data: 'id='+id,
							success: function(response)
							{
								jQuery('#verifieddiv' + id).css('display', '');
								jQuery('#acceptdivmain' + id).css('display', 'none');
								jQuery('#loadingdiv' + id).css('display', 'none');
							}
						});
					}
				</script>

				<input style="width:25%;display: inline;float: left;margin-left: 10px;" class="form-control" value="<?php echo $s; ?>" name="s" type="hidden">

				<input style="display: inline;float: left;margin-left: 10px;" type="submit" value="Filter" class="btn btn-success" />

			</form>

			<form style="margin-left: 10px;display: inline;float: right;width: 35%;" enctype='multipart/form-data' action="admin.php?page=covid-partner-view" method="get">

				<input value="covid-partner-view" name="page" type="hidden">

				<input value="<?= $categoryId ?>" name="categoryId" type="hidden">

				<input value="<?= $bloodGroup ?>" name="bloodGroup" type="hidden">

				<input style="width:77%;display: inline;float: left;" class="form-control" value="<?php echo $s; ?>" name="s" type="text">

				<input style="margin-left: 10px;" type="submit" value="Search" class="btn btn-success" />

			</form>

			<!-- </table> -->

			<br /><br />

			<table class="table table-striped custab">
				<tr>
					<th>Category</a></th>
					<th>Title</th>
					<th>Details</th>
					<th>Location</th>
					<th>Contact Info</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
					if ($allcoupons) {
						foreach ($allcoupons as $data) {
							$categoryName = $data->categoryName;
							$title = $data->title;

							$location = $data->location;
							$contactName = $data->contactName . '<br>' . $data->contactNumber1;
							
							$last_status_updated_id = $data->last_status_updated_id;
							$zed_verified = $data->zed_verified;

							if ($data->categoryId == 1) {
								$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>Bed: ' . $data->bed . '<br>Bed with oxygen: ' . $data->oxygen . '<br>Bed with ventilator: ' . $data->ventilator . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

								$editurl = "admin.php?page=covid-partner-add1&id=" . $data->id . "&action=edit";
							} else if ($data->categoryId == 2) {
								$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>Qty: ' . $data->quantity . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

								$editurl = "admin.php?page=covid-partner-add2&id=" . $data->id . "&action=edit";
							} else if ($data->categoryId == 3) {
								$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>User gender: ' . $data->gender . '<br>User blood group: ' . $data->bloodGroup . '<br>Eligible date: ' . $data->coronaEligibleDate . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

								$editurl = "admin.php?page=covid-partner-add3&id=" . $data->id . "&action=edit";
							} else if ($data->categoryId == 4) {
								$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>Qty: ' . $data->quantity . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

								$editurl = "admin.php?page=covid-partner-add4&id=" . $data->id . "&action=edit";
							}
							?>
						<tr>
							<td><?php echo $categoryName; ?></td>
							<td><?php echo $title; ?></td>
							<td><?php echo $dhtml; ?></td>
							<td><?php echo $location; ?></td>
							<td><?php echo $contactName; ?></td>
							<td>
								<div id="acceptdivmain<?php echo $data->id; ?>">
									<?php if($last_status_updated_id != 0 && $zed_verified == 0){?>
										<button type="button" class="btn btn-success align-middle" onclick="changestatus('<?php echo $data->id; ?>');">ZED Verified</button>
									<?php } else { ?>
										<button type="button" class="btn align-middle">ZED Verified</button>
									<?php } ?>
								</div>

								<div style="display:none" id="loadingdiv<?php echo $data->id; ?>">
									<button type="button disabled" class="btn btn-success align-middle">Loading..</button>
								</div>

								<div style="display:none" id="verifieddiv<?php echo $data->id; ?>">
									<button type="button" class="btn align-middle">ZED Verified</button>
								</div>
							</td>
							<td><a class='btn btn-info btn-xs' style="padding: 6px 12px;" href="<?php echo $editurl; ?>"> Edit</a>&nbsp;&nbsp;
								<a class="btn btn-danger btn-xs delete" style="padding: 6px 12px;" data-id="<?php echo $data->id; ?>"> Delete</a></td>
						</tr>
					<?php }
						} else {
							?>
					<tr>
						<td colspan="6" style="text-align:center">No record found.</td>
					</tr>
				<?php
					}
					?>
			</table>

			<?php
				$pagLink = "<br/><ul class='pagination'>";
				if ($total_pages > 1) {
					for ($i = 1; $i <= $total_pages; $i++) {
						if ($pageno == $i) {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						} else {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: #999;margin-left: 10px;background-color: white;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						}
					}
				}
				echo $pagLink . "</ul>";
				?>

		</div>
	</div>
<?php
}

function covid_partner_manage_add1()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	partner_style2();
	//url get
	$url = plugins_url();
	//js call function
	partner_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		exit;

		extract($_POST);
		//print_r($_POST);

		$title = $_POST['title'];
		$categoryName = 'Covid Hospital';
		$categoryId = 1;
		$bed = $_POST['bed'];
		$oxygen = $_POST['oxygen'];
		$ventilator = $_POST['ventilator'];
		$location = $_POST['location'];
		$contactName = $_POST['contactName'];
		$contactNumber1  = $_POST['contactNumber1'];
		$status  = $_POST['status'];
		$availableDate  = $_POST['availableDate'];
		$informationBy  = $_POST['informationBy'];

		$address = str_replace(" ", "+", $location);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		// exit;
		$details = file_get_contents($url);

		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng'];

		$table_name = "wp_covidlistdetails";

		$arg = array(
			'title' => $title,
			'categoryName' => $categoryName,
			'categoryId' => $categoryId,
			'bed' => $bed,
			'oxygen' => $oxygen,
			'ventilator' => $ventilator,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactName' => $contactName,
			'contactNumber1' => $contactNumber1,
			'informationBy' => $informationBy,
			'status' => $status,
			'availableDate' => $availableDate,
			'updatedAt' => date('Y-m-d H:i:s'),
		);


		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_covidlistdetails";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	?>
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration  Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Partner Information</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" value="<?php echo $result_edit->title; ?>" name="title" id="title" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Bed</label>
											<input class="form-control" value="<?php echo $result_edit->bed; ?>" name="bed" id="bed" type="number">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Bed with oxygen</label>
											<input class="form-control" value="<?php echo $result_edit->oxygen; ?>" name="oxygen" id="oxygen" type="number">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Bed with ventilator</label>
											<input class="form-control" value="<?php echo $result_edit->ventilator; ?>" name="ventilator" id="ventilator" type="number">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input class="form-control" value="<?php echo $result_edit->location; ?>" name="location" id="location" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Name</label>
											<input class="form-control" value="<?php echo $result_edit->contactName; ?>" name="contactName" id="contactName" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" value="<?php echo $result_edit->contactNumber1; ?>" name="contactNumber1" id="contactNumber1" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Information By</label>
											<input class="form-control" value="<?php echo $result_edit->informationBy ? $result_edit->informationBy : 'Zed'; ?>" name="informationBy" id="informationBy" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>

											<select class="form-control" name="status" id="cstatus">
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Available</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">To be available</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Not available</option>
											</select>

										</div>
									</div>

									<?php
										$style = "display:none;";
										if ($result_edit->status == '2') {
											$style = "";
										} else {
											$style = "display:none;";
										}
										?>

									<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

									<script>
										jQuery(document).ready(function() {
											jQuery('#availableDate').datepicker({
												dateFormat: "yy-mm-dd",
												minDate: 0
											});
										});
									</script>

									<div class="col-md-6" id="avaialbledatediv" style="<?= $style; ?>">
										<div class="form-group">
											<label>Available on</label>
											<input class="form-control" value="<?php echo $result_edit->availableDate; ?>" name="availableDate" id="availableDate" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit Partner Information">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery("#validform").validate({
									rules: {
										title: 'required',
										location: 'required',
										contactName: 'required',
										informationBy: 'required',
										contactNumber1: {
											required: true,
											phoneUS: true
										},
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length > 9 &&
										phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
								}, "Please specify a valid phone number");
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
		add_thickbox(); ?>

<?php

}

function covid_partner_manage_add2()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	partner_style2();
	//url get
	$url = plugins_url();
	//js call function
	partner_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$title = $_POST['title'];
		$categoryName = 'Remdesivir Injection';
		$categoryId = 2;
		$quantity = $_POST['quantity'];
		$location = $_POST['location'];
		$contactName = $_POST['contactName'];
		$contactNumber1  = $_POST['contactNumber1'];
		$status  = $_POST['status'];
		$availableDate  = $_POST['availableDate'];
		$informationBy  = $_POST['informationBy'];

		$address = str_replace(" ", "+", $location);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		// exit;
		$details = file_get_contents($url);

		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng'];

		$table_name = "wp_covidlistdetails";

		$arg = array(
			'title' => $title,
			'categoryName' => $categoryName,
			'categoryId' => $categoryId,
			'quantity' => $quantity,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactName' => $contactName,
			'contactNumber1' => $contactNumber1,
			'informationBy' => $informationBy,
			'status' => $status,
			'availableDate' => $availableDate,
			'updatedAt' => date('Y-m-d H:i:s'),
		);

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_covidlistdetails";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	?>
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration  Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Partner Information</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" value="<?php echo $result_edit->title; ?>" name="title" id="title" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Quantity</label>
											<input class="form-control" value="<?php echo $result_edit->quantity; ?>" name="quantity" id="quantity" type="number">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input class="form-control" value="<?php echo $result_edit->location; ?>" name="location" id="location" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Name</label>
											<input class="form-control" value="<?php echo $result_edit->contactName; ?>" name="contactName" id="contactName" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" value="<?php echo $result_edit->contactNumber1; ?>" name="contactNumber1" id="contactNumber1" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Information By</label>
											<input class="form-control" value="<?php echo $result_edit->informationBy ? $result_edit->informationBy : 'Zed'; ?>" name="informationBy" id="informationBy" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>

											<select class="form-control" name="status" id="cstatus">
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Available</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">To be available</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Not available</option>
											</select>

										</div>
									</div>

									<?php
										$style = "display:none;";
										if ($result_edit->status == '2') {
											$style = "";
										} else {
											$style = "display:none;";
										}
										?>

									<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

									<script>
										jQuery(document).ready(function() {
											jQuery('#availableDate').datepicker({
												dateFormat: "yy-mm-dd",
												minDate: 0
											});
										});
									</script>

									<div class="col-md-6" id="avaialbledatediv" style="<?= $style; ?>">
										<div class="form-group">
											<label>Available on</label>
											<input class="form-control" value="<?php echo $result_edit->availableDate; ?>" name="availableDate" id="availableDate" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit Partner Information">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery("#validform").validate({
									rules: {
										title: 'required',
										location: 'required',
										contactName: 'required',
										informationBy: 'required',
										contactNumber1: {
											required: true,
											phoneUS: true
										},
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length > 9 &&
										phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
								}, "Please specify a valid phone number");
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
		add_thickbox(); ?>

<?php
}


function covid_partner_manage_add3()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	partner_style2();
	//url get
	$url = plugins_url();
	//js call function
	partner_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$title = $_POST['title'];
		$categoryName = 'Plasma';
		$categoryId = 3;
		$gender = $_POST['gender'];
		$bloodGroup = $_POST['bloodGroup'];
		$coronaRecoverDate = $_POST['coronaRecoverDate'];
		$coronaEligibleDate = $_POST['coronaEligibleDate'];
		$location = $_POST['location'];
		$contactName = $_POST['contactName'];
		$contactNumber1  = $_POST['contactNumber1'];
		$status  = $_POST['status'];
		$availableDate  = $_POST['availableDate'];
		$informationBy  = $_POST['informationBy'];

		$address = str_replace(" ", "+", $location);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		// exit;
		$details = file_get_contents($url);

		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng'];

		$table_name = "wp_covidlistdetails";

		$arg = array(
			'title' => $title,
			'categoryName' => $categoryName,
			'categoryId' => $categoryId,
			'gender' => $gender,
			'bloodGroup' => $bloodGroup,
			'coronaRecoverDate' => $coronaRecoverDate,
			'coronaEligibleDate' => $coronaEligibleDate,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactName' => $contactName,
			'contactNumber1' => $contactNumber1,
			'informationBy' => $informationBy,
			'status' => $status,
			'availableDate' => $availableDate,
			'updatedAt' => date('Y-m-d H:i:s'),
		);

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_covidlistdetails";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	?>
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration  Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Partner Information</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>

								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Category Type</label>
										<select class="form-control" name="categoryId" id="categoryId">
											<option <?= $result_edit->categoryId == 1 ? 'selected = "selected"' : ''; ?> value="1">Covid Hospital</option>
											<option <?= $result_edit->categoryId == 2 ? 'selected = "selected"' : ''; ?> value="2">Remdesivir Injection</option>
											<option <?= $result_edit->categoryId == 3 ? 'selected = "selected"' : ''; ?> value="3">Plasma</option>
											<option <?= $result_edit->categoryId == 4 ? 'selected = "selected"' : ''; ?> value="4">Oxygen Cylinder</option>
										</select>
									</div>
								</div> -->

								<div class="col-md-12">
									<div class="col-md-12">
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" value="<?php echo $result_edit->title; ?>" name="title" id="title" type="text">
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>User gender</label>

											<select class="form-control" name="gender" id="gender">
												<option <?= $result_edit->gender == 'Male' ? 'selected = "selected"' : ''; ?> value="Male">Male</option>
												<option <?= $result_edit->gender == 'Female' ? 'selected = "selected"' : ''; ?> value="Female">Female</option>
											</select>

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>User blood group</label>
											<!-- <input class="form-control" value="<?php echo $result_edit->bloodGroup; ?>" name="bloodGroup" id="bloodGroup" type="text"> -->

											<select class="form-control" name="bloodGroup" id="bloodGroup">
												<option <?= $result_edit->bloodGroup == 'A+' ? 'selected = "selected"' : ''; ?> value="A+">A+</option>
												<option <?= $result_edit->bloodGroup == 'A-' ? 'selected = "selected"' : ''; ?> value="A-">A-</option>

												<option <?= $result_edit->bloodGroup == 'B+' ? 'selected = "selected"' : ''; ?> value="B+">B+</option>
												<option <?= $result_edit->bloodGroup == 'B-' ? 'selected = "selected"' : ''; ?> value="B-">B-</option>

												<option <?= $result_edit->bloodGroup == 'O+' ? 'selected = "selected"' : ''; ?> value="O+">O+</option>
												<option <?= $result_edit->bloodGroup == 'O-' ? 'selected = "selected"' : ''; ?> value="O-">O-</option>

												<option <?= $result_edit->bloodGroup == 'AB+' ? 'selected = "selected"' : ''; ?> value="AB+">AB+</option>
												<option <?= $result_edit->bloodGroup == 'AB-' ? 'selected = "selected"' : ''; ?> value="AB-">AB-</option>
											</select>

										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Corona recovery date</label>

											<!-- <input class="form-control" value="<?php echo $result_edit->coronaRecoverDate; ?>" name="coronaRecoverDate" id="coronaRecoverDate" type="date"> -->

											<input class="form-control" value="<?php echo $result_edit->coronaRecoverDate; ?>" name="coronaRecoverDate" id="coronaRecoverDate" type="text" id="coronaRecoverDate">

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Eligible date</label>

											<!-- <input class="form-control" value="<?php echo $result_edit->coronaEligibleDate; ?>" name="coronaEligibleDate" id="coronaEligibleDate" type="date"> -->

											<input class="form-control" value="<?php echo $result_edit->coronaEligibleDate; ?>" name="coronaEligibleDate" id="coronaEligibleDate" type="text" id="coronaEligibleDate">

										</div>
									</div>
								</div>
								<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

								<script>
									jQuery(document).ready(function() {
										jQuery("#coronaRecoverDate").datepicker({
											dateFormat: "yy-mm-dd",
											// minDate: 0,
											onSelect: function() {
												var dt2 = jQuery('#coronaEligibleDate');
												var startDate = jQuery(this).datepicker('getDate');
												//add 30 days to selected date
												startDate.setDate(startDate.getDate() + 90);
												var minDate = jQuery(this).datepicker('getDate');
												var dt2Date = dt2.datepicker('getDate');
												//difference in days. 86400 seconds in day, 1000 ms in second
												var dateDiff = (dt2Date - minDate) / (86400 * 1000);

												//dt2 not set or dt1 date is greater than dt2 date
												if (dt2Date == null || dateDiff < 0) {
													dt2.datepicker('setDate', minDate);
												}
												//dt1 date is 30 days under dt2 date
												else if (dateDiff > 30) {
													dt2.datepicker('setDate', startDate);
												}
												//sets dt2 maxDate to the last day of 30 days window
												// dt2.datepicker('option', 'maxDate', startDate);
												//first day which can be selected in dt2 is selected date in dt1
												dt2.datepicker('option', 'minDate', startDate);
											}
										});
										jQuery('#coronaEligibleDate').datepicker({
											dateFormat: "yy-mm-dd",
											minDate: 0
										});
										jQuery('#availableDate').datepicker({
											dateFormat: "yy-mm-dd",
											minDate: 0
										});
									});
								</script>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input class="form-control" value="<?php echo $result_edit->location; ?>" name="location" id="location" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Name</label>
											<input class="form-control" value="<?php echo $result_edit->contactName; ?>" name="contactName" id="contactName" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" value="<?php echo $result_edit->contactNumber1; ?>" name="contactNumber1" id="contactNumber1" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Information By</label>
											<input class="form-control" value="<?php echo $result_edit->informationBy ? $result_edit->informationBy : 'Zed'; ?>" name="informationBy" id="informationBy" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>

											<select class="form-control" name="status" id="cstatus">
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Available</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">To be available</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Not available</option>
											</select>

										</div>
									</div>

									<?php
										$style = "display:none;";
										if ($result_edit->status == '2') {
											$style = "";
										} else {
											$style = "display:none;";
										}
										?>
									<div class="col-md-6" id="avaialbledatediv" style="<?= $style; ?>">
										<div class="form-group">
											<label>Available on</label>
											<input class="form-control" value="<?php echo $result_edit->availableDate; ?>" name="availableDate" id="availableDate" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit Partner Information">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery("#validform").validate({
									rules: {
										title: 'required',
										location: 'required',
										contactName: 'required',
										informationBy: 'required',
										coronaRecoverDate: 'required',
										coronaEligibleDate: 'required',
										contactNumber1: {
											required: true,
											phoneUS: true
										},
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length > 9 &&
										phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
								}, "Please specify a valid phone number");
							});
						</script>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
		add_thickbox(); ?>

<?php

}

function covid_partner_manage_add4()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	partner_style2();
	//url get
	$url = plugins_url();
	//js call function
	partner_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$title = $_POST['title'];
		$categoryName = 'Oxygen Cylinder';
		$categoryId = 4;
		$quantity = $_POST['quantity'];
		$location = $_POST['location'];
		$contactName = $_POST['contactName'];
		$contactNumber1  = $_POST['contactNumber1'];
		$status  = $_POST['status'];
		$availableDate  = $_POST['availableDate'];
		$informationBy  = $_POST['informationBy'];

		$address = str_replace(" ", "+", $location);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		// exit;
		$details = file_get_contents($url);

		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng'];

		$table_name = "wp_covidlistdetails";

		$arg = array(
			'title' => $title,
			'categoryName' => $categoryName,
			'categoryId' => $categoryId,
			'quantity' => $quantity,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactName' => $contactName,
			'informationBy' => $informationBy,
			'status' => $status,
			'availableDate' => $availableDate,
			'informationBy' => $informationBy,
			'updatedAt' => date('Y-m-d H:i:s'),
		);

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_covidlistdetails";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	?>
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration  Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Partner Infomration Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Partner Information</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title</label>
											<input class="form-control" value="<?php echo $result_edit->title; ?>" name="title" id="title" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Quantity</label>
											<input class="form-control" value="<?php echo $result_edit->quantity; ?>" name="quantity" id="quantity" type="number">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input class="form-control" value="<?php echo $result_edit->location; ?>" name="location" id="location" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Name</label>
											<input class="form-control" value="<?php echo $result_edit->contactName; ?>" name="contactName" id="contactName" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" value="<?php echo $result_edit->contactNumber1; ?>" name="contactNumber1" id="contactNumber1" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Information By</label>
											<input class="form-control" value="<?php echo $result_edit->informationBy ? $result_edit->informationBy : 'Zed'; ?>" name="informationBy" id="informationBy" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>

											<select class="form-control" name="status" id="cstatus">
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Available</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">To be available</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Not available</option>
											</select>

										</div>
									</div>

									<?php
										$style = "display:none;";
										if ($result_edit->status == '2') {
											$style = "";
										} else {
											$style = "display:none;";
										}
										?>

									<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

									<script>
										jQuery(document).ready(function() {
											jQuery('#availableDate').datepicker({
												dateFormat: "yy-mm-dd",
												minDate: 0
											});
										});
									</script>

									<div class="col-md-6" id="avaialbledatediv" style="<?= $style; ?>">
										<div class="form-group">
											<label>Available on</label>
											<input class="form-control" value="<?php echo $result_edit->availableDate; ?>" name="availableDate" id="availableDate" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit Partner Information">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery("#validform").validate({
									rules: {
										title: 'required',
										location: 'required',
										contactName: 'required',
										informationBy: 'required',
										contactNumber1: {
											required: true,
											phoneUS: true
										},
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length > 9 &&
										phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
								}, "Please specify a valid phone number");
							});
						</script>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
		add_thickbox(); ?>

<?php

}

function covid_partner_manage_import()
{
	global $wpdb;
	// echo '<pre>';
	// print_r($_POST);
	// echo 'bb';
	// print_r($_FILES);
	$file = $_FILES['importexcel']['tmp_name'];
	if ($file) {

		$handle = fopen($file, "r");
		// print_r($handle);
		$c = 0;
		$row = 1;
		while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

			// $num = count($filesop);
			// echo "<p> $num fields in line $row: <br /></p>\n";

			// echo 'aa<pre>';
			// print_r($filesop);

			if ($row > 1) {
				$categoryName = $filesop[0];
				if ($categoryName == 'Covid Hospital') {
					$categoryId = 1;
				} else if ($categoryName == 'Remdesivir Injection') {
					$categoryId = 2;
				} else if ($categoryName == 'Plasma') {
					$categoryId = 3;
				} else if ($categoryName == 'Oxygen Cylinder') {
					$categoryId = 4;
				}

				$title  = $filesop[1];
				$bed = $filesop[2];
				$oxygen = $filesop[3];
				$ventilator = $filesop[4];
				$quantity = $filesop[5];
				$gender = $filesop[6];
				$bloodGroup = $filesop[7];
				$coronaRecoverDate = $filesop[8];
				$coronaEligibleDate = $filesop[9];
				$location = $filesop[10];
				$contactName = $filesop[11];
				$contactNumber1 = $filesop[12];
				$informationBy = $filesop[13];
				$status = $filesop[14];
				if ($status == 'Available') {
					$cstatus = 1;
				} else if ($status == 'To be available') {
					$cstatus = 2;
				} else if ($status == 'Not available') {
					$cstatus = 3;
				}

				$availableDate = $filesop[15];

				$address = str_replace(" ", "+", $location);

				$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
				$details = file_get_contents($url);

				$resultx = json_decode($details, true);
				$latitude = $resultx['results'][0]['geometry']['location']['lat'];
				$longitude = $resultx['results'][0]['geometry']['location']['lng'];

				$arg = array(
					'categoryName' => $categoryName,
					'title' => $title,
					'categoryId' => $categoryId,
					'bed' => $bed,
					'oxygen' => $oxygen,
					'ventilator' => $ventilator,
					'quantity' => $quantity,
					'gender' => $gender,
					'bloodGroup' => $bloodGroup,
					'coronaRecoverDate' => $coronaRecoverDate,
					'coronaEligibleDate' => $coronaEligibleDate,

					'location' => $location,
					'latitude' => $latitude,
					'longitude' => $longitude,
					'contactName' => $contactName,
					'contactNumber1' => $contactNumber1,
					'informationBy' => $informationBy,
					'status' => $cstatus,
					'availableDate' => $availableDate,
					'updatedAt' => date('Y-m-d H:i:s'),
				);

				$table_name = "wp_covidlistdetails";

				$result = $wpdb->insert($table_name, $arg);
			}

			$c = $c + 1;

			$row++;
		}
		wp_redirect('https://zedaid.org/wp-admin/admin.php?page=covid-partner-view');
		exit;
	} else {
		wp_redirect('https://zedaid.org/wp-admin/admin.php?page=covid-partner-view&file=no');
		exit;
	}
}


add_action('admin_footer', 'my_action_javascript21');
function my_action_javascript21()
{ ?>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap">
	</script>

	<script>
		var autocomplete;

		function initMap() {
			autocomplete = new google.maps.places.Autocomplete(
				/** @type {HTMLInputElement} */
				(document.getElementById('location')), {
					types: ['geocode']
				});
			google.maps.event.addListener(autocomplete, 'place_changed', function() {});
		}
	</script>

	<script type="text/javascript">
		// get your select element and listen for a change event on it
		jQuery('#adddataadd').change(function() {
			// set the window's location property to the value of the option the user has selected
			// if(jQuery(this).val() == 1){
			window.location = jQuery(this).val();
			// }
		});

		jQuery('#cstatus').change(function() {
			// set the window's location property to the value of the option the user has selected
			if (jQuery(this).val() == 2) {
				jQuery('#avaialbledatediv').css('display', '');
			} else {
				jQuery('#avaialbledatediv').css('display', 'none');
			}
		});


		jQuery(document).on('click', '.delete', function() {

			var id = jQuery(this).attr('data-id');
			jQuery('body').css('opacity', '0.5');
			jQuery.ajax({
				type: "POST",
				url: "<?php echo plugin_dir_url(__FILE__); ?>deletecovidpartner.php",
				data: {
					fileid: id
				}
			}).done(function(msg) {
				jQuery('.refresh_data').load(document.URL + ' .refresh_data');
				jQuery('body').css('opacity', '1');

			});

		});

		jQuery(document).on('click', '.onoffswitch4-checkbox-new', function() {

			jQuery('body').css('opacity', '0.5');
			var deals_status = jQuery(this).val();
			var deals_code = jQuery(this).attr('data-id');
			jQuery.ajax({
				type: "POST",
				url: "<?php echo plugin_dir_url(__FILE__); ?>status_covid_change.php",
				data: "deals_status=" + deals_status + "&deals_code=" + deals_code,
			}).done(function(msg) {

				jQuery('.refresh_data').load(document.URL + ' .refresh_data');
				jQuery('body').css('opacity', '1');

			});


		});
	</script>
<?php
}
?>