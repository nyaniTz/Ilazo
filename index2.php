<?php
include 'session_timeout.php';

// Rest of your page code...
?>

<?php

if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>

<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/jpg" href="image/favicons.jpg">


<title>Ilazo pharmacy and cosmetics</title>
<style>
html {
  scroll-behavior: smooth;
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
#profile1,#profile2,#profile3{
box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
-webkit-box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
-moz-box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
margin-left: 3.5em;
object-fit: cover;
border-radius:5px;
}
#profile1:hover{
 transform: scale(1.05);
overflow:hidden;

}

#profile2:hover{
 transform: scale(1.05);
overflow:hidden;

}
#profile3:hover{
 transform: scale(1.05);
overflow:hidden;

}


.myinfo1{
text-align:center;
background-color:white;
border-radius:14px;
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);

width:46%;
height:332px;
}

.myinfo2{
text-align:center;
margin-top:-326px;

float:right;

background-color:white;
border-radius:14px;
box-shadow: -15px 10px 5px 0px rgba(0,0,0,0.34);
-webkit-box-shadow: -15px 10px 5px 0px rgba(0,0,0,0.34);
-moz-box-shadow: -15px 10px 5px 0px rgba(0,0,0,0.34);

width:46%;
height:332px;

}
.allarticle{
border: 2px solid #e7e7e7;
}
#icomn img{
border:1px solid #003f5c;

padding:15px;
 justify-content: space-between;
object-fit: cover;
-webkit-box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.80); 
box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.80);
}
#icomn{
margin-left:40%;

}
#icomn img:hover{

transform: scale(1.3);
cursor:pointer;

}
html {
  scroll-behavior: smooth;
}
#backtotop{
color:#003f5c;
float:right;
margin-top:-32px;
}
#backtotop a{
text-decoration:none;
}
/*shake image */
#messageison {
  animation: shake 5.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
 
  
  0% { transform: translate(1px, 1px) rotate(100deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(100deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-25deg); }
  60% { transform: scale(2.1); }
  
  60% { transition: all ease 500ms; }
 
  
}
#message{
    margin-left:32%;
    margin-top: -42px;
}
</style>
</head>



<body >

<a id="top"></a>

<div class="wrapper">


<header>

<p><b>Ilazo pharmacy and cosmetics</b></p>

</header>
<br/>
<nav>
<a href="index2.php">Home</a> 


<a href="makeorder.php" >Sales</a> 


<a href="#icomn">Contact me</a>

<a href="logout.php" >Sign Out</a> 

</nav>
<div id="message">

<?php include("rowlessStuff.php"); ?>
</div>
<br>
<br>
<p style="font-size:18px; text-align:center;"><b>  Our Mission </b>
<p style="font-size:15px;"><b>



<marquee behavior="slide" direction="right" width="70%"   loop="1">
            To provide the best and satisfying Costumer services for excellent Results.
</marquee>

</b> </p>


<br/>


 <img  id="profile1" src="image/ph1.jpg" width="320" height="270" alt="To provide the best and satisfying Costumer services for excellent Results.">


 <img  id="profile2" src="image/ph2.jpg" width="320" height="277" alt="To provide the best and satisfying Costumer services for excellent Results.">


 <img  id="profile3" src="image/ph3.jpg" width="320" height="270" alt="To provide the best and satisfying Costumer services for excellent Results.">


<br><br>






<div class="allarticle">
<article class="myinfo1">
<br/><br/>
<h3>“Dear Lord",</h3>


<p style="text-align:left; font-size:15px;"><b>
My business is my passion and I put my success entirely in your hands.<br/>
 I ask that you help me run it efficiently, and with the wisdom to recognize 
and accept the changes that await me.<br/>I know you will speak to me when I’m lost and give me comfort when there are trials. <br/>
Please grant me the knowledge for the things I don’t know and help me serve my customers and clients with a heart like yours.<br/>

I will shine Your light in all that I do and make sure my customers feel it whenever they interact with me and my business.<br/>
 Help me stand by my faith and values in my business in all situations and tribulations.<br/>
<br/>
<i>
In Your Name I pray.
<br/>
Amen.”
</i>
</b>
</p>
<br/>


</article>
<article class="myinfo2">
<br/>
<h3>Projects</h3>

<ol style="text-align:left; font-size:20px;">
<li>passionate and dedicate about what you do.</li>
<li> Customers don’t expect you to be perfect. But they do expect you to fix things when they go wrong.</li>
<li> The purpose of a business is to create and keep customers.</li>
</ol>



</article>
</div>



<br/><br/>


<div id="icomn">


<a href="https://www.instagram.com/nyoxmlimwap" target="_blank"><img src="icon/Insta.png" width="30" height="26" alt="Instagram icon" ></a>
<a href="mailto:cliffmlimwa@gmail.com" target="_blank"><img src="icon/Gmail.png" width="30" height="20" alt="Gmail icon" ></a>
<a href="https://wa.me/+255767622192/?text=urlencodedtext" target="-black"><img src="icon/tsups.png" width="35" height="26" alt="WhatsApp icon" ></a>
<a href="https://www.facebook.com/profile.php?id=100010160807745" target="_blank"><img src="icon/Fb.png" width="30" height="26" alt="facebook icon" ></a>

</div>


<br/><br/>
<a id="backtotop" href="#top" style="text-decoration:none;">back to top</a>



<footer>

 &copy; <small>Ilazo pharmacy and cosmetics 2022</small>
</footer>
</div>

















</body>


</html>

<?php

}

else{


  header("Location:authentication.php");

  exit();

}




?>