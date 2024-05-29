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

				$sql = "SELECT cod_articolo, nome, foto
						FROM articoli  
						WHERE nome='$nome'";

				$ris = $conn->query($sql) or die("<p>query errata</p>");
				if($ris->num_rows == 0){
					echo "<p>nessuno</p>";
				}else{
				foreach($ris as $riga){
					$cod_articolo = $riga["cod_articolo"];
					$nome = $riga["nome"];
					$foto = $riga["foto"];
			
					echo <<<EOD
						<div class="card-libro">
							<div class="card-libro__img">
								<img src="../immagini/$foto" alt="$foto">
							</div>
							<div>
								<div>
									<p>Titolo: $nome</p>
									
									<a href="scheda-libro.php?cod_libro=$cod_articolo"">Scheda libro</a>
								</div>
							</div>
						</div>
					EOD;
						// echo "<li>$titolo - $nome $cognome</li>";
					}
                }
			?>
		</div>

	</div>
	<?php 
		require('footer.php');
	?>	
	
</body>
</html>
<?php
	$conn->close();
?>

