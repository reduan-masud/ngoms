<?php

require_once '../lib/Member.php';
require_once '../lib/Loan.php';




$Member = new Member();

$activeLoanMember = $Member->getActiveLoanMember();
$date = $_GET["date"];
//Convert the date string into a unix timestamp.
$unixTimestamp = strtotime($date);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);



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
<center><h2 style="border:dashed 1px black;">Date: <?php echo $_GET['date']; ?> (<?php echo  $dayOfWeek; ?>)</h2></center>

<table width="100%" border="2" style="border-collapse:collapse;">
	<thead>
	<tr>
		<th>SL</th>
		<th>Name</th>
		<th>Mobile</th>
		<th>Savings</th>
		<th>Inatallmnt</th>
		<th>Remark</th>
	</tr>
</thead>
<tbody>
<?php
$i = 0;
$totalSavings = 0;
$totalInstallments = 0;
foreach ($activeLoanMember as $row) {
	$i++;
  $totalSavings += $Member->getMemberDailyCollection($row->member_id, $date)->savings;
  $totalInstallments+= $Member->getMemberDailyCollection($row->member_id, $date)->installments
?>
	<tr>
		<td align="center"><?php echo $i ?></td>
		<td><?php echo (string)$Member->getMemberData($row->member_id)->name; ?></td>
		<td><?php echo (string)$Member->getMemberData($row->member_id)->mobile; ?></td>
		<td><?php echo (string)$Member->getMemberDailyCollection($row->member_id, $date)->savings; ?>/-</td>
		<td><?php echo (string)$Member->getMemberDailyCollection($row->member_id, $date)->installments; ?>/-</td>
		<td></td>
	</tr>
<?php } ?>
</tbody>
</tfoot>
<tr>
  <td colspan="2"></td>
  <td align="right"><b>Total: </b></td>
  <td><b><?=$totalSavings;?>/-</b></td>
  <td><b><?=$totalInstallments;?>/-</b></td>
</tr>
</tfoot>
</table>
