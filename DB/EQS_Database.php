<?php
$servername = "localhost";
$dBUsername = "francisco";
$dBPassword = "";

// Criar connection
$conn = new mysqli($servername, $dBUsername, $dBPassword);

// Check connection
if ($conn->connect_error) {
    echo("Erro ao conectar");
    die("Failed: " . $conn->connect_error);
}

// Criar database
$sql = "CREATE DATABASE IF NOT EXISTS EqsDB;";
if ($conn->query($sql) === TRUE) {

} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$dbname = "EqsDB";

$conn = new mysqli($servername, $dBUsername, $dBPassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Criar Tabelas
#tipo de entidade
// TABELAS - CREATE

$table1 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`tipodeentidade` (
  `idTipo de Entidade` INT NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo de Entidade`)
) ENGINE = InnoDB;";

$table2 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`entidade` (
  `idEntidade` INT AUTO_INCREMENT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Morada` VARCHAR(100) NOT NULL,
  `CodigoPostal` VARCHAR(8) NOT NULL,
  `NIF` VARCHAR(45) NOT NULL,
  `Localidade` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(14) NOT NULL,
  `TipoDeEntidade` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idEntidade`)
) ENGINE = InnoDB;";

$table3 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`estadodalistagem` (
  `idEstado` INT NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE = InnoDB;";

$table4 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`equipamento` (
  `idEquipamento` INT(6) AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  `Descrição` VARCHAR(300) NOT NULL,
  `DataInicialdeDisponibilidade` DATE NOT NULL,
  `DataFinalldeDisponibilidade` DATE NOT NULL,
  `ImagemPath` VARCHAR(250) NOT NULL,
  `Entidade_idEntidade` INT NOT NULL,
  `Estado_idEstado` INT NOT NULL,
  PRIMARY KEY (`idEquipamento`),
  FOREIGN KEY (`Entidade_idEntidade`) REFERENCES `EqsDB`.`entidade` (`idEntidade`),
  FOREIGN KEY (`Estado_idEstado`) REFERENCES `EqsDB`.`estadodalistagem` (`idEstado`)
) ENGINE = InnoDB;";

$table5 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`estadodopedido` (
  `idEstado` INT NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE = InnoDB;";

$table6 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`pedido` (
  `idPedido` INT(6) AUTO_INCREMENT NOT NULL,
  `Equipamentos_idEquipamentos` INT NOT NULL,
  `Num_Identificação_de_Seguranca_Social` VARCHAR(14) NOT NULL,
  `DataPedido` DATETIME NOT NULL,
  `Mensagem` VARCHAR(100) NOT NULL,
  `Estado_idEstado` INT NOT NULL,
  `Junta_idEntidade` INT NOT NULL,
  `IPSS_idEntidade` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  FOREIGN KEY (`Equipamentos_idEquipamentos`) REFERENCES `EqsDB`.`equipamento` (`idEquipamento`),
  FOREIGN KEY (`Estado_idEstado`) REFERENCES `EqsDB`.`estadodopedido` (`idEstado`),
  FOREIGN KEY (`Junta_idEntidade`) REFERENCES `EqsDB`.`entidade` (`idEntidade`),
  FOREIGN KEY (`IPSS_idEntidade`) REFERENCES `EqsDB`.`entidade` (`idEntidade`)
) ENGINE = InnoDB;";



$tables = [$table1,$table2,$table3,$table4,$table5,$table6];

foreach($tables as $k => $sql){
    $query = @$conn->query($sql);

    if(!$query)
        $errors[] = "Table $k : Creation failed ($conn->error)";
    else
        $errors[] = "Table $k : Creation done";
}
//foreach($errors as $msg) {
//    echo "$msg <br>";
//}
###Inserir dados base das tabelas TipoDeEntidade, EstadoDeListagem e EstadoDePedido
//Dados de tipo De Entidade
$TE1 = "INSERT IGNORE INTO `tipodeentidade` (`idTipo de Entidade`, `Tipo`) VALUES ('1', 'JuntaDeFreguesia')";
$TE2 = "INSERT IGNORE INTO `tipodeentidade` (`idTipo de Entidade`, `Tipo`) VALUES ('2', 'IPSS')";
$TE3 = "INSERT IGNORE INTO `tipodeentidade` (`idTipo de Entidade`, `Tipo`) VALUES ('66', 'admin')";

//Dados de Estado da Listagem
$EL1 = "INSERT IGNORE INTO `estadodalistagem` (`idEstado`, `Estado`) VALUES ('1', 'Listado')";
$EL2 = "INSERT IGNORE INTO `estadodalistagem` (`idEstado`, `Estado`) VALUES ('2', 'NaoListado')";

//Dados de Estado do Pedido
$EP1 = "INSERT IGNORE INTO `estadodopedido` (`idEstado`, `Estado`) VALUES ('1', 'Aguardar')";
$EP2 = "INSERT IGNORE INTO `estadodopedido` (`idEstado`, `Estado`) VALUES ('2', 'Aceite')";
$EP3 = "INSERT IGNORE INTO `estadodopedido` (`idEstado`, `Estado`) VALUES ('3', 'Rejeitado')";
$adm = "INSERT IGNORE INTO `entidade` (`idEntidade`, `Nome`, `Email`, `Password`, `Morada`, `CodigoPostal`, `NIF`, `Localidade`, `Telefone`, `TipoDeEntidade`) 
VALUES ('1', 'admin', 'admin@admin.com', 'admin', 'admin', '1234-123', '123456789', 'admin', '123456789', '6    ')";


$insert = [$TE1,$TE2,$TE3,$EL1,$EL2,$EP1,$EP2,$adm];

foreach($insert as $k => $sql){
    $query = @$conn->query($sql);

    if(!$query)
        $errors2[] = "Insert $k : failed ($conn->error)";
    else
        $errors2[] = "Insert $k :  done";
}
//foreach($errors2 as $msg) {
 //   echo "$msg <br>";
//}
