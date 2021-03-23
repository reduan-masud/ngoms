<?php
    include 'inc/header.php';
    include 'lib/Member.php';
    require_once 'lib/Jamindar.php';
 
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Update Jamindar Information</h2>
                <?php
                    $jamindar = new Jamindar();
                    if(!isset($_GET['id'])){
                        header("Location: 404.php");
                        ob_end_flush();
                    }
                    if(!$jamindar->getJamindarByJamindarID($_GET['id'])){
                        header("Location: 404.php");
                        ob_end_flush();
                    }else{
                        $jamindarData = $jamindar->getJamindarByJamindarID($_GET['id']);

                    }


                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_jamindar'])) {
                        $profileUpdate  = $jamindar->updateJamindarInfo($_GET['id'], $_POST, $_GET['memId']);

                        echo $profileUpdate['msg'];

                    }

                ?>
            </div>

			<form action="" method="post" id="NewJamindar">
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
                                                                        <input type="hidden" value="<?php echo $jamindarData->id; ?>" name="loanID">
                                                                        <input type="text" class="form-control" value="<?php echo $jamindarData->name ?>" name="name" placeholder="Ex: Your Name" >
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <b>
                                                              <input name="fh" value="father_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio" <?php echo ($jamindarData->father_name != null)? "checked":"";?>> Father
                                                              <input name="fh" value="husband_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio" <?php echo ($jamindarData->father_name == null)? "checked":"";?>> Husband
                                                          </b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">directions_run</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" value="<?php echo($jamindarData->father_name != null)? $jamindarData->father_name : $jamindarData->husband_name;?>" name="father_name" placeholder="Ex: Your Father Name">
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
                                                                        <input type="text" class="form-control" value="<?php echo $jamindarData->mother_name; ?>" name="mother_name" placeholder="Ex: Your Mother Name">
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
                                                                        <input type="text" class="form-control" value="<?php echo $jamindarData->profession; ?>" name="profession" placeholder="Your Profession">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <b>Religion</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">airline_seat_legroom_extra</i>
                                                                  </span>

                                                                  <select class="form-control show-tick" name="religion">
                                                                        <option <?php echo ($jamindarData->religion == "Islam")? "selected":"" ?> value="Islam">Islam</option>
                                                                        <option <?php echo ($jamindarData->religion == "Hindu")? "selected":"" ?> value="Hindu">Hindu</option>
                                                                        <option <?php echo ($jamindarData->religion == "Buddho")? "selected":"" ?> value="Buddho">Buddho</option>
                                                                        <option <?php echo ($jamindarData->religion == "Khristan")? "selected":"" ?> value="Khristan">Khristan</option>
                                                                        <option <?php echo ($jamindarData->religion == "Other")? "selected":"" ?> value="Other">Other</option>
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
                                                                        <input type="text" value="<?php echo $jamindarData->mobile; ?>" class="form-control mobile-phone-number" name="mobile_number" placeholder="Ex: 00000-000-000">
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
                                                                        <option <?php echo ($jamindarData->marital_status == "Married")? "selected":"" ?> value="Married">Married</option>
                                                                        <option <?php echo ($jamindarData->marital_status == "Unmarried")? "selected":"" ?> value="Unmarried">Unmarried</option>
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
                                                                        <input type="text" value="<?php echo $jamindarData->nationality; ?>" class="form-control" name="nationality" placeholder="Ex: Your Nationality">
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
                                                                        <option <?php echo ($jamindarData->gender == "Male")? "selected":"" ?> value="Male">Male</option>
                                                                        <option <?php echo ($jamindarData->gender == "Female")? "selected":"" ?> value="Female">Female</option>
                                                                        <option <?php echo ($jamindarData->gender == "Other")? "selected":"" ?> value="Other">Other</option>
                                                                  </select>
                                                            </div>
                                                      </div>


                                                      <div class="col-md-3">
                                                            <b>National Id No</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">computer</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" value="<?php echo $jamindarData->id; ?>" class="form-control nid-card" name="nid_no" placeholder="Ex:0000-0000-0000-00000">
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
                                                                        <input type="date" value="<?php echo $jamindarData->reg_date; ?>" class="form-control data" name="admission_date" placeholder="Ex: 12/30/9999" required="true">
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
                                                                        <input type="text" class="form-control" value="<?php echo $jamindarData->per_village; ?>" name="per_village" placeholder="Ex: Your Village/City">
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
                                                                        <input type="text" value="<?php echo $jamindarData->per_post; ?>" class="form-control" name="per_post_office" placeholder="Ex: Your Post Office">
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
                                                                        <input type="text" value="<?php echo $jamindarData->per_upazila; ?>" class="form-control" name="per_sub_district" placeholder="Ex: Your Sub District">
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
                                                                        <input type="text" value="<?php echo $jamindarData->per_thana; ?>" class="form-control" name="per_thana" placeholder="Your Thana">
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
                                                                        <input type="text" value="<?php echo $jamindarData->per_zila; ?>" class="form-control" name="per_district" placeholder="Your District">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_home; ?>" class="form-control" name="pre_house" placeholder="Ex: House">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_village; ?>" class="form-control" name="pre_village" placeholder="Ex: Village">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_post; ?>" class="form-control" name="pre_post_office" placeholder="Ex: Post Office">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_upazila; ?>" class="form-control"  name="pre_sub_district" placeholder="Ex: Sub District">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_thana; ?>" class="form-control" name="pre_thana" placeholder="Thana">
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
                                                                        <input type="text" value="<?php echo $jamindarData->pre_zila; ?>" class="form-control" name="pre_district" placeholder="District">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                            <button type="Submit" name="update_jamindar" class="btn btn-block btn-lg btn-success waves-effect" value="Submit">Update</button>
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
