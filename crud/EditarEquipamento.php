<?php
require ('dbconnection.php');
require ('protect.php');

$id_equipamento = $_SESSION['id_eq'];
$novonome = $_POST['novonome'];
$novadesc = $_POST['novadescricao'];
$data1 = $_POST['novadt1'];
$data2 = $_POST['novadt2'];
$novoestado = $_POST['estado'];

function do_nothing() {
    ;
}

if(!$novonome){
    do_nothing();
}else{
    $sql_nome="UPDATE `equipamento` SET `Tipo` = '$novonome' WHERE `equipamento`.`idEquipamento` = '$id_equipamento'";
    $conn->query($sql_nome);
    header('Location: ../PagesToOE/MyEQ.php');
}

if(!$novadesc){
    do_nothing();
}else{
    $sql_desc="UPDATE `equipamento` SET `Descrição` = '$novadesc' WHERE `equipamento`.`idEquipamento` = '$id_equipamento'";
    $conn->query($sql_desc);
    header('Location: ../PagesToOE/MyEQ.php');
}

if(!$data1 || !$data2){
    do_nothing();
}else{
    $sql_datas="UPDATE `equipamento` SET `DataInicialdeDisponibilidade` = '$data1', `DataFinalldeDisponibilidade` = '$data2' WHERE `equipamento`.`idEquipamento` = '$id_equipamento'";
    $conn->query($sql_datas);
    header('Location: ../PagesToOE/MyEQ.php');
}

if(!$novoestado){
    do_nothing();
}else{
    $sql_estado="UPDATE `equipamento` SET `Estado_idEstado` = '$novoestado' WHERE `equipamento`.`idEquipamento` = '$id_equipamento';";
    $conn->query($sql_estado);
    header('Location: ../PagesToOE/MyEQ.php');
}
