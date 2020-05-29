<?php
include 'inc/header.php';
include 'lib/Member.php';
include 'lib/Loan.php';
require_once 'lib/Jamindar.php';
?>

<section class="content">
      <div class="container-fluid">
            <div class="block-header">
                  <h2>Request For Loan Page</h2>
            </div>
            <?php
            $loan = new Loan();
            $loanSpecialKey;
            $LoanData;
            $loanID;
            $previousJamindar;
            $showLoanInfoForm = true;
            $jamindar = new Jamindar();
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
            if($loan->loanTableJamindar($_GET['id'])){
            $showLoanInfoForm = false;
            $LoanData = $loan->getLoanDataByMemberId($_GET['id']);
            }
            $previousJamindar = $jamindar->getLastJamindarIDbyMember($_GET['id']);

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['req_for_loan']) && !isset($_POST['add_jamindar'])) {
            $loanReq  = $loan->issueLoan($_GET['id'], $_POST);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_jamindar']) && !isset($_POST['add_jamindar_by_id'])) {
            $loanJamindar  = $loan->loanSetWithJamindar($_GET['id'], $_POST);

            echo "<pre>";
            echo $loanJamindar['msg'];
            echo "</pre>";
            $showLoanInfoForm = TRUE;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_jamindar_by_id']) && !isset($_POST['add_jamindar'])) {
                  $loanJamindar = $loan->setJamindarIDAtLoan($_GET['id'], $_POST);
                  echo "<pre>";
                  echo $loanJamindar['msg'];
                  echo "</pre>";
                  $showLoanInfoForm = false;
            }


            if (isset($loanReq)){
            echo "<pre>";
                  $_POST['req_for_loan'] = array( "loanAmount" => "");
                  if(is_array($loanReq)){
                        echo $loanReq['msg'];
                        $showLoanInfoForm = true;
                  }else{
                       $loanSpecialKey = $loanReq;
                  }

                  if(isset($loanSpecialKey)){
                  $LoanData = $loan->gelLoanDatyByKey($loanSpecialKey);
                  $loanID = $LoanData->id;
                  }
            echo "</pre>";
            }


            if (isset($loanSpecialKey)) {
            $showLoanInfoForm = false;
            }


            ?>
            <?php if ($showLoanInfoForm): ?>

            <!-- Loan Information Form-->
            <div class="row clearfix">
              <!--Section 1 Start-->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                              <div class="header">
                                    <h2>
                                    Loan Information
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
                              <?php

                              $loan->totalDepositByMember($_GET['id']);
                              echo $loan->totalDeposit;
                              ?>



                              <form action="" method="post">
                                    <div class="body">
                                          <div class="demo-masked-input">
                                                <div class="row clearfix">
                                                      <div class="col-md-6">
                                                            <b>Loan Amount</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">aspect_ratio</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" name="loan_amount" placeholder="Ex: Enter Loan Amount" required="true">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <b>Service Charge</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">gavel</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" value="2" name="loan_service_charge" placeholder="Ex: Enter Service Charge">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <b>Interest Rate</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">directions_walk</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" value="4.33333" name="interest_rate" placeholder="Ex: Enter Interest Rate">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <b>Loan Duration in(Month)</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">streetview</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" value="6" name="loan_duration" placeholder="Enter Loan Duration">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <b>Loan Type</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">airline_seat_legroom_extra</i>
                                                                  </span>

                                                                  <select class="form-control show-tick" name="lone_type">
                                                                        <option value="Daily">Daily</option>
                                                                        <option value="Weekly">Weekly</option>
                                                                        <option value="Monthly">Monthly</option>
                                                                        <option value="Yearly">Yearly</option>
                                                                  </select>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                            <b>Issue Date</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">nfc</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="date" class="form-control data" name="loan_issue_date" placeholder="Ex: 12/30/9999" required="true">
                                                                  </div>
                                                            </div>
                                                            <input class="btn btn-block btn-success" type="submit" value="Submit" name="req_for_loan" />
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </form>




                        </div>
                  </div>
                  <!--Section 1 END-->
            </div>
            <!-- #END# Loan Information Form-->

            <?php endif ?>
            <?php if (!$showLoanInfoForm): ?>

            <!-- Loan Data Check -->
            <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                              <div class="header">
                                    <h2>
                                    Loan Information Data
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
                                    <table width="100%" class="table table-striped">
                                          <tr>
                                                <td>Loan Amount:</td>
                                                <td><?php echo $LoanData->loan_amount; ?> taka</td>
                                                <td>Loan Interest Rate:</td>
                                                <td><?php echo $LoanData->loan_interest; ?> % per month</td>
                                          </tr>
                                          <tr>
                                                <td>Loan Duration:</td>
                                                <td colspan="2"></td>
                                                <td ><?php echo $LoanData->loan_period;?> Months</td>
                                          </tr>
                                          <tr style="border-top: solid grey 2px;">
                                                <td>Total Loan (Returnable):</td>
                                                <td colspan="2"></td>
                                                <td ><strong><?php echo $LoanData->loan_total;?></strong> taka</td>
                                          </tr>
                                          <tr>
                                                <td>Service Charge:</td>
                                                <td><?php echo $LoanData->loan_serverce_charge;?> %</td>
                                                <td>Service Amount:</td>
                                                <td><?php echo $LoanData->service_amount;?> taka</td>
                                          </tr>
                                          <tr>
                                                <td>Book Cost</td>
                                                <td><?php echo $LoanData->book_cost;?> taka</td>
                                                <td>Special Key</td>
                                                <td><?php echo $LoanData->special_key;?>(<?php echo $LoanData->id;?>)</td>
                                          </tr>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
            <!-- #END# Loan Data Check-->

            <!--Checkmark For Previous Jamindar-->
            <div class="row clearfix">
                  <div class="col-lg-12 col-md-12">
                        <div class="card">
                              <div class="header">
                                    <h2>Previous Jamindar</h2>
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
                                    <div class="demo-switch">
                                          <div class="switch">
                                                <label>NO<input type="checkbox" id="isPrev"><span class="lever"></span>YES</label>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>

            <form action="" method="post"  id="showOnChecked">
            <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                              <div class="body">
                                    <div class="demo-masked-input">
                                          <div class="row clearfix">
                                                <div class="col-md-6">
                                                      <b>Previous Jamindar ID</b>
                                                      <div class="input-group">
                                                            <span class="input-group-addon">
                                                                  <i class="material-icons">account_box</i>
                                                            </span>
                                                            <div class="form-line">
                                                            <input type="hidden" value="<?php echo $LoanData->id; ?>" name="loanID">
                                                                  <input type="text" class="form-control" name="jmmindar_id" value ="<?php if(isset($previousJamindar)){echo $previousJamindar;}else{echo "TYPE";}?>" placeholder="Ex: Previous Jamindar ID" >
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <button type="Submit" name="add_jamindar_by_id" class="btn btn-block btn-lg btn-success waves-effect" value="Submit">Submit</button>
                                                </div>

                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            </form>
            <!-- #END# Checkmark For Previous Jamindar-->
            <!-- #END# Jamindar ID Submit -->







            <form action="" method="post" id="NewJamindar">
                  <!-- Jamindar Information Information -->
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
                                                                        <input type="hidden" value="<?php echo $LoanData->id; ?>" name="loanID">
                                                                        <input type="text" class="form-control" name="name" placeholder="Ex: Your Name" >
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <b>
                                                                <input name="fh" value="father_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio" checked=""> Father
                                                                <input name="fh" value="husband_ok" style=" margin: 0px; display: inline-block; position: relative; opacity: 1; left: auto;" type="radio"> Husband
                                                            </b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">directions_run</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control" name="father_name" placeholder="Ex: Your Father Name">
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
                                                                        <input type="text" class="form-control" name="mother_name" placeholder="Ex: Your Mother Name">
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
                                                                        <input type="text" class="form-control" name="profession" placeholder="Your Profession">
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
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Buddho">Buddho</option>
                                                                        <option value="Khristan">Khristan</option>
                                                                        <option value="Other">Other</option>
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
                                                                        <input type="text" class="form-control mobile-phone-number" name="mobile_number" placeholder="Ex: 00000-000-000">
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
                                                                        <option value="Married">Married</option>
                                                                        <option value="Unmarried">Unmarried</option>
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
                                                                        <input type="text" class="form-control" value="Bangladeshi" name="nationality" placeholder="Ex: Your Nationality">
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
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Other">Other</option>
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
                                                                      <option value="National ID">National ID Card</option>
                                                                      <option value="Birth Cirtificate">Birth Cirtificate</option>
                                                                      <option value="Passport">Passport </option>
                                                                  </select>
                                                              </div>
                                                          </div>

                                                          <div class="col-md-6">
                                                            <b>Id No</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">computer</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="text" class="form-control nid-card" name="nid_no" placeholder="Ex:0000-0000-0000-00000">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      </div>

                                                      <div class="col-md-6">
                                                            <b>Date</b>
                                                            <div class="input-group">
                                                                  <span class="input-group-addon">
                                                                        <i class="material-icons">nfc</i>
                                                                  </span>
                                                                  <div class="form-line">
                                                                        <input type="date" class="form-control data" name="admission_date" placeholder="Ex: 12/30/9999" required="true">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- #END# Jamindar Information -->
                  <!-- Parmanent Address-->
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
                                                                        <input type="text" class="form-control" name="per_village" placeholder="Ex: Your Village/City">
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
                                                                        <input type="text" class="form-control" name="per_post_office" placeholder="Ex: Your Post Office">
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
                                                                        <input type="text" class="form-control" name="per_sub_district" placeholder="Ex: Your Sub District">
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
                                                                        <input type="text" class="form-control" name="per_thana" placeholder="Your Thana">
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
                                                                        <input type="text" class="form-control" name="per_district" placeholder="Your District">
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
                                                                        <input type="text" class="form-control" name="pre_house" placeholder="Ex: House">
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
                                                                        <input type="text" class="form-control" name="pre_village" placeholder="Ex: Village">
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
                                                                        <input type="text" class="form-control" name="pre_post_office" placeholder="Ex: Post Office">
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
                                                                        <input type="text" class="form-control"  name="pre_sub_district" placeholder="Ex: Sub District">
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
                                                                        <input type="text" class="form-control" name="pre_thana" placeholder="Thana">
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
                                                                        <input type="text" class="form-control" name="pre_district" placeholder="District">
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                            <button type="Submit" name="add_jamindar" class="btn btn-block btn-lg btn-success waves-effect" value="Submit">Submit</button>
                                                      </div>

                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- #END# Present Address -->
            </form>
            <?php endif ?>
      </div>
</section>
<?php include 'inc/js.php'; ?>
<!-- Custom Js -->
<script>
      $(function() {
            $("#showOnChecked").hide();
            $("#isPrev").click(function(){
                  var checked = $(this).is(':checked');
                  if(checked){
                        $("#NewJamindar").hide();
                        $("#showOnChecked").show();
                  }else{
                        $("#NewJamindar").show();
                        $("#showOnChecked").hide();
                  }
            });
      });
</script>
<script src="js/admin.js"></script>
<script src="js/pages/forms/advanced-form-elements.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

<script src="js/pages/index.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
