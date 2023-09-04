<?php
require ('dbconnection.php');
require ('protect.php');

$estado = $_POST['estado'];
$pedido = $_POST['pedido'];

if(!$estado){
    do_nothing();
    header('Location: ../PagesToOE/PedidosOE.php');
}
else{
    $update_pedido="UPDATE `pedido` SET `Estado_idEstado` = '$estado' WHERE `pedido`.`idPedido` = '$pedido'";
    $conn->query($update_pedido);
    header('Location: ../PagesToOE/PedidosOE.php');
}