<?php require './php/session.php' ?>
<?php
$nameErr = $emailErr = $streetErr = $stateErr = $zipErr = "";
$name = $email = $street = $state = $zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["street"])) {
    $streetErr = "Street Address is required";
  } else {
    $street = test_input($_POST["street"]);
    if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$street)) {
      $streetErr = "Only letters, numbers and white space allowed";
    }
  }

  if (empty($_POST["state"])) {
    $stateErr = "State is required";
  } else {
    $state = test_input($_POST["state"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip is required";
  } else {
    $zip = test_input($_POST["zip"]);
    if (!preg_match("/^\d{5}$/",$zip)) {
      $zipErr = "Must be exactly 5 digits";
    }
  }

  if($zipErr == ""
    && $stateErr == ""
    && $streetErr == ""
    && $emailErr == ""
    && $nameErr == ""
    && $state != ""
    && $zip != ""
    && $street != ""
    && $email != ""
    && $name != "")
    {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['state'] = $state;
        $_SESSION['street'] = $street;
        $_SESSION['zip'] = $zip;
        header('Location: confirmation.php');
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = 'Check Out'; ?>
<?php $desc = 'Finalize Shipping Information'; ?>
<?php $currentPage = 'check'; ?>
<?php $header = 'Assignment Portal'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <main>
        <h2>Check Out - Shipping Information</h2>
        <div id="checkout">
            <p><span class="error">* required field</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label> Name: <span><input type="text" name="name" value="<?php echo $name;?>">
                        <span class="error">* <?php echo $nameErr;?></span></span></label>
                <br>
                <label> E-mail: <span><input type="text" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailErr;?></span></span></label>
                <br>
                <label> Street Address: <span><input type="text" name="street" value="<?php echo $street;?>"><span
                            class="error">* <?php echo $streetErr;?></span></span> </label>
                <br>
                <label> State: <span> <input type="text" name="state" value="<?php echo $state;?>"><span class="error">*
                            <?php echo $stateErr;?></span></span> </label>
                <br>
                <label> Zip Code: <span> <input type="text" name="zip" value="<?php echo $zip;?>"><span class="error">*
                            <?php echo $zipErr;?></span></span> </label>
                <br>
                <input type="submit" class="button" name="submit" value="Submit">
            </form>
            <form method="post" action="<?php echo htmlspecialchars('./cart.php');?>">
                <input type="submit" class="button" name="cart" value="Return to Cart">
            </form>
        </div>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>