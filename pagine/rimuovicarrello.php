<?php
    session_start();
    require("../data/connessionedb.php");
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }else $username=$_SESSION["username"];
    if(!isset($_GET["cod_articolo"]))
    {
        header("location: shop.php");
    }
    else $cod_articolo=$_GET["cod_articolo"];
    
    $query="DELETE FROM carrello
            WHERE carrello.cod_articolo = $cod_articolo";
    if($conn->query($query)===true){
        header("location: shop.php");
    }else{echo  $conn->error;}

?>