<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<header>
		<h2 class="logo"><img src="WEBSITE BUILDERS.jpg"></h2>
		<nav class="navigation">
			<a href="buy.php">Compra</a>
			<a href="sell.php">Vendi</a>
			<a href="update.php">Aggiorna</a>
		</nav>
	</header>
	
<div class="table-container">
<?php 
$conn = new mysqli("localhost", "root", "", "fantadb");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $sql = "SELECT s.Codice, s.Cognome AS Cognome_Studente, s.Nome AS Nome_Studente, s.credito, 
               SUM(IFNULL(p1.costo, 0) + IFNULL(p2.costo, 0) + IFNULL(p3.costo, 0) + IFNULL(p4.costo, 0)) AS SommaCosto,
               SUM(IFNULL(p1.costo_periodo, 0) + IFNULL(p2.costo_periodo, 0) + IFNULL(p3.costo_periodo, 0) + IFNULL(p4.costo_periodo, 0)) AS SommaPeriodo
        FROM stud s
        LEFT JOIN squad sq ON s.Codice = sq.Codsturd
        LEFT JOIN prof p1 ON sq.codprof1 = p1.Codice
        LEFT JOIN prof p2 ON sq.codprof2 = p2.Codice
        LEFT JOIN prof p3 ON sq.codprof3 = p3.Codice
        LEFT JOIN prof p4 ON sq.codprof4 = p4.Codice
        GROUP BY s.Codice";

$result = $conn->query($sql);

echo "<div><table>";
echo "<tr><th>Codice Studente</th><th>Cognome Studente</th><th>Nome Studente</th><th>Credito</th><th>Credito Totale</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row['Codice'] . "</td>";
echo "<td>" . $row['Cognome_Studente'] . "</td>";
echo "<td>" . $row['Nome_Studente'] . "</td>";
echo "<td>" . $row['credito'] . "</td>";
echo "<td>" . $row['credito']+($row['SommaCosto']) . "</td>";
echo "</tr>";
}
echo "</table></div>";


$sql = "SELECT Cognome, Nome, costo FROM Prof";
$result = $conn->query($sql);
echo "<div><table>";
echo "<tr><th>Cognome Professore</th><th>Nome Professore</th><th>Costo Professore</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Cognome'] . "</td>";
            echo "<td>" . $row['Nome'] . "</td>";
            echo "<td>" . $row['costo'] . "</td>";
            echo "</tr>";
                    }
        echo "</table></div>";
?>
</div>

	<footer class="footer">
		<div class="left">
			<b>WEBSITE BUILDERS</b><br><br>
			Kukharonak Stanislau<br>
			Nigro Nicolas<br>
			Ricca Andrea<br>
			Di Domenico Gabriele<br>
			Cicatiello Alessandro<br>
		</div>
		<div class="mail">
			<br><br>
			Kukharonak.Stanislau@bunivaweb.it<br>
			Nigro.Nicolas@bunivaweb.it<br>
			Ricca.Andrea@bunivaweb.it<br>
			DiDomenico.Gabriele@bunivaweb.it<br>
			Cicatiello.Alessandro@bunivaweb.it<br>
		</div>
	</footer>
</body>

</html>