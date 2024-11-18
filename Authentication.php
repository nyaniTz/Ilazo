
<?php
ob_start();
include 'connect.php';


?>
<?php
session_start();

if (isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to the authentication page
    header("Location: Authentication.php");
    exit();
}

// Add cache control headers to prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f3e0e2;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
}

.log-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}


.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
}


.overlay {
background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(66,5,42,1) 17%, rgba(121,9,66,0.9051995798319328) 29%, rgba(49,69,104,1) 45%, rgba(4,107,128,1) 100%);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
}


.overlay-right {
	right: 0;
}


.social-container {
	margin: 50px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
</style>
</head>
</head>
<body>

<div class="container" id="container">
    <div class="form-container log-in-container">
    <form action="#">
<h1>Login</h1>
<div class="social-container">
<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
</div>
<span>or use your account</span>
<input type="email" placeholder="Email" />
<input type="password" placeholder="Password" />
<a href="#">Forgot your password?</a>
<button style="cursor:pointer;">Log In</button>
</form>
    </div>
    <div class="overlay-container">
    <div class="overlay">
    <div class="overlay-container">
<div class="overlay">
<div class="overlay-panel overlay-right">
<h1>Ilazo pharmacy and cosmetics</h1>
<p>Experiences your wellness and beauty..</p>

</div>
</div>
</div>
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f3e0e2;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
}

.log-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}


.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
}


.overlay {
background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(66,5,42,1) 17%, rgba(121,9,66,0.9051995798319328) 29%, rgba(49,69,104,1) 45%, rgba(4,107,128,1) 100%);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
}


.overlay-right {
	right: 0;
}


.social-container {
	margin: 50px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
.error{
	background:#f04d8b;
	color:white;
	width:80%;
	border-radius:7px;
	margin:10px auto;
}
</style>
</head>
</head>
<body>

<a id="top"></a>

<div class="wrapper">


<header>










    
<div class="container" id="container">
    <div class="form-container log-in-container">
    <form method="POST" action="sessionlooker.php">
<h1>Login</h1>
<?php if(isset($_GET['error'])){?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<div class="social-container">
<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
</div>
<span>or use your account</span>
<input type="email" name="email" placeholder="Email" autocorrect="off" spellcheck="false" />
<input type="password" name="password" placeholder="Password" autocorrect="off" spellcheck="false" />
<a href="#">Forgot your password?</a>
<button type="submit" style="cursor:pointer;" name="login">Log In</button>




</form>
    </div>
    <div class="overlay-container">
    <div class="overlay">
    <div class="overlay-container">
<div class="overlay">
<div class="overlay-panel overlay-right">
<h1>Ilazo pharmacy and cosmetics</h1>
<p>Experiences your wellness and beauty..</p>
</div>
</div>
</div>
    </div>
</div>

</body>
</html>
