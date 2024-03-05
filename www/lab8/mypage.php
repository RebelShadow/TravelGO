<html>
<head>
<title>HTML
-
PHP parameter transmission
</title>
</head>
<body>
<?php
$name=$_POST["st_name"];
$surname=$_POST["surname"];
$gender=$_POST["gender"];
$specialization=$_POST["specialization"];
echo("Student name:".$name."<br>");
echo("Student surname:".$surname."<br>");
echo("Gender:".$gender."<br>");
echo("Specialization:".$specialization."<br>");
?>
</body>
</html>