<?php

//Pass
require ('dbconnection.php');
require ('protect.php');





function do_nothing() {
    ;
}

$user = $_SESSION['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$morada = $_POST['morada'];
$cdp = $_POST['cdp'];
$telf = $_POST['telf'];
$nif = $_POST['nif'];
$old_pass = $_POST['pass'];
$new_pass_1 = $_POST['np1'];
$new_pass_2 = $_POST['np2'];

if(!$nome){
    do_nothing();
}else{
    $upnome = "UPDATE `entidade` SET `Nome` = '$nome' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($upnome) === TRUE) {
       function_alert("teste");
    }
}

if(!$email){
    do_nothing();
}else{
    $upmail = "UPDATE `entidade` SET Email = '$email' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($upmail) === TRUE) {
        do_nothing();
    }
}

if(!$morada){
    do_nothing();
}else{
    $upmorada = "UPDATE `entidade` SET Morada = '$morada' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($upmorada) === TRUE) {
        do_nothing();
    }
}
if(!$cdp){
    do_nothing();
}else{
    $upcdp = "UPDATE `entidade` SET CodigoPostal = '$cdp' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($upcdp) === TRUE) {
        do_nothing();
    }
}
if(!$nif){
    do_nothing();
}else{
    $uptelf = "UPDATE `entidade` SET NIF = '$nif' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($uptelf) === TRUE) {
        do_nothing();
    }
}
if(!$telf){
    do_nothing();
}else{
    $upnif = "UPDATE `entidade` SET Telefone = '$telf' WHERE `entidade`.`idEntidade` = '$user'";
    if ($conn->query($upnif) === TRUE) {
        do_nothing();
    }
}

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}

if(!$old_pass || !$new_pass_1 || !$new_pass_2 ){
    header("Location: ../PagesToOE/PerfilOE.php");
    function_alert("testes");
}
else if($new_pass_1!=$new_pass_2){
    header("Location: ../PagesToOE/PerfilOE.php");
}   else{
    $pass_verify = "SELECT Nome FROM entidade WHERE Password = '$old_pass' AND idEntidade = '$user'";
    $sql_querry = $conn->query($pass_verify) or header("Location: ../PagesToOE/PerfilOE.php");
    $correspondentes = $sql_querry->num_rows;
    if($correspondentes==1){
        $uppass = "UPDATE `entidade` SET Password = '$new_pass_1' WHERE `entidade`.`idEntidade` = '$user'";
        if ($conn->query($uppass) === TRUE) {
            header("Location: ../PagesToOE/PerfilOE.php?PasswordAlterada");
        } else {
            header("Location: ../PagesToOE/PerfilOE.php");
        }
    }else{
        header("Location: ../PagesToOE/PerfilOE.php");
    }
}


