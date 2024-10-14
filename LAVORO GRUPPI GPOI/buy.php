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
		<h2 class="logo">
			<a href="FantaProf.php"><img src="WEBSITE BUILDERS.jpg"></a>
		</h2>
		<nav class="navigation">
			<a class="now">Compra</a>
			<a href="sell.php">Vendi</a>
			<a href="update.php">Aggiorna</a>
		</nav>
	</header>

<div class="content">
<form method="post">
    <select id="professore_selezionato" name="professore_selezionato">
    	<option value="0">Seleziona il prof</option>

    <?php
    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "fantadb");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Query per recuperare i professori
    $sql = "SELECT Codice, Cognome, Nome, costo FROM Prof";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['Codice'] . '">' . $row['Cognome'] . ' ' . $row['Nome'] . ' - Costo: ' . $row['costo'] . '</option>';
        }
    }

    $conn->close();
    ?>
    </select>
    <br><br>
    <select id="CodiceStudente" name="CodiceStudente">
    	<option value="0">Seleziona lo studente</option>

    <?php
    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "fantadb");

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Query per recuperare gli studenti
    $sql = "SELECT Codice, Cognome, Nome, credito FROM Stud";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option value="'. $row['Codice'] . ' ">' . $row['Cognome'] . '' . $row['Nome'] .' - Credito: ' . $row['credito'] . '</option>';
        }
    }

    $conn->close();
    ?>
    </select><br>
   <input type="submit" value="Compra" name="compra" id="button">
</form>

<?php
if(isset($_POST['compra'])){


$conn = new mysqli("localhost", "root", "", "fantadb");

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}
if (isset($_POST['CodiceStudente'])&&isset($_POST['professore_selezionato'])){
$codiceStudente = $_POST['CodiceStudente'];
$professoreSelezionato =$_POST['professore_selezionato'];

// Recupera il numero di professori attuali per lo studente
$sql_num_professori = "SELECT codprof1, codprof2, codprof3, codprof4 FROM Squad WHERE Codsturd = $codiceStudente";
$result = $conn->query($sql_num_professori);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $numero_professori_attuali = 0;
    
    // Conta quanti professori sono già assegnati
    foreach ($row as $professore) {
        if (!is_null($professore)) {
            $numero_professori_attuali++;
        }
    }

    // Controlla se il numero di professori è già 4
    if ($numero_professori_attuali >= 4) {
        echo "<p id='esito'>Hai già quattro professori, vendi per comprare un altro.</p>";
    } else {

    // Recupera il costo del professore selezionato
    $sql_costo_professore = "SELECT costo FROM Prof WHERE Codice = $professoreSelezionato";
    $result_costo = $conn->query($sql_costo_professore);
    
    if ($result_costo->num_rows > 0) {
        $row_costo = $result_costo->fetch_assoc();
        $costoTotale = $row_costo['costo'];
        
        // Aggiorna la tabella Squad con il nuovo professore
        $sql_aggiungi_professore = "UPDATE Squad SET ";
        
        if ($numero_professori_attuali == 0) {
            $sql_aggiungi_professore .= "codprof1 = $professoreSelezionato";
        } elseif ($numero_professori_attuali == 1) {
            $sql_aggiungi_professore .= "codprof2 = $professoreSelezionato";
        } elseif ($numero_professori_attuali == 2) {
            $sql_aggiungi_professore .= "codprof3 = $professoreSelezionato";
        } elseif ($numero_professori_attuali == 3) {
            $sql_aggiungi_professore .= "codprof4 = $professoreSelezionato";
        }
        
        $sql_aggiungi_professore .= " WHERE Codsturd = $codiceStudente";
        
        // Aggiorna il credito dello studente
        $sql_credito_studente = "UPDATE Stud SET credito = credito - $costoTotale WHERE Codice = $codiceStudente";
        
        // Esegui le query
        if ($conn->query($sql_aggiungi_professore) === TRUE && $conn->query($sql_credito_studente) === TRUE) {
            echo "<p id='esito'>Acquisto del professore avvenuto con successo!</p>";
        } else {
            echo "<p id='error'>Errore durante l'acquisto del professore.</p>" . $conn->error;
        }
    } else {
        echo "<p id='error'>Errore: professore selezionato non trovato.</p>";
    }
}
} else {
    echo "<p id='error'>Errore: studente non trovato.</p>";
}
}
else{
    echo"<p id='error'>bisogna selezionere sia un professore sia uno studente</p>";
}


$conn->close();
}

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