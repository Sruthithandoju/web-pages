<?php session_start() ?>
<html>
<head>
	<title>Sign_Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    	.foot{
    	    	color:#fff;
    	    	background-color:black;
    	    	padding-bottom:1%;
    	    	padding-top:1%;
    	    }
    	.row-style{
    		margin-top:70px;
    		width:30%;
    	}
    	.image{
    		background:url("bg.jpg") no-repeat center;
    		background-size:100%;
    		width:100%;
    		height:93%;
    	}
    </style>
 </head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">LifeStyle Store</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="file:///C:\Users\sruth\OneDrive\Desktop\MyProject\Sign_up.html"><span class="glyphicon glyphicon-user"> SignUp</span></a></li>
					<li><a href="file:///C:/Users/sruth/OneDrive/Desktop/MyProject/Login_page.html"><span class="glyphicon glyphicon-log-in"> Login</span></a></li> 
				</ul>
			</div>
		</div>
	</nav>
	<div class="container image"><center>
		<div class="row row-style">
		<div class="panel panel-primary">
			<div class="panel-heading">
				SIGN UP
			</div>
			<div class="panel-body">
				<p class="text-warning">Register to make a purchase</p>
				<form class="form" action="reg_insert.php" method="POST">
					<input type="text" name="fname" id="fname" placeholder="FirstName"  required><br><br>
					<input type="text" name="lname" id="lname" placeholder="LastName" required><br><br>
					<input id="email" name="email" type="email" placeholder="Email" pattern="[A-z0-9_]{@gmail.com}" required ><br><br>
					<input id="pwd" name="password" type="password" placeholder="Password" required><br><br>
					<input id="phone" name="contact" type="tel" placeholder="Contact" required><br><br>
					<input id="city" name="city" type="text" placeholder="City" required><br><br>
					<input id="add" name="address" type="text" placeholder="Address" required><br><br>
					<button name="submit" class="btn btn-primary">Register</button> <br>
					<?php
       					if (isset($_SESSION["error"])){
         				echo "<span style='color:red;margin-top:100px'>Already you are a user.</span>";
       					}
    				?>
				</form>
			</div>
			<div class="panel-footer">
				Already a user? <a href="file:///C:/Users/sruth/OneDrive/Desktop/MyProject/Login_page.php">Login here</a>
			</div>
		</div></center>
	</div>
	</div>
	<footer>
		<center>
			<p class="foot">Copyright © Lifestyle Store. All Rights Reserved | Contact Us: +91 90000 00000</p>
		</center>
	</footer>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>