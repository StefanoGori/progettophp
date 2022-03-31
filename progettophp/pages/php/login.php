<?php
    include "../../db/connection.php";

    $conn=db();
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);

    $QueryControllo="SELECT email, nomeutente, password FROM clienti WHERE email=$email AND nomeutente=$username AND password=$password";
    $conn->query($QueryControllo);
    
    if($conn->affected_rows==1){
        $conn->close();
        session_start();
        $_SESSION['username']=$_POST['username'];
        header("Location:../elenco.html");
    }
    else{
        echo "EMAIL USERNAME O PASSWORD ERRATI".$conn->error."<br>";
    }
?>