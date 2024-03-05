<html>
<head><title>Teacher selection</title></head>
<body>
<p>
  <b>The teachers whose names begin with 'B':</b>
<p>
<?php
   $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
   $database=mysql_select_db("exams") or die ("Database selection failed");
   $q="Select * from Teachers where name like'B%'";
   $Result_set=mysql_query($q) or die ("Query error");
   while($Row=mysql_fetch_array($Result_set)){
      echo ($Row[0]." ".$Row[1]." ".$Row['Surname']);
      echo("<br>");
   }
?>
</p>
</body>
</html>