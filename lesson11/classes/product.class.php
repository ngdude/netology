<?php
  class ClassProducts {
    public $name;
    public $category;
    public $countyfrom;
    public $amount;
    public $datein;
    private $wheresituated = 'warehouse';

    public function __construct($name, $category, $countyfrom, $amount, $datein) {
      $this->name = $name;
      $this->category = $category;
      $this->countyfrom = $countyfrom;
      $this->amount = $amount;
      $this->datein = $datein;
    }

    public function getAllProducts(){

        foreach ($this as $key => $value) {
            echo "$key $value </br>";
        }

    }


    public function setStore($store) {
            $this->wheresituated = $store;
            Echo "Товар $this->name  перемесщен в магазин $store </br>";
}

}
?>
