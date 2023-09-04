<?php
require ('dbconnection.php');
require ('protect.php');

$id_equipamento = $_POST['removeeq'];
$img_to_delete = $_POST['removeimg'];

## Primeiro eleminar pedidos refentes ao equipamento


$sql_clean_pedidos="DELETE FROM `pedido` WHERE `pedido`.`Equipamentos_idEquipamentos` = '$id_equipamento'";
$conn->query($sql_clean_pedidos);

$sql_remover_equipamento="DELETE FROM `equipamento` WHERE `equipamento`.`idEquipamento` = '$id_equipamento'";
$conn->query($sql_remover_equipamento);
##apagar imagem
unlink($img_to_delete);

header('Location: ../PagesToOE/HomeOE.php');