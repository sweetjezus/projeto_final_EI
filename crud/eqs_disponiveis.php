<?php

function eqs_disponiveis($nome,$data_1 ,$data_2,$eqid,$imagem){

    $equipamentos = "
                <html>
                    <div class=\"col mb-5\">
                        <div class=\"card h-100\">
                            <!-- Imagem do equipamento -->
                            <img class=\"card-img-top\" src=\"$imagem\" alt=\"$nome.jpg\"/>
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
                                    <h6 class=\"fw-bolder\">Disponibilidade:</h6>
                                </div>
                                <!--- Data de disponibilidade --->
                                <div class=\"text-center\">
                                    <p class=\"lead\"> $data_1 - $data_2  </p>
                                </div>
                            </div>
                            <!-- Mais Info do Equipamento-->
                            <form class=\"card-footer p-5 pt-0 border-top-0 bg-transparent\" action=\"HomeCM.php\" method=\"post\">    
                                <button class=\"btn\" type=\"submit\" name=\"eqdetail\">
                                     <a class=\"btn btn-outline-dark mt-auto\">
                                        Mais Informação
                                    </a>
                                </button> 
                                <input type='hidden' name='eqid' value=$eqid>
                           </form>
                        </div>
                    </div>
                  </html> 
    ";
    echo $equipamentos;
}

function show_pesquisa($pesquisa){
    include('dbconnection.php');

    $sql_code = "SELECT * FROM equipamento 
                    WHERE Estado_idEstado = 1  
                    AND Tipo LIKE '%$pesquisa%'
                    ORDER BY idEquipamento DESC";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        eqs_disponiveis($row['Tipo'],$row['DataInicialdeDisponibilidade'],$row['DataFinalldeDisponibilidade'],$row['idEquipamento'],$row['ImagemPath']);
    }
}

function show_eqs(){
    include('dbconnection.php');

    $sql_code = "SELECT * FROM equipamento WHERE Estado_idEstado = 1 ORDER BY idEquipamento DESC";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        eqs_disponiveis($row['Tipo'],$row['DataInicialdeDisponibilidade'],$row['DataFinalldeDisponibilidade'],$row['idEquipamento'],$row['ImagemPath']);
    }
}




