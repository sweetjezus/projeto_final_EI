<?php
require ('dbconnection.php');
require ('protect.php');

$tipo = $_POST['name'];
$descricao = $_POST['desc'];
$data_1 = $_POST['data_1'];
$data_2 = $_POST['data_2'];
$disponibilidade = '1';
$entidade = $_SESSION['id'];
$Estado = '1';

if(isset($_FILES['imagem'])){
    $imagem = $_FILES['imagem'];
    $pasta = "../upload/";
    $nome_img = $imagem['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_img,PATHINFO_EXTENSION));
    if($extensao != 'jpg' && $extensao != 'png'){
        die("Tipo de imagem nao aceite. Apenas .jpg e .png");
    }
    $nome_final=$pasta . $novo_nome . "." . $extensao;
    $caminho_imagem=move_uploaded_file($imagem["tmp_name"], $nome_final);
}







$nequipamento = "INSERT INTO `equipamento` (`Tipo`, `Descrição`, `DataInicialdeDisponibilidade`, `DataFinalldeDisponibilidade`, `ImagemPath`,  `Entidade_idEntidade`, `Estado_idEstado`) 
VALUES ('$tipo', '$descricao', '$data_1', '$data_2', '$nome_final', '$entidade', '$Estado')";

if ($conn->query($nequipamento) === TRUE) {
    echo "Adicionou";
    var_dump($_FILES['imagem']);
    header("Location: ../PagesToOE/HomeOE.php");
}