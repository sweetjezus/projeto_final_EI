<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Nao pode aceder a esta página porque não fez login!<p><a href='../index.php'>Pagina de Login</a></p>");
}

