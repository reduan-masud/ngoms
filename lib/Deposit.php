<?php
include_once 'Database.php';
class Deposit
{
  private $db;
  public $totalDeposit;
  function __construct()
  {
    $this->db = new Database();
  }


  public function totalDepositByMember($member_id)
  {
    $sql = "SELECT SUM(deposit_amount) as tot, id FROM deposit WHERE member_id = :member_id";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(":member_id",$member_id);
    $query->execute();
    $result = $query->fetchAll();
    if ($result) {
      $this->totalDeposit = $result->tot;
    } else {
      return false;
    }

  }


  protected function totalDepostiByBook($book_no)
  {
    $sql = "SELECT SUM(deposit_amount) as tot FROM deposit WHERE book_no = :book_no";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(":book_no",$book_no);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if ($result) {
      $this->totalDeposit = $result->tot;
    } else {
      return false;
    }
  }


  protected function addDeposits($bookNo, $member_id, $deposit_amount, $date)
  {
      $sql = "INSERT INTO deposit (
              book_no,
              member_id,
              deposit_amount,
              deposit_date
            )VALUES(
              :bookNo,
              :member_id,
              :deposit_amount,
              :deposit_date
            )";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(":bookNo", $bookNo);
      $query->bindValue(":member_id", $member_id);
      $query->bindValue(":deposit_amount", $deposit_amount);
      $query->bindValue(":deposit_date", $date);
      $result = $query->execute();

      if($result)
        return TRUE;
      else
        return FALSE;

  }



}


 ?>
