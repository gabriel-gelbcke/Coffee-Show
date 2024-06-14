<?php

require_once '../controller/ProdutoController.php';

$produtoController = new ProdutoController();
$produtos = $produtoController->listar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/css/gustavo.css">
    <link rel="stylesheet" href="../public/css/nav.css">
    <link rel="stylesheet" href="../public/css/gabreu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nossos produtos</title>

</head>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="content-nav">
            <a class="navbar-brand">
                <img onclick="login()" src="../public/images/icone2.png" width="32" height="32" class="d-inline-block align-top icone">
                <img onclick="login()" src="../public/images/logo1.png" height="32" class="d-inline-block align-top icone">
            </a>

            <div class="links">
                <a href="produtos.php">Nossos produtos</a>
                <a href="sobre.php">Sobre</a>
                <a href="contato.php">Contato</a>
                <a href="login-cafe.php">Login</a>
            </div>
        </div>
    </nav>

<div class="content">
    <div class="row produtos">
    <?php
foreach ($produtos as $produto) {
        echo "<div class='card' style='width: 18rem;'>";
            echo "<img class='card-img-top' src='" . $produto->getImg() . "' alt='Card image cap'>";
            echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $produto->getNome() . "</h5>";
                echo "<p class='card-title'> Tipo:  " . $produto->getTipo() . "</p>";
                echo "<p class='card-title'> Tipo:  " . $produto->getPreco() . "</p>";
            echo "</div>";
        echo "</div>";
}
?>
    </div>
    
  </div>
  </div>
  </div>
  <br>
  <br>
  <br>
  <br>

</body>

<footer class="text-center text-lg-start">
   <div class="p-3" style="background-color: #f8f9fa !important;">
     © 2024 Copyright:
     <a class="">Cafeteria.com</a>
   </div>
 </footer>

</html>

<script>
function login(){
    window.location.href = "http://localhost/Cafeteria/view/index.php";
}
</script>