<?php
    include "inc/header.php";
  //  require_once 'lib/Member.php';

    $configuration = new Configuration();
?>

<style>
label{
  display: block !important;
}
</style>
<?php
//Ngo Profile Update Work;
  if(isset($_GET["type"]) && !empty($_GET["type"]))
  {

    $type = $_GET["type"];
    if($type == "basic")
    {
      $update_ok = 0;
      if(isset($_GET["ngo_name"]))
      {
        $update_ok += $configuration->update("ngo_name",$_GET["ngo_name"], "software_configuration");
      }

      if(isset($_GET["ngo_code"]))
      {
        $update_ok += $configuration->update("ngo_code",$_GET["ngo_code"], "software_configuration");
      }

      if(isset($_GET["ngo_mobile"]))
      {
        $update_ok += $configuration->update("ngo_mobile",$_GET["ngo_mobile"], "software_configuration");
      }

      if(isset($_GET["ngo_address"]))
      {
        $update_ok += $configuration->update("ngo_address",$_GET["ngo_address"], "software_configuration");
      }


      if($update_ok > 0)
      {
        $d = 4 - $update_ok;
        header("Location: SoftwareConfiguration.php?success=$d");
  			ob_end_flush();

      }

    }

  }
//Ngo Profile work end;
?>


<?php
//Ngo Loan Update Work;
  if(isset($_GET["type"]) && !empty($_GET["type"]))
  {

    $type = $_GET["type"];
    if($type == "loan")
    {
      $update_ok = 0;
      if(isset($_GET["loan-initial-diposits"]))
      {
        $update_ok += $configuration->update("loan_initial_diposits",$_GET["loan-initial-diposits"], "loan_configurations");
      }

      if(isset($_GET["loan-percentage"]))
      {
        $update_ok += $configuration->update("loan_percentage",$_GET["loan-percentage"], "loan_configurations");
      }

      if(isset($_GET["loan-service-charge"]))
      {
        $update_ok += $configuration->update("loan_service_charge",$_GET["loan-service-charge"], "loan_configurations");
      }



      if($update_ok > 0)
      {
        $d = 3 - $update_ok;
        header("Location: SoftwareConfiguration.php?success=$d");
  			ob_end_flush();

      }

    }

  }
//Ngo Loan work end;
?>



    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Configure Your Software</h2>
            </div>

            <?php if(isset($_GET["success"])):?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Update Successful....
              </div>
            <?php endif ?>
            <!--Setting Forms -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXAMPLE TAB
                                <small>Add quick, dynamic tab functionality to transition through panes of local content</small>
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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#ngo-profile" data-toggle="tab">NGO PROFILE</a></li>
                                <li role="presentation" ><a href="#loan-settings" data-toggle="tab">LOAN SETTINGS</a></li>
                                <li role="presentation"><a href="#messages" data-toggle="tab">MESSAGES</a></li>
                                <li role="presentation"><a href="#settings-a" data-toggle="tab">SETTINGS</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="ngo-profile">

                                    <!--
                                    <b>Basic Configuration</b>
                                  -->
                                    <p>
                                      <!--Basic Configuration Form-->
                                      <form method="get"  action="">
                                        <input type="hidden" name="type" value="basic" />
                                      <div class="form-group">
                                          <div class="form-line">
                                            <label>NGO NAME</lable>
                                              <input type="text" name="ngo_name" class="form-control" placeholder="Ex: your ngo name" value="<?=$configuration->ngo_name;?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-line">
                                              <label>NGO CODE</lable>
                                              <input type="text" name="ngo_code" class="form-control" placeholder="Ex: CD-2015" value="<?=$configuration->ngo_code;?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-line">
                                            <label>NGO MOBILE</lable>
                                              <input type="text" name="ngo_mobile" class="form-control" placeholder="Ex: 01750 000 000" value="<?=$configuration->ngo_mobile;?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-line">
                                            <label>NGO ADDRESS</lable>
                                              <input type="text" name="ngo_address" class="form-control" placeholder="Ex: 01750 000 000" value="<?=$configuration->ngo_address;?>"/>
                                          </div>
                                      </div>
                                      <input type="submit" class="btn btn-success" value="Save" />
                                    </form>
                                      <!--#END# Basic Configuration Form-->
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="loan-settings">
                                    <!--<b></b>-->
                                    <p>
                                      <form method="get" action="">
                                        <input type="hidden" name="type" value="loan" />
                                        <div class="row">
                                          <!--Loan Left Panel-->

                                          <div class="col-md-6">

                                            <div class="form-group">
                                                <div class="form-line">
                                                  <label>INITIAL DIPOSITS</lable>
                                                    <input type="text" name="loan-initial-diposits" class="form-control" placeholder="Ex: 1000" value="<?=$configuration->loan_initial_diposits;?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                  <label>INTEREST PARCENT(per month)</lable>
                                                    <input type="text" name="loan-percentage" class="form-control" placeholder="EX: 10" value="<?=$configuration->loan_interest;?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label>SERVICE CHARGE PARCENT(total loan)</lable>
                                                <div class="form-line">

                                                    <input type="text" name="loan-service-charge" class="form-control" placeholder="EX: 10" value="<?=$configuration->loan_service_charge;?>"/>
                                                </div>
                                            </div>


                                          </div>
                                          <!--#END# Loan Left Panel-->

                                          <!--Loan Right Panel-->
                                          <div class="col-md-6" style="border:1px #ddd solid; padding:10px;">

                                          </div>
                                          <!--#END# Loan Right Panel-->

                                        </div>
                                        <input type="submit" class="btn btn-success" value="Save"/>
                                      </form>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <b>Message Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings-a">
                                    <b>Message Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Setting Forms -->
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
