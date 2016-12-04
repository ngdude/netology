<?php
class ClassFurniture {
  private $name;
  private $size;
  private $weight;
  private $madein;
  private $price;
  private $amount;


  public function __construct($name, $size, $weight, $madein, $price, $amount) {
    $this->name = $name;
    $this->size = $size;
    $this->weight = $weight;
    $this->madein= $madein;
    $this->price = $price;
    $this->amount = $amount;
    }

    public function setPrice($price) {
        $this->price = $price;
        echo "Price was setted up to $price </br>";
    }
    public function setAmount($sold) {
        $this->amount = ($this->amount - $sold);
        echo "было продано $sold товара под названием $this->name</br>";

    }

    public function getFurn() {
        echo "$this->name, $this->size, $this->madein, $this->price, количество на складе:$this->amount </br>";
     }
    public function count() {}
    public function getTop5price() {}
    public function getTop5Cheapest() {}

}

$furniture1 = new ClassFurniture('Стул 1','100x80','2.41','Китай','4000','100');
$furniture2 = new ClassFurniture('Стул 4','120x100','2.41','Китай','2000','100');
$furniture3 = new ClassFurniture('Стул 5','100X60','2.41','Китай','3000','100');
$furniture4 = new ClassFurniture('Стол 7','200x400','2.41','Китай','8000','100');
$furniture5 = new ClassFurniture('Стол 1','500x200','2.41','Китай','15000','100');
?>
