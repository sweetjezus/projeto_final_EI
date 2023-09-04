<?php
include ('dbconnection.php');
require ('protect.php');

$eq = $_SESSION['id_eq'];
$nif = $_POST['nif'];
$mensagem = $_POST['mensagem'];
$junta = $_SESSION['id'];
$ipss = $_SESSION['id_owner'];


$nequipamento = "INSERT INTO `pedido` (`Equipamentos_idEquipamentos`, `Num_Identificação_de_Seguranca_Social`, `DataPedido`, `Mensagem`, `Estado_idEstado`, `Junta_idEntidade`, `IPSS_idEntidade`) 
VALUES ( '$eq', '$nif', now(), '$mensagem', '1', '$junta', '$ipss')";

if ($conn->query($nequipamento) === TRUE) {
    echo "Pedido Feito";
    header("Location: ../PagesToCM/HomeCM.php");
}