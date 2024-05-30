<?php
	session_start();
    if(!isset($_SESSION['username'])){ 
		header('location: ../index.php');
	}
    $username = $_SESSION["username"];
?>
    
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Players-club - Shop</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="contenuto">
		<h1 style="text-align: center; margin-top: 0px">SHOP</h1>
	
        <div>
			<?php
				require("../data/connessionedb.php");

				$sql = "SELECT 
							articoli.cod_articolo,
							articoli.nomearticolo,
							articoli.foto,
							articoli.descrizione,
							artista.nomeartista
						FROM 
							articoli
						JOIN 
							artista
						ON 
							articoli.cod_artista = artista.cod_artista";

				$ris = $conn->query($sql) or die("<p>query errata</p>");
				if($ris->num_rows == 0){
					echo "<p>nessuno</p>";
				}else{
				foreach($ris as $riga){
					$cod_articolo = $riga["cod_articolo"];
					$nomearticolo = $riga["nomearticolo"];
					$foto = $riga["foto"];
					$descrizione = $riga["descrizione"];
					$nomeartista = $riga["nomeartista"];
			
					echo <<<EOD
						<div class="card-articolo">
							<div class="card-articolo__img">
								<img src="../immagini/$foto" alt="$foto">
							</div>
							<div class="card-articolo__testo">
								<p>Titolo: $nomearticolo</p> 
								<p>Artista: $nomeartista</p>
								<p>Descrizione: $descrizione</p>
							</div>
						</div>
					EOD;
					}
                } 
			?>
		</div>

	</div>
</body>
</html>
<?php
	$conn->close();
?>

