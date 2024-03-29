<?php
    //Login script
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        session_start();
        require("../db/db.php");
        
        //Prepared statement to fetch appropriate password from database
		$loginSQL = "SELECT * FROM `iron_login` WHERE i_email = ?";
		$loginQuery = $dbconn->prepare($loginSQL);
		$loginQuery->bind_param("s", cleanUserInput($_POST["email"]));
		$loginQuery->execute();
		$loginResult = $loginQuery->get_result()->fetch_assoc();
         //Check if email actually exists
		if(!$loginResult) {
			header("Location: ../index.php?login&loginerror=true");
		}
        else {
			//If email exists, check that password is correct
			if(password_verify($_POST['password'],  $loginResult["i_password"])) {
				//If correct, log user in by setting session variables
                //Regenerate session ID to prevent hijacking
		        session_regenerate_id();
                

                //Set session variables
				$_SESSION['email'] = $loginResult['i_email'];
                $_SESSION['id'] = $loginResult['i_id'];
                $_SESSION['name'] = $loginResult['i_name'];
                $_SESSION['address'] = $loginResult['i_address'];
                $_SESSION['zip'] = $loginResult['i_zip'];
                $_SESSION['province'] = $loginResult['i_province'];
				
				if(1 == $_SESSION['id']){
					header("Location: ../adminProduct.php");
				}
                else{
					header("Location: ../index.php");
				}
			}
			//Password was incorrect, redirect with error message
			else {
				header("Location: ../index.php?login=true&loginerror=true");
			}	
		}
    }
    //Show login form otherwise
    else {
        if(isset($_GET['loginerror'])) {
            echo "<p id='login-error' class='text-danger text-center'>* Wrong username or password. Please try again.</p>";
        }
?>
<section id="login-form" class="row text-center">
    <div id="brand-container" class="d-none d-lg-block col-5">
        <p class="text-center">Brand Image:</p>
        <!-- Image hosted generously by placeholder.com, a free placeholder image
             generating service
             URL: https://via.placeholder.com/300
             Date Accessed: December 7, 2021
        -->
        <img class="mx-auto" src="https://via.placeholder.com/300">
    </div>
    <form method="POST" action="includes/login.php" class="form-signin rounded col-5 m-auto">
        <h1 class="h3 mb-3 font-weight-normal">User Login</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-lg btn-primary btn-block my-2" value="1">Sign in</button>
        </div>
        <a href="index.php?create=True">Create an account</a>
    </form>
</section>
<?php 
    }
?>