<?php
  //Order processing would go here
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order'])) {
    header("Location: ../index.php?order=True");
    die();
  }
?>
<div class="container">
  <div class="row">
    <div id="cart" class="col-md-4 order-md-2 mb-4">
      <!-- Cart contents updated by jQuery-->
    </div>
    <?php
      $name = (isset($_SESSION["name"]) ? $_SESSION["name"] : "");
      $email = (isset($_SESSION["email"]) ? $_SESSION["email"] : "");
      $address = (isset($_SESSION["address"]) ? $_SESSION["address"] : "");
      $province = (isset($_SESSION["province"]) ? $_SESSION["province"] : "");
      $zip = (isset($_SESSION["zip"]) ? $_SESSION["zip"] : "");
    ?>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate method="POST" action="includes/checkout.php">
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
              <option value="">Canada</option>
              <!-- <option>Canada</option> -->
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
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
            <input type="text" class="form-control" id="zip" value="<?php echo $zip;?>" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <!-- <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div> -->
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
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
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button name="order" class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
      </form>
    </div>
  </div>
  <script src="js/checkout.js"></script>