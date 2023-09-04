<?php

function eq($nome,$data_1 ,$data_2,$desc,$id_owner,$imagem){

    $_SESSION['id_owner'] = $id_owner;

    $equipamento = "
<hr style=\"border-top: 1px solid white;\">
                    <div class=\"col-md-6\">
                        <img class=\"card-img-top mb-5 mb-md-0\" src=\"$imagem\" style=\"height: 100%; width: 100%;\" alt=\"equipamento_$nome.jpg\" />
                        </div>
                        
                    <div class=\"col-md-6\">
      <div class=\"col-md-6\">

                        <h1 class=\"display-5 fw-bolder\">$nome</h1>
                        <hr style=\"border-top: 1px solid white;\">
                        <!--Descriçao--->
                        <p class=\"lead\"> $desc </p>
                        <hr style=\"border-top: 1px solid white;\">

                        <!---Data de disponibilidade--->
                        <!---Data de inicio---><h>$data_1</h>
                        <h> até </h>
                        <!---Data de Fim------><h>$data_2</h>

                        <hr style=\"border-top: 1px solid white;\">
                        <div class=\"d-flex\">
                            <!-- Button trigger modal -->
                            <button type=\"button\" class=\"btn btn-outline-dark\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" value=\"$id_owner\">
                                         <i class=\"bi-envelope-plus\"></i> Contactar
                            </button>
                        </div>
                </div>
                
</div>
    ";
    echo $equipamento;
}


function show_eq($iq_eq){

    include('dbconnection.php');

    $sql_code = "SELECT * FROM equipamento WHERE idEquipamento='$iq_eq'";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        eq($row['Tipo'],$row['DataInicialdeDisponibilidade'],$row['DataFinalldeDisponibilidade'],$row['Descrição'],$row['Entidade_idEntidade'],$row['ImagemPath']);
    }

}
