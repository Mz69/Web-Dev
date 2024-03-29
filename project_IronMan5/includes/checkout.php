<?php
  //Order processing would go here, not implemented
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order'])) {
    session_start();
    $_SESSION['cart'] = array();
    header("Location: ../index.php?order=True");
    die();
  }
?>
<link href="css/cart.css" rel="stylesheet">
<!-- Checkout template taken and modified from Bootstrap Checkout examples.
     This template is also used in part in the 'cart.php' file.
     URL: https://getbootstrap.com/docs/4.5/examples/checkout/
     Date Accessed: December 2, 2021
 -->
<div class="container">
  <div class="row">
    <div id="cart" class="col-md-4 order-md-2 mb-4">
      <!-- Cart contents updated by jQuery-->
    </div>
    <?php
      //Values autofilled if user is signed in
      $name = (isset($_SESSION["name"]) ? $_SESSION["name"] : "");
      $email = (isset($_SESSION["email"]) ? $_SESSION["email"] : "");
      $address = (isset($_SESSION["address"]) ? $_SESSION["address"] : "");
      $province = (isset($_SESSION["province"]) ? $_SESSION["province"] : "");
      $zip = (isset($_SESSION["zip"]) ? $_SESSION["zip"] : "");
    ?>

    <!-- Start of checkout form -->
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" method="POST" action="includes/checkout.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  value="<?php echo $name;?>"required>
            <div class="invalid-feedback">
              Valid name is required.
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" value="<?php echo $email;?>">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" value="<?php echo $address;?>" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option selected>Canada</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Province</label>
            <select class="custom-select d-block w-100" id="province" required>
              <option <?php echo (($province == "BC")? "selected": "");?>>BC</option>
              <option <?php echo (($province == "AB")? "selected": "");?>>AB</option>
              <option <?php echo (($province == "NL")? "selected": "");?>>NL</option>
              <option <?php echo (($province == "PE")? "selected": "");?>>PE</option>
              <option <?php echo (($province == "NB")? "selected": "");?>>NB</option>
              <option <?php echo (($province == "NS")? "selected": "");?>>NS</option>
              <option <?php echo (($province == "QC")? "selected": "");?>>QC</option>
              <option <?php echo (($province == "ON")? "selected": "");?>>ON</option>
              <option <?php echo (($province == "MB")? "selected": "");?>>MB</option>
              <option <?php echo (($province == "SK")? "selected": "");?>>SK</option>
              <option <?php echo (($province == "YT")? "selected": "");?>>YT</option>
              <option <?php echo (($province == "NT")? "selected": "");?>>NT</option>
              <option <?php echo (($province == "NU")? "selected": "");?>>NU</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control"  id="zip" value="<?php echo $zip;?>" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit"  name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <!-- Some pattern matching for credit card, expiration, and CVV -->
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number"
            pattern="[0-9]{16}" title="16 digit number required" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" pattern="[0-9]{2}/?[0-9]{2}" class="form-control"
            title="MM/YY format" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" pattern = "[0-9]{3}" class="form-control" id="cc-cvv" placeholder=""
            title="3 digit format" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button name="order" id="order" class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
      </form>
      <!-- End of checkout form -->
    </div>
  </div>
  <script src="js/checkout.js"></script>