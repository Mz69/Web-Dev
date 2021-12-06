<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['password'] == $_POST['confirm-password']) {
        require("../db/db.php");
        $createSQL = "INSERT INTO `iron_login` (`i_id`, `i_email`, `i_password`, `i_name`, `i_address`, `i_zip`, `i_province`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $createQuery = $dbconn->prepare($createSQL);

        $email = cleanUserInput($_POST['email']);
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $name = cleanUserInput($_POST['name']);
        $address = cleanUserInput($_POST['address']);
        $zip = cleanUserInput($_POST['zip']);
        $province =  cleanUserInput($_POST['province']);
        
        
        $createQuery->bind_param("ssssss", $email, $hashedPassword, $name, $address, $zip, $province);
        $createQuery->execute();
        die();
        header("Location: ../index.php");
    }
    else {
    // else {
    //     header("Location: ../index.php?create=true&error=true");
    //     die();
    // }
      // if
      // echo "<p id='form-error' class='text-danger'>* Not all fields were filled in correctly. Please try again.</p>";
?>

<section id="create-account" class="row">
  <form method="POST" action="includes/createAccount.php" class="col-8 m-auto">
    <div class="row">
      <div class="form-group mb-3 col-12">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="exampleInputPassword1">Password</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input id="confirm-password" name="confirm-password" type="password" class="form-control"  placeholder="Confirm Password" required>
        <span id='message'></span>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="address">Address</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Full Name" required>
      </div>

    <div class="form-group mb-3 col-sm-9">
      <label for="state">Province</label>
      <select class="custom-select d-block w-100" id="state" name="province" required>
        <option value="">Choose...</option>
        <option>BC</option>
        <option>AB</option>
        <option>NL</option>
        <option>PE</option>
        <option>NB</option>
        <option>NS</option>
        <option>QC</option>
        <option>ON</option>
        <option>MB</option>
        <option>SK</option>
        <option>YT</option>
        <option>NT</option>
        <option>NU</option>
      </select>
    </div>
    <div class="form-group col-sm-3 mb-5">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" placeholder="Zip" name="zip" required>
      <span id='zip-message'></span>
    </div>
    <div class="form-group col-12 mb-3 mx-auto">
      <button type="submit" id="create-user" class="btn btn-block btn-primary">Create Account</button>
    </div>
  </form>
</section>
<?php
    }
?>
<script src="js/new-user.js"></script>