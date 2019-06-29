<?php  

require_once '../lib/Member.php';
require_once '../lib/Loan.php';

/*
SELECT 
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
WHERE T1.withdrawal_date LIKE "2019-05-%"
GROUP BY T1.member_id

*/


$Member = new Member();
$Loan = new Loan();
$year;
$month;
$monthName;
$getMonthlyReport;
$show = true;
if (isset($_GET['month']) && isset($_GET['year'])) {
	$month = $_GET['month'];
	$year = $_GET['year'];
	$getMonthlyReport = $Loan->monthly_report($_GET);
	if($getMonthlyReport == null){
		$show = false;
	}

}else{
	echo "<script>";
	echo "window.close();";
	echo "</script>";
}
switch ($month) {
	case 1:
		$monthName = "January";
		break;
	case 2:
		$monthName = "February";
		break;
	case 3:
		$monthName = "March";
		break;
	case 4:
		$monthName = "April";
		break;
	case 5:
		$monthName = "May";
		break;
	case 6:
		$monthName = "June";
		break;
	case 7:
		$monthName = "July";
		break;
	case 8:
		$monthName = "August";
		break;
	case 9:
		$monthName = "September";
		break;
	case 10:
		$monthName = "October";
		break;
	case 11:
		$monthName = "November";
		break;
	case 12:
		$monthName = "December";
		break;
}



?>

<style>
	*{
		font-family: Arial, Helvetica, sans-serif;
	}
	@media print {
		#btn-print{
			display:none;
		}
		#dontShow{
			display: none;
		}
      }
       table th,td{
       	padding:8px 0px;
       }
</style>
<div style="float: right">
	<button onclick="window.print()" id="btn-print">Print</button>
	<button onclick="window.close()" id="dontShow">Close</button>
</div>

<div style="clear:both;"></div>
<center><h1>SOCETON KHUDRA BABSAY SOMOBAY SOMITI</h1></center>
<center><h1 style="border:1px dashed"><?php echo $monthName ?>, <?php echo $year; ?></h1></center>



<?php if ($show): ?>
<table width="100%" border="2" style="border-collapse:collapse;">
	<thead>
	<tr>
		<th>SL</th>
		<th>Name</th>
		<th>BookNO</th>
		<th>Mobile</th>
		<th>Savings</th>
		<th>Inatallmnt</th>
		
	</tr>
	</thead>
	<tbody>
<?php 
$i = 0;
$totalSaveings = 0;
$totalInstallment = 0;
foreach ($getMonthlyReport as $row) {
	$totalSaveings += $row->t_saveings;
	$totalInstallment += $row->t_installment;
	$i++;
?>
	<tr>
		<td align="center"><?php echo $i ?></td>
		<td style="padding-left: 20px;"><?php echo $row->name; ?></td>
		<td align="center"><?php echo $row->book_id; ?></td>
		<td style="padding-left: 20px;"><?php echo $row->mobile; ?></td>
		<td align="center"><?php echo $row->t_saveings; ?> /-</td>
		<td align="center"><?php echo $row->t_installment; ?> /-</td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="4" align="right" style="padding-right: 20px;"><strong>Total: </strong></td>
		<td align="center"><strong><?php echo $totalSaveings; ?> /-</strong></td>
		<td align="center"><strong><?php echo $totalInstallment; ?> /-</strong></td>
	</tr>
	</tbody>
</table>
<?php endif ?>

<?php if (!$show): ?>
	<center><h2>No Record Found..!</h2></center>
	<center><button onclick="window.close()">Close The Window</button></center>
<?php endif ?>