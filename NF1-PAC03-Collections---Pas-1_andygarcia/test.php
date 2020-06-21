<?php
require_once('class.collection.php');
require_once("observable.php");
require_once("abstract_widget.php");

class Foo{

  private $_name;
  private $_number;

  public function __construct($name, $number){
    $this->_name = $name;
    $this->_number = $number;
  }

  public function __toString() {
    return $this->_name . ' is number ' . $this->_number;
  }

}

$dat = new DataSource();
$date = new DataSource2();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new BlackWidget();
$widgetD = new aWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$date->addObserver($widgetC);
$date->addObserver($widgetD);

$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$date->addRecord("Macarrones", "4.00€", 7,"50%","4.28€");
$date->addRecord("Yogur", "1.00€", 1,"21%","3.58€");
$date->addRecord("Queso", "2.00€", 2,"21%","9.23€");
$date->addRecord("Colacao", "56.00€", 1,"21%","43.12€");

$modelo = new Collection();
$modelo->addItem($dat,'datos');
$modelo->addItem($date,'datos2');

$widget = new Collection();
$widget ->addItem($widgetA,'widgetA');
$widget ->addItem($widgetB,'widgetB');
$widget ->addItem($widgetC,'widgetC');
$widget ->addItem($widgetD,'widgetD');


$widget1 = $widget->getItem("widgetA");
$widget2 = $widget->getItem("widgetB");
$widget3 = $widget->getItem("widgetC");
$widget4 = $widget->getItem("widgetD");

$modelo->getItem("datos")->addObserver($widget1);
$modelo->getItem("datos")->addObserver($widget2);
$modelo->getItem("datos2")->addObserver($widget3);
$modelo->getItem("datos2")->addObserver($widget4);


print $widget1->draw(); 
print $widget2->draw(); 
print $widget3->draw(); 
print $widget4->draw(); 

//$colFoo->removeItem("steve"); //deletes the "steve" object

try {
  $objSteve = $widget->getItem("widgetH"); //throws KeyInvalidException
} catch (KeyInvalidException $kie) {
  print "The collection doesn't contain anything called 'widgetH'";
}