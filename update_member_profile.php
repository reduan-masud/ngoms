<?php
    include 'inc/header.php';
    include 'lib/Member.php';

?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Update Member Information</h2>
                <?php
                    $memberc = new Member();
                    if(!isset($_GET['id'])){
                        header("Location: 404.php");
                        ob_end_flush();
                    }
                    if(!$memberc->getMemberData($_GET['id'])){
                        header("Location: 404.php");
                        ob_end_flush();
                    }else{
                        $member = $memberc->getMemberData($_GET['id']);

                    }


                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_member'])) {
                        $profileUpdate  = $memberc->memberProfileUpdate($_GET['id'], $_POST);
                    }

                ?>
            </div>
			<form action="" method="post">
            <!-- Personal Information -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Parsonal Information
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <b>Name</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value ="<?=$member->name?>" name="name" placeholder="Ex: Your Name" required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>
                                            <input name="fh" value="father_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio" <?php echo ($member->father_name != null)? "checked" : "";?>> Father
                                            <input name="fh" value="husband_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio" <?php echo ($member->father_name == null)? "checked":"";?>> Husband
                                        </b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">directions_run</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo($member->father_name != null)? $member->father_name : $member->husband_name;?>" name="father_name" placeholder="Ex: Your Father Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Mother Name</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">directions_walk</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->mother_name?>" name="mother_name" placeholder="Ex: Your Mother Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Profession</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">streetview</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->profession?>" name="profession" placeholder="Your Profession">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Religion</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">airline_seat_legroom_extra</i>
                                            </span>

		                                    <select class="form-control show-tick" name="religion" value="<?=$member->religion?>">
		                                        <option <?php echo ($member->religion == "Islam")? "selected":"" ?> value="Islam">Islam</option>
		                                        <option <?php echo ($member->religion == "Hindu")? "selected":"" ?> value="Hindu">Hindu</option>
		                                        <option <?php echo ($member->religion == "Buddho")? "selected":"" ?> value="Buddho">Buddho</option>
		                                        <option <?php echo ($member->religion == "Khristan")? "selected":"" ?> value="Khristan">Khristan</option>
		                                        <option <?php echo ($member->religion == "Other")? "selected":"" ?> value="Other">Other</option>
		                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Mobile Number</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control mobile-phone-number" value="<?=$member->mobile?>" name="mobile_number" placeholder="Ex: 00000-000-000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Marital Status</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">wc</i>
                                            </span>
                                            <select class="form-control show-tick" name="marital_status">
		                                        <option <?php echo ($member->marital_status == "Married")? "selected":"" ?> value="Married">Married</option>
		                                        <option <?php echo ($member->marital_status == "Unmarried")? "selected":"" ?> value="Unmarried">Unmarried</option>

		                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Nationality</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">vpn_lock</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->nationality?>" name="nationality" placeholder="Ex: Your Nationality">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Gender</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">computer</i>
                                            </span>
                                            <select class="form-control show-tick" name="gender">
                                                <option <?php echo ($member->gender == "Male")? "selected":"" ?> value="Male">Male</option>
                                                <option <?php echo ($member->gender == "Female")? "selected":"" ?> value="Female">Female</option>
                                                <option <?php echo ($member->gender == "Other")? "selected":"" ?> value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <b>Card Type</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">computer</i>
                                                </span>
                                                <select class="form-control show-tick" name="card_type">
                                                    <option>Select One</option>
                                                    <option value="National ID"<?php echo ($member->nid_type == "National ID")? "selected":"" ?>>National ID Card</option>
                                                    <option value="Birth Cirtificate"<?php echo ($member->nid_type  == "Birth Cirtificate")? "selected":"" ?>>Birth Cirtificate</option>
                                                    <option value="Passport"<?php echo ($member->nid_type == "Passport")? "selected":"" ?>>Passport </option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b>National Id No </b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">computer</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control nid-card" value="<?=$member->nid?>" name="nid_no" placeholder="Ex:0000-0000-0000-00000">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Date</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">nfc</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="date" class="form-control data" value="<?=$member->admission_date?>" name="admission_date" placeholder="Ex: 12/30/9999">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Personal Information -->

             <!-- Parmanent Address -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Permanent Address
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <b>Village/City</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->s_vill?>" name="per_village" placeholder="Ex: Your Village/City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Post Office</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->s_post?>" name="per_post_office" placeholder="Ex: Your Post Office">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Sub District</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->s_upazila?>" name="per_sub_district" placeholder="Ex: Your Sub District">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Thana</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->s_thana?>" name="per_thana" placeholder="Your Thana">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>District</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->s_zila?>" name="per_district" placeholder="Your District">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Parmanent Address -->

			<!-- Present Address -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Present Address
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                	<div class="col-md-6">
                                        <b>House</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_home?>" name="pre_house" placeholder="Ex: House">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Village/City</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_vill?>" name="pre_village" placeholder="Ex: Village">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Post Office</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_post?>" name="pre_post_office" placeholder="Ex: Post Office">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Sub District</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_upazila?>"  name="pre_sub_district" placeholder="Ex: Sub District">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Thana</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_thana?>" name="pre_thana" placeholder="Thana">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>District</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$member->b_zila?>" name="pre_district" placeholder="District">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                    	<button type="Submit" name="update_member" class="btn btn-block btn-lg btn-success waves-effect" value="Submit">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Present Address -->
            </form>
        </div>
    </section>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/form-wizard.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>
    <script src="js/pages/index.js"></script>


    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
