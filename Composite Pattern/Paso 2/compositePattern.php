<html>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>
<body>
<?php

abstract class AbstractConstruccion {
  
  private $nombre;
  private $superficie;
  private $elementos = array();
  
  public function add(AbstractConstruccion & $elementos) {
     array_push($this->elementos, $elementos);
  }
  
  public function remove(AbstractConstruccion & $elementos) {
     array_pop($this->elementos);
  }
        
  public function hasChildren() {
    return (bool)(count($this->elementos) > 0);
  }
    
  public function getChild($i) {
    return $this->elementos[$i];
  }
    
  public function getDescription() {
    echo "- one " . $this->getNombre();
    if ($this->hasChildren()) {
      echo " which includes:<br>";
      foreach($this->elementos as $elementos) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $elementos->getDescription();
         echo "</td></tr></table>";
      }        
    }
  }
  
 public function setNombre($nombre) {
   $this->nombre = $nombre;
 }
  
 public function getNombre() {
   return $this->nombre;
 }
         
 public function setSuperficie($descripcion) {
    $this->superficie = $descripcion;
 }

 public function getSuperficie() {
   return $this->superficie;
  }

  public function sumar(){
    $superficies += $this->getSuperficie();
    if($this->hasChildren()){
          foreach($this->elementos as $elementos){
              $superficies += $elementos->sumar();
          }
      }
      
      return $superficies;
  }
}

class Habitacion extends AbstractConstruccion {
  function __construct($nombre) {
    parent::setNombre($nombre);
    parent::setSuperficie(20);
  }      
}

class Puerta extends AbstractConstruccion {
  function __construct($nombre) {
   parent::setNombre($nombre);
   parent::setSuperficie(1);
  }
}

class Ventana extends AbstractConstruccion {
  function __construct($nombre) {
    parent::setNombre($nombre);
    parent::setSuperficie(2);
  }
}

$pasillo = new Puerta("Puerta Pasillo");
$pasillo->add(new Habitacion("Habitacion Andy"));
$pasillo->add(new Habitacion("Habitacion Gato"));

$salon = new Habitacion("Salón");
$salon->add(new Ventana("Ventana interior"));
$salon->add($pasillo);
$guardilla = new Habitacion("Guardilla");
$vivienda = new Puerta("Puerta principal");
$vivienda->add($salon);
$vivienda->add($guardilla);


echo "Vivienda: <p>";
$vivienda->getDescription();
echo "Superficie en m2:";
echo $vivienda->sumar();


?>

</body>
</html>