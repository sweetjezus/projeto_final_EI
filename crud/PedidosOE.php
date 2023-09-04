<?php

function echo_pedido($nome,$descri,$data1,$data2,$mensagem,$imagem,$estado,$idPedido){

    $pedido = "
<section class=\"py-5\">
            <div class=\"container px-4 px-lg-5 mt-5\">
                <div class=\"card\" style=\"max-width: 100%;\">
                    <div class=\"row g-0\">
                        <hr style=\"border-top: 1px solid white;\">
                        <div class=\"col-md-4\">
                            <img class=\"card-img-top\" src=\"$imagem\" alt=\"...\" />
                        </div>
                        <div class=\"col-md-8\">
                            <div class=\"card-body\">
                                <!-- Pedido details-->
                                <div class=\"card-body p-4\">
                                    <div>
                                        <!---------------------Equipamento------------------------------------------------->
                                        <b>Tipo:</b>
                                        <p class=\"lead\">
                                            <!--Equipamentos-->
                                            $nome
                                        </p>
                                        <!-----------------------Datas----------------------------------------------->
                                        <b>Data de Disponibilidade:</b>
                                        <p class=\"lead\">
                                            <!--datas-->
                                                <!---Data Inicial--->
                                            $data1
                                            até
                                            <!---Data Final--->
                                            $data2
                                            </p>
                                        <!------------------------Descrição---------------------------------------------->
                                        <b>Descrição:</b>
                                        <p class=\"lead\">
                                            <!--datas-->
                                            $descri
                                        </p>
                                        <!------------------------Mensagem---------------------------------------------->
                                            <b>Mensagem:</b>
                                        <!---TEXTO da mensagem--->
                                        <p class=\"lead\"> $mensagem </p>
                                        <!---------------------------------------------------------------------->
                                    </div>

                                    <!---Aceitar/Rejeitar--->
                                    <form action=\"../crud/ResponderPedido.php\" method=\"post\">
                                    <div class=\"input-group\">
                                        <select class=\"custom-select\" id=\"inputGroupSelect04\" name=\"estado\">
                                            <option value=\"1\"selected>$estado </option>
                                            <option value=\"2\">Aceitar</option>
                                            <option value=\"3\">Rejeitar</option>
                                        </select>
                                        <input type=\"hidden\" name=\"pedido\" value=\"$idPedido\">
                                        <div class=\"input-group-append\">
                                            <button class=\"btn btn-outline-dark\" type=\"submit\">Confirmar</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    ";
    echo $pedido;
}


function listar_pedidos($id){
    include('dbconnection.php');

    $sql="SELECT
pedido.idPedido,
pedido.Num_Identificação_de_Seguranca_Social AS NISS,
pedido.Mensagem,
pedido.DataPedido,
estadoP.Estado,
contacto.Nome,
contacto.Email,
contacto.Telefone,
detalhes.Tipo,
detalhes.Descrição AS Descricao,
detalhes.DataInicialdeDisponibilidade AS DataInicial,
detalhes.DataFinalldeDisponibilidade AS DataFinal,
detalhes.ImagemPath AS Imagem
FROM  pedido
	INNER JOIN entidade AS contacto 
    ON contacto.idEntidade = pedido.IPSS_idEntidade
    INNER JOIN equipamento AS detalhes
    ON pedido.Equipamentos_idEquipamentos = detalhes.idEquipamento
    INNER JOIN estadodopedido AS estadoP
    ON pedido.Estado_idEstado = estadoP.idEstado
WHERE pedido.IPSS_idEntidade = '$id'
ORDER BY DataPedido DESC";

    $result = $conn->query($sql) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        echo_pedido($row['Tipo'],$row['Descricao'],$row['DataInicial'],$row['DataFinal'],$row['Mensagem'],$row['Imagem'],$row['Estado'],$row['idPedido']);

    }



}