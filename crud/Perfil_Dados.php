<?php


function perfil( $nome, $email, $morada, $cdp, $nif, $tel)
{

    $dados= "
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"form-group\">
                                                                <label>Nome </label>
                                                                <input class=\"form-control\" type=\"text\" name=\"nome\" placeholder=\"$nome\">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!----------------Email-------------->
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"form-group\">
                                                                <label>Email</label>
                                                                <input class=\"form-control\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\" type=\"text\" name=\"email\" placeholder=\"$email\">$email
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------Morada-------->
                                                    <div class=\"row\">
                                                        <div class=\"col mb-3\">
                                                            <div class=\"form-group\">
                                                                <label>Morada</label>
                                                                <textarea class=\"form-control\" rows=\"5\" name=\"morada\" placeholder=\"$morada\"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------CodPostal-------->
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"form-group\">
                                                                <label>Código Postal</label>
                                                                <input class=\"form-control\" pattern=\"^\d{4}-\d{3}?$\" type=\"text\" name=\"cdp\" placeholder=\"$cdp\">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------Telefone-------->
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"form-group\">
                                                                <label>Telefone</label>
                                                                <input class=\"form-control\" pattern=\"\b\d{9}\b\" type=\"text\" name=\"telf\" placeholder=\"$tel\">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------NIF----------->
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"form-group\">
                                                                <label>NIF</label>
                                                                <input class=\"form-control\" pattern=\"\b\d{9}\b\" type=\"text\" name=\"nif\" placeholder=\"$nif\">
                                                            </div>
                                                        </div>
                                                    </div>

                
    ";
    echo $dados;
}

function ver_perfil($id)
{
    include('dbconnection.php');

    $sql_code = "SELECT * FROM entidade WHERE idEntidade = '$id'";
    $result = $conn->query($sql_code) or die("Failed to execute the SQL Code:" . $conn->error);

    while ($row = mysqli_fetch_assoc($result)) {
        perfil($row['Nome'], $row['Email'], $row['Morada'], $row['CodigoPostal'], $row['NIF'], $row['Telefone']);
    }
}
