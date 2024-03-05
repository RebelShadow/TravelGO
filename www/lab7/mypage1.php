<html>
<head>
<title>HTML-PHP parameter transmission
</title>
</head>
<body>
<?php
$name=$_POST["st_name"];
$surname=$_POST["st_surname"];
$sch=$_POST["has_sch"];
echo("Student name:".$name."<br>");
echo("Student surname:".$surname."<br>");
if ($sch=="") $sch="No";
echo("Has scholarship:".$sch);
?>
</body>
</html>