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


class BasicWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=130>";
         $html .= "<tr><td colspan=3 bgcolor=#cccccc>
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


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
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
class BlackWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=600 style='background-color:red; color: yellow  ; border: 2px solid black'>";
         $html .= "<tr><td colspan=5>
                        <b>Compra<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre   = $this->internalData[0];
                $precio   = $this->internalData[1];
                $cantidad = $this->internalData[2];
                $iva      = $this->internalData[3];
                $preciof  = $this->internalData[4];
                $html   .=  "<tr><td>$nombre[$i]</td><td> $precio[$i]</td>
                           <td>$cantidad[$i]</td><td>$iva[$i]</td><td>$preciof[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}


class aWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table  cellpadding=5  style='border-collapse: collapse; '>
                <tr><td colspan=5 style='text-align: center; background-color:red ; border: 2px solid black' >
                <b><span class=blue>Lista Compra<span><b>
                </td></tr>
                <tr><td><b>Producto</b></td>
                <td><b>Precio</b></td><td><b>Cantidad</b>
                </td><td><b>Grasa</b>
                </td><td><b>PVP</b>
                </td></tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre   = $this->internalData[0];
                $precio   = $this->internalData[1];
                $cantidad = $this->internalData[2];
                $iva      = $this->internalData[3];
                $preciof  = $this->internalData[4];
                $html   .=  "<tr><td>$nombre[$i]</td><td> $precio[$i]</td>
                           <td>$cantidad[$i]</td><td>$iva[$i]</td><td>$preciof[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

?>
