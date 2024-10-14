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
    <h1 id="testoImp">Il Tuo Carrello</h1>
    <?php
        $conn = new mysqli("localhost", "root", "", "carello");

        // Controllo della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $sql = "SELECT KIT.Nome, KIT.Prezzo, Carello.Quantita
                FROM Carello
                INNER JOIN KIT ON Carello.Codkit = KIT.Codice";
        $result = $conn->query($sql);

        $totale = 0;
        $quantiatot=0;
        $costoMM=0;
        $costoIHS=0;
        $costoMP=0;
        $quaMP=0;
        $quaIHS=0;
        $quaMM=0;
        if ($result->num_rows > 0) {
            foreach ($result as $r) {
                $costo = $r["Prezzo"] * $r["Quantita"];
                $totale += $costo;
                if ($r["Nome"] == "Kit M.P.") {
                    $costoMP=$costoMP+$costo;
                    $quaMP++;
                    
                } elseif ($r["Nome"] == "Kit I.H.S") {
                    $costoIHS=$costoIHS+$costo;
                    $quaIHS++;
                } elseif ($r["Nome"] == "Kit M.M") {
                    $costoMM=$costoMM+$costo;
                    $quaMM++;
                   
                }
                $quantiatot=$quaMM+$quaIHS+$quaMP;
            }
            if($quaMP>0){
            echo '<h3 id="testoImp">kit miglioramento personale (m.p.)</h3>
            <div class="immagini">                
            <img src="pillole.jpg" style="width:200px;height:200px;">              
            </div>             
            <p id="testoChiaro">Prezzo: ' . $costoMP . '€</p>             
            <p id="testoChiaro">Quantità: ' . $quaMP . '</p>';
            }
            if($quaIHS>0){
            echo '<h3 id="testoImp">kit indomitable human spirit (i.h.s.)</h3>
            <div class="immagini">
            <img src="mp3.jpg" style="width:200px;height:200px;">
            <img src="pillole.jpg" style="width:200px;height:200px;">     
            </div>
            <p id="testoChiaro">Prezzo: ' . $costoIHS . '€</p>
            <p id="testoChiaro">Quantità: ' . $quaIHS . '</p>';
            }
            if($quaMM>0){
            echo '<h3 id="testoImp">kit made man (m.m.)</h3>
            <div class="immagini">
            <img src="mp3.jpg" style="width:200px;height:200px;">
            <img src="pillole.jpg" style="width:200px;height:200px;">
            </div>
            <p id="testoChiaro">Prezzo: ' . $costoMM . '€</p>
            <p id="testoChiaro">Quantità: ' . $quaMM . '</p>';
            }
            echo '<h2 id="testoImp">Totale: ' . $totale . '€</h2>';
            echo '<h3 id="testoImp">Totale: ' . $quantiatot . '</h3>';
        } else {
            echo "<p>Il carrello è vuoto.</p>";
        }

        $conn->close();
    ?>
    <form method="post">
        <input type="submit" name="paga" value="Effettua l'ordine">
    </form>
</body>
<hr>
<footer>
    <p id="testoScuro">&copy; 2024 Hope.spa wonderer.corp</p>
    <p id="testoScuro">made by Architect</p>
    <a href="contattaci.html">Contattaci</a>
</footer>
</html>
