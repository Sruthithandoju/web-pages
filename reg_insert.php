<?php
	    //$fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
		session_start();
		$fname = $_POST['fname']; 
		$lname = $_POST['lname']; 
		//$lname = mysqli_real_escape_string($con,$lname);
		$email = $_POST['email'];
		//$email = mysqli_real_escape_string($con,$email);
		$password = $_POST['password']; 
		//$password = mysqli_real_escape_string($con,$password);
		$contact = $_POST['contact']; 
		//$contact = mysqli_real_escape_string($con,$contact);
		$city= $_POST['city']; 
		//$city = mysqli_real_escape_string($con,$city);
		$address = $_POST['address']; 
		//$address = mysqli_real_escape_string($con,$address);
		if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($contact) && !empty($city) && !empty($address)){
			$host="localhost";
			$dbUsername="root";
			$dbPassword="";
			$dbname="e-commerce";
			$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
			if(mysqli_connect_error()){
				die('Connect Error('. mysqli_connect_errno().')'.msqli_connect_error());
			}
			else{
				$_SESSION["email"] = $email;
				$SELECT="SELECT email From registration Where email=? Limit 1";
				$INSERT="Insert Into registration (fname,lname,email,password,contact,city,address) values(?,?,?,?,?,?,?)";
				$stmt=$conn->prepare($SELECT);
				$stmt->bind_param("s",$email);
				$stmt->execute();
				$stmt->bind_result($resultEmail);
				$stmt->store_result();
				$rnum=$stmt->num_rows;
				if($rnum==0){
					$stmt->close();
					$stmt=$conn->prepare($INSERT);
					$stmt->bind_param("ssssiss",$fname,$lname,$email,$password,$contact,$city,$address);
					if($stmt->execute()){
						
						$_SESSION['message']='New record inserted succesfully.';
						
						header('Location:products_page.php');
						echo $_SESSION['message'];
						unset($_SESSION['message']);	
					}else{
						echo $stmt->error;
					}
				}else{
					$_SESSION["error"]="Incorrect Username or Password."; 
					echo "Someone already registered using this email";
					header('Location:Sign_Up.php');
				}
				$stmt->close();
				$conn->close();
			}
		}
		else{
			echo "All are required";
			die();
		}
?>