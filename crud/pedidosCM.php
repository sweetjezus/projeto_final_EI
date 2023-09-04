<?php

function echo_pedido($NISS,$Mensagem,$Estado,$Nome,$Email,$Telefone,$Tipo,$Desc,$DataInicial,$DataFinal,$Imagem){

    $pedido = "
<section class=\"py-5\">
            <div class=\"container px-4 px-lg-5 mt-5\">
                <div class=\"card\" style=\"max-width: 100%;\">
                <div class=\"row g-0\">
                <div class=\"col-md-6\">        
                <div>
                <hr style=\"border-top: 1px solid white;\">
                            <img class=\"card-img-top\" src=\"$Imagem\" alt=\"$Imagem\" style='height: 100%' width='100%'/>
                </div>    

                </div>
                        <div class=\"col-md-6\">
                            <div class=\"card-body\">
                                <!-- Pedido details-->
                                <div class=\"card-body p-4\">
                                    <div>
                                        <!---------------------Equipamento------------------------------------------------->
                                        <b>Entidade:</b>
                                        <p class=\"lead\">
                                            <!--Equipamentos-->
                                            $Nome
    </p>
                                        <!---------------------Equipamento------------------------------------------------->
                                        <b>Tipo:</b>
                                        <p class=\"lead\">
                                            <!--Equipamentos-->
                                            $Tipo
                                        </p>
                                        <!------------------------Descrição---------------------------------------------->
                                        <b>Descrição:</b>
                                        <p class=\"lead\">
                                            <!--datas-->
                                            $Desc
                                        </p>
                                        <!------------------------NISS---------------------------------------------->
                                        <b>Nº ID Civil:</b>
                                        <!---TEXTO da mensagem--->
                                        <p class=\"lead\">
                                        $NISS</p>
                                        <!------------------------Mensagem---------------------------------------------->
                                        <b>Mensagem:</b>
                                        <!---TEXTO da mensagem--->
                                        <p class=\"lead\">
                                        $Mensagem
</p>
                                        <!------------------------Datas---------------------------------------------->
                                        <b>Disponibilidade:</b>
                                        <p class=\"lead\">
                                            <!--datas-->
                                            $DataInicial  até  $DataFinal
                                        </p>
                                        <!------------------------Descrição---------------------------------------------->
                                        <b>Estado:</b><p class=\"lead\">$Estado</p>
                                        
                                        <!------------------------Contactos---------------------------------------------->
                                        <hr><h5>Contactos:</h5><p></p>
                                        
                                        <b>Email:</b>
                                        <p class=\"lead\">
                                            <!--Email-->
                                            <a href=\"mailto: $Email\">$Email</a>
                                            
                                        </p>
                                        <b>Telefone:</b>
                                        <p class=\"lead\">
                                            <!--datas-->
                                            $Telefone
                                        </p>
                                        
                                        <!---------------------------------------------------------------------->
                                    </div>
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


function ver_pedidos($id){
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
WHERE pedido.Junta_idEntidade = '$id'
ORDER BY DataPedido DESC";

    $result = $conn->query($sql) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        echo_pedido($row['NISS'],$row['Mensagem'],$row['Estado'],$row['Nome'],$row['Email'],$row['Telefone'],$row['Tipo'],$row['Descricao'],$row['DataInicial'],$row['DataFinal'],$row['Imagem']);

    }



}


