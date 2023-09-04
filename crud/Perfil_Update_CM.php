<?php
require ('dbconnection.php');
require ('protect.php');

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}



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
        do_nothing();
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

if(!$old_pass){
    header("Location: ../PagesToCM/PerfilCM.php");
    }
    else if(!$new_pass_1 || !$new_pass_2 || $new_pass_1!=$new_pass_2){
        header("Location: ../PagesToCM/PerfilCM.php");
        }   else{
                $sql_code = "SELECT Nome FROM entidade WHERE Password = '$old_pass' AND idEntidade = '$user'";
                $sql_querry = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);
                $quantidade = $sql_querry->num_rows;
                    if($quantidade==1){
                    $uppass = "UPDATE `entidade` SET Password = '$new_pass_1' WHERE `entidade`.`idEntidade` = '$user'";
                    if ($conn->query($uppass) === TRUE) {
                        header("Location: ../PagesToCM/PerfilCM.php?PasswordAlterada");
                    } else {
                        header("Location: ../PagesToCM/PerfilCM.php");
                    }
            }
        }


