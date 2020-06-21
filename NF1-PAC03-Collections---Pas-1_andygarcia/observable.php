<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $names;
  private $prices;
  private $years;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
  }

  public function addRecord($name, $price, $year) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->prices, $this->years);
  }
}
class DataSource2 extends Observable {

  private $names;
  private $prices;
  private $years;
  private $algo;
  private $algo2;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
         $this->algo = array();
         $this->algo2 = array();
  }

  public function addRecord($name, $price, $year,$algo,$algo2) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         array_push($this->algo, $algo);
         array_push($this->algo2, $algo2);

         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->prices, $this->years,$this->algo,$this->algo2);
  }
}
?>
