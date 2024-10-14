<!DOCTYPE html>
<html lang="it">
<head>
   <script src="script.js"></script>
   <link rel="stylesheet" href="style.css">
</head>
<body id="sfondoScuro">
    <div >
        <img id="header" src="hope.png"style="width:12%;height:12%;" > 
        <a id="header" href="index.html">Home</a>
        <a id="header" href="chi-siamo.html"> Chi Siamo</a> 
        <a id="header" href="catalogo.php"> Catalogo</a> 
        <a id="header" href="contattaci.html"> Contattaci</a> 
        <a id="header" href="login.php"> Login/Registrazione</a> 
        <a id="header" href="carrello.php" class="button"> 🛒</a>
        </div>
    <hr>
    
    
        <h1 id="testoImp">Login</h1>
        <br>
        <form  method="post">
            <fieldset id="sfondoScuro">
             <legend id="testoImp">login</legend>    
                <label id="testoScuro">inserire l' email</label><br>
                <input type="email" name="nome "size="10" maxlength="50">
                <br>
                <label id="testoScuro">inserire il nome dell account </label><br>
                <input type="text" name="nome "size="10" maxlength="50">
                <br>
                <label id="testoScuro">inserire la password dell account </label><br>
                <input type="password" name="password "size="10" maxlength="50">
                <br>
                
                <p><a href="password_dimenticata.html">Hai dimenticato la password?</a></p>
                <INPUT type="submit" name="invia"><INPUT type="reset" name="cancella" ><br><br>
                
                    <button onclick="loginGoogle()" class="login-button">
                        <div class="button">
                        <img  src="google.png" class="logo">
                        <span>Login con Google</span>
                        </div>
                    </button>
                    <br>
                    <br>
                    <button onclick="loginFacebook()" class="login-button">
                        <div class="button">
                        <img  src="facebook.png" class="logo">
                        <span>Login con facebook</span><br>
                        <div>
                    </button>
                    <br>
                    <br>
                    <button onclick="loginApple()" class="login-button">
                        <div class="button">
                        <img  src="diavolo.png" class="logo">
                        <span>Login con Appel</span>
                    </div>
                    </button>
                <br>
                <br>
                <a href="iscriviti.html">non se iscritto?</a><br>
            </fieldset>
        </form>
        <a href="contattaci.html">hai dei problemi?</a><br><br>
    <hr>
</body>
<footer>
    <p id="testoScuro">&copy; 2024 Hope.spa wonderer.corp </p>
    <p id="testoScuro">made by Achitect </p>
    <a href="contattaci.html"> Contattaci</a>
    </footer>
</html>
