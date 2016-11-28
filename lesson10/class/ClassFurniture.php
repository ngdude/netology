<?php
class ClassFurniture {
  private $name;
  private $size;
  private array $weight;
  private $madein;
  private $price;

    abstract public function setPrice() {}
    abstract public function getPrice() {}
    abstract public function setMadein() { }
    abstract public function count() {}
    abstract public function getTop5price() {}
    abstract public function getTop5Cheapest() {}
}

    Class ClassChair extends ClassFurniture {
        private $madeofmain;
        private $madeofother;
    }

    Class ClassTable extends ClassFurniture {
        private $madeofmain;
        private $madeofother;
    }

$furniture1 = new ClassChair('Стул 1','100x80','2.41','Китай','4000','дерево','ткань');
$furniture2 = new ClassChair('Стул 4','120x100','2.5','Китай','2000','дерево','ткань');
$furniture3 = new ClassChair('Стул 5','100X60','4','Китай','9000','дерево','кожа');
$furniture4 = new ClassTable('Стол 7','200x400','10','Китай','8000','дерево');
$furniture5 = new ClassTable('Стол 1','500x200','15','Китай','15000','дерево');
?>
