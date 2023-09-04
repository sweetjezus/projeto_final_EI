<?php

function eqs_disponiveis($nome,$data_1 ,$data_2,$eqid,$image,$estado){

    $equipamentos = "
                <!--EquipamentoTemplate-->
                    <div class=\"col mb-5\">
                        <div class=\"card h-100\">
                            <!-- Imagem do equipamento -->
                            <img class=\"card-img-top\" src=\"$image\" alt=\"../upload/$image\" />
                            <!-- Product details-->
                            <div class=\"card-body p-4\">
                                <div>
                                    <h6 class=\"fw-bolder\">Tipo:</h6>
                                </div>
                                <!-- Nome do Eq-->
                                <div class=\"text-center\">
                                    <p class=\"lead\">$nome</p>
                                </div>
                                <hr style=\"border-top: 1px solid white;\">
                                <div>
                                    <h6 class=\"fw-bolder\">Data de Disponibilidade:</h6>
                                </div>
                                <!--- Data de disponibilidade --->
                                <div class=\"text-center\">
                                    <h class=\"lead\">$data_1</h>
                                    <h class=\"lead\"> até </h>
                                    <h class=\"lead\">$data_2</h>
                                </div>
                                <hr style=\"border-top: 1px solid white;\">
                                <!---ESTADO--->
                                <div>
                                    <h6 class=\"fw-bolder\">Estado:</h6>
                                </div>
                                <div class=\"text-center\">
                                    <p class=\"lead\">$estado</p>
                                </div>
                            </div>
                            
                            <!-- Product actions-->
                            <div class=\"modal-footer\">
                                <form action=\"HomeOE.php\" method=\"post\">    
                                <button class=\"btn\" type=\"submit\" name=\"vermais\">
                                     <a class=\"btn btn-outline-dark mt-auto\">
                                        Ver Mais
                                    </a>
                                </button> 
                                <input type='hidden' name='eqid' value=$eqid>
                           </form>
                            </div>
                        </div>
                    </div>
    ";
    echo $equipamentos;
}



function meus_equipamentos($id){
    include('dbconnection.php');

    $sql_code = "SELECT
`idEquipamento`, `Tipo`, `Descrição`, `DataInicialdeDisponibilidade`, `DataFinalldeDisponibilidade`, `ImagemPath`, `Entidade_idEntidade`, `Estado_idEstado`, state.Estado
FROM  equipamento
	INNER JOIN estadodalistagem AS state 
    ON equipamento.Estado_idEstado = state.idEstado WHERE Entidade_idEntidade = '$id'";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        eqs_disponiveis($row['Tipo'],$row['DataInicialdeDisponibilidade'],$row['DataFinalldeDisponibilidade'],$row['idEquipamento'],$row['ImagemPath'],$row['Estado']);
    }
}


