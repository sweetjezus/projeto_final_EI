<?php
include '../crud/protect.php';
require ('../crud/eq_detailed.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mais informação</title>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <!---headerCamara--->
        <div style="margin-bottom:0">
            <img src="../Assets/HeaderFooterExample/Header.PNG" width="100%"/>
        </div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5 wh">
                <a class="navbar-brand" href="#!">EQS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="HomeCM.php">EQS Disponíveis</a></li>
                        <li class="nav-item"><a class="nav-link" href="PedidosCM.php">Pedidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="PerfilCM.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="../crud/logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- EQ section-->
        <section class="py-5 bg">
            <div class="container px-4 px-lg-5 my-5 bg">
                <div class="row gx-4 gx-lg-4 align-items-center border-0 bg-white">
                        <?php
                        show_eq($_SESSION['id_eq']);
                        ?>
                    <hr style="border-top: 1px solid white;">
                </div>
            </div>
        </section>

    <div class="d-flex">
        <!-- Modal -->
        <form action="../crud/realizarpedido.php" method="post"
        <div class="modal fade" id="exampleModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nº ID Civil a quem se destina o equipamento:</label>
                                <input type="text" class="form-control" name="nif" required>
                            </div>
                            <!----- NOT Confirmed ----->
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Mensagem: </label>
                                <textarea class="form-control"  name="mensagem" required></textarea>
                            </div>
                        </form>
                        <p style="color:indianred">Nota: Recomenda-se que na mensagem seja descrito o periodo em que o equipamento será necessário.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-success" type="submit">Fazer Pedido</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

        <!--footer-->
        <div style="margin-bottom:0">
            <img src="../Assets/HeaderFooterExample/footer.PNG" width="100%" alt=""/>
        </div>

    </body>
</html>
