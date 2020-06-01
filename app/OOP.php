<?php 

// OBJECT-ORIENTED PROGRAMMING

// 1. Generate code from following class diagram
class Customer
{
    protected $name;
    protected $deliveryAddress;
    protected $contact;
    protected $active;

    protected function __construct($name, $deliveryAddress, $contact, $active)
    {
        $this->name = $name;
        $this->deliveryAddress = $deliveryAddress;
        $this->contact = $contact;
        $this->active = $active;
    }

    protected function getName()
    {
        return $this->namme;
    }

    protected function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    protected function getContact()
    {
        return $this->contact;
    }

    protected function getActive()
    {
        return $this->active;
    }
}

class Product
{
    protected $weight;
    protected $description;
    protected $price;

    protected function __construct($weight, $price)
    {
        $this->weight = $weight;
        $this->price = $price;
    }

    protected function getWeight()
    {
        return $this->weight;
    }

    protected function getPrice()
    {
        return $this->price;
    }
}

abstract class OrderStatus {
    const CREATE = 0;
    const SHIPPING = 1;
    const DELIVERIED = 2;
    const PAID = 3;
}

class Order extends OrderStatus
{
    protected $createDate;
}

class OrderDetail extends Product
{
    protected $quantity;
    protected $taxStatus;

    protected function calculateSubTotal()
    {

    }

    protected function calculateWeight()
    {

    }
}

// 2. Modify the diagram so that Client would be able to use ExternalPaymentService. Note that modifying existing classes and IPaymentService is prohibited
interface IPaymentService {
    public function pay();
}

class ExteralPaymentService
{
    protected function payByPayPal()
    {

    }
}

class InternalPaymentService implements IPaymentService
{
    public function pay()
    {

    }
}

class Client extends ExteralPaymentService implements IPaymentService
{
    public function pay()
    {

    }

    public function excutePaymentProgress()
    {

    }
}