<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<header> 
            <div class="cimg3">
                <img src="../foto\logo.png" alt="">
            </div>
            <div class="clearfix" ></div>
            
            <div class="contenitore_top_em">
            <a href="../carrello.html" class="tit">CARRELLO</a>
            
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
			</div>    
			<div class="cimgcarr" style="border: 1px solid white;">
                <a href="carrello.php">
                    <img src="../foto\carrello.jpg" alt="">
                </a>
            </div>
		</header>  
        <main  class="cont sfondo-sfumato">

        </main>

        <?php
            session_start();
            require("../data/connessionedb.php");
        ?>
</body>
</html>