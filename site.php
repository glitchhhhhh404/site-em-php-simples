<?php

// Define a list of products available for purchase
$products = array(
  array("name" => "Book", "price" => 10.99),
  array("name" => "Shirt", "price" => 20.00),
  array("name" => "Computer", "price" => 800.00),
  array("name" => "Phone", "price" => 600.00)
);

// Check if the form was submitted
if (isset($_POST["submit"])) {
  // Retrieve the selected product
  $selectedProduct = $products[$_POST["product"]];

  // Calculate the total price
  $totalPrice = $selectedProduct["price"] * $_POST["quantity"];

  // Check if the user confirmed the purchase
  if ($_POST["confirm"] == "yes") {
    // Purchase successful
    echo "Purchase successful! Total price: $" . $totalPrice . ". Thank you for shopping with us.";
  } else {
    // Purchase cancelled
    echo "Purchase cancelled.";
  }
} else {
  // Display the products and prices
  echo "Products available for purchase:<br><br>";
  foreach ($products as $i => $product) {
    echo ($i + 1) . ". " . $product["name"] . " - $" . $product["price"] . "<br>";
  }
  ?>

  <!-- Display the purchase form -->
  <br><br>
  <form action="" method="post">
    <label for="product">Select a product:</label>
    <select name="product" id="product">
      <?php
      foreach ($products as $i => $product) {
        echo "<option value='" . $i . "'>" . $product["name"] . "</option>";
      }
      ?>
    </select>
    <br><br>
    <label for="quantity">Enter the quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1">
    <br><br>
    <label for="confirm">Confirm the purchase (yes/no):</label>
    <input type="text" name="confirm" id="confirm">
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
}

?>
