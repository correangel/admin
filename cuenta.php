<?php
/**VALORES */
$year = '2020';
$month= '12';
$day = '14';
$hour = '00';
$minute = '00';
$second = '00';
//function cuenta_regresiva($year, $month, $day, $hour, $minute, $second)
//{
  global $return;
  global $countdown_date;
  $countdown_date = mktime($hour, $minute, $second, $month, $day, $year);
  $today = time();
  $diff = $countdown_date - $today;
  if ($diff < 0)$diff = 0;
  $dl = floor($diff/60/60/24);
  $hl = floor(($diff - $dl*60*60*24)/60/60);
  $ml = floor(($diff - $dl*60*60*24 - $hl*60*60)/60);
  $sl = floor(($diff - $dl*60*60*24 - $hl*60*60 - $ml*60));
// OUTPUT
$resultado = "\n<br>Today's date ".date("F j, Y, g:i:s A")."<br/>";
$resultado .=  "Countdown date ".date("F j, Y, g:i:s A",$countdown_date)."<br/>";
$resultado .=  "\n<br>";
//$return = array($dl, $hl, $ml, $sl);
//return $return;
//}
//cuenta_regresiva($year, $month, $day, $hour, $minute, $second);
//list($dl,$hl,$ml,$sl) = $return;

$resultado .=  "faltan ".$dl." dias ".$hl." horas ".$ml." minutos ".$sl." segundos "."\n<br>";
echo $resultado;

?>

<script type="text/javascript">
	setInterval("tiempo()",1000); // Ejecuto la acción cada segundo

function tiempo(){
    $.post("tiempo.php", function(data){
  $("#tiempo").html(data);
 });
 
}
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <title>cuenta regresiva</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="tmp/js/functions.js"></script>
<script type="text/javascript" src="tmp/js/jquery-1.7.1.min.js"></script>
</head>

<body>  
cuenta regresiva
<div id="tiempo" ><div>
</body>


</html>