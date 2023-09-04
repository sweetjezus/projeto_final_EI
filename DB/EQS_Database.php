<?php
$servername = "localhost";
$dBUsername = "root";
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


#Entidades
$table2 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`Entidade` (
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
  PRIMARY KEY (`idEntidade`),
  UNIQUE INDEX `idUtilizador_UNIQUE` (`idEntidade` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) )
ENGINE = InnoDB;
";

//EstadoDaListagem
$table3 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`EstadoDaListagem` (
  `idEstado` INT NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB";

//Equipamento
$table4="CREATE TABLE IF NOT EXISTS `EqsDB`.`Equipamento` (
  `idEquipamento` INT(6) AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  `Descrição` VARCHAR(300) NOT NULL,
  `DataInicialdeDisponibilidade` DATE NOT NULL,
  `DataFinalldeDisponibilidade` DATE NOT NULL,
  `ImagemPath` VARCHAR(250) NOT NULL,
  `Entidade_idEntidade` INT NOT NULL,
  `Estado_idEstado` INT NOT NULL,
  PRIMARY KEY (`idEquipamento`),
  INDEX `fk_Equipamentos_Entidades1_idx` (`Entidade_idEntidade` ASC) ,
  INDEX `fk_Equipamento_Estado1_idx` (`Estado_idEstado` ASC) ,
  CONSTRAINT `fk_Equipamentos_Entidades1`
    FOREIGN KEY (`Entidade_idEntidade`)
    REFERENCES `EqsDB`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Equipamento_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `EqsDB`.`EstadoDaListagem` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB";

//EstadoDoPedido
$table5 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`EstadoDoPedido` (
  `idEstado` INT NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB";

//Pedido
$table6 = "CREATE TABLE IF NOT EXISTS `EqsDB`.`Pedido` (
  `idPedido` INT(6) AUTO_INCREMENT NOT NULL,
  `Equipamentos_idEquipamentos` INT NOT NULL,
  `Num_Identificação_de_Seguranca_Social` VARCHAR(14) NOT NULL,
  `DataPedido` DATETIME NOT NULL,
  `Mensagem` VARCHAR(100) NOT NULL,
  `Estado_idEstado` INT NOT NULL,
  `Junta_idEntidade` INT NOT NULL,
  `IPSS_idEntidade` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedido_Equipamentos1_idx` (`Equipamentos_idEquipamentos` ASC) ,
  INDEX `fk_Pedido_Estado1_idx` (`Estado_idEstado` ASC) ,
  INDEX `fk_Pedido_Entidade1_idx` (`Junta_idEntidade` ASC) ,
  INDEX `fk_Pedido_Entidade2_idx` (`IPSS_idEntidade` ASC) ,
  CONSTRAINT `fk_Pedido_Equipamentos1`
    FOREIGN KEY (`Equipamentos_idEquipamentos`)
    REFERENCES `EqsDB`.`Equipamento` (`idEquipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `EqsDB`.`EstadoDoPedido` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Entidade1`
    FOREIGN KEY (`Junta_idEntidade`)
    REFERENCES `EqsDB`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Entidade2`
    FOREIGN KEY (`IPSS_idEntidade`)
    REFERENCES `EqsDB`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB";


$tables = [$table2,$table3,$table4,$table5,$table6];

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
