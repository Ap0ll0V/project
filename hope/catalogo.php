<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body id="sfondoScuro">
    <div>
        <img id="header" src="hope.png" style="width:10%;height:10%;">
        <a id="header" href="index.html">Home</a>
        <a id="header" href="chi-siamo.html">Chi Siamo</a>
        <a id="header" href="catalogo.php">Catalogo</a>
        <a id="header" href="contattaci.html">Contattaci</a>
        <a id="header" href="login.php">Login/Registrazione</a>
        <a id="header" href="carrello.php" class="button">🛒</a>
    </div>
    <hr>
    <form method="post">
        <h1 id="testoImp">Il Nostro Catalogo</h1><br>
        <h3 id="testoImp">kit miglioramento personale (m.p.)</h3>
        <div class="immagini">
            <img src="pillole.jpg" style="width:200px;height:200px;">
        </div>
        <p id="testoScuro">Il kit m.p. è stato creato per aiutare i clienti a cambiare il loro aspetto fisico</p>
        <p id="testoChiaro">15,99€</p>
        <input id="testoChiaro" type="submit" name="mp" value="aggungi al carello">
        <br>
        <label id="testoChiaro">Quantità:</label>
        <input type="number" max="10" min="1" value="1" name="kitM_P_">
        <br><br>

        <h3 id="testoImp">kit indomitable human spirit (i.h.s.)</h3>
        <div class="immagini">
            <img src="mp3.jpg" style="width:200px;height:200px;">
            <img src="pillole.jpg" style="width:200px;height:200px;">
        </div>
        <p id="testoScuro">Il kit i.h.s. è stato creato per sostenere persone che soffrono di depressione, ansia e disturbi della concentrazione</p>
        <p id="testoChiaro">18,99€</p>
        <input id="testoChiaro" type="submit" name="ihs" value="aggungi al carello">
        <br>
        <label id="testoChiaro">Quantità:</label>
        <input type="number" max="10" min="1" value="1" name="kitI_H_S_">
        <br><br>

        <h3 id="testoImp">kit made man (m.m.)</h3>
        <div class="immagini">
            <img src="mp3.jpg" style="width:200px;height:200px;">
            <img src="pillole.jpg" style="width:200px;height:200px;">
        </div>
        <p id="testoScuro">Il kit m.m. è stato il nostro primo prodotto, creato per capriccio dal nostro fondatore per un suo vecchio amico per raggiungere l'immortalità fisica. Il prodotto che vendiamo è la formula raffinata</p>
        <p id="testoChiaro">1000,99€</p>
        <input id="testoChiaro" type="submit" name="mm" value="aggungi al carello">
        <br>
        <label id="testoChiaro">Quantità:</label>
        <input type="number" max="10" min="1" value="1" name="kitM_M_">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Creazione della connessione
        $conn = new mysqli("localhost", "root", "", "carello");

        // Controllo della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
        $sql_utente = "SELECT codut FROM log WHERE id = 1";
        $result_utente = $conn->query($sql_utente);

        // Verifica se la query ha restituito dei risultati
        if(is_null($result_utente['codut'])){
            if($result_utente->num_rows > 0) {
            // Ottieni il Codut dell'utente
            $row_utente = $result_utente->fetch_assoc();
            $codiceUtente = $row_utente['codut'];
            $codiceUtente = 1; // Assumendo che ci sia solo un utente per ora
        }
        
        

        // Verifica quale form è stato inviato e preparazione della query
        if (isset($_POST['mp'])) {
            $codkit = 1;
            $quan = $_POST['kitM_P_'];
        } elseif (isset($_POST['ihs'])) {
            $codkit = 2;
            $quan = $_POST['kitI_H_S_'];
        } elseif (isset($_POST['mm'])) {
            $codkit = 3;
            $quan = $_POST['kitM_M_'];
        } else {
            $codkit = 0;
        }
       
        if ($codkit > 0 && isset($quan) && is_numeric($quan)) {
            $sql = "INSERT INTO carello (Codut, Codkit, Quantita) VALUES ($codiceUtente, $codkit, $quan)";
            if ($conn->query($sql)) {
                echo "<p id='testoImp'>Inserimento riuscito.</p>";
            } else {
                echo "Errore: " . $conn->error;
            }
        } else {
            echo "Errore: Codice kit non valido o quantità non valida.";
        }

        // Chiusura della connessione
        $conn->close();
        }else{
            echo "<p id='testoImp'>non sei loggato.</p>";
        }

    }
    ?>
</body>
<hr>
<footer>
    <p id="testoScuro">&copy; 2024 Hope.spa wonderer.corp </p>
    <p id="testoScuro">made by Achitect </p>
    <a href="contattaci.html"> Contattaci</a>
</footer>
</html>