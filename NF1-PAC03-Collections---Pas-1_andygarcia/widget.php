<?php
require_once("observable.php");
require_once("abstract_widget.php");

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



$widgetA->draw();
$widgetB->draw();
$widgetC->draw();
$widgetD->draw();
?>
