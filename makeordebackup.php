<!DOCTYPE html>
<html>
<head>
    <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="library/dselect.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
<?php 

include('connect.php');

$query = "SELECT `Description` FROM `receveditems` ORDER BY `Description` ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

?>
<br><br><br>
<br><br><br>


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
                    <select name="city-box" id="city-box" style="margin-left: 35%;">

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
<br><br><br>

<table class="table table-bordered" id="product-table">
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

        var tableRow = '<tr><td>' + productDetails.Description + '</td><td>' 

            + productDetails.Unit + '</td><td>'
            
           + '<span id="stock-quantity">' + productDetails.Quantity + '</span>' 


            + '</td><td id="product-cost">' + productDetails.Cost + '</td><td>' 
            + '<input type="number" class="form-control" id="purchasing-qty" name="purchasing_qty" min="1" max="' + productDetails.Quantity + '"  oninput="calculateAmount()" required>' 
                                + '</td><td><input type="text" class="form-control" id="amount" name="amount" readonly required></td>' 
                                + '<td><button type="button" onclick="myFunction()" id="product-details" class="btn btn-primary">Add</button></td></tr>';
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

</table><br><br><br><br><br>
<table class="table table-bordered" id="added-products-table">
    <thead>
        <tr>
            <th style="background-color: #343a40;color:white;">#</th>
            <th style="background-color: #343a40;color:white;">Description</th>
            <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
            <th style="background-color: #343a40;color:white;">Amount</th>
            <th style="background-color: #343a40;color:white;">Action</th>
        </tr>
    </thead>
    <tbody id="added-products-details">
    </tbody>
</table>
