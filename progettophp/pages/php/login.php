<?php
    include "../../db/connection.php";
    session_start();
    $conn=db();
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    echo $password ."<br>". $_POST['password'];

    $QueryControllo="SELECT email, nomeutente, pass_word FROM clienti WHERE email ='{$email}' AND nomeutente ='{$username}' AND pass_word ='{$password}'";
    $conn->query($QueryControllo);
    print_r($res);
    if($conn->affected_rows==1){
        $conn->close();
        header("Location:elenco.php");
    }
    else{
        echo "EMAIL USERNAME O PASSWORD ERRATI".$conn->error."<br>";
    }
?>