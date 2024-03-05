<html>
<head>
<title>Insert teachers</title>
<?php 
$ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
$database=mysql_select_db("exams") or die ("Database selection failed");
if (isset($_POST['tname'])&&($_POST['tname']!=" ")&&($_POST['tname']!="")){
$t_name=$_POST['tname'];
$t_surname=$_POST['tsurname'];
$dob=$_POST['birthday'];
$ac_degree=$_POST['ac_degree'];
$q="Insert teachers(Name, Surname, Date_of_birth, Ac_degree) values('$t_name', '$t_surname', '$dob','$ac_degree')";
echo $q;
mysql_query($q) or die("Query failed");
echo("<br>1 row inserted.");}
?>
</head>
<body>
<form method=POST action="index.php">
<label for="tname"> Teacher name: </label>
<input type="text" id="tname" name="tname"></input><br><br>
<label for="tsurname"> Teacher surname: </label> 
<input type="text" id="tsurname" name="tsurname"></input><br><br>
<label for="birthday">Date of birth:</label>
<input type="date" id="birthday" name="birthday"><br><br>
<label for="ac_degree" id="ac_degree">Academic degree:</label> 
<select name="ac_degree">
<option name="lecturer" value="lecturer">
Lecturer
</option>
<option name="senior_lecturer" value="Senior Lecturer">
Senior Lecturer
</option>
<option name="assoc_prof" value="Associate Professor">
Associate Professor
</option>
<option name="prof" value="Professor">
Professor
</option>
</select><br>
<br><input type="submit" name="OK" value="OK"></input>
</form>
</body>
</html>