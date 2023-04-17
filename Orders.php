<?php

//use DateTime;

class Order {
    private $customer;
    private $customerName;
    private $dropOffAddress;
    //private $pickUpAddress;
    private $orderId;
    private $orderCost;
    private $wasPayed;
    private $dateOfOrder;
    private $orderStatus;
    private $product;
    private $productName;
    private $productPrice;

    // Getters and Setters

    public function getCustomer() {
        return $this->customer;
    }

    public function setCustomer($customer) {
        $this->customer = $customer;
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function getDropOffAddress() {
        return $this->dropOffAddress;
    }

    public function setDropOffAddress($dropOffAddress) {
        $this->dropOffAddress = $dropOffAddress;
    }


    public function getOrderId() {
        return $this->orderId;
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    public function getOrderCost() {
        return $this->orderCost;
    }

    public function setOrderCost($orderCost) {
        $this->orderCost = $orderCost;
    }

    public function getWasPayed() {
        return $this->wasPayed;
    }

    public function setWasPayed($wasPayed) {
        $this->wasPayed = $wasPayed;
    }

    public function getDateOfOrder() {
        $date = new DateTime($this->dateOfOrder);
        return $date->format('Y-m-d H:i:s');
    }
    

    public function setDateOfOrder($dateOfOrder) {
        $this->dateOfOrder = $dateOfOrder;
    }

    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }

    public function setProduct(Product $product) {
        $this->product = $product;
    }

    public function getProduct()
{
    return $this->product;
}


    public function setProductName($productName)
{
    $this->productName = $productName;
}

public function setProductPrice($productPrice)
{
    $this->productPrice = $productPrice;
}

public function getProductName() {
    return $this->productName;
}

public function getProductPrice() {
    return $this->productPrice;
}




    // Methods

    public function toString() {
        $string = "Customer Name: " . $this->customerName . "<br>";
        $string .= "Product Name: " . $this->getProduct()->getName() . "<br>";
        $string .= "Product Price: " . $this->getProduct()->getPrice() . "<br>";
        $string .= "Drop Off Address: " . $this->dropOffAddress . "<br>";
        $string .= "Order ID: " . $this->orderId . "<br>";
        $string .= "Order Cost: " . $this->orderCost . "<br>";
        $string .= "Was Payed: " . $this->wasPayed . "<br>";
        $string .= "Date of Order: " . $this->getDateOfOrder() . "<br>";
        $string .= "Order Status: " . $this->orderStatus . "<br>";
        return $string;
    }

    public function makeOrder(Product $product) {
        $this->customer->setShoppingCart($product);
        $this->orderCost = $product->getPrice();
        $this->wasPayed = true;
        $this->dateOfOrder = new DateTime();
        $this->orderStatus = OrderStatus::PENDING;
        return $this;
    }

    public function setProductDetails(Product $product)
{
    $this->setProductName($product->getName());
    $this->setProductPrice($product->getPrice());
}

}
