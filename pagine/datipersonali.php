<?php
	session_start();

	if(!isset($_SESSION['username'])){
        header('location: ../index.php');
	}
	$username = $_SESSION["username"];

    require('../data/connessionedb.php');

	$strmodifica = "Modifica";
	$strconferma = "Conferma";

	$modifica = false;
	if (isset($_POST["pulsante_modifica"])) {
		if($_POST["pulsante_modifica"] == $strmodifica){
			$modifica = true;
		} else {
			$modifica = false;
		}

		if ($modifica == false){
			$sql = "UPDATE utenti
					SET password = '".$_POST["password"]."', 
						nome = '".$_POST["nome"]."', 
						cognome = '".$_POST["cognome"]."', 
						email = '".$_POST["email"]."', 
						telefono = '".$_POST["telefono"]."', 
						comune = '".$_POST["comune"]."', 
						indirizzo = '".$_POST["indirizzo"]."' 
					WHERE username = '".$username."'";
			if($conn->query($sql) === true) {
				
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dati Personali</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="sfondoimm">

        <div class = "contenuto">
            <h1>PLAYERS CLUB</h1>
            <h2>Dati Personali</h2>

            <?php
                $sql = "SELECT username, password, nome, cognome, email, telefono, comune, indirizzo 
                    FROM utenti 
                    WHERE username='$username'";
                
                $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                $row = $ris->fetch_assoc();
		    ?>

            <form action="" method = "post">
                <table id = "tab_dati_personali">
                    <tr>
                        <td>Username:</td> <td><input class="input_dati_personali" type="text" name="username" value="<?php echo $row["username"]; ?>" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>Password:</td> <td><input class="input_dati_personali" type="text" name="password" value="<?php echo $row["password"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Nome:</td> <td><input class="input_dati_personali" type="text" name="nome" value="<?php echo $row["nome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Cognome:</td> <td><input type="text" class="input_dati_personali" name="cognome" value="<?php echo $row["cognome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Email:</td> <td><input type="text" class="input_dati_personali" name="email" value="<?php echo $row["email"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Telefono:</td> <td><input type="text" class="input_dati_personali" name="telefono" value="<?php echo $row["telefono"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Comune:</td> <td><input type="text" class="input_dati_personali" name="comune" value="<?php echo $row["comune"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                    <tr>
                        <td>Indirizzo:</td> <td><input type="text" class="input_dati_personali" name="indirizzo" value="<?php echo $row["indirizzo"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
                    </tr>
                </table>
                
                <p style="text-align: center">
				    <input type="submit" name="pulsante_modifica" value="<?php if($modifica==false) echo $strmodifica; else echo $strconferma; ?>">
			    
                </p>
            </form>      
        </div>
        <?php
            include("footer.php");
        ?>
</body>
</html>