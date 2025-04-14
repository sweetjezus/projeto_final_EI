<?php
include_once 'DB/EQS_Database.php';
?>
<html lang="en">
<head>
    <title>Equipamentos Sociais</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/imagens.css">
    <link rel="stylesheet" href="css/btns.css">
    <link rel="stylesheet" href="css/mainstyles.css">
    <link rel="stylesheet" href="css/footerstyle.css">
    <link rel="shortcut icon" href="Assets/icon.ico"/>
</head>
<style>
    body,html

    {
        height: 100%; margin: 0;
        background-image: url('Assets/Backgroung.jpg');
        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
<!---header--->
<div style="margin-bottom:0">
    <img src="Assets/HeaderFooterExample/Header.PNG" width="100%"/>
</div>


<!---body--->
<div>

</div>

<!---Login+registar---->
<div class="container" style="margin-top:5%; margin-bottom: 4%">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm">

            <img src="Assets/Logo/logo.png" alt="Equipamentos Sociais" width="70%">

        </div>
        <div class="col-sm-4">
            <h7 style="font-family: 'Arial Nova' ; font-style: normal"><b>Login</b></h7><br>
            <form action="crud/login.php" method="POST">
                <input type="text" placeholder="Email" name="email" required><br>
                <input type="password" placeholder="Palavra Passe" name="pass" required><br>
                <button type="submit" class="btn btn-dark" style="float: left">Login</button>
            </form><br>
            <br><p>* Password Errada. Tente Novamente</p>
            <h7 style="font-family: 'Arial Nova' ; font-style: italic"><b>AINDA NAO TEM CONTA?</b></h7><br>
            <a href="Registo.php">
                <button type="reset" class="btn btn-dark" >Resgistar</button>
            </a>

        </div>
    </div>
</div>

<!--footer-->
<div style="margin-bottom:0">
    <img src="Assets/HeaderFooterExample/footer.PNG" width="100%"/>
</div>

</body>
</html>
