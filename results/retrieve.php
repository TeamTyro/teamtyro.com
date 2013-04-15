<?php
$id = $_GET["id"];
$dbname = '_maze-game';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $conn->query('SELECT ethnicity, COUNT(*) AS count FROM game_returning GROUP BY ethnicity');
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>timestamp</th>
<th>client</th>
<th>email</th>
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
  echo "<td>" . $row['email'] . "</td>";
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