<?php
require_once("observable.php");
require_once("abstract_widget.php");
class Dog {
  private $_onspeak;

  public function __construct($name) {
	$this->name = $name;
	}

	public function eat($widget) {
		if(isset($this->onspeak)) {
			if(call_user_func($this->onspeak)) {
				return false;
			}else{
				print "El perro esta comiendo";
				$widget->draw();
			}
		}
		
	}

	public function onspeak($functionName, $objOrClass = null) {
		if($objOrClass) {
			$callback = array($objOrClass, $functionName);
		} else {
			$callback = $functionName;
		}
		//make sure this stuff is valid
		if(!is_callable($callback, false, $callableName)) {
			throw new Exception("$callableName is not callable " . "as a parameter to onspeak");
			return false;
		}
		$this->onspeak = $callback;
	}
} //end class Dog

//procedural function
function timeToEat() {
	if(time() < strtotime("today 3:00pm")||
		time() > strtotime("today 9:00pm")) {
		return true;
	} else {
		return false;
	}
}
$widget = new WidgetMenu();

$data= new  DataSource2();
$data->addObserver($widget);
$data->addRecord("Colacao", "200 mg", "500 Kcl");
$data->addRecord("Mayonesa", "500 g", "330 Kcl");
$data->addRecord("Aceite", "100 mg", "1000 Kcl");



$objDog = new Dog('Puchy');
$objDog->onspeak('timeToEat');
$objDog->eat($widget); //polite dog
$objDog2 = new Dog('Cujo');
$objDog2->onspeak('timeToEat');
$objDog2->eat($widget); 
//Throws exception when onspeak is called.
$objDog3 = new Dog('Lassie');
$objDog3->onspeak('nonExistentFunction', 'NonExistentClass');
$objDog3->eat($widget);
?>