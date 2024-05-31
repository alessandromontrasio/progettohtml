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
		<header> 
            <div class="cimg3">
                <img src="../foto\logo.png" alt="">
            </div>
            <div class="clearfix" ></div>
            <div>
            <div class="contenitore_top">
            <a href="../index.html" class="tit">SHOP</a>
            
            <div class="sx">
                <ul id="menu">
                    <li> <a href="../index.html"> Home Page</a> </li>
                    <li> <a href="../pagine/Players Club '23.html"> Players Club '23</a> </li>
                    <!-- <li> <a href="Emergenti.html"> Emergenti</a></li> -->
                    <div class="dropdown">
                        <li> <a class="dropbtn" href="../pagine/Emergenti.html">Emergenti</a> </li>
                        <div class="dropdown-content">
                        <a href="../pagine/tony boy.html">Tony Boy</a>
                        <a href="../pagine/kid yugi.html">Kid Yugi</a>
                        <a href="../pagine/artie 5ive.html">Artie 5ive</a>
                        <a href="../pagine/digital astro.html">Digital Astro</a>
                        <a href="../pagine/nerissima serpe.html">Nerissima Serpe</a>
                        <a href="../pagine/papa v.html">Papa V</a>
                        <a href="../pagine/low red.html">Low-Red</a>
                        </div>
                    </div>
            </div>
            </ul>
            <div class="dx">
                <ul id="accedi">
                    <li> <a href="../pagine/login.php"> Accedi</a> </li>
                    <li> <a href="../pagine/registrazione.php">Registrati</a></li>

                </ul>
				<div class="cimg1">
					<a href="../pagine/carrello.php"> <img src="../foto/carrello.png" alt=""> </a>
				</div>
            </div>
        </div>         
        </header>  
	
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
					<div class="container">
						<div class="shop-item">
							<img src="../foto/$foto" alt="$foto">
							<p>Titolo: $nomearticolo</p> 
							<p>Artista: $nomeartista</p>
							<p>Descrizione: $descrizione</p>
							<p class="price">$19.99</p>
							<button class="aggiungi-a-cart">Aggiungi al Carrello</button>
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

