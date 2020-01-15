<?php

interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}

class FancyWidget extends Widget {
  
       function __construct() {
       }
       
       public function draw() {
              $html = 
              "<table class='text-center' border=0 cellpadding=5 width=270 style='background-color=#6699BB'>
                     <tr><td colspan=3 bgcolor=#cccccc>
                     <b><span class=blue>Our Latest Prices<span><b>
                     </td></tr>
                     <tr><td><b>instrument</b></td>
                     <td><b>price</b></td><td><b>date issued</b>
                     </td></tr>";
              
              $numRecords = count($this->internalData[0]);
              for($i = 0; $i < $numRecords; $i++) {
                     $instms = $this->internalData[0];
                     $prices = $this->internalData[1];
                     $years =  $this->internalData[2];
                     
                     $html .= 
                     "<tr><td>$instms[$i]</td><td> 
                             $prices[$i]</td><td>$years[$i]
                             </td></tr>";
                     }
              $html .= "</table><br>";
              echo $html;
       }
     }
     
     class BasicWidget extends Widget {
     
            function __construct() {
            }
          
            public function draw() {
                   $html = "<table border=1 width=130 class='text-center'>";
                   $html .= "<tr><td colspan=3 style='background-color=#cccccc'>
                                  <b>Instrument Info<b></td></tr>";
          
                   $numRecords = count($this->internalData[0]);
                   for($i = 0; $i < $numRecords; $i++) {
                          $instms = $this->internalData[0];
                          $prices = $this->internalData[1];
                          $years =  $this->internalData[2];
                          $html .=  "<tr><td>$instms[$i]</td><td> $prices[$i]</td>
                                     <td>$years[$i]</td></tr>";
                          }
                   $html .= "</table><br>";
                   echo $html;
            }
          }

class Widget1 extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 style='border-collapse: collapse' width=130>";
         $html .= "<tr><td colspan=5 class='text-center' bgcolor=#cccccc>
                        <b>Alumnos<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre = $this->internalData[0];
                $apellido = $this->internalData[1];
                $genero =  $this->internalData[2];
                $pais =  $this->internalData[3];
                $codigo =  $this->internalData[4];
                $html .=  "<tr><td>$nombre[$i]</td><td> $apellido[$i]</td>
                           <td>$genero[$i]</td><td>$pais[$i]</td>
                           <td>$codigo[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

class Widget2 extends Widget {

       function __construct() {
       }
     
       public function draw() {
              $html = "<table class='table' border=1 width=130>";
              $html .= "<tr><td colspan=5 class='text-center' bgcolor=#HEHFE>
                             <b>Alumnos<b></td></tr>";
     
              $numRecords = count($this->internalData[0]);
              for($i = 0; $i < $numRecords; $i++) {
                     $nombre = $this->internalData[0];
                     $apellido = $this->internalData[1];
                     $genero =  $this->internalData[2];
                     $pais =  $this->internalData[3];
                     $codigo =  $this->internalData[4];
                     $html .=  "<tr style='background-color: #DEDEDE;' class='text-center'><td>$nombre[$i]</td><td> $apellido[$i]</td>
                                <td>$genero[$i]</td><td>$pais[$i]</td>
                                <td>$codigo[$i]</td></tr>";
                     }
              $html .= "</table><br>";
              echo $html;
       }
     }
