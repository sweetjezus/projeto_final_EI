<?php
require 'dbconnection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$psw_1 = $_POST['psw_1'];
$psw_2 = $_POST['psw_2'];
$morada = $_POST['morada'];
$codp = $_POST['codp'];
$nif = $_POST['nif'];
$localidade = $_POST['localidade'];
$telf = $_POST['telf'];
$tpent = $_POST['tpent'];

//(`idEntidade`, `Nome`, `Email`, `Password`, `Morada`, `CodigoPostal`, `NIF`, `Localidade`, `Telefone`, `TipoDeEntidade_idTipo de Entidade`)




if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../Registo.php?ierror=invalidmail&nome=".$name);
    exit();
}
elseif($psw_1 != $psw_2){
    header("Location: ../Registo.php?error=passwordcheck&nome=".$name."&email".$email);
    exit();
}
else {

    $sql = "SELECT `Email` FROM `entidade` WHERE `Email` = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Registo.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
            header("Location: ../Registo.php?error=emmailusado&nome=".$name);
            alert("Email já está a ser utilizao");
            exit();
        }
        else {
            $sql = "INSERT INTO `entidade` (`idEntidade`, `Nome`, `Email`, `Password`, `Morada`, `CodigoPostal`, `NIF`, `Localidade`, `Telefone`, `TipoDeEntidade`)
                   VALUES ('$name', '$email', '$email', '$psw_1', '$morada', '$codp', '$nif','$localidade','$telf','$tpent')";
            if ($conn->query($sql) === TRUE) {
                header("Location: ../index.php?registadonovouser");
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

