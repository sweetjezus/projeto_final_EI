<?php
include '../crud/protect.php';
require  '../crud/PedidosOE.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pedidos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/imagens.css">
        <link rel="stylesheet" href="css/btns.css">
        <link rel="stylesheet" href="css/mainstyles.css">
        <link rel="stylesheet" href="css/footerstyle.css">
        <link rel="shortcut icon" href="../Assets/icon.ico"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/home.css" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </head>
    <style>
        body
        {
            height: 100%; margin: 0;
            background-image: url('../Assets/Backgroung.jpg');
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
        }
    </style>
    <body>
    <!---headerCamara--->
    <div style="margin-bottom:0">
        <img src="../Assets/HeaderFooterExample/Header.PNG" width="100%"/>
    </div>

    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">EQS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <div class="text-lg-end">
                            <button type="button" class="btn btn-outline-dark text-lg-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-plus-square"></i> Adicionar Equipamento
                            </button>
                        </div>
                        <li class="nav-item"><a class="nav-link" href="HomeOE.php">Meus Equipamentos</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="PedidosOE.php">Pedidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="PerfilOE.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../crud/logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-4">
            <div class="container px-1 px-lg-5">
                <div class="text-left text-white">
                    <h1 class="display-4 fw-bolder">Pedidos</h1>
                </div>
            </div>
        </header>

        <!---Pedidos--->
        <?php listar_pedidos($_SESSION['id']); ?>


    <!--footer-->
    <div style="margin-bottom:0">
        <img src="../Assets/HeaderFooterExample/footer.PNG" width="100%"/>
    </div>

    <!-----Formulario para adicionar novo equipamento(substitui pagina para adicionar)------>
    <div class="d-flex">
        <div class="modal fade" id="exampleModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Equipamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form" enctype="multipart/form-data" action="../crud/addequipamento.php" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <!-----------Titulo-------->
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Titulo:</label>
                                                                <input class="form-control" type="text" name="name" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--------Descriçao-------->
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>Descrição</label>
                                                                <textarea class="form-control" rows="3" name="desc" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------Datas-------->
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 mb-3">
                                                            <label>Data de Disponibilidade:</label>
                                                            <div class="row">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="date" name="data_1" required>
                                                                        <h style="margin-left: 4%;"> até </h>
                                                                        <input class="form-control" type="date" name="data_2" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-----------Imagem----------->
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <div class="mb-3">
                                                                    <label for="formFile">Selecionar imagem:</label>
                                                                    <input class="form-control" type="file" id="formFile" name="imagem"  required>
                                                                    <p> (Apenas ficheiros do tipo .jpg e .png)</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-dark" type="submit">Adicionar Equipamento</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
