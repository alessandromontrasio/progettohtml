<?php
    if(isset($_POST["username"])) $username =$_POST["username"]; else $username="";
    if(isset($_POST["password"])) $password =$_POST["password"]; else $password="";
            
?> 

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>PlayersClub-Login</title>
</head>
<body>
    
    <div class="contenuto">
            <h1>PLAYERS CLUB</h1>
            <h2>Pagina di Login</h2>
        <form action="", method="post">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name = "username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name = "password" required></td>
                </tr>
            </table>
            <input type="submit" value="ACCEDI">
        
        </form>
        <h4>Non sei ancora registrato? <a href="registrazione.php"> REGISTRATI QUI</a> </h4>
        <?php
        if(isset($_POST["username"]) and isset($_POST["password"])){
            require("../data/connessionedb.php");

            $myquery= "SELECT username, password
                        FROM utenti
                        WHERE username = '$username' AND password = '$password'";
            $ris = $conn->query($myquery) or die("<p>query fallita".$conn->error."<p/>");

            if ($ris->num_rows==0) {
                echo "utente o password non trovati";
                $conn->close();
            } else{
                session_start();
                $_SESSION["username"] = $username;

                $conn->close();
                header("location: shop.php");
            }
        }
        ?>
        
        
        
    </div>
    
</body>
</html>

