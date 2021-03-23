 
<?php
      include 'inc/header.php';
      require_once 'lib/Member.php';
      require_once 'lib/Loan.php';
      require_once 'lib/Jamindar.php';
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Add Money</h2>
            </div>


            <?php
            $loan = new Loan();
            $member = new Member();
            $showForm = true;
            if(isset($_GET['BookNO'])){
              $memberData = $member->getMemberByBookNo2($_GET['BookNO']);
              $totalSeavings = $loan->getTotalSaveings($memberData->id);
              $showForm = false;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['withdras_savings'])) {
                $withdras_savings = $loan->withdras_savings($_GET);
                echo $withdras_savings['msg'];

            }
            ?>

            <?php if ($showForm): ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">

                                <form action="" metohd="get">
                                    <b>Member Book</b>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                          </span>
                                          <div class="form-line">
                                                <input type="text" class="form-control"  name="BookNO" placeholder="Ex: enter Book No" required="">
                                          </div>
                                          <button name="findMember" value="Set Date" class="btn btn-danger">Find Member</button>
                                    </div>
                                </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>


            <?php if (!$showForm): ?>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        	<div class="row">
                        		<div class="col-md-7">
                                <form action="" metohd="get">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Date</b>
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                        <i class="material-icons">account_box</i>
                                                  </span>
                                                  <div class="form-line">
                                                        <input type="date" class="form-control" name="date" id="bookNo" placeholder="Ex: Enter Date" required="">
                                                  </div>
                                            </div>
                                      </div>
                                      <div class="col-md-12">
                                            <b>Withdraw Amount</b>
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                        <i class="material-icons">account_box</i>
                                                  </span>
                                                  <div class="form-line">
                                                        <input type="hidden" name="memberID" value="<?php echo $memberData->id; ?>">
                                                        <input type="hidden" name="BookNO" value="<?php echo $_GET['BookNO']; ?>">
                                                        <input type="text" class="form-control" name="withdraw_amount" id="Saveings" placeholder="Ex: Withdraw Amount" >
                                                  </div>
                                            </div>
                                      </div>

                                      <div class="col-md-12">
                                            <button name="withdras_savings" class="btn btn-block btn-success">Withdraw</button>
                                      </div>
                                    </div>
                                </form>

                                </div>
                                <div class="col-md-5">
                                    <div class="col-md-12">
                                      <h2>Name: <?php echo $memberData->name; ?></h2>
                                    </div>
                                    <div class="col-md-12">
                                      <h2>Book NO: <?php echo $_GET['BookNO']; ?></h2>
                                    </div>
                                    <div class="col-md-12">
                                      <h2>Total Seavings: <br><?php echo $totalSeavings; ?></h2>
                                    </div>

                                </div>



                        	</div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>




        </div>
    </section>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
