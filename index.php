<?php
    include "inc/header.php";
    include_once 'lib/Member.php';
    include_once 'lib/Loan.php';
    $member = new Member();
    $loan = new Loan();
    $totalMember = $member->getTotalMemberNo();
    $totalActiveLoan = $loan->getTotalActiveLoan();
    $totalInstallment = $loan->getTotalInstallment();
    $totalGivenMoney = $loan->getTotalGivenMoneyActive();
    $totalSaveings = $loan->getTotalSaveingsWithourID();

?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Member</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $totalMember; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Active Loan</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $totalActiveLoan; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">euro_symbol</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Saveings</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo $totalSaveings; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Installments</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $totalInstallment; ?>/<?php echo $totalGivenMoney; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">Remaining Installment</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $totalGivenMoney - $totalInstallment; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <!-- BAR CHART -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daily Money Witdtrawl BAR CHART</h2>
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
                            <canvas id="bar_chart" height="150px" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# BAR CHART -->
        </div>
    </section>
<?php include 'inc/js.php'; ?>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
    <script src="js/pages/charts/chartjs.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>
