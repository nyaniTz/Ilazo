<?php include('mpambe/connectandcreate.php');?>

<?php
// Assuming $conn is your database connection

// Get the current date (today)
$currentDate = date('Y-m-d');

// Calculate the start and end dates for the current week
$startOfWeek = date('Y-m-d', strtotime('last Monday', strtotime($currentDate)));
$endOfWeek = date('Y-m-d', strtotime('next Sunday', strtotime($currentDate)));

// Calculate the start and end dates for the current month
$startOfMonth = date('Y-m-01', strtotime($currentDate));
$endOfMonth = date('Y-m-t', strtotime($currentDate));

// Run queries to get the totals for each category

// Total amount for today
$queryToday = "SELECT SUM(Amount) as totalToday FROM orders WHERE Date = '$currentDate'";
$resultToday = mysqli_query($conn, $queryToday);
$rowToday = mysqli_fetch_assoc($resultToday);

// Total amount for the current week
$queryWeek = "SELECT SUM(Amount) as totalWeek FROM orders WHERE Date BETWEEN '$startOfWeek' AND '$endOfWeek'";
$resultWeek = mysqli_query($conn, $queryWeek);
$rowWeek = mysqli_fetch_assoc($resultWeek);

// Total amount for the current month
$queryMonth = "SELECT SUM(Amount) as totalMonth FROM orders WHERE Date BETWEEN '$startOfMonth' AND '$endOfMonth'";
$resultMonth = mysqli_query($conn, $queryMonth);
$rowMonth = mysqli_fetch_assoc($resultMonth);
?>

<table style="border: 1px;width:100%">
  <tr>
    <th style="background-color: #343a40;color:white;">No</th>
    <th style="background-color: #343a40;color:white;">Today</th>
    <th style="background-color: #343a40;color:white;">Week</th>
    <th style="background-color: #343a40;color:white;">Month</th>
  </tr>
  <tr>
    <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?></td>
    <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $rowToday['totalToday']; ?></td>
    <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $rowWeek['totalWeek']; ?></td>
    <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $rowMonth['totalMonth']; ?></td>
  </tr>
</table>

