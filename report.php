<?php
include 'session_timeout.php';

// Rest of your page code...
?>


<?php


include 'connect.php';
include('mpambe/connectandcreate.php');

?>

<?php

if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>
<!DOCTYPE html>
<html>

<head>
<meta content="initial-scale=1,
		maximum-scale=1, user-scalable=0" name="viewport" />
<meta name="viewport" content="width=device-width" />

<!--Datatable plugin CSS file -->
<link rel="stylesheet" href="library/dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js "  ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js " ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js " ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js "  ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<style>
	td {
	text-align: center;
	}

    body{

    
}
header{
position:relative;


color: #003f5c;
border-bottom: 2px solid #e7e7e7;
font-size:25px;
text-align:center;

font-weight:bold;
padding:13px;

}
nav {



-webkit-box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.82); 
box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.82);
padding:13px;


}
nav a{

padding-right:30px;
color:black;
cursor:pointer;
text-decoration:none;
list-style-type: none; 
font-weight:bold;
font-size:18px;
}

nav a:hover{

font-size:19px;
border-bottom:2px solid #003f5c;
}
footer{

height:30px;
text-align:center;

box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-webkit-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-moz-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);

}
.form-group {
  display: inline-block;
  margin-right: 10px;
  
}



/* Modal styles */
.modal {
            display: none; /* Hide the modal by default */
            position: fixed; /* Fixed position */
            z-index: 1; /* Ensure it appears on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scrolling if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Center the modal on the screen */
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
        }
		.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 3px 11px;
    border: 1px solid #b0b0b0;
    border-radius: 19px;
    background: #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#b3b3b3));
    background: -moz-linear-gradient(top, #ffffff, #b3b3b3);
    background: linear-gradient(to bottom, #ffffff, #b3b3b3);
    -webkit-box-shadow: #ffffff 0px 0px 40px 0px;
    -moz-box-shadow: #ffffff 0px 0px 40px 0px;
    box-shadow: #ffffff 0px 0px 40px 0px;
    font: normal normal bold 15px times new roman;
    color: #332f33;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid #cacaca;
    background: #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#d7d7d7));
    background: -moz-linear-gradient(top, #ffffff, #d7d7d7);
    background: linear-gradient(to bottom, #ffffff, #d7d7d7);
    color: #332f33;
    text-decoration: none;
}
.button:active {
    background: #b3b3b3;
    background: -webkit-gradient(linear, left top, left bottom, from(#b3b3b3), to(#b3b3b3));
    background: -moz-linear-gradient(top, #b3b3b3, #b3b3b3);
    background: linear-gradient(to bottom, #b3b3b3, #b3b3b3);
}

.password {
  -webkit-appearance: none;
  background-color: white;
  color: inherit;
  outline: none;
  resize: none;
  box-sizing: border-box;
  border-radius: 0.2em;
  border: 1px solid lightgray;
  box-shadow: none;
  font-family: inherit;
  font-size: inherit;
  font-weight: inherit;
  padding: 0.6em;
  margin-right: 0.6em;
  min-width: 15em;
}



</style>
</head>

<body>

<a name="top"></a>

<?php include('rowless.php');?><br>
<div class="ray">



<header>

<p><b>Report</b></p>

</header>


<nav>
<a href="AdminPanel.php">Home</a> 


<a onclick="openModal()">Received Items</a>




<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 



</nav>
<br/>

<br>




<form id="dateRange">
    <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" class="form-control" id="startDate" pattern="\d{4}-\d{2}-\d{2}">
    </div>
    <div class="form-group">
        <label for="endDate">End Date:</label>
        <input type="date" class="form-control" id="endDate" pattern="\d{4}-\d{2}-\d{2}">
    </div>
</form>






<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="">
      
		
	<input type="password" id="password" placeholder="Enter Password" value="" class="password" autofocus>
	<br><br>
<button class="button" onclick="checkPassword()">Submit</button>

    </div>
</div>

<script>
  function openModal() {
  // Display the modal
  document.getElementById("myModal").style.display = "block";
}
function checkPassword() {
  var password = document.getElementById("password").value;

  // Send the password to the server for validation
  fetch("validate_password.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "password=" + encodeURIComponent(password)
  })
    .then(response => response.text())
    .then(data => {
      console.log(data); // Output the response to the console for debugging
      try {
        var jsonData = JSON.parse(data);
        if (jsonData.valid) {
          // Password is correct, redirect to display.php
          window.location.href = "display.php";
        } else {
          // Password is incorrect
          alert("Incorrect password. Please try again.");
		  location.reload(); // Refresh the page
        }
      } catch (error) {
        console.error("Error:", error);
        // Handle the error appropriately
      }
    })
    .catch(error => {
      console.error("Error:", error);
      // Handle the error appropriately
    })
    .finally(() => {
      // Hide the modal
      document.getElementById("myModal").style.display = "none";
    });
}



</script>




<div class="example"></div>
<!--HTML tables with student data-->
<div class="row">
				<div class="col-md-12">
					<div class="tile">
                        <br><br>
						<div class="tile-body">
							<div class="table-responsive">
								<table class="display table-striped table-bordered table-sm" id="tableID">
                                <br><br>
                                <thead>
										<tr align="center">
										<th style="background-color: #343a40;color:white;text-align:center;">No</th>
										<th style="background-color: #343a40;color:white;text-align:center;">Date</th>
										<th style="background-color: #343a40;color:white;text-align:center;">Description</th>
										<th style="background-color: #343a40;color:white;text-align:center;">Purchasing Qty</th>
								
										<th style="background-color: #343a40;color:white;text-align:center;">Cost</th>
							
										</tr>
									</thead>
									<tbody>
										<?php
										    $getOfferType = mysqli_query($conn, "SELECT * FROM `orders`") or die(mysqli_error($conn));
										    if (mysqli_num_rows($getOfferType) >= 1) {
												$sn=1;
										        while ($rs = mysqli_fetch_array($getOfferType)) {
										            
			
            											?>
            												<tr>
															

															<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"> <?php echo $sn;?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"> <?php echo $rs[9]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="left"><?php echo $rs[2]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"  align="center"><?php echo  $rs[6]; ?></td>

            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"><?php echo  $rs[7]; ?></td>
 
            											
            												</tr>
												</form>
            											<?php
    										        
												
											$sn++;}} else { ?>
						  <tr>
						   <td colspan="8">No data found</td>
						  </tr>
					   <?php } ?>

									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
<br />












<script>
$(document).ready(function () {
    var myTable = $("#tableID").DataTable({
        // Other options...

		paging: true,
		searching: true,
		info: false,

		
        "lengthMenu": [1, 40, 60, 80, 100],
        "pageLength": 20,

        "columns": [
            { "data": "id" },
            { "data": "date", "dateFormat": "yyyy-mm-dd" }, // Add dateFormat option
            { "data": "customer" },
            { "data": "product" },
            { "data": "quantity" },
            { "data": "price" }
        ]
    });

    // Add a listener to the date range input fields
    $('#dateRange').on('change', function() {
        var start = moment($('#startDate').val());
        var end = moment($('#endDate').val());

        // Use the column().data() method to get the date column data as an array
        var dates = myTable.column(1).data().toArray();

        // Loop through the dates array and filter out any dates that are not within the selected range
        var filteredDates = dates.filter(function(date) {
            var d = moment(date);
            return d.isBetween(start, end, null, '[]');
        });

        // Use the column().search() method to filter the date column
        myTable.column(1).search(filteredDates.join('|'), true, false).draw();
    });
});

</script>



<?php 
include('reportTest.php')

?>
</body>

</html>
<?php

}

else{


  header("Location:authentication.php");

  exit();

}




?>