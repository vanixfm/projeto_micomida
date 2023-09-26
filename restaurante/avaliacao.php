<?php
    include "conn.php";
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:index.php');
    }
if (isset($_GET['restaurante_id'])) {
    $restauranteId = $_GET['restaurante_id'];
} else {
    // Caso o ID do restaurante não esteja presente na URL, redirecionar para a página anterior ou exibir uma mensagem de erro
    header("Location: index.php");
    exit();
}

// Verifique se o cliente está logado e obtenha o ID do cliente logado
if (isset($_SESSION['cliente_id'])) {
    $clienteId = $_SESSION['cliente_id'];
} else {
    // Caso o cliente não esteja logado, redirecione-o para a página de login ou exiba uma mensagem de erro
    header("Location: login.php");
    exit();
}
?>
