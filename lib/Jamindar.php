<?php 

require_once 'Database.php';

/**
 * Jamindar Class
 */
class Jamindar
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}



	public function getJamindarByJamindarID($JamindarID, $row = null){
		$sql = "SELECT * FROM jamindar WHERE id = :jamindarID";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':jamindarID', $JamindarID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			if($row == 'id'){
				return $result->id;
			}elseif ($row == 'name') {
				return $result->name;
			}elseif ($row == 'mobile') {
				return $result->mobile;
			}elseif ($row == 'home') {
				return $result->pre_home;
			}else{
				return $result;
			}
		}

	}


	public function addJamindar($data){

		$name = $data["name"];
		$husbandOrFather = $data["fh"];

		if ($husbandOrFather == "father_ok") {
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
		$specialKey = time();
		$specialKey = md5($specialKey);

		

		//return $specialKey;

		$sql = "INSERT INTO `jamindar` (name, father_name, husband_name, mother_name, profession, nid_type, nid, religion, mobile, nationality, marital_status, pre_home, pre_village, pre_post, pre_thana, pre_upazila, pre_zila, per_village, per_post, per_thana, per_upazila, per_zila, reg_date, gender, special_key) VALUES (:name, :fatherName, :husbandName, :motherName, :profession, :nid_type, :nidNo, :religion, :mobileNumber, :nationality, :maritalStutas, :preHouse, :preVillage, :prePostOffice, :preThana, :preSubDistrict, :preDistrict, :perVillage, :perPostOffice, :perThana, :perSubDistrict, :perDistrict, :admissionDate, :gender, :specialKey)";


		
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
		
		
		$query->bindValue(':preHouse', $preHouse);
		$query->bindValue(':preVillage', $preVillage);
		$query->bindValue(':prePostOffice', $prePostOffice);
		$query->bindValue(':preThana', $preThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':preDistrict', $preDistrict);

		$query->bindValue(':perVillage', $perVillage);
		$query->bindValue(':perPostOffice', $perPostOffice);
		$query->bindValue(':perThana', $perThana);
		$query->bindValue(':perSubDistrict', $perSubDistrict);
		$query->bindValue(':perDistrict', $perDistrict);

		$query->bindValue(':admissionDate', $admissionDate);
		$query->bindValue(':gender', $gender);
		$query->bindValue(':specialKey', $specialKey);

		$success = $query->execute();

		if ($success) {
			$GetLastID = $this->getIdFromSpecialKey($specialKey);
			return $GetLastID;

		}

	}

	public function updateJamindarInfo($jamindarID,$data,$memberID){

		$name = $data["name"];
		$husbandOrFather = $data["fh"];
		if ($husbandOrFather == "father_ok") {
			$fatherName = $data["father_name"];
		}else{
			$husbandName = $data["father_name"];
		}
		$motherName = $data["mother_name"];
		$profession = $data["profession"];
		$religion = $data["religion"];
		$mobileNumber = $data["mobile_number"];
		$maritalStutas = $data["marital_status"];
		$nationality = $data["nationality"];
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


		

		$sql ="UPDATE jamindar SET
			name = :name,
			father_name = :fatherName,
			husband_name = :husbandName,
			mother_name = :motherName,
			profession = :profession,
			nid = :nidNo,
			religion = :religion,
			mobile = :mobileNumber,
			nationality = :nationality,
			marital_status = :maritalStutas,
			pre_home = :preHouse,
			pre_village = :preVillage,
			pre_post = :prePostOffice,
			pre_thana = :preThana,
			pre_upazila = :preSubDistrict,
			pre_zila = :preDistrict,
			per_village = :perVillage,
			per_post = :perPostOffice,
			per_thana = :perThana,
			per_upazila = :perSubDistrict,
			per_zila = :perDistrict,
			gender = :gender,
			reg_date = :admissionDate
			WHERE id = :jamindarID;


		";

		
		$query = $this->db->pdo->prepare($sql);

		//personal information
		$query->bindValue(':name', $name);
		$query->bindValue(':fatherName', $fatherName);
		$query->bindValue(':husbandName', $husbandName);
		$query->bindValue(':motherName', $motherName);
		$query->bindValue(':profession', $profession);
		$query->bindValue(':nidNo', $nidNo);
		$query->bindValue(':religion', $religion);
		$query->bindValue(':mobileNumber', $mobileNumber);
		$query->bindValue(':nationality', $nationality);
		$query->bindValue(':maritalStutas', $maritalStutas);
		
		
		$query->bindValue(':preHouse', $preHouse);
		$query->bindValue(':preVillage', $preVillage);
		$query->bindValue(':prePostOffice', $prePostOffice);
		$query->bindValue(':preThana', $preThana);
		$query->bindValue(':preSubDistrict', $preSubDistrict);
		$query->bindValue(':preDistrict', $preDistrict);

		$query->bindValue(':perVillage', $perVillage);
		$query->bindValue(':perPostOffice', $perPostOffice);
		$query->bindValue(':perThana', $perThana);
		$query->bindValue(':perSubDistrict', $perSubDistrict);
		$query->bindValue(':perDistrict', $perDistrict);

		$query->bindValue(':admissionDate', $admissionDate);
		$query->bindValue(':gender', $gender);
		$query->bindValue(':jamindarID', $jamindarID);

		$success = $query->execute();

		if($success){
			$msg =  array( 
				"msg" => "<div class='alert alert-success'><strong>Success:# </strong>Data Successfully Updated <a href='member_profile.php?id=$memberID' class='btn btn-info'>Go Back</a></div>",
			);
			return $msg;
		}
	}

	public function getLastJamindarIDbyMember($memberID)
	{
		$sql = "SELECT * FROM `loan_table`WHERE member_id = :memberID AND jamindar_id != 0 ORDER BY loan_date DESC LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":memberID", $memberID);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if ($result) {
			return $result->jamindar_id;
		}
	}



	public function checkJamindar($jamindarID){
		$sql  = "SELECT * FROM jamindar WHERE id = :jamindarID";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(":jamindarID", $jamindarID);
		$result = $query->fetchAll();
		if($result){
			return true;
		}else{
			return false;
		}
	}

	//for getting Last input id
	private function getIdFromSpecialKey($key){
		$sql = "SELECT id FROM jamindar WHERE special_key = :specialKey";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':specialKey', $key);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result->id;
		}
		
	}





}