<?php

$hDB = pg_connect("host=localhost port=5432 dbname=UF2 user=postgres  
                         password=root")
         or die("Failure connecting to the database!");
echo 'Conexión correcta.'
?>