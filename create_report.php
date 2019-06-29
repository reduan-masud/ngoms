
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
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        	<div class="row">

                        		<div class="col-md-6">
                                    <div class="form-line">
                                        <input type="date" class="form-control" id="getDate" placeholder="Ex: enter Date" required="">
                                   </div>
                                   <br>
                        			<button class="btn bg-teal btn-block btn-lg waves-effect" onclick="gopage()" >Get the Daily Witdrew page</button>
                                    <script>
                                        function gopage(){
                                            var getDate = document.getElementById("getDate").value;
                                            if(!getDate == ""){
                                                var url = "report/get_member_wid_list.php?date="+getDate;
                                                window.open(url, "MsgWindow", "width=1200px,height=650px")
                                            }
                                       }
                                    </script>

                        		</div>
                        		<div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-inline">
                                            <select class="form-control show-tick" id="month" placeholder="Ex: enter Date" required="">
                                                <option value=""  selected="" disabled="">==SELECT MONTH==</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            <select class="form-control" id="year" placeholder="Ex: enter Date" required="">
                                                <option value="" selected="" disabled="">==SELECT YEAR==</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                                <option value="2033">2033</option>
                                                <option value="2034">2034</option>
                                                <option value="2035">2035</option>
                                                <option value="2036">2036</option>
                                                <option value="2037">2037</option>
                                                <option value="2038">2038</option>
                                                <option value="2039">2039</option>
                                                <option value="2040">2040</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                   <br>
                                    <button class="btn bg-red btn-block btn-lg waves-effect" onclick="gopage2()" >Get the Daily Witdrew page</button>
                                    <script>
                                        function gopage2(){
                                            var month = document.getElementById("month").value;
                                            var year = document.getElementById("year").value;
                                            if(!month == "" || !year == ""){
                                                var url = "report/monthly_report.php?month="+month+"&year="+year;
                                                window.open(url, "MsgWindow", "width=1200px,height=650px")
                                            }
                                       }
                                    </script>                        	
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


            





			
        
        </div>
    </section>
<?php include 'inc/js.php'; ?>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>


    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
<?php include 'inc/footer.php'; ?>