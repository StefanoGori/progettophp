<?php
    include "../../db/connection.php";
    session_start();
    $conn=db();
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['password']);

    $QueryControllo="SELECT email, nomeutente, pass_word FROM clienti";
    $res=$conn->query($QueryControllo);
    $rows=array();
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
        $rows[]=$row;
        echo $row['email'] . $row['nomeutente'] . $row['pass_word'];
        if($row['email']==$email){
            if($row['nomeutente']==$username){
                if($row['pass_word']==$password){
                    $_SESSION['email']=$email;
                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;
                    header("Location:elenco.php");
                }
            }
        }
        else{
            echo "EMAIL USERNAME O PASSWORD ERRATI".$conn->error."<br>";
            /*header("Location:../login.html");*/
        }
    }
    /*if($conn->affected_rows==0){
        $conn->close();
        //header("Location:elenco.php");
    }
    else{
        echo "EMAIL USERNAME O PASSWORD ERRATI".$conn->error."<br>";
    }*/
?>