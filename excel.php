<?php
include 'include/config.php';
header("Content-Disposition: attachment; filename=madhav.com.xls");
$production_id = $_GET['prdid'];
$p_code = $_GET['prodcode'];
$fields = array('PARTY NAME', 'WEIGHT', 'RATE','AMOUNT');
$query = "SELECT * FROM `production` WHERE `prodcode` = '$p_code'";
$query_result = mysqli_query($conn, $query);
$excelData = implode("\t", array_values($fields)) . "\n";
$total = 0;
// $average_rate = 0;
// $total_recod=0;
$rate_total = 0;
$total_amount = 0;
while($row = mysqli_fetch_array($query_result))
{
    $party_name_ex = explode(",",$row['vname']);
    $consume_g_kg_ex = explode(",",$row['consumegasadikg']);
    $consume_g_rate_ex = explode(",",$row['consumegasadirate']);
    $consume_g_total_ex = explode(",",$row['consumetotalamt']);
    $average_rate_in_kg = $row['total_consume_gasadirateinkg'];

    foreach($party_name_ex as $key => $one_party)
    {
           $lineData = array($one_party, $consume_g_kg_ex[$key], $consume_g_rate_ex[$key] ,$consume_g_total_ex[$key]);
           $excelData .= implode("\t", array_values($lineData)) . "\n"; 
           $total += $consume_g_kg_ex[$key];
        //    $rate_total += $consume_g_rate_ex[$key];
           $total_amount += $consume_g_total_ex[$key];
        //    $total_recod++;
    }

   // $lineData = array($row['vname'], $row['consumegasadikg'], $row['consumegasadirate'],$row['consumetotalamt']);
    // array_walk($lineData, 'filterData');
  
}
// $average_rate = $rate_total / $total_recod;
// $total_average = $total_amount / $total;
$fieldss = array('','','');
$excelData .= implode("\t", array_values($fieldss)) . "\n";
$fields = array('Total', $total,'', $total_amount);
$excelData .= implode("\t", array_values($fields)) . "\n"; 

$fieldsss = array('');
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fields = array('','RELIZATION', 'AVERAGE', 'AVERAGE');
$query_pp = "SELECT * FROM `production1` WHERE `prodcode` = '$p_code'";
$query_result_pp = mysqli_query($conn, $query_pp);
$excelData .= implode("\t", array_values($fields)) . "\n";
while($rows = mysqli_fetch_array($query_result_pp)){
    $relization = $rows['realization'];
    $kiti_kg = $rows['kiti'];
    $kiti_rate_per_kg = $rows['rate_kiti_per_kg'];
    $final_kiti_amount = $rows['final_kiti_amount'];
    $total_process_cotton = $rows['process_cotton'];
    $process_cotton_rate = $rows['process_cotton_rate'];
    $total_amt_process_cotton = $rows['total_amt_process_cotton'];
    $total_amt_p_k = $rows['income_total_amt'];
    $labor_work_kg = $rows['total_kg_labor_work'];
    $labor_rate_kg = $rows['labor_rate_per_kg'];
    $final_labor_amt = $rows['final_labor_amt'];
    $expense_total_amt = $rows['expense_total_amt'];
    $difference = $rows['diff'];

}
$fields = array('',$relization, $relization, $average_rate_in_kg);
$excelData .= implode("\t", array_values($fields)) . "\n"; 

$fieldsss = array('');
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fields = array('KITI', $kiti_kg, $kiti_rate_per_kg, $final_kiti_amount);
$excelData .= implode("\t", array_values($fields)) . "\n";

$fields = array('PROCESS COTTON', $total_process_cotton, $process_cotton_rate, $total_amt_process_cotton);
$excelData .= implode("\t", array_values($fields)) . "\n";

$fieldsss = array('Total','','',$total_amt_p_k);
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('');
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('RAW COTTON',$total,'',$total_amount);
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('LABOR EXPENSE',$labor_work_kg, $labor_rate_kg, $final_labor_amt);
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('Total','','',$expense_total_amt);
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('');
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

$fieldsss = array('','','DIFF',$difference);
$excelData .= implode("\t", array_values($fieldsss)) . "\n";

header("Content-type: application/vnd.ms-excel");
echo $excelData;
?>