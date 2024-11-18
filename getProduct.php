<?php
include('connect.php');

if(isset($_POST["product"])){

    $productId = mysqli_real_escape_string($conn, $_POST["product"]);

    error_log('Product ID: ' . $productId);

    $query = "SELECT * FROM `receveditems` WHERE `Description` = '$productId'";
    error_log('Query: ' . $query);

    $result = mysqli_query($conn, $query);
    error_log('Result: ' . print_r($result, true));

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        $output = '<div class="table-responsive">
        <table class="table table-bordered">';

        $output .= '<tr><td><strong>Description</strong></td><td>'.$row["Description"].'</td></tr>';
        $output .= '<tr><td><strong>Unit</strong></td><td>'.$row["Unit"].'</td></tr>';
        $output .= '<tr><td><strong>Quantity</strong></td><td>'.$row["Quantity"].'</td></tr>';
        $output .= '<tr><td><strong>Purchasing Cost</strong></td><td>'.$row["Cost"].'</td></tr>';

        $output .= '</table></div>';

        $response = array(
            "status" => "success",
            "productDetails" => $row,
            "html" => $output
        );
    } else {
        $response = array(
            "status" => "error",
            "message" => "No product found with that description."
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
