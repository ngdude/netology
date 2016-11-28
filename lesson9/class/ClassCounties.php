<?php
class ClassCounties {
  private $name;
  private $area;
  private $population;
  private $situated;
  private $lang;
  private $money;
    }
    public function setCounty() {}
    public function getCounty() {}
    public function setPopulation() { }
    public function countCounties() {}
    public function getTop5area() {}
    public function getTop5population() {}

}

$country1 = new ClassCounties('Россия','1000000','200000','Евразия','Русский','рубль');
$country2 = new ClassCounties('Китай','600000','999999','Азия','Китайский','Юань');
$country3 = new ClassCounties('Монголия','10000','2000','Евразия','Монгольский','тугрик');
$country4 = new ClassCounties('Эфиопия','10000','20000','Евразия','Эфиопский','хз');
$country5 = new ClassCounties('Филипины','2000000','9000','Евразия','Филипинский','хз');
?>
