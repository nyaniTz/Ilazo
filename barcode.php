

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
</head>
<body>
<div id="qr-reader" style="width: 700px"></div>
<br\><br\><br\>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="result" value=""></div>

<script>
function myFunction() {
    document.getElementById("result1").value=document.getElementById("result").innerText;
}
</script>

<script>
    var x = document.getElementById("result");
    function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);
    x.innerHTML = decodedText;
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
</script>
<br><br><br>

<form action = "user.php" method = "POST">
    <input type="hidden" id="result1" name="barkodreader" value="">
    <input type="submit" name = "barkod" value = "Add" onclick = "myFunction()">
</form>

</body>
</html>