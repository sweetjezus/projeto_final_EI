<?php

function eq($nome,$data_1 ,$data_2,$desc,$eqid,$id_owner,$imagem,$estado){

    $_SESSION['id_owner'] = $id_owner;

    $equipamento = "
<hr style=\"border-top: 1px solid white;\">
                    <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"$imagem\" alt=\"$nome.jpg\" /></div>
                    <div class=\"col-md-6\">

                        <!----TITULO---->
                        <form action=\"../crud/EditarEquipamento.php\" method=\"post\">
                        <div class=\"row\">
                            <div class=\"col-12 mb-3\">
                                    <div class=\"row\">
                                        <label> <b>Titulo:</b> </label>
                                        <div class=\"input-group mb-3\">
                                            <input type=\"text\" placeholder='$nome' class=\"form-control\" name='novonome'>
                                            <div class=\"input-group-append\">
                                            <button class=\"btn btn-outline-dark\" type=\"submit\">Atualizar Titulo</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!--Descriçao--->
                        
                        <div class=\"row\">
                       
                            <div class=\"row\">
                                <label> <b>Descrição:</b> </label>
                                <div class=\"input-group mb-3\">
                                    <textarea class=\"form-control\" placeholder='$desc' rows=\"1\" name='novadescricao'></textarea>
                                    <div class=\"input-group-append\">
                                        <button class=\"btn btn-outline-dark\" type=\"submit\">Atualizar Descrição</button>
                                    </div>
                                </div>
                            </div>
                       
                        </div>

                        <!---Data de disponibilidade--->
                        <div class=\"row\">
                            <div class=\"col-12 col-sm-6 mb-3\">
                                <div class=\"mb-2\"><b>Datas de Disponibilidade Atual:</b></div>
                                <!---Data de disponibilidade--->
                                <!---Data de inicio---><h>$data_1</h>
                                <h> até </h>
                                <!---Data de Fim------><h>$data_2</h>
                                
                                <div class=\"mb-2\"><b>Atualizar datas:</b></div>
                                <div class=\"row\">
                                    <div class=\"mb-2\">
                                        <div class=\"form-group\">
                                            <input class=\"form-control\" type=\"date\" name='novadt1'>
                                            <label style=\"margin-left: 4%;\"> <b>até</b> </label>
                                            <input class=\"form-control\" type=\"date\" name='novadt2'>
                                        </div>
                                    </div>
                                </div>
                                <button class=\"btn btn-outline-dark flex-shrink-0\" type=\"submit\">Atualizar Datas</button>
                             
                            </div>
                        </div>
                        <hr style=\"border-top: 1px solid white;\">
                        <!----Estado----->
                       <div class=\"mb-2\"><b>Estado Atual:</b> <h>$estado</h> </div>
                        <div class=\"input-group\">
                            <select class=\"custom-select\" id=\"inputGroupSelect04\" name='estado'>
                                <option selected>Escolher estado...</option>
                                <option value=\"1\">Listado</option>
                                <option value=\"2\">Não Listado</option>
                            </select>
                                <div class=\"input-group-append\">
                                    <button class=\"btn btn-outline-dark\" type=\"submit\">Atualizar</button>
                                </div>
                        </div>
                        </form>
                        <hr style=\"border-top: 1px solid white;\">
                        <!----Estado----->
                        <form action=\"../crud/RemoverEquipamento.php\" method=\"post\">
                        <div class=\"input-group\">
                            <input type='hidden' value='$eqid' name='removeeq'>
                            <input type='hidden' value='$imagem' name='removeimg'>
                            <div class=\"input-group-append\">
                                    <button class=\"btn btn-outline-danger\" type=\"submit\">Remover Equipamento</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <hr style=\"border-top: 1px solid white;\">
    ";
    echo $equipamento;
}


function meu_eq_detailed($id_eq){

    include('dbconnection.php');

    $sql_code = "SELECT
`idEquipamento`, `Tipo`, `Descrição`, `DataInicialdeDisponibilidade`, `DataFinalldeDisponibilidade`, `ImagemPath`, `Entidade_idEntidade`, `Estado_idEstado`, state.Estado
FROM  equipamento
	INNER JOIN estadodalistagem AS state 
    ON equipamento.Estado_idEstado = state.idEstado WHERE idEquipamento = '$id_eq'";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:".$conn->error);

    while($row=mysqli_fetch_assoc($result)){
        eq($row['Tipo'],$row['DataInicialdeDisponibilidade'],$row['DataFinalldeDisponibilidade'],$row['Descrição'],$row['idEquipamento'],$row['Entidade_idEntidade'],$row['ImagemPath'],$row['Estado']);
    }

}
