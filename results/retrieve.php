<?php
$id = $_GET["id"];

$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("_maze-game", $con);

$sql="SELECT * FROM game_returning WHERE id = '$id'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>timestamp</th>
<th>client</th>
<th>plays</th>
<th>gender</th>
<th>age</th>
<th>ethnicity</th>
<th>ttime</th>
<th>moves</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['timestamp'] . "</td>";
  echo "<td>" . $row['client'] . "</td>";
  echo "<td>" . $row['plays'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['age'] . "</td>";
  echo "<td>" . $row['ethnicity'] . "</td>";
  echo "<td>" . $row['ttime'] . "</td>";
  echo "<td>" . $row['moves'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>