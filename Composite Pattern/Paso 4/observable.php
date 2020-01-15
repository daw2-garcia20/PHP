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

class Modelo extends Observable {

       private $nombre;
       private $apellido;
       private $genero;
       private $pais;
       private $codigo;

     
       function __construct() {
              $this->nombres = array();
              $this->apellidos = array();
              $this->generos = array();
              $this->paises = array();
              $this->codigos = array();
       }
     
       public function addRecord($nombre, $apellido, $genero, $pais, $codigo) {
              array_push($this->nombres, $nombre);
              array_push($this->apellidos, $apellido);
              array_push($this->generos, $genero);
              array_push($this->paises, $pais);
              array_push($this->codigos, $codigo);
              $this->notifyObservers();
       }
     
       public function getData() {
              return array($this->nombres, $this->apellidos, $this->generos, $this->paises, $this->codigos);
       }
     }
?>