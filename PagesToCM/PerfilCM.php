<?php
include '../crud/protect.php';
require('../crud/Perfil_Dados.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
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
    <div class="container px-4 px-lg-5 wh">
        <a class="navbar-brand" href="#!">EQS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="HomeCM.php">EQS Disponíveis</a></li>
                <li class="nav-item"><a class="nav-link" href="PedidosCM.php">Pedidos</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="PerfilCM.php">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="../crud/logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--Page tittle-->
<header class="bg-dark py-4">
    <div class="container px-1 px-lg-5">
        <div class="text-left text-white">
            <h1 class="display-4 fw-bolder">Perfil</h1>
        </div>
    </div>
</header>

<!--Profile Update-->
<div class="container" style="margin-top: 1%;">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form <form action="../crud/Perfil_Update_CM.php" method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <?php
                                                        ver_perfil($_SESSION['id']);
                                                    ?>
                                                </div>
                                            </div>
                                            <hr style="border-top: 1px solid white;">
                                            <!-------Password---------->
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Alterar Password</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Password Atual</label>
                                                                <input class="form-control" name="pass" type="password" placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Nova Password</label>
                                                                <input class="form-control" name="np1" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" minlength="8" type="password" placeholder="••••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Confirme <span class="d-none d-xl-inline">Password</span></label>
                                                                <input class="form-control" name="np2" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" minlength="8" type="password" placeholder="••••••••"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>
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
</div>


<!--footer-->
<div style="margin-bottom:0">
    <img src="../Assets/HeaderFooterExample/footer.PNG" width="100%"/>
</div>

</body>
</html>

