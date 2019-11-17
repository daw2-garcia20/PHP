<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
echo"<table border=1>";
$cont=1;
for($cont1=1;$cont1<=10;$cont1++){
    echo "<tr>";
     
        for($cont2=1; $cont2<=10;$cont2++){
        echo"<td>",$cont,"</td>";
        $cont=$cont+1;
        }
    echo"</tr>";
}
echo"</table>";
?>
</body>
</html>