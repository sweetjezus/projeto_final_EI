<?php
include('dbconnection.php');

if(isset($_POST['email']) || isset($_POST['pass'])){
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $conn->real_escape_string($_POST['pass']);

    $sql_code = "SELECT * FROM entidade WHERE Email = '$email' AND Password = '$pass'";
    $sql_querry = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    $quantidade = $sql_querry->num_rows;

    if($quantidade==1){
        $user = $sql_querry->fetch_assoc();
        if($user['TipoDeEntidade']==2){
            if(!isset($_SESSION)){
               session_start();
            }
            $_SESSION['id'] = $user['idEntidade'];
            $_SESSION['tipoentidaed'] = $user['TipoDeEntidade'];
            header("Location: ../PagesToOE/HomeOE.php");
        }
        else {
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $user['idEntidade'];
            $_SESSION['tipoentidaed'] = $user['TipoDeEntidade'];
            header("Location: ../PagesToCM/HomeCM.php");
        }
    }
    else{
        header("Location: ../MainPassError.php");
    }
}