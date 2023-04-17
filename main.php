<?php

// Include the required classes
require_once('Customer.php');
require_once('Orders.php');
require_once('Product.php');

// customer object
$customer1 = Customer::createCustomer("Ian", "555-1234", "0877213305", "123 Golden ridge");

// Print out customer details
echo "Customer details: <br>";
echo $customer1->toString() . "<br><br>";

// product object
$product = new Product("Shoes", 50);

// order object
$order1 = $customer1->createOrder($product, "TUD Dublin Blanch", $customer1->getHomeAddress());

$order1->setProductDetails($product);

$confirmationMessage = $customer1->saveCustomer();





// Set the order details
$order1->setDateOfOrder(date("Y-m-d"));
$order1->setDropOffAddress("456 Second St");

// Print out order details
echo "Order details: <br>";
echo $order1->toString() . "<br><br>";

echo $confirmationMessage;

?>
