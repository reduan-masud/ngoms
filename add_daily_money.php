
<?php
      include 'inc/header.php';
      include 'lib/Member.php';
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
            $showForm = true;
            if(isset($_GET['date'])){
                $showForm = false;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['add_money'])) {
                $add_money = $loan->addMoney($_GET);
                echo $add_money['msg'];
                //var_dump($add_money);

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
                                    <b>Name</b>
                                    <div class="input-group">
                                          <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                          </span>
                                          <div class="form-line">
                                                <input type="date" class="form-control"  name="date" placeholder="Ex: enter Date" required="">
                                          </div>
                                          <button name="setDate" value="Set Date" class="btn btn-danger">Set Date</button>
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
                        		<div class="col-md-5">
                                <form action="" metohd="get">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Book No</b>
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                        <i class="material-icons">account_box</i>
                                                  </span>
                                                  <div class="form-line">
                                                        <input type="hidden" name="date" value="<?php echo $_GET['date']?>">
                                                        <input type="text" class="form-control" name="bookNo" id="bookNo" placeholder="Ex: Enter Book No" >
                                                  </div>
                                            </div>
                                      </div>
                                      <div class="col-md-12">
                                            <b>Saveings</b>
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                        <i class="material-icons">account_box</i>
                                                  </span>
                                                  <div class="form-line">
                                                        <input type="text" class="form-control" name="Saveings" id="Saveings" placeholder="Ex: Saveings Amount" >
                                                  </div>
                                            </div>
                                      </div>
                                      <div class="col-md-12">
                                            <b>Installment</b>
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                        <i class="material-icons">account_box</i>
                                                  </span>
                                                  <div class="form-line">
                                                        <input type="text" class="form-control" name="Installment" id="Installment" placeholder="Ex: Installment Amount" >
                                                  </div>
                                            </div>
                                      </div>
                                      <div class="col-md-12">
                                            <button name="add_money" class="btn btn-block btn-success">Submit</button>
                                      </div>
                                    </div>
                                </form>

                                </div>
                                <div class="col-md-7">
                                    <table border = "1" width="100%">
                                      <?php
                                      $getDate;
                                      if(isset($_GET['date'])){
                                        $getDate = $_GET['date'];
                                      }
                                      $getDatas = $loan->getDailyAddMoneyByDate($getDate);

                                      ?>
                                      <pre>
                                      <?php //var_dump($getDatas); ?>
                                      </pre>
                                      <tbody>
                                      <?php
                                      $i = 0;
                                      foreach ($getDatas as $getData) {
                                        $i++;
                                      ?>

                                          <tr>
                                            <td><?=$i?></td>
                                            <td><?=$getData->book_id?></td>
                                            <td><?=$getData->savings?></td>
                                            <td><?=$getData->installments?></td>
                                            <?php $total =  $getData->installments + $getData->savings; ?>
                                            <td><?=$total?></td>
                                          </tr>
                                        <?php } ?>
                                      </tbody>
                                      <thead>
                                        <tr>
                                          <td>SL.</td>
                                          <th>#Book ID</th>
                                          <th>Saveings</th>
                                          <th>Installment</th>
                                          <th>Total</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <td>SL.</td>
                                          <th>#Book ID</th>
                                          <th>Saveings</th>
                                          <th>Installment</th>
                                          <th>Total</th>
                                        </tr>
                                      </tfoot>
                                    </table>
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
    <script>
      $(function(){
        console.log("Document IS Ready");
        $("#bookNo").focus();
      });

    </script>
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
