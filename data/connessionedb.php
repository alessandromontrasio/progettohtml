<?php
    $conn = new mysqli("localhost","root", "", "playersclub");
    if($conn->connect_error)
        die("<p> errore di connessione</p>".$conn->connect_error."<p>") 
?>