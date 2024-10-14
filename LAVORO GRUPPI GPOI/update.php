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
			<a href="sell.php">Vendi</a>
			<a class="now">Aggiorna</a>
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
            </select><br><br>
            <input type="text" id="costo" name="nuovo_costo" placeholder="Importo"><br>
            <input type="submit" value="Aggiorna" id="button" name="submit">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $conn = new mysqli("localhost", "root", "", "fantadb");

            // Verifica la connessione
            if ($conn->connect_error) {
                die("Connessione al database fallita: " . $conn->connect_error);
            }

            if (isset($_POST['professore_selezionato']) && isset($_POST['nuovo_costo'])) {
                $codiceProfessore = $_POST['professore_selezionato'];
                $nuovoCosto = $_POST['nuovo_costo'];

                // Controlla se il nuovo costo Ã¨ un intero
                if (!filter_var($nuovoCosto, FILTER_VALIDATE_INT)) {
                    echo "<p id='error' >Errore: Il costo deve essere un numero intero.</p>";
                } else {
                    // Recupera il costo corrente del professore
                    $sql_recupera_costo = "SELECT costo FROM Prof WHERE Codice = $codiceProfessore";
                    $result_costo = $conn->query($sql_recupera_costo);

                    if ($result_costo->num_rows > 0) {
                        $row = $result_costo->fetch_assoc();
                        $costoCorrente = $row['costo'];
                        $nuovoCostoTotale = $costoCorrente + $nuovoCosto;

                        // Query per aggiornare il costo del professore
                        $sql_aggiorna_valore = "UPDATE Prof SET costo = $nuovoCostoTotale WHERE Codice = $codiceProfessore";

                        // Esegui la query per aggiornare il valore del professore
                        if ($conn->query($sql_aggiorna_valore) === TRUE) {
                            echo "<p id='esito' >Valore del professore aggiornato con successo!</p>";
                        } else {
                            echo "<p id='error' >Errore durante l'aggiornamento del valore del professore.</p>" . $conn->error;
                        }
                    } else {
                        echo "<p id='error' >Errore: professore selezionato non trovato.</p>";
                    }
                }
            } else {
                echo "<p id='esito' >Bisogna selezionare un professore e un nuovo costo.</p>";
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