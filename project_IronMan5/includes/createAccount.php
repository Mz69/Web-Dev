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
<form method="POST" action="includes/createAccount.php">
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
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
    }
?>