
<?php
include 'Database.php';
class Member
{
	private $db;
	private $loanCount;
	private $Name;
	private $BookNo;
	private $totalLoan;
	private $BookId;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function init($id)
	{
		$this->getCountedLoan($id);
		$this->getBookNo($id);
	}



	// getBook
	private function getBookNo($member_id)
	{
		$sql = "SELECT * FROM book where member_id = :member_id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':member_id', $member_id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			$this->BookNo = $result->book_no;
			$this->BookId = $result->id;
		}
	}


	public function ShowBookNo()
	{
		return $this->BookNo;
	}
	//
	private function getCountedLoan($member_id)
	{
		$sql = "SELECT COUNT('id') as cid FROM loan_table WHERE member_id = :member_id";
		$query = $this->db->pdo->prepare($sql);
		$query -> bindValue(':member_id', $member_id);
		$query->execute();
		$count = 0;

		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			$count = $result->cid;
		}
		$this->loanCount = $count;
	}

	//show Loan Count;
	public function showLoanCount()
	{
		return $this->loanCount;
	}
	//Member Registration
	public function memberRegistration($data)
	{

		$name = $data["name"];
		$fatherorhusband = $data["fh"];

		if($fatherorhusband == "father_ok"){
			$fatherName = $data["father_name"];
			$husbandName = null;
		}else{
			$husbandName = $data["father_name"];
			$fatherName = null;
		}
		$motherName = $data["mother_name"];
		$profession = $data["profession"];
		$religion = $data["religion"];
		$mobileNumber = $data["mobile_number"];
		$maritalStutas = $data["marital_status"];
		$nationality = $data["nationality"];
		$nid_type = $data["card_type"];
		$nidNo = $data["nid_no"];
		$bookNo = $data["book_no"];
		$gender = $data["gender"];
		$admissionDate = $data["admission_date"];

		$perVillage = $data["per_village"];
		$perPostOffice = $data["per_post_office"];
		$perSubDistrict = $data["per_sub_district"];
		$perThana = $data["per_thana"];
		$perDistrict = $data["per_district"];

		$preHouse = $data["pre_house"];
		$preVillage = $data["pre_village"];
		$prePostOffice = $data["pre_post_office"];
		$preSubDistrict = $data["pre_sub_district"];
		$preThana = $data["pre_thana"];
		$preDistrict = $data["pre_district"];

		$GetLastID;
		$mem_info = false;
		$sp_date = date_create();
		$specialKey = date_timestamp_get($sp_date);
		$specialKey = md5($specialKey);
		//return $specialKey;

		if($name == "" || $bookNo == "" || $admissionDate == ""){
			$msg = "<div class='alert alert-danger'><strong>Error: </strong>Name, Date & Book No Must Not be Empty</div>";
			return $msg;
		}



		if($this->checkBookNo($bookNo)){

			$member = $this->getMemberByBookNo($bookNo);

			$msg = "<div class='alert alert-warning'><strong>Warning: </strong>This book already registered whith <a href='member_profile.php?id=$member->id'>$member->name</a></div>";
			return $msg;
		}


		$sql = "INSERT INTO `member_info` (name, father_name, husband_name, mother_name, profession,nid_type, nid, religion, mobile, nationality, marital_status, b_home, b_vill, b_post, b_thana, b_upazila, b_zila, s_vill, s_post, s_thana, s_upazila, s_zila, admission_date, special_key, gender) VALUES (:name, :fatherName, :husbandName, :motherName, :profession, nid_type, :nidNo, :religion, :mobileNumber, :nationality, :maritalStutas, :preHouse, :preVillage, :prePostOffice, :preThana, :preSubDistrict, :preDistrict, :perVillage, :perPostOffice, :perThana, :preSubDistrict, :perDistrict, :admissionDate, :specialKey, :gender)";

		$query = $this->db->pdo->prepare($sql);

		//personal information
		$query->bindValue(':name', $name);
		$query->bindValue(':fatherName', $fatherName);
		$query->bindValue(':husbandName', $husbandName);
		$query->bindValue(':motherName', $motherName);
		$query->bindValue(':profession', $profession);
		$query->bindValue(':nid_type', $nid_type);
		$query->bindValue(':nidNo', $nidNo);
		$query->bindValue(':religion', $religion);
		$query->bindValue(':mobileNumber', $mobileNumber);
		$query->bindValue(':nationality', $nationality);
		$query->bindValue(':maritalStutas', $maritalStutas);
		$query->bindValue(':gender', $gender);

		$query->bindValue(':preHouse', $preHouse);
		$query->bindValue(':preVillage', $preVillage);
		$query->bindValue(':prePostOffice', $prePostOffice);
		$query->bindValue(':preThana', $preThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':preDistrict', $preDistrict);

		$query->bindValue(':perVillage', $perVillage);
		$query->bindValue(':perPostOffice', $perPostOffice);
		$query->bindValue(':perThana', $perThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':perDistrict', $perDistrict);

		$query->bindValue(':admissionDate', $admissionDate);

		$query->bindValue(':specialKey', $specialKey);

		$success = $query->execute();

		if ($success) {
			$GetLastID = $this->getIdFromSpecialKey($specialKey);
			//return $GetLastID;
			$mem_info = true;
		}

		if(isset($GetLastID)){
			$sql1 = "INSERT INTO book (book_no, member_id, book_date) VALUES (:bookNo, :memberID, :creationDate)";
			$query = $this->db->pdo->prepare($sql1);
			$query->bindValue(':bookNo', $bookNo);
			$query->bindValue(':memberID', $GetLastID);
			$query->bindValue(':creationDate', $admissionDate);
			$bookSuccess = $query->execute();

			if($bookSuccess){
				header("Location: member_profile.php?id=$GetLastID");
				ob_end_flush();
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error: </strong>Something Wrong...</div>";
				return $msg;
			}
		}
	}

	//Update Member
	public function memberProfileUpdate($memberID, $data){
		$name = $data["name"];
		$fatherOrHusband = $data["fh"];
		if($fatherOrHusband == "father_ok"){
			$fatherName = $data["father_name"];
			$husbandName = null;
		}else{
			$husbandName = $data["father_name"];
			$fatherName = null;
		}
		$motherName = $data["mother_name"];
		$profession = $data["profession"];
		$religion = $data["religion"];
		$mobileNumber = $data["mobile_number"];
		$maritalStutas = $data["marital_status"];
		$nationality = $data["nationality"];
		$nid_type = $data["card_type"];
		$nidNo = $data["nid_no"];
		$gender = $data["gender"];
		$admissionDate = $data["admission_date"];

		$perVillage = $data["per_village"];
		$perPostOffice = $data["per_post_office"];
		$perSubDistrict = $data["per_sub_district"];
		$perThana = $data["per_thana"];
		$perDistrict = $data["per_district"];

		$preHouse = $data["pre_house"];
		$preVillage = $data["pre_village"];
		$prePostOffice = $data["pre_post_office"];
		$preSubDistrict = $data["pre_sub_district"];
		$preThana = $data["pre_thana"];
		$preDistrict = $data["pre_district"];


		if($name == ""){
			$msg = "<div class='alert alert-danger'><strong>Error: </strong>Name, Date & Book No Must Not be Empty</div>";
			return $msg;
		}

		$sql = "UPDATE member_info SET
				name = :name,
				father_name = :fatherName,
				husband_name = :husbandName,
				mother_name = :motherName,
				profession = :profession,
				nid_type = :nid_type,
				nid = :nidNo,
				religion = :religion,
				mobile = :mobileNumber,
				nationality = :nationality,
				marital_status = :maritalStutas,
				b_home = :preHouse,
				b_vill = :preVillage,
				b_post = :prePostOffice,
				b_thana = :preThana,
				b_upazila = :preSubDistrict,
				b_zila = :preDistrict,
				s_vill = :perVillage,
				s_post = :perPostOffice,
				s_thana = :perThana,
				s_upazila = :preSubDistrict,
				s_zila = :perDistrict,
				gender = :gender,
				admission_date = :admissionDate
				WHERE id = :id
		";

		$query = $this->db->pdo->prepare($sql);

		//personal information
		$query->bindValue(':name', $name);
		$query->bindValue(':fatherName', $fatherName);
		$query->bindValue(':husbandName', $husbandName);
		$query->bindValue(':motherName', $motherName);
		$query->bindValue(':profession', $profession);
		$query->bindValue(':nid_type', $nid_type);
		$query->bindValue(':nidNo', $nidNo);
		$query->bindValue(':religion', $religion);
		$query->bindValue(':mobileNumber', $mobileNumber);
		$query->bindValue(':nationality', $nationality);
		$query->bindValue(':maritalStutas', $maritalStutas);
		$query->bindValue(':gender', $gender);
		$query->bindValue(':admissionDate', $admissionDate);


		$query->bindValue(':preHouse', $preHouse);
		$query->bindValue(':preVillage', $preVillage);
		$query->bindValue(':prePostOffice', $prePostOffice);
		$query->bindValue(':preThana', $preThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':preDistrict', $preDistrict);

		$query->bindValue(':perVillage', $perVillage);
		$query->bindValue(':perPostOffice', $perPostOffice);
		$query->bindValue(':perThana', $perThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':perDistrict', $perDistrict);

		$query->bindValue(':id', $memberID);
		$success = $query->execute();

		if ($success) {
			header("Location: member_profile.php?id=$memberID");
			ob_end_flush();

		}

	}

	//for getting Last input id
	private function getIdFromSpecialKey($key){
		$sql = "SELECT id FROM member_info WHERE special_key = :specialKey";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':specialKey', $key);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result->id;
	}

	//get Total Member No
	public function getTotalMemberNo()
	{
		$sql = "SELECT count(id) AS totalMember FROM member_info";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->totalMember;
		}
	}
	//get a single member data
	public function getMemberData($id)
	{
		$sql = "SELECT * FROM member_info WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_OBJ);

		if(!$result){
			header("Location: 404.php");
			ob_end_flush();
		}


		return $result;
	}

	public function getMemberData2($id)
	{
		$sql = "SELECT * FROM member_info WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}

	}


	//chcek if id is valid (Problem has check later)
	/*
	private function checkMemberID($id){
		$sql = "SELECT * FROM member_info WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();
		$rows = $query->fetchAll();
		$rowCount = count($rows);
		if ($rowCount > 0) {
			return true;
		}else{
			return false;
		}
	}
	*/

	//check book is already available
	public function checkBookNo($bookNo){
		$sql = "SELECT * FROM book WHERE book_no = :bookNo";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':bookNo', $bookNo);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	//get user from book no
	public function getMemberByBookNo($bookNo){
		$sql   = "SELECT * FROM book WHERE book_no = :bookNo";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':bookNo', $bookNo);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		$member_id = $result->member_id;
		$member = $this->getMemberData($member_id);
		return $member;
	}

	public function getMemberByBookNo2($bookNo){
		$sql   = "SELECT * FROM book WHERE book_no = :bookNo";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':bookNo', $bookNo);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		$member_id = $result->member_id;
		$member = $this->getMemberData2($member_id);
		return $member;
	}

//Get member  Saveings and installment dayil
	public function getMemberDailyCollection($id, $date)
	{
		$sql = "SELECT * FROM daily_withdraw WHERE member_id = :id AND withdrawal_date = :date";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->bindValue(':date', $date);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_OBJ);

		if(!$result){
			header("Location: 404.php");
			ob_end_flush();
		}

		return $result;
	}


	public function getBookNoByMemberId($id){
		$sql = "SELECT * FROM book WHERE member_id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result->book_no;
	}

	public function getAllMember()
	{
		$sql = "SELECT * FROM member_info ORDER BY id DESC";
		$query =$this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	public function deleteMember($id)
	{
		$sql = "DELETE FROM member_info WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$result = $query->execute();
		if ($result) {
			header("Location: member_list.php");
		}
	}

	//Count loan
	public function countLoan($id)
	{
		$sql = "SELECT COUNT('id') as cid FROM loan_table WHERE member_id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query -> bindValue(':id', $id);
		$query->execute();
		$count = 0;
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result)
		{
			$count = $result->cid;
		}
		return $count;


	}

	//get all loan active member
	public function getActiveLoanMember()
	{
		$sql = "SELECT * FROM loan_table WHERE active = 1";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}
	}

}
