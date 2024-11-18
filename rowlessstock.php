<html> 
<body> 
<?php  date_default_timezone_set('Africa/nairobi'); 
$italy_current_time = date("d-m-Y H:i:s"); 
 
 
?> 
<br><br><br> 
<input type="datetime-local"> 
<input type="text" value="<?php  echo $italy_current_time ?> "> 
 
</body> 
</html>
<html> 
<body> 
<?php  date_default_timezone_set('Africa/nairobi'); 
$italy_current_time = date("y-m-d"); 
 
$now = time(); 
$your_date = strtotime("2022-8-15"); 
 
$datediff =  $your_date-$now ; 
 
echo round($datediff / (60 * 60 * 24)); 
 
if($your_date<1){ 
 echo "one day remain"; 
 
} 
else{ 
 
 echo "Enjoy"; 
 
 
} 
 
?> 
<br><br><br> 
<input type="datetime-local"> 
<input type="text" value="<?php  echo $italy_current_time ?> "> 
 
</body> 
</html>