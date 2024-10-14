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
			<a href="buy.php">Compra</a>
			<a class="now">Vendi</a>
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
            echo "<option value='" . $row['Codice'] . "'>" . $row['Cognome'] . " " . $row['Nome'] ." - Costo: " . $row['costo'] . "</option>";
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
            echo "<option value='" . $row['Codice'] . "'>" . $row['Cognome'] . " " . $row['Nome'] ." - Credito: " . $row['credito'] . "</option>";
        }
    }

    $conn->close();
    ?>
    </select><br>
   <input type="submit" value="Vendi" id="button" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "fantadb");

    // Verifica la connessione
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

     if(isset($_POST['CodiceStudente'])&&isset($_POST['CodiceStudente'])){
            $codiceStudente =$_POST['CodiceStudente'];
            $professoreDaVendere =$_POST['professore_selezionato'];

         // Recupera il costo del professore selezionato
            $sql_costo_professore = "SELECT costo FROM Prof WHERE Codice = $professoreDaVendere";
            $result_costo = $conn->query($sql_costo_professore);

            if ($result_costo->num_rows > 0) {
                $row_costo = $result_costo->fetch_assoc();
                $costoProfessore = $row_costo['costo'];

                // Query per rimuovere il professore dalla squadra dello studente
                $sql_rimuovi_professore = "UPDATE Squad SET ";
                $sql_rimuovi_professore .= "codprof1 = IF(codprof1 = $professoreDaVendere, NULL, codprof1), ";
                $sql_rimuovi_professore .= "codprof2 = IF(codprof2 = $professoreDaVendere, NULL, codprof2), ";
                $sql_rimuovi_professore .= "codprof3 = IF(codprof3 = $professoreDaVendere, NULL, codprof3), ";
                $sql_rimuovi_professore .= "codprof4 = IF(codprof4 = $professoreDaVendere, NULL, codprof4) ";
                $sql_rimuovi_professore .= "WHERE Codsturd = $codiceStudente";

                // Esegui la query per rimuovere il professore
                if ($conn->query($sql_rimuovi_professore) === TRUE) {
                    // Aggiorna il credito dello studente
                    $sql_credito_studente = "UPDATE Stud SET credito = credito + $costoProfessore WHERE Codice = $codiceStudente";
                    if ($conn->query($sql_credito_studente) === TRUE) {
                        echo "<p id='esito'>Vendita del professore avvenuta con successo!</p>";
                    } else {
                        echo "<p id='error'>Errore durante l'aggiornamento del credito dello studente.</p>" . $conn->error;
                    }
                } else {
                    echo "<p id='error'>Errore durante la vendita del professore.</p>" . $conn->error;
                }
            } else {
                echo "<p id='error'>Errore: professore selezionato non trovato.</p>";
            }
    } else {
    echo "<p id='esito'>Bisogna selezionare sia un professore sia uno studente.</p>";
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