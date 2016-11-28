<?php

trait getDiscountMethod{
    public function getDiscount()
    {
        return $this->discount;
    }
}
trait setDiscountMethod{
    public function setDiscountMethod()
    {
        return $this->discount;
    }
}


interface forProduct
{
    public function getPrice($amount = 1);
    public function Render($amount = 1);
}

abstract class Products implements forProduct {
    public $name;
    public $price;
    public $discount;
    public $unit;

    public function getId() {
            return $this->id;
    }
    public function getName() {
            return $this->name;
    }
    public function getPrice($amount = 1) {
            $this->setDiscountMethod($amount);
            if ($this->getDiscount() == 0) {
                $realprice =  $amount*$this->price;
                 return $realprice; }
            else {
                $realprice = (($this->price*(100-$this->getDiscount()))*$amount/100);
                    return $realprice;}
}
    abstract public function getDiscount();

    public function getShiping(){
                        if ($this->getDiscount() == 0) return 250;
                        else return 300;
    }
    public function Render($amount = 1){
        echo 'Ваш заказ '.$this->name.' в колличестве '.$amount.' '.$this->unit."</br>";
        echo 'Стоимость заказа '.$this->getPrice($amount).' рублей. Стоимость доставки '.$this->getShiping()." рублей</br></br>";
    }
}

    class Vegetables extends Products{
    use getDiscountMethod;
    public function __construct($name, $unit, $price, $discount){
            $this->name = $name;
            $this->unit = $unit;
            $this->price = $price;
            $this->discount = $discount;
        }
    public function setDiscountMethod($amount)
    {
        if ($amount > 10) $this->discount = 10;
        else $this->discount = 0;
    }
}
    class Drinks extends Products{
        use getDiscountMethod;
        use setDiscountMethod;
        public $alcogol;
        public function __construct($name, $unit, $price, $discount, $alcogol){
            $this->name = $name;
            $this->unit = $unit;
            $this->price = $price;
            $this->discount = $discount;
            $this->alcogol = $alcogol;
    }
    }

    class Cookies extends Products{
        use getDiscountMethod;
        use setDiscountMethod;
        public $dietic;
        public function __construct($name, $unit, $price, $discount, $dietic){
            $this->name = $name;
            $this->unit = $unit;
            $this->price = $price;
            $this->discount = $discount;
            $this->dietic = $dietic;
    }
    }
