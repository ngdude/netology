<?php
class ClassFurniture {
  private $name;
  private $size;
  private array $weight;
  private $madein;
  private $price;
    }
    public function setPrice() {}
    public function getPrice() {}
    public function setMadein() { }
    public function count() {}
    public function getTop5price() {}
    public function getTop5Cheapest() {}

}

$furniture1 = new ClassFurniture('Стул 1','100x80','2.41','Китай','4000');
$furniture2 = new ClassFurniture('Стул 4','120x100','2.41','Китай','2000');
$furniture3 = new ClassFurniture('Стул 5','100X60','2.41','Китай','3000');
$furniture4 = new ClassFurniture('Стол 7','200x400','2.41','Китай','8000');
$furniture5 = new ClassFurniture('Стол 1','500x200','2.41','Китай','15000');
?>
