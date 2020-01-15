<?php
require_once("observable.php");
require_once("abstract_widget.php");

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();

$data = new Modelo();
$widgetC = new Widget1();
$widgetD = new Widget2();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$data->addObserver($widgetC);
$data->addObserver($widgetD);

$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$data->addRecord("Andy","Garcia","Hombre","España","08919");
$data->addRecord("Maria","Nuñez","Mujer","Andorra","08912");
$data->addRecord("Alejandro","Diaz","Hombre","Argentina","08914");


$widgetA->draw();
$widgetB->draw();
$widgetC->draw();
$widgetD->draw();
?>