<?php
include 'session_timeout.php';

// Rest of your page code...
?>


<?php


if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    // Check if the "Sign Out" button is clicked
    if (isset($_GET['logout'])) {
        // Destroy the session
        session_destroy();
        // Redirect to the authentication page
        header("Location: Authentication.php");
        exit();
    }
    // Rest of your code...

?>



<!DOCTYPE html>
<html>
<head>
    <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="library/dselect.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <!--START Bootstrap CSS ADDED BY MERCEL-->
        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
  
        <script src="library/dselect.js"></script>
        <!--END Bootstrap CSS ADDED BY MERCEL-->
<meta content="initial-scale=1,
		maximum-scale=1, user-scalable=0" name="viewport" />
<meta name="viewport" content="width=device-width" />

<!--Datatable plugin CSS file -->
<link rel="stylesheet" href="library/dataTables.min.css" />
<link rel="stylesheet" href="library\css\css1.css" />
<link rel="stylesheet" href="library\css\css2.css" />

<script type="text/javascript" src="library\js\querry1.js "  ></script>
<script type="text/javascript" src="library\js\querry2.js " ></script>
<script type="text/javascript" src="js\querry3.js " ></script>
<script type="text/javascript" src="library\querry4.js " ></script>
<script type="text/javascript" src="library\querry5.js "></script>
<script type="text/javascript" src="library\querry6.js " ></script>
<script type="text/javascript" src="library\querry7.js " ></script>
<script type="text/javascript" src="library\queery8.js"  ></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <style>


    /* Hide the print and remove buttons */
    @media print {
  .remove-btn,
  .print-btn {
    display: none;
  }
  .page-title {
    display: none;
  }

  .buttons-container {
    display: none;
  }
  .added-products-table{

   display:none;
  }
 

}



@media print {
  .nembo {
    display: block !important;
  }
  #added-products-table {
  width: 20% !important;
  font-size: 11px;
  text-align: center !important;
  margin-left: 36%;

}
#added-products-table1 {
  width: 38% !important;
  text-align: center !important;
  margin-left: 38%;
}
#embed-border{
    display: none !important;

}


#added-products-table_filter input[type="search"] {
  /* Custom styles for search input */
  display: none !important;
}

#added-products-table_filter label {
    display: none !important;
}
#added-products-table_length,
#added-products-table_previous,
#added-products-table_next {
  display: none !important;;
}
span{

    display: none !important;;
}
.condolicence{

    display: block !important; 
}


}








html,body{


    width:99.8%;
    height:100%;
}

header{
position:relative;

width: 100%;
 color: #003f5c;
  border-bottom: 2px solid #e7e7e7;
font-size:25px;
text-align:center;

font-weight:bold;
padding:13px;

}
nav {

width: 100%;

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
width:100%;
height:30px;
text-align:center;

box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-webkit-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-moz-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);

}

#backtotop{
color:#003f5c;
float:right;
margin-top:-32px;
}
#backtotop a{
text-decoration:none;
}





.table.dataTable.no-footer {

    border-bottom-color: #e3dfde;

}

/* Green */



</style>
</head>
<body>

<header class="remove-btn">


<p><b>Sales</b></p>

</header class="remove-btn">


<nav class="remove-btn">
<a href="index2.php">Home</a> 

<a href="Authentication.php?logout=true">Sign Out</a>


<a href="#icomn">Contact me</a>



</nav>











<?php
include('connect.php');
if (isset($_POST['add'])) {
    // Retrieve values from the form
    $description = $_POST['description'];
    $unit = $_POST['Unit'];
    $purchasing_qty = $_POST['purchasing_qty'];
    $amount = $_POST['amount'];
    $product_id = $_POST['product_id'];

    $stmt = mysqli_prepare($conn, "INSERT INTO ordertracker (Description, PurchasingQty, Amount) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sii", $description, $purchasing_qty, $amount);

    $quantity_sold = $_POST['purchasing_qty'];

    // Query to update the quantity of the received item
    $update_query = "UPDATE receveditems SET Quantity = Quantity - ? WHERE id = ?";
    $update_stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($update_stmt, "ii", $quantity_sold, $product_id);
    mysqli_stmt_execute($update_stmt);

    // Check if the update was successful
    if (mysqli_affected_rows($conn) > 0) {
        // Update was successful
    } else {
        // Update failed
    }

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        // Redirect to a different page using the HTTP 302 status code
        echo '<script>
        setTimeout(function() {
            window.location.href = "makeorder.php";
        }, 0); // Delay in milliseconds (1000ms = 0second)
    </script>';
    
       
exit;
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

 
<?php 



$query = "SELECT `Description` FROM `receveditems` ORDER BY `Description` ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

?>
<br>


<table style="width:100%;">
    <tr>
        <td id="header" style="border:0px;"></td>
    </tr>
    <tr>
        <td id="table-form" style="border:0px;">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form>
                    <select class="remove-btn" name="city-box" id="city-box" style="margin-left: 35%;">

                            <option value="">Select Product</option>
                            <?php 
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["Description"].'">'.$row["Description"].'</option>';
                            }
                            ?>                         
                        </select>
                    </form>        
                </div>
                <div class="col-md-4"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td id="table-data" style="border:0px;"></td>
    </tr>
</table>
<div class="nembo" style="margin-left: 38%; display: none;">
<img src="image/Nembo2.JPG"  >
<br>
<h5>Ilazo pharmacy and Consmetics</h5>
<h8>ilazo D-centre 46 , ipagala , Meriwa road</h8><br>
<h8>Register # 56749</h8><br>
Phone # 0674058063
<p>Cashie # 0100 <?php echo date('d/m/Y H:i:s'); ?></p>

</div>



<form method="post">
<table class="table table-bordered remove-btn" id="product-table">
        <thead>
            <tr>
               
                <th>Description</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>purchasing Qty</th>
                <th>Amount</th>
                <th>Action</th>
            
            </tr>
        </thead>
        <tbody id="product-details">
            <tr id="product-details-row">
                <td colspan="9">Select a product to view details.</td>
            </tr>
   
    

 
    <script>
var select_box_element = document.querySelector('#city-box');
dselect(select_box_element, { search: true });

$('#city-box').change(function(){
    var product = $(this).val();
    console.log('Selected product:', product);
    $.ajax({
        url: 'getProduct.php',
        method: 'POST',
        data: {product: product},
        success: function(response){
    console.log('Product details response:', response);
    try {
        var jsonResponse = JSON.stringify(response);
        console.log('JSON response:', jsonResponse);
        var productDetails = response.productDetails;
        console.log('Parsed product details:', productDetails);

        var tableRow = '<tr>' +

        '' +
'<input type="hidden" name="product_id" value="' + productDetails.id + '">' +
'' +
'<td>' +
'<input type="hidden" name="description" value="' + productDetails.Description + '">' +
'<span>' + productDetails.Description + '</span>' +
'</td>' +

'</td>' +
'<td>' +
'<input type="hidden" name="Unit" value="' + productDetails.Unit + '">' +
productDetails.Unit  +
'</td>' +
'<td>' +


'<span id="stock-quantity">' + productDetails.Quantity + '</span>' +

'</td>' +
'<td id="product-cost">' + productDetails.Cost + '</td>' +
'<td>' +

'<input type="number" name="purchasing_qty" class="form-control" id="purchasing-qty" name="purchasing_qty" min="1" max="' + productDetails.Quantity + '" oninput="calculateAmount()" required>' +
'</td>' +
'<td>' +
'<input type="text" class="form-control" id="amount" name="amount" readonly required>' +
'</td>' +
'<td>' +
'<button type="submit" name="add" id="product-details" class="btn btn-primary">Add</button>' +
'</td>' +
'</tr>';

        $('#product-details').html(tableRow);
    } catch (e) {
        console.log('Error parsing product details:', e);
        $('#product-details').html('<tr><td colspan="5">Error retrieving product details.</td></tr>');
    }
},




});
});




function calculateAmount() {
    var purchasingQty = parseFloat(document.getElementById("purchasing-qty").value);
    var cost = parseFloat(document.getElementById("product-cost").innerHTML);
    var amountBox = document.getElementById("amount");
    var quantity = parseFloat(document.getElementById("stock-quantity").innerHTML);

    if (purchasingQty > quantity) {
        alert("Purchasing quantity is greater than available quantity!");

    document.getElementById("purchasing-qty").value = quantity;
    var amount = quantity * cost;
        amountBox.value = amount.toFixed(2);

   
    } else {
        var amount = purchasingQty * cost;
        amountBox.value = amount.toFixed(2);
    }
}











</script>



</form>
</tbody>

</table>
</form>

<br>




<table class="table table-bordered " id="added-products-table">
    <thead>
        <tr>
            <th style="background-color: #343a40;color:white;">#</th>
            <th style="background-color: #343a40;color:white;">Description</th>
            <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
            <th style="background-color: #343a40;color:white;">Amount</th>
            <th class="remove-btn" style="background-color: #343a40;color:white;">Action</th>
        </tr>
    </thead>
    <tbody id="added-products-details">
        <?php
        $sql = "SELECT * FROM ordertracker";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $description = $row['Description'];
            $purchasing_qty = $row['PurchasingQty'];
            $amount = $row['Amount'];
            $order_id = $row['id'];
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $purchasing_qty; ?></td>
                <td><?php echo $amount; ?></td>
                <td>
                    
                
             
            
                <button type="button" style="background-color:#ffff;border:none; " class="btn btn-danger btn-sm remove-btn" onclick="removeRow(this, '<?php echo $description; ?>', <?php echo $purchasing_qty; ?>, <?php echo $order_id; ?>)">
  <div class="item">
  
   <img   src="delete.png" style=" width:18px;" id="delete2">
  </div>
  </button>
            
            
            
            
            </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>





<table class="table table-bordered" id="added-products-table1">
    <thead>
        <tr>
            <th class="text-center" style="background-color: #343a40; color: white;">Total</th>
        </tr>
    </thead>
    <tbody id="added-products-details">
        <?php
        $sql = "SELECT SUM(Amount) AS totalAmount FROM ordertracker";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $totalAmount = $row['totalAmount'];
        ?>
        <tr>
            <td class="text-center"><?php echo $totalAmount; ?></td>
        </tr>
    </tbody>
</table>


<div class="condolicence" style="margin-left: 38%; display:none;">
   
            <p style="color:#333" >Experience your wellness and beauty </p>
        
            <p style="color:#333">Thanks for shopping at ilazo pharmacy</p>
        
</div>



</div>






<script>
function removeRow(row, description, purchasing_qty, order_id) {
    var row_id = row.parentNode.parentNode.rowIndex;
    var table = document.getElementById("added-products-table");
    table.deleteRow(row_id);

    $.ajax({
        url: "update_quantity.php",
        type: "POST",
        data: {
            order_id: order_id,
            description: description,
            purchasing_qty: purchasing_qty
        },
        success: function(response) {
            console.log("Row removed and quantity updated successfully");
            alert(response);
        },
        error: function() {
            console.log("Error removing row and updating quantity");
            alert("Error removing row and updating quantity");
        }
    });
}
</script>

<button type="button" class="btn btn-primary remove-btn" onclick="printOrder()">Print Order</button>

<script>
function printOrder() {
  if (confirm("Are you sure you want to print this order?")) {
    // Call a PHP script to insert data into the orders table
    var xhr1 = new XMLHttpRequest();
    xhr1.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);

        // Once insertion is complete, remove the row from the table
        var row = document.getElementById("added-products-details").querySelector("tr");
        row.remove();

        // Call a PHP script to remove data from the ordertracker table
        var xhr2 = new XMLHttpRequest();
        xhr2.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            // Call a function to print the order
            print();
          }
          else{
            saveAsPDF();
          }
        };
        xhr2.open("GET", "remove_ordertracker_data.php", true);
        xhr2.send();
      }
    };
    xhr1.open("GET", "insert_order_data.php", true);
    xhr1.send();
  }
}
</script>











<script>
$(document).ready(function () {
  var myTable = $("#added-products-table").DataTable({
    paging: true,
    searching: true,
    info: false,
    "lengthMenu": [2, 40, 60, 80, 100],
    "pageLength": 8,
    
   


   
  });
});
</script>

<?php

}

else{


  header("Location:Authentication.php");

  exit();

}




?>
