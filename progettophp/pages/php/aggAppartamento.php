<?php
    include '../../db/connection.php';
    session_start();
    $codpro=$_SESSION['codpro'];
    $conn=db();
    $conn2=db();
    $conn3=db();
    $conn4=db();
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
    $codicequartiere="";


    $queryapp="INSERT INTO appartamenti(indirizzo,prezzogiorno,numerocamere,postiletto,usocucina,parcheggio,note,codicequartiere,codiceproprietario)
            VALUES('{$indirizzo}','{$prezzogiorno}','{$numerocamere}','{$postiletto}','{$usocucina}','{$parcheggio}','{$note}','{$codicequartiere}','{$codpro}')";
    $queryq="INSERT INTO quartieri(nome,urlmappa)
             VALUES('{$quartiere}','{$linkq}')";
    $querycodiceq="SELECT codice FROM quartieri WHERE nome='{$quartiere}' AND urlmappa='{$linkq}'";
    $queryquartieri="SELECT * FROM quartieri WHERE urlmappa='{$linkq}'";

    $conn4->query($queryquartieri);
    if($conn4->affected_rows==0){
        $conn2->query($queryq);
        $conn2->close();
    }
    $res=$conn3->query($querycodiceq);
    $row=array();
    $row[]=mysqli_fetch_row($res);
    $codicequartiere=stripslashes($row[0]);
    echo "codquartiere=".$codicequartiere;
    $conn->query($queryapp);
    $conn->close();
    $conn3->close();
    header('Location:elenco.php');

?>