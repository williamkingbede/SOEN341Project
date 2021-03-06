<?php
require_once 'sql_connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>First Page</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/index.css"/>

		<!-- Import JQuery library (REMOVE THIS COMMENT AT SOME POINT) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


		<script type="text/javascript" src="js/main.js"></script>
		<link rel="shortcut icon" href="pictures/favicon.ico" type="image/x-icon">
	</head>

	<body>
		<nav>
			<ul class="menu" id="menu">
				<li pagetarget="home-page">Home</li>
				<li pagetarget="register-page">Create Account</li>
				<li pagetarget="login-page">Login</li>
				<li pagetarget="contact-page">Contact</li>
				<li pagetarget="about-page">About</li>
			</ul>
		</nav>
		<div id="page-content">
			<div id="home-page" style="display: block">
				Home page
			</div>
			<div id="register-page">
				<h1>Register Page</h1>
				<form id="createAccount" action="" method="post">
					<p>Enter your full name:</p>
					<input type="text" name="fullName" placeholder="Full Name"/>
					<p>Enter your email:</p>
					<input type="email" name="email" placeholder="Email Address"/>
					<p>Create a Password:</p>
					<input type="password" name="password" placeholder="New Password" />
					<input type="radio" name="accountType" />
					Teacher's Assistant
					</br>
					<input type="radio" name="accountType" />
					Student
					</br></br>	
					<input type="submit" value = "Submit" />
				</form>
			</div>
			<?php
			$form = "
			<div id='login-page'>
				<h1>Login Page</h1>
				<form id='login' action='' method='post'>
					<p>Enter your email:</p>
					<input type='email' name='email' placeholder='Email Address' required/>
					</br>
					<p>Enter your password:</p>
					<input type='password' name='password' placeholder='Password' required/>
					<input type='submit' value='Enter' name='logbtn'/>
				</form>	
			</div>";

			echo $form;

			//authentification
			if(isset($_POST['logbtn']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];

				$dbsearch = "SELECT * FROM Ta where email = '$email'";
				$query = mysqli_query($dbc, $dbsearch); //pass this query to our db
				$found = mysqli_num_rows($query); //returns number of found rows

				//entry is found
				if($found == 1)
				{
					$row = mysqli_fetch_assoc($query);
					$dbfname = $row['fname'];
					$dblname = $row['lname'];
					$dbpassword = $row['password'];
					$dbusername = $row['email'];
					//password is correct
					if($password == $dbpassword)
					{
						echo $welcome = "<h3>Login succesful, welcome  $dbfname!";
					}
					else echo $wrongpassword = " <h3> Wrong password, please try again! </h3>";
				}
				else echo $nouserfound = "<h3> No such user found, please try again or register!</h3>";
			}

			;?>

			<div id="contact-page">
				Contact page
			</div>
			<div id="about-page">
				About page
			</div>
		</div>
		<footer>
			<div class="legal">Copyright 2016 Mikel Shifrin.</div>
			<div class="contact">Contact us: 1800-123-4567 Proud company since 2016</div>
		</footer>	
	</body>
</html>
