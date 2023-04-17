<?php

require_once 'Person.php';
require_once 'Orders.php';

class Customer extends Person {

    private $homeAddress;
    private $cardNo;
    private $customerId;
    private $phone;


    /**
     * @return mixed
     */

    //Methods

    public static function createCustomer($name, $phone, $cardNo, $homeAddress) {
        $customer = new Customer();
        $customer->setName($name);
        $customer->setPhone($phone);
        $customer->setCardNo($cardNo);
        $customer->setHomeAddress($homeAddress);
    
        return $customer;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPhoneNo(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getEmailAddress(){
        return $this->EmailAddress;
    }

    public function setEmailAddress($emailAddress){
        $this->EmailAddress = $emailAddress;
    }


    public function getHomeAddress() {
        return $this->homeAddress;
    }

    public function setHomeAddress($homeAddress) {
        $this->homeAddress = $homeAddress;
    }

    public function getCardNo() {
        return $this->cardNo;
    }

    public function setCardNo($cardNo) {
        $this->cardNo = $cardNo;
    }

    public function toString() {
        return "Customer name='" . $this->getName() . "', homeAddress='" . $this->homeAddress . "', cardNo='" . $this->cardNo . "', phoneNo='" . $this->getPhoneNo() . "'";
    }


    public function createOrder(Product $product, $pickupAddress, $dropoffAddress) {
        $order = new Order();
        $order->setCustomer($this);
        $order->setProductName($product->getName());
        $order->setProductPrice($product->getPrice());
        $order->setDropoffAddress($dropoffAddress);
        $order->setProduct($product);
        return $order;
    }

    public function saveCustomer(){
        require_once "config.php";
        require_once "cs.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $submittedValues = array();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $submittedValues['name'] = $_POST["name"];
            $submittedValues['email'] = $_POST["email"];
            $submittedValues['phone'] = $_POST["phone"];
        }
        $sql = sprintf( "INSERT INTO %s (%s) values (%s)", "users", implode(", ", array_keys($submittedValues)), ":" . implode(", :", array_keys($submittedValues)) );    

        $statement = $connection->prepare($sql);
        $statement->execute($submittedValues);
        } catch(PDOException $error) {
         echo $sql . "<br>" . $error->getMessage();
        } 

        return "Customer details have been saved to the database.";
    }


    public function login() {

    }

}
?>