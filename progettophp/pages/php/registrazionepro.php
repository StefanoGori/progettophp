<?php
    include "../../db/connection.php";

    $conn=db();
    $conn2=db();
    $nome=$_POST['nome'];
    $cf=$_POST['cf'];
    $indirizzo=$_POST['indirizzo'];
    $email=$_POST['email'];
    $password=sha1($_POST['password']);
    $telefono=$_POST['telefono'];
    $iban=$_POST['iban'];
    print_r($_POST);
    $queryControllo="SELECT email, password FROM proprietari WHERE email='{$email}' AND password='{$password}'";
    $inserimentoNuovoUtente="INSERT INTO proprietari(codicefiscale,nome,indirizzo,telefono,email,codiceiban,password) 
                            VALUES('{$cf}','{$nome}','{$indirizzo}','{$telefono}','{$email}','{$iban}','{$password}')";
    $conn->query($queryControllo);
    
    if($conn->affected_rows>0){
        echo"ERRORE PROPRIETARIO GIA' ESISTENTE";
        $conn->close();
        header("Location:../registrazionepro.html");
    }
    else{
        $conn2->query($inserimentoNuovoUtente);
        $conn2->close();
        session_start();
        $_SESSION['codpro']=$cf;
        header("Location:../nuovoappartamento.html");
    }
?>