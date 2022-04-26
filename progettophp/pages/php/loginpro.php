<?php
    include "../../db/connection.php";

    $conn=db();
    $conn2=db();
    $email=$_POST['email'];
    $password=sha1($_POST['password']);

    $QueryControllo="SELECT email, password FROM proprietari WHERE email='{$email}' AND password='{$password}'";
    $querycodpro="SELECT codicefiscale FROM proprietari WHERE email='{$email}' AND password='{$password}'";
    $conn->query($QueryControllo);
    
    if($conn->affected_rows>0){
        $conn->close();
        session_start();
        $result=array();
        $res=$conn2->query($querycodpro);
        while($row=mysqli_fetch_array($res)){
            $result[]=$row;
        }
        $_SESSION['codpro']=$result;
        $conn2->close();
        header("Location:../nuovoappartamento.html");
    }
    else{
        echo "EMAIL O PASSWORD ERRATI".$conn->error."<br>";
    }
?>