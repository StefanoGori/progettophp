<?php
    include '../../db/connection.php';
    $conn=db();
    $conn2=db();
    $foto=$_POST['foto'];
    $indirizzo=$_POST['indirizzo'];
    $prezzogiorno=$_POST['prezzogiorno'];
    $numerocamere=$_POST['numerocamere'];
    $postiletto=$_POST['postiletto'];
    $usocucina=$_POST['usocucina'];
    $parcheggio=$_POST['parcheggio'];
    $note=$_POST['note'];
    $quartiere=$_POST['quartiere'];
    $linkq=$_POST['linkq'];

    $queryapp="INSERT INTO appartamenti()
            VALUES()";
    $queryq="INSERT INTO quartieri()
             VALUES";
    
?>