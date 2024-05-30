<?php
    if(isset($_POST["username"])){$username = $_POST["username"]} else $username = ""
    if(isset($_POST["password"])){$password = $_POST["password"]} else $password = ""
    if(isset($_POST["conferma"])) $conferma = $_POST["conferma"] else $conferma = ""
    if(isset($_POST["nome"])) $nome = $_POST["nome"] else $nome = ""
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"] else $cognome = ""
    if(isset($_POST["email"])) $email = $_POST["email"] else $email = ""
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"] else $telefono = ""
    if(isset($_POST["comune"])) $comune = $_POST["comune"] else $comune = ""
    if(isset($_POST["indirizzo"])) $indirizzo = $_POST["indirizzo"] else $indirizzo = ""
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players Club-Registrazione</title>
</head>
<body>
    <?php
        require("navv.php");
    ?>
    <div class ="contenuto">
        <form action="" method = "post">
            <table class = "tab_input tab_registrazione">
            <tr>
                    <td><label for="username">Username: </label></td>
                    <td><input type="text" name="username" id="username" value="<?php echo $username ?>" required></td>
                    
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td><label for="conferma">Conferma password: </label></td>
                    <td><input type="password" name="conferma" id="conferma" required></td>
                </tr>
                <tr>
                    <td><label for="nome">Nome: </label></td>
                    <td><input type="text" name="nome" id="nome" <?php echo "value = '$nome'" ?>></td>
                </tr>
                <tr>
                    <td><label for="cognome">Cognome: </label></td>
                    <td><input type="text" name="cognome" id="cognome" <?php echo "value = '$cognome'" ?>></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" name="email" id="email" <?php echo "value = '$email'" ?>></td>
                </tr>
                <tr>
                    <td><label for="telefono">Telefono: </label></td>
                    <td><input type="text" name="telefono" id="telefono" <?php echo "value = '$telefono'" ?>></td>
                </tr>
                <tr>
                    <td><label for="comune">Comune: </label></td>
                    <td><input type="text" name="comune" id="comune" <?php echo "value = '$comune'" ?>></td>
                </tr>
                <tr>
                    <td><label for="indirizzo">Indirizzo: </label></td>
                    <td><input type="text" name="indirizzo" id="indirizzo" <?php echo "value = '$indirizzo'" ?>></td>
                </tr>
            </table>
            <input type="submit" value="Ivia">
        </form>

        <p>
            <?php
                if(isset($_POST["username"])) and isset($_POST["password"]){
                    if($_POST["username"] == "" or $_POST["password"] == ""){
                        echo "username e password non possono essere vuoti";
                    }
                    elseif($_POST["password"] != $_POST["username"]){
                        echo "<p>le password non corrispondono</p>";
                    }
                    else{
                        require("../data/connessionedb.php");

                        $sql = "SELECT username
                                FROM utenti
                                WHERE username = $username"
                        $ris = $conn->query($sql) or die("<p>query fallita</p>");
                        if($ris->$num_rows > 0){
                            echo "questo username è già stato usato";

                        }
                        else{
                            $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                            VALUES ('$username', '$password', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";

                            if ($conn->query($myquery) === true) {
                                session_start();
                                $_SESSION["username"]=$username;
                                
                                $conn->close();

                                echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                                header('Refresh: 5; URL=index.html');

                            } else {
                                echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                            }
                        }
                    }
                }
            ?>
        </p>
        <?php
            require("footer.php");
        ?>
    </div>
</body>
</html>