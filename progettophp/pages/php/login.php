<?php
    include "../../db/connection.php";

    $conn=db();
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);

    $QueryControllo="SELECT email, nomeutente, pass_word FROM clienti WHERE email='{$email}' AND nomeutente='{$username}' AND pass_word='{$password}'";
    $conn->query($QueryControllo);
    
    if($conn->affected_rows==0){
        $conn->close();
        header("Location:elenco.php");
    }
    else{
        echo "EMAIL USERNAME O PASSWORD ERRATI".$conn->error."<br>";
    }
?>