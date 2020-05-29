
<?php
require_once 'Database.php';
require_once 'Member.php';
require_once 'Jamindar.php';
require_once 'Deposit.php';
class Loan
{
	private $db;
	private $member;
	private $jmmindar_id;
	private $totalDepositByBookNo;
	private $last_active_loan;



	public function __construct()
	{
		$this->db = new Database();
		$this->member = new Member();
		$this->jamindar = new Jamindar();
	}

	//get monthly report total saveings and installment
	public function monthly_report($data)
	{
		$year = $data["year"];
		$month = $data["month"];
		$date = $year."-".$month."-";

		$sql = "SELECT
					T1.member_id,
				    T2.name,
				    T2.mobile,
				    T3.book_id,
				    SUM(savings) as t_saveings,
				    SUM(installments) as t_installment,
				    T1.withdrawal_date
				FROM
					daily_withdraw AS T1
				    INNER JOIN member_info AS T2 ON T1.member_id = T2.id
				    INNER JOIN loan_table AS T3 ON T1.member_id = T3.member_id
				WHERE T1.withdrawal_date LIKE '".$date."%'
				GROUP BY T1.member_id";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}else{
			return null;
		}

	}


	//Withdras Savings
	public function withdras_savings($data)
	{
		$BookNO = $data['BookNO'];
		$memberID = $data['memberID'];
		$withdrawlAmount = $data['withdraw_amount'];
		$wDate = $data['date'];
		$totalSeavings = $this->getTotalSaveings($memberID);




		#checking Book No
		if ($BookNO == "") {
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>You Must Set A book No First!</div>",
				"id" => $memberID
			);
			return $msg;
		}


		if($wDate == ""  || $withdrawlAmount ==""){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>Date & Withdraw Amount Field Must Not Be Empty!</div>",
				"id" => $memberID
			);
			return $msg;
		}

		if ($memberID == "") {
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>There are some error.. Contact with the soft owner.(Reduan Masud)!</div>",
				"id" => $memberID
			);
			return $msg;
		}
		if($withdrawlAmount < 0){
			$withdrawlAmount = $withdrawlAmount * -1;
		}

		if($withdrawlAmount > $totalSeavings){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Warning: </strong>You Cannot Withdraw More Than Your Total Saveings!</div>",
				"id" => $memberID
			);
			return $msg;
		}

		if($withdrawlAmount > 0){
			$withdrawlAmount = $withdrawlAmount * -1;
		}


		$sql = "INSERT INTO daily_withdraw (member_id, book_id, savings, withdraw_saveings, withdrawal_date)VALUES(:memberID, :bookNO, :savings, :withdraw_saveings, :withdrawal_date)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->bindValue(":bookNO", $BookNO);
		$query->bindValue(":savings", $withdrawlAmount);
		$query->bindValue(":withdraw_saveings", 1);
		$query->bindValue(":withdrawal_date", $wDate);
		$result = $query->execute();
		if($result){
			header("Location: member_profile.php?id=$memberID");
			ob_end_flush();
			$msg =  array(
				"msg" => "<div class='alert alert-success'><strong>Success: </strong>Money Successfully Withdrawed.</div>",
				"id" => $memberID
			);
			return $msg;
		}

	}
	//Total Installment of Current Loan
	public function totalInstallmentCurrentLoan($loanID)
	{
		$sql = "SELECT SUM(installments) as totalInstallment FROM daily_withdraw WHERE loan_id = $loanID";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->totalInstallment;
		}else{
			return 0;
		}
	}
	//get Total Saveings
	public function getTotalSaveingsWithourID()
	{
		$sql = "SELECT SUM(savings) as totalSeavings FROM daily_withdraw";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->totalSeavings;
		}else{
			return 0;
		}
	}
	//get Total Saveings By Member  Id
	public function getTotalSaveings($memberID)
	{
		$sql = "SELECT SUM(savings) as totalSeavings FROM daily_withdraw WHERE member_id = $memberID";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->totalSeavings;
		}else{
			return 0;
		}
	}
	//get Total Active Loan
	public function getTotalActiveLoan()
	{
		$sql = "SELECT count(id) as totalActiveLoan FROM loan_table WHERE active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->totalActiveLoan;
		}
	}
	//Get Last Loan Id By Member ID
	public function getLastLoanIDbyMemberID($memberID){
		$sql = "SELECT * FROM `loan_table`WHERE member_id = :memberID ORDER BY loan_date DESC LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->id;
		}
	}


	//issue Loan
	public function issueLoan($id, $data){

		$loanAmount = $data['loan_amount'];
		$serviceCharge = $data['loan_service_charge'];

		$interestRate = $data['interest_rate'];

		$loanDuration = $data['loan_duration'];
		$loanType = $data['lone_type'];
		$loanIssueDate = $data['loan_issue_date'];
		$memberID = $id;
		$memberBookNo = $this->member->getBookNoByMemberId($memberID);
		$key = md5(time());
		if($loanAmount == "" || $serviceCharge == "" || $interestRate == "" || $loanDuration == "" || $loanType == "" || $loanIssueDate == ""){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>Field Must Not Be Empty!</div>",
				"id" => $memberID
			);
			return $msg;
		}
		if($this->checkLoan($memberID)){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>You already have an active loan!</div>",
				"id" => $memberID
			);
			return $msg;
		}

		$interestRate_A = $interestRate/100;
		$serviceCharge_A = $serviceCharge/100;

		$totalLoan = ceil($loanAmount + $loanAmount * $interestRate_A * $loanDuration);
		$loanServiceCharge = ceil($loanAmount * $serviceCharge_A);
		$bookCost = 50;

		$grandTotal = $totalLoan + $loanServiceCharge + $bookCost;

		$sql = "INSERT INTO loan_table (member_id, jamindar_id, book_no, loan_amount, loan_interest, loan_period, loan_type, loan_serverce_charge, loan_total, service_amount, grand_total, book_cost, loan_date, special_key) VALUES (:memberID, :jamindarID, :bookNo, :loanAmount, :loanIntrest, :loanDuration, :loanType, :serviceCharge, :totalLoan, :loanServiceCharge, :grandTotal, :bookCost, :loanDate, :key)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':memberID', $memberID);
		$query->bindValue(':jamindarID', null);
		$query->bindValue(':bookNo', $memberBookNo);
		$query->bindValue(':loanAmount', $loanAmount);
		$query->bindValue(':loanIntrest', $interestRate);
		$query->bindValue(':loanDuration', $loanDuration);
		$query->bindValue(':loanType', $loanType);
		$query->bindValue(':serviceCharge', $serviceCharge);
		$query->bindValue(':totalLoan', $totalLoan);
		$query->bindValue(':loanServiceCharge', $loanServiceCharge);
		$query->bindValue(':grandTotal', $grandTotal);
		$query->bindValue(':bookCost', $bookCost);
		$query->bindValue(':loanDate', $loanIssueDate);
		$query->bindValue(':key', $key);
		$result = $query->execute();

		if($result){
			return $key;
		}

	}
	//get loan info by speial key
	public function gelLoanDatyByKey($key){
		$sql = "SELECT * FROM loan_table WHERE special_key = :key";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':key', $key);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result;
		}
	}

	private function checkLoan($memberID){
		$sql = "SELECT * FROM loan_table WHERE member_id = :id AND active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $memberID);
		$query->execute();
		$row = $query->fetchAll();
		if($row){
			return true;
		}else{
			return false;
		}
	}


	private function is_active_loan($book_no){
		$sql = "SELECT * FROM loan_table WHERE book_no = :book_no AND active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':book_no', $book_no);
		$query->execute();
		$row = $query->fetchAll();
		if($row){
			$this->last_active_loan = $row;
			return true;
		}else{
			return false;
		}
	}


	public function loanTableJamindar($memberID){
		/*
		$sql = "SELECT * FROM loan_table WHERE member_id = :id AND active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $memberID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		$loanID = $result->id;
		*/

		$sql = "SELECT jamindar_id FROM loan_table WHERE member_id = :id AND active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $memberID);
		$query->execute();
		$row = $query->fetch(PDO::FETCH_OBJ);
		if($row){
		$jamindar = $row->jamindar_id;
		if($jamindar == 0){
			return true;
		}else{
			return false;
		}
		}else{
			return false;
		}

	}
	public function getLoanDataByMemberId($memberID){
		$sql = "SELECT * FROM loan_table WHERE member_id = :id AND active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $memberID);
		$query->execute();
		$row = $query->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function setJamindarIDAtLoan($memberID, $data){
		$bookNo = $this->member->getBookNoByMemberId($memberID);
		$jamindarID = $data['jmmindar_id'];
		$loanID = $data['loanID'];

		$is_jamindar = $this->jamindar->checkJamindar($jamindarID);
		if($is_jamindar){
			$msg =  array(
				"msg" => "<div class='alert alert-warning'><strong>Warning:# $loanID </strong>There is No Jamindar By This Id</div>",
				"id" => $memberID
			);
			return $msg;
		}

		$sql = "INSERT INTO jamindar_book (jamindar_id, book_no, member_id) VALUES (:jamindarID, :bookNo, :memberID)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':jamindarID', $jamindarID);
		$query->bindValue(':bookNo', $bookNo);
		$query->bindValue(':memberID', $memberID);
		$result1 = $query->execute();


		$sql = "UPDATE loan_table SET
			jamindar_id = :jamindarID
			WHERE id = :loanID;
		";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':jamindarID', $jamindarID);
		$query->bindValue(':loanID', $loanID);
		$result2 = $query->execute();


		if($result1 && $result2){
			$msg =  array(
				"msg" => "<div class='alert alert-success'><strong>Success:# $loanID </strong>Your Loan Successfully Issued.</div>",
				"id" => $memberID
			);
			return $msg;
		}

	}
	public function loanSetWithJamindar($memberID, $data){
		$name = $data['name'];
		$date = $data['admission_date'];
		$loanID = $data['loanID'];


		if($name == "" or $date == ""){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>Name & Date Must Not Be Empty</div>",
				"id" => $memberID
			);
			return $msg;
		}



		$jamindarID = $this->jamindar->addJamindar($data);
		//return $jamindarID;
		$bookNo = $this->member->getBookNoByMemberId($memberID);



		$sql = "INSERT INTO jamindar_book (jamindar_id, book_no, member_id) VALUES (:jamindarID, :bookNo, :memberID)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':jamindarID', $jamindarID);
		$query->bindValue(':bookNo', $bookNo);
		$query->bindValue(':memberID', $memberID);
		$result1 = $query->execute();


		$sql = "UPDATE loan_table SET
			jamindar_id = :jamindarID
			WHERE id = :loanID;
		";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':jamindarID', $jamindarID);
		$query->bindValue(':loanID', $loanID);
		$result2 = $query->execute();


		if($result1 && $result2){
			$msg =  array(
				"msg" => "<div class='alert alert-success'><strong>Success:# $loanID </strong>Your Loan Successfully Issued.</div>",
				"id" => $memberID
			);
			return $msg;
		}

	}

	public function getLast5LoanInfo($memberID){

		$sql = "SELECT * FROM loan_table WHERE member_id = :memberID ORDER BY loan_date DESC LIMIT 5";
		//$sql = "SELECT * FROM loan_table WHERE member_id = '68' ORDER BY loan_date DESC LIMIT 5";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->execute();
		$result = $query->fetchAll();
		if($result){
			return $result;
		}
	}

	public function getLastLoan($memberID){
		$sql = "SELECT * FROM loan_table WHERE member_id = :memberID AND jamindar_id != 0 ORDER BY loan_date DESC LIMIT 1";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->execute();
		$result = $query->fetch();
		if($result){
			return $result;
		}
	}
	public function getLastLoanByActivity($memberID){
		$sql = "SELECT * FROM loan_table WHERE member_id = :memberID AND active = 1 ORDER BY loan_date DESC LIMIT 1";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}else{
			return false;
		}
	}




	//If deposit added today
	private function check_deposit_added_today($date, $book_no)
	{
		$sql = "SELECT * FROM deposit WHERE book_no = :book_no AND deposit_date = :deposit_date";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":book_no", $book_no);
		$query->bindValue(":deposit_date", $date);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	//If Installment added Today
	private function check_installment_added_today($date, $loan_id)
	{
		$sql = "SELECT * FROM installments WHERE loan_id = :loan_id AND installment_date = :installment_date";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":loan_id", $loan_id);
		$query->bindValue(":installment_date", $date);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return true;
		} else {
			return false;
		}

	}

	//Get total installment of a loan
	private function total_installment_loan_id($loan_id)
	{
		$sql = "SELECT SUM(installment_amount) as total_installment FROM installments WHERE loan_id = :loan_id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":loan_id", $loan_id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			return $result->total_installment;
		}
		else
		{
			return 0;
		}
	}

 //Get total installment by datefmt_create
 private function total_installment_date($date)
 {
	 $sql = "SELECT SUM(installment_amount) as total_installment FROM installments WHERE installment_date = :installment_date";
	 $query = $thsi->db->pdo->prepare($sql);
	 $query->bindValue(":installment_date", $date);
	 $query->execute();
	 $result = $query->fetch(PDO::FETCH_OBJ);
	 if($result){
		 return $result->total_installment;
	 }else {
	 	return 0;
	 }

 }

//Add installment
private function addInstallment($loan_id, $installment_amount, $date)
{
	$sql = "INSERT INTO installments (
					loan_id,
					installment_amount,
					installment_date
				)VALUES(
					:loan_id,
					:installment_amount,
					:installment_date
				)";

	 $query = $this->db->pdo->prepare($sql);
	 $query->bindValue(":loan_id", $laon_id);
	 $query->bindValue(":installment_amount", $installment_amount);
	 $query->bindValue(":installment_date", $date);

	 $result = $query->execute();
	 if($result){
		 return true;
	 }else{
		 return false;
	 }
}


	//Daily Money Wthtdraw Section Start

	public function addMoney($data){

		$date = $data['date'];
		$book_no = $data['bookNo'];
		$deposit = $data['Saveings'];
		$installment = $data['Installment'];
		$loan_id = $this->last_active_loan->id;


		$memberID = $this->member->getMemberByBookNo2($bookNO)->id;
		$loanD = $this->getLastLoanByActivity($memberID);

		//check loan available
		$is_active_loan = $this->is_active_loan($book_no);
		$totalloaninst = 0;




		if(!$this->member->checkBookNo($book_no)){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>There is No Book.. ($book_no)</div>",
				"id" => $memberID,
				"data" => $data,
				"loan" =>$loanD,
				"TotalMoney" => $totalloaninst
			);
			return $msg;
		}
		if(check_deposit_added_today($date, $book_no) && check_installment_added_today($date, $loan_id))
		{
			$msg =  array(
				"msg" => "<div class='alert alert-warning'><strong>Warning: </strong>This Person's money already added.</div>",
				"id" => $memberID,
				"data" => $data,
				"loanData" => $loanD
			);
		return $msg;
		}
		if(check_deposit_added_today($date, $book_no) && $deposit != "")
		{
			$msg =  array(
				"msg" => "<div class='alert alert-warning'><strong>Warning: </strong>You can not add deposit twice at same day ($book_no). You can add installment only.</div>",
				"id" => $memberID,
				"data" => $data,
				"loan" =>$loanD,
				"TotalMoney" => $totalloaninst
			);
			return $msg;
		}
		if(check_installment_added_today($date, $loan_id) && $installment != "")
		{
			$msg =  array(
				"msg" => "<div class='alert alert-warning'><strong>Warning: </strong>You can not add Installment twice at same day ($book_no). You can add deposit only.</div>",
				"id" => $memberID,
				"data" => $data,
				"loan" =>$loanD,
				"TotalMoney" => $totalloaninst
			);
			return $msg;
		}

		if($is_active_loan)
		{
			$total_installment = $this->total_installment_loan_id($loan_id);

		}
		if(!$is_active_loan){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>This Person Has No Running Loan</div>",
				"id" => $memberID,
				"data" => $data,
				"loan" =>$loanD
			);
			return $msg;
		}
		if($date == "" || $bookNO ==""){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>[Date] or [Book No]Field Must Not Be Empty!</div>",
				"id" => $memberID,
				"data" => $data
			);
		return $msg;
		}
		if($deposit == "" && $installment ==""){
			$msg =  array(
				"msg" => "<div class='alert alert-danger'><strong>Error: </strong>Both [Deposit] [Installment] Field Must Not Be Empty!</div>",
				"id" => $memberID,
				"data" => $data
			);
		return $msg;
		}
		if(!check_deposit_added_today($date)){
			$addDiposit = $this->addDeposits($book_no, $member_id, $deposit, $date);
		}

		if (!check_installment_added_today($date)) {
			$addInstallment = $this->addInstallment($loan_id, $installment ,$date);
		}

		if($addDiposit || $addInstallment){
			if($totalloaninst >= $this->last_active_loan->loan_total){
				$loanFinished = $this->FinishedLoan($this->last_active_loan->id, $date);
				if($loanFinished){
						$msg =  array(
						"msg" => "<div class='alert alert-success'><strong>Hurra: </strong>".$this->member->getMemberByBookNo2($bookNO)->name ." Your Loan Is Finshed..Today($bookNO)</div>",
						"id" => $memberID,
						"data" => $data,
						"loan" => $loanD,
						"TotalMoney" => $totalloaninst,
						"check" => ($totalloaninst >= $loanD->loan_total)
					);
				return $msg;

				}
			}else{
					$msg =  array(
						"msg" => "<div class='alert alert-success'><strong>Success: </strong>Money Successfully added to ".$this->member->getMemberByBookNo2($bookNO)->name."!</div>",
						"id" => $memberID,
						"data" => $data,
						"loan" => $loanD,
						"TotalMoney" => $totalloaninst,
						"check" => ($totalloaninst >= $loanD->loan_total)
					);
				return $msg;
			}
		}





	}//add money finished

	private function FinishedLoan($loanID, $date){
		$sql = "UPDATE loan_table SET
				active = 0,
				finish_date = :fdate
				WHERE id = :loanID";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":fdate", $date);
		$query->bindValue(":loanID", $loanID);
		$result = $query->execute();
		if($result){
			return true;
		}else{
			return false;
		}

	}

	private function totalInstallment($loanID){
		$sql = "SELECT SUM(installments) AS totalInstallment FROM daily_withdraw WHERE loan_id = :loanID";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':loanID', $loanID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result != null){
			return $result->totalInstallment;
		}else{
			return 0;
		}
	}

	public function getTotalGivenMoneyActive()
	{
		$sql = "SELECT SUM(loan_total) AS totalIssuedLoan FROM loan_table WHERE active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result->totalIssuedLoan;
		}
	}

	public function getTotalInstallment(){
		$sql = "SELECT SUM(installments) AS totalInstallment FROM daily_withdraw AS T1 INNER JOIN loan_table AS T2 ON T1.loan_id = T2.id WHERE active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result->totalInstallment;
		}
	}

	private function checkAlreadyMoneyAddedToday($date, $loanID){
		$sql = "SELECT * FROM daily_withdraw WHERE withdrawal_date = :wdate AND loan_id = :loanID";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':wdate', $date);
		$query->bindValue(':loanID', $loanID);
		$query->execute();
		$result = $query->fetchAll();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	//Daily Money Wthtdraw Section End


	public function getDailyAddMoneyByDate($date){
		$sql = "SELECT * FROM daily_withdraw WHERE withdrawal_date = :udate";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":udate", $date);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}
	}

}
