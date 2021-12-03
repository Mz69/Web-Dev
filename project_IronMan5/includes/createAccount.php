<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require("../db/db.php");
        $createSQL = "INSERT INTO `iron_login` (`i_id`, `i_email`, `i_password`) VALUES (NULL, ?, ?)";
        $createQuery = $dbconn->prepare($createSQL);

        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $createQuery->bind_param("ss", $_POST['email'], $hashedPassword);
        $createQuery->execute();
        
        header("Location: ../index.php");
    }
    else {
?>
<section id="create-account" class="row">
  <form method="POST" action="includes/createAccount.php" class="col-8 m-auto">
    <div class="row">
      <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Full Name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    
    <div class="form-group">
      <label for="country">Country</label>
      <select class="custom-select d-block w-100" id="country" required>
        <option value="">Choose...</option>
        <option>United States</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid country.
      </div>
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="custom-select d-block w-100" id="state" required>
        <option value="">Choose...</option>
        <option>California</option>
      </select>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="form-group">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" placeholder="" required>
      <div class="invalid-feedback">
        Zip code required.
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>
<?php
    }
?>