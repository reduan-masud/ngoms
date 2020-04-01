
<?php
      include 'inc/header.php';
      include 'lib/Member.php';
      require_once 'lib/Loan.php';
      require_once 'lib/Jamindar.php';
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>User Profile</h2>
            </div>
            <?php
                  $member = new Member();
                  $loan = new Loan();
                  $jamindar = new Jamindar();
                  if(!isset($_GET['id'])){
                        header("Location: 404.php");
                        ob_end_flush();
                  }else{
                        $member->init($_GET['id']);
                        $memberData = $member->getMemberData($_GET['id']);
                        $bookNo = $member->getBookNoByMemberId($_GET['id']);
                        $loanData = $loan->getLast5LoanInfo($_GET['id']);
                        $lastLoanData = $loan->getLastLoan($_GET['id']);
                        $jamindarData = $jamindar->getJamindarByJamindarID($lastLoanData['jamindar_id'], $row = null);
                        $totalSeavings = $loan->getTotalSaveings($_GET['id']);
                        $lastLoanID = $lastLoanData['id'];
                        if (isset($lastLoanID)) {
                            $totalINstallment = $loan->totalInstallmentCurrentLoan($lastLoanID);
                        }
                        echo $member->showLoanCount();
                        echo $member->ShowBookNo();
                  }

            ?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Saveings</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $totalSeavings; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Installment</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo  $totalINstallment;  ?><?php if ($lastLoanData['active']== 0): ?>
                               <span class="text-danger" > Finished!</span>
                            <?php endif ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        	<div class="row">
                                <div class="col-md-3">
                                    <a href="withdraw_saveings.php?BookNO=<?php echo $bookNo; ?>" class="btn bg-teal btn-block btn-lg waves-effect">Withdraw Saveings</a>
                                </div>
                        		<div class="col-md-3">
                        			<a href="" class="btn bg-teal btn-block btn-lg waves-effect">History & Report</a>
                        		</div>
                        		<div class="col-md-3">
                        			<a href="update_member_profile.php?id=<?=$memberData->id?>" class="btn bg-red btn-block btn-lg waves-effect">Edit & Update</a>
                        		</div>
                        		<div class="col-md-3">
                        			<a href="request_loan.php?id=<?=$memberData->id?>" class="btn bg-purple btn-block btn-lg waves-effect">Request Ror Loan</a>
                        		</div>
                        		<div class="col-md-3">
                        			<a href="" class="btn bg-indigo btn-block btn-lg waves-effect">Print</a>
                        		</div>

                        	</div>

                        </div>
                    </div>
                </div>

            </div>


			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        	<div class="row">
                        		<div class="col-md-6 col-md-offset-3">
                        			<h2 style="text-align:center;">Socheton Khudra Babsaye Somobay Somity</h2>
                        		</div>

                        		<div class="col-md-8">
                        				<p style="border:solid 1px black; width: 250px; padding: 2px 10px;"><strong>Book NO: </strong><?=$bookNo?></p>
                        				<p style="border:solid 1px black; width: 250px; padding: 2px 10px;"><strong>User ID: </strong>#<?=$memberData->id?></p>
	                        		<h2><?=$memberData->name?></h2>
		                            <p><strong>Present Address:</strong></p>
			            			<p>House: <?=$memberData->b_home?>, <?=$memberData->b_vill?>, <?=$memberData->b_post?>, <?=$memberData->b_thana?>, <?=$memberData->b_upazila?>, <?=$memberData->b_zila?>.</p>
			            			<p><strong>Mobile:</strong> <?=$memberData->mobile?></p>
                        		</div>
                        		<div class="col-md-4">
                        			<div class="pull-right" style="background-color: red; width: 150px; height: 200px;"></div>
                        		</div>

                        		<div class="col-md-12 bg-indigo" style="padding:10px 3px"><strong>PERSONAL INFORMATION</strong></div>
                        		<div class="col-md-12" style="font-size: 120%;color:#000;">
                        			<style>
                        				table.ajubaju tr td {
										    padding: 5px 0px;
										}
                        			</style>
                        			<table width="100%" class="ajubaju">
                        				<tr>
                        					<td width="25%"><strong>Name</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->name?></td>
                        					<td width="25%"><strong>Mobile No</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->mobile?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>
                                            <?php if ($memberData->father_name != null): ?>
                                                Father's Name</strong></td>
                                                <td width="25%"><b>:</b> <?=$memberData->father_name?></td>
                                            <?php endif ?>
                                            <?php if ($memberData->husband_name != null): ?>
                                                Husband's Name</strong></td>
                                                <td width="25%"><b>:</b> <?=$memberData->husband_name?></td>
                                            <?php endif ?>
                                            <?php if ($memberData->husband_name == null && $memberData->father_name == null ): ?>
                                                Father's Name</strong></td>
                                                <td width="25%"><b>:</b> <?=$memberData->husband_name?></td>
                                            <?php endif ?>
                        					<td width="25%"><strong>Marital Status</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->marital_status?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Mother's Name</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->mother_name?></td>
                        					<td width="25%"><strong>Gender</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->gender?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Home District</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->s_zila?></td>
                                                      <!--
                        					<td width="25%"><strong>Gender</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->name?></td>
                                                      -->
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Religion</strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->religion?></td>
                        					<td width="25%"><strong><?=(isset($memberData->nid_type))? $memberData->nid_type : "National ID"?></strong></td>
                        					<td width="25%"><b>:</b> <?=$memberData->nid?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Admission Date</strong></td>
                        					<td width="25%" ><b>:</b> <?=$memberData->admission_date?></td>
                                                      <td width="25%"><strong>Nationality</strong></td>
                                                      <td width="25%"><b>:</b> <?=$memberData->nationality?></td>

                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Parmanent Address</strong></td>
                        					<td width="25%" colspan="3"><b>:</b> <?=$memberData->s_vill?>, <?=$memberData->s_post?>, <?=$memberData->s_thana?>, <?=$memberData->s_upazila?>, <?=$memberData->s_zila?>.</td>
                        				</tr>
                        			</table>
                        		</div>

								<div class="col-md-12 bg-indigo" style="padding:10px 3px;"><strong>LAST 5 LOAN</strong> <span class="pull-right" style="margin-right: 10px;"><strong>Total Loan:</strong> 5</span></div>
								<div class="col-md-12">


                  <?php if($member->showLoanCount() > 0):?>

									<table class="table table-striped">
										<tr>
                      <th>SL.</th>
											<th>Lone ID</th>
											<th>Pay Loan Amount</th>
                      <th>J.ID</th>
											<th>Jamindar Name</th>
											<th>Jamindar Mobile</th>
											<th>Active</th>
										</tr>

                    <?php
                    if (isset($lastLoanID)) {
                    $i = 0;
                    foreach ($loanData as $loanRow) {
                    $i++;

                    ?>

										<tr>
											<td><?=$i?></td>
                                            <td><?=$loanRow['id']?></td>
											<td><?=$loanRow['loan_total']?></td>
                                            <td><?=$loanRow['jamindar_id']?></td>
											<td><?=$jamindar->getJamindarByJamindarID($loanRow['jamindar_id'], "name")?></td>
											<td><?=$jamindar->getJamindarByJamindarID($loanRow['jamindar_id'], "mobile")?></td>
											<td>
                                                <?php echo ($loanRow['active'] == 1)? "<span class='label label-success'>Running</span>":"<span class='label label-danger'>Finished</span>"; ?>
                                            </td>
										</tr>

                                        <?php }} ?>
									</table>
                <?php endif ?>
                <?php if($member->showLoanCount() == 0): ?>

                  <h2><center>This Member is new & did not take any loan yet.</center></h2>
                <?php endif ?>
								</div>

                <?php if($member->showLoanCount() > 0): ?>
								<div class="col-md-12 bg-indigo" style="padding:10px 3px">
                                    <strong>Last Loan Jamindar</strong>
                                    <span class="pull-right" style="margin-right: 10px;"><a href="jamindar_update.php?id=<?php echo $jamindarData->id;?>&memId=<?php echo $_GET['id'];?>" class="btn btn-danger">Edit</a> <a href="" class="btn btn-primary">View All</a></span>
                                </div>
                        		<div class="col-md-12" style="font-size: 120%;color:#000;">
                        			<style>
                        				table.ajubaju tr td {
										    padding: 5px 0px;
										}
                        			</style>
                        			<table width="100%" class="ajubaju">
                        				<tr>
                        					<td width="25%"><strong>Name</strong></td>
                        					<td width="25%"><b>:</b> <?php echo $jamindarData->name;?> (#<?php echo $jamindarData->id?>)</td>
                        					<td width="25%"><strong>Jamindar Photo</strong></td>
                        					<td width="25%" rowspan="4" align="right"><div class="pull-right" style="background-color: red; width: 150px; height: 170px;"></div></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>
                                            <?php if ($jamindarData->father_name !== null): ?>
                                                Father's Name</strong></td>
                                                <td width="25%"><b>:</b> <?=$jamindarData->father_name?></td>
                                            <?php endif ?>
                                            <?php if ($jamindarData->husband_name != null): ?>
                                                Husband's Name</strong></td>
                                                <td width="25%"><b>:</b> <?=$jamindarData->husband_name?></td>
                                            <?php endif ?>


                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Mother's Name</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->mother_name?></td>

                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Home District</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->per_zila?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Religion</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->religion?></td>
                        					<td width="25%"><strong>Mobile No</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->mobile?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong><?=(isset($jamindarData->nid_type))? $memberData->nid_type : "National ID"?></strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->nid?></td>
                        					<td width="25%"><strong>Marital Stutas</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->marital_status?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Profession</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->profession?></td>
                        					<td width="25%"><strong>Nationality</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->nationality?></td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Date</strong></td>
                        					<td width="25%"><b>:</b> <?=$jamindarData->reg_date?></td>
                                            <td width="25%"><strong>Gender</strong></td>
                                            <td width="25%"><b>:</b> <?=$jamindarData->gender?></td>

                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Parmanent Address</strong></td>
                        					<td width="25%" colspan="3"><b>:</b> <?=$jamindarData->per_village?>, <?=$jamindarData->per_post?>, <?=$jamindarData->per_thana?>, <?=$jamindarData->per_upazila?>, <?=$jamindarData->per_zila?>.</td>
                        				</tr>
                        				<tr>
                        					<td width="25%"><strong>Present Address</strong></td>
                        					<td width="25%" colspan="3"><b>:</b>Home: <?=$jamindarData->pre_home?>, <?=$jamindarData->pre_village?>, <?=$jamindarData->pre_post?>, <?=$jamindarData->pre_thana?>, <?=$jamindarData->pre_upazila?>, <?=$jamindarData->pre_zila?>.</td>
                        				</tr>
                        			</table>
                        		</div>

                          <?php endif ?><!-- end if countLoan-->


                        	</div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
