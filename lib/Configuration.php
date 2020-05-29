<?php
/**
 *
 */
 include_once 'Database.php';
class Configuration
{
  private $db;
  private $showNavBar = false;
  private $soft_name = "Reduan Masud Software Ltd.";
  private $id = 1;

  public $ngo_name;
  public $ngo_code;
  public $ngo_mobile;
  public $ngo_address;



  public $loan_initial_diposits;
  public $loan_interest;
  public $loan_service_charge;
  
  function __construct()
  {
    $this->db = new Database();

    //init everything
    $this->initSoftwareConfiguration();
    $this->initLoan();

  }


  private function initSoftwareConfiguration()
  {
    $sql = "SELECT * FROM software_configuration WHERE id = 1";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if($result)
    {
      $this->ngo_name = $result->ngo_name;
      $this->ngo_mobile = $result->ngo_mobile;
      $this->ngo_address = $result->ngo_address;
      $this->ngo_code = $result->ngo_code;
    }
  }
  private function initLoan()
  {
    $sql = "SELECT * FROM loan_configurations WHERE id = 1";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if($result)
    {
      $this->loan_initial_diposits = $result->loan_initial_diposits;
      $this->loan_interest = $result->loan_percentage;
      $this->loan_service_charge = $result->loan_service_charge;
    }
  }

  public function update($key, $value, $table)
  {
    $sql = "UPDATE $table SET `$key` = :value";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(":value", $value);
    $success = $query->execute();
    if($success)
    {
      return 1;
    }
    else {
      return 0;
    }
  }

  public function is_navbar_visible()
  {
    if($this->showNavBar){
        return true;
    } else{
        return false;
    }
  }


  public function hideNavBar()
  {
    $this->showNavBar = false;
  }


}


 ?>
