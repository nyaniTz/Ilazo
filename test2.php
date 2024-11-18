<?php include('mpambe/connectandcreate.php');?>
<!DOCTYPE html>
<html>

<head>
<meta content="initial-scale=1,
		maximum-scale=1, user-scalable=0" name="viewport" />
<meta name="viewport" content="width=device-width" />

<!--Datatable plugin CSS file -->
<link rel="stylesheet" href="library/dataTables.min.css" />
<!--jQuery library file -->
<script type="text/javascript" src=
	"https://code.jquery.com/jquery-3.5.1.js">
</script>

<!--Datatable plugin JS library file -->
<script type="text/javascript" src="library/dataTables.min.js " >
</script>

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
</style>
</head>

<body>

<a name="top"></a>


<div class="ray">



<header>

<p><b>Report</b></p>

</header>


<nav>
<a href="AdminPanel.php">Home</a> 



<a href="report.php" >Report</a> 


<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 



</nav>
<br/>

<br>
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
										<th style="background-color: #343a40;color:white;">Date</th>
										<th style="background-color: #343a40;color:white;">Description</th>
										<th style="background-color: #343a40;color:white;">Purchasing Qty</th>
										<th style="background-color: #343a40;color:white;">Amount</th>
										<th style="background-color: #343a40;color:white;">Cost</th>
							
										</tr>
									</thead>
									<tbody>
										<?php
										    $getOfferType = mysqli_query($conn, "SELECT * FROM `orders`") or die(mysqli_error($conn));
										    if (mysqli_num_rows($getOfferType) >= 1) {
										        
										        while ($rs = mysqli_fetch_array($getOfferType)) {
										            
			
            											?>
            												<tr>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"> <?php echo $rs[9]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="left"><?php echo $rs[2]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"  align="center"><?php echo  $rs[6]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"><?php echo $rs[5]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"><?php echo  $rs[7]; ?></td>
 
            											
            												</tr>
            											<?php
    										        } 
    										        
										        
										        
										    }

										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
<br />

<script>

	/* Initialization of datatables */
	$(document).ready(function () {

        $('#tableID').dataTable( {
        "lengthMenu": [20, 40, 60, 80, 100],
        "pageLength": 20
    } );

		// Paging and other information are
		// disabled if required, set to true
		var myTable = $("#tableID").DataTable({
		paging: false,
		searching: true,
		info: false,
        "lengthMenu": [20, 40, 60, 80, 100],
        "pageLength": 20
		});

		// 2d array is converted to 1D array
		// structure the actions are
		// implemented on EACH column
		myTable
		.columns()
		.flatten()
		.each(function (colID) {

			// Create the select list in the
			// header column header
			// On change of the list values,
			// perform search operation
			var mySelectList = $("<select />")
			.appendTo(myTable.column(colID).header())
			.on("change", function () {
				myTable.column(colID).search($(this).val());

				// update the changes using draw() method
				myTable.column(colID).draw();
			});

			// Get the search cached data for the
			// first column add to the select list
			// using append() method
			// sort the data to display to user
			// all steps are done for EACH column
			myTable
			.column(colID)
			.cache("search")
			.sort()
			.each(function (param) {
				mySelectList.append(
				$('<option value="' + param + '">'
					+ param + "</option>")
				);
			});
		});
	});




</script>

<?php 
include('reportTest.php')

?>
</body>

</html>
