<?php
    include "../../db/connection.php";

    $conn=db();
    $conn2=db();
    $nome=$_POST['nome'];
    $cf=$_POST['cf'];
    $indirizzo=$_POST['indirizzo'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $telefono=$_POST['telefonoCasa'];
    $cellulare=$_POST['cellulare'];

    $queryControllo="SELECT email, nomeutente, pass_word FROM clienti WHERE email='{$email}' AND nomeutente='{$username}' AND pass_word='{$password}'";
    $inserimentoNuovoUtente="INSERT INTO clienti(codicefiscale,nome,indirizzo,nomeutente,pass_word,telefono,cellulare,email) VALUES('{$cf}','{$nome}','{$indirizzo}','{$username}','{$password}','{$telefono}','{$cellulare}','{$email}')";
    $conn->query($queryControllo);
    
    if($conn->affected_rows>0){
        echo"ERRORE UTENTE GIA' ESISTENTE";
        $conn->close();
        header("Location:../registrazione.html");
    }
    else{
        $conn2->query($inserimentoNuovoUtente);
        $conn2->close();
        header("Location:elenco.php");
    }
?>