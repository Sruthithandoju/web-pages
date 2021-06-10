<?php
	    //$fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
        session_start();
		if(isset($_POST['submit'])){
			if(isset($_POST['email']) && isset($_POST['password'])){
				$email=filter_input(INPUT_POST, 'email');
				$password=filter_input(INPUT_POST, 'password');
				$host="localhost";
				$dbUsername="root";
				$dbPassword="";
				$dbname="e-commerce";
				$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
				if(mysqli_connect_error()){
					die('Connect Error('. mysqli_connect_errno().')'.msqli_connect_error());
				}
		        else{
				$SELECT="SELECT * From registration Where email = '$email' and password = '$password'";
				$result=$conn->query($SELECT);
				$count=$result->num_rows;
				if($count>0){
					echo "login succesfull";
					//_SESSION['email']=row['email'];
					 //_//SESSION['password']=$row['password'];
					header('Location:products_page.php');
				}
				else{
					$_SESSION["error"] = array("Your username or password was incorrect.");
					header('Location:Login_page.php');
				}
			    }
			}
			else{
				echo "All are required";
				die();
			}
			$stmt->close();
			$conn->close();
		}		
?>