<?php

require_once '../controller/ProdutoController.php';

$produtoController = new ProdutoController();
$produtos = $produtoController->listar();

?>

<html>
    <head>
        <title>Coffee Show</title>
        <link rel="stylesheet" href="../public/css/gabreu.css">
        <link rel="stylesheet" href="../public/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" href="../public/images/icone2.png" type="image/x-icon">
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

    <div class="page">
        <div class="content-page text-center">

            <div class="sub-dashboard">Dashboard</div>

            <div class="escolha-dash">
                <ul class="nav dash-nav escolha-nav justify-content-center">
                    <li class="nav-item">
                        <a onclick="usuarios()" class="nav-link">Usuário</a>
                    </li>

                    <li class="nav-item">
                        <a onclick="produtos()" class="nav-link lis">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a onclick="complementos()" class="nav-link">Complementos</a>
                    </li>
                </ul>
            </div>

            <hr class="hr">
            
            <!-- CARD PRODUTOS -->

            <div class="dashboard-card" id="card-produtos" style="display: none;">
                <ul class="nav dash-nav justify-content-center">

                    <li class="nav-item">
                      <a onclick="cadastrarProduto()" class="nav-link">Cadastrar Produto</a>
                    </li>
                    <li class="nav-item">
                      <a onclick="removerProduto()" class="nav-link">Remover Produto</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="editarProduto()" class="nav-link">Editar Produto</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="listarProduto()" class="nav-link">Listar Produto</a>
                    </li>

                </ul>

                <div id="cadastrar-produto" style="display: none;"> 

                    <br><h1>Cadastrar Produto</h1><br>

                    <form action="../controller/ProdutoController.php?acao=cadastro" method="POST" >

                        <div class="form-group">
                            <label for="exampleInputText">Nome</label>
                            <input name="nome" type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="Nome">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputTipo1">Tipo</label>
                          <input name="tipo" type="text" class="form-control" id="exampleInputTipo1" placeholder="Tipo">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPreco1">Preço</label>
                            <input name="preco" type="text" class="form-control" id="exampleInputPreco1" placeholder="Preço">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputImagem1">Url Imagem</label>
                            <input name="imagem" type="text" class="form-control" id="exampleInputImagem1" placeholder="Url Imagem">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Cadastrar</button>

                      </form>
                </div>

                <div id="remover-produto" style="display: none;">

                    <br><h1>Remover Produto</h1><br>

                    <form action="../controller/ProdutoController.php?acao=remover" method="POST" >

                        <div class="form-group">
                            <label for="exampleInputId">Id Produto</label>
                            <input name="id" type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Remover</button>

                      </form>
                </div>

                <div id="editar-produto" style="display: none;">

                    <br><h1>Editar Produto</h1><br>

                    <form action="../controller/ProdutoController.php?acao=editar" method="POST" >

                        <div class="form-group">
                            <label for="exampleInputId">Id Produto</label>
                            <input name="id" type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Nome</label>
                            <input name="nome" type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="Nome">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputTipo1">Tipo</label>
                          <input name="tipo" type="text" class="form-control" id="exampleInputTipo1" placeholder="Tipo">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPreco1">Preço</label>
                            <input name="preco" type="text" class="form-control" id="exampleInputPreco1" placeholder="Preço">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputImagem1">Url Imagem</label>
                            <input name="imagem" type="text" class="form-control" id="exampleInputImagem1" placeholder="Url Imagem">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Editar</button>

                      </form>
                </div>

                <div id="listar-produto" style="display: block;">
                    <br><h1>Listar Produtos</h1><br>

                    

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Imagem</th>
                          </tr>
                        </thead>
                        <tbody>

                    <?php
                        foreach ($produtos as $produto) {
                            echo "<tr>";
                                echo "<th width='5%' scope='row'>" . $produto->getId() . "</th>";
                                echo "<td width='20%'>" . $produto->getNome() . "</td>";
                                echo "<td width='20%'>" . $produto->getTipo() . "</td>";
                                echo "<td width='20%'>" . $produto->getPreco() . "</td>";
                                echo "<td>" . $produto->getImg() . "</td>";
                            echo "</tr>";
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD USUARIOS -->

            <div class="dashboard-card" id="card-user" style="display: none;">
                <ul class="nav dash-nav justify-content-center">

                    <li class="nav-item">
                        <a onclick="cadastrarUsuario()" class="nav-link">Cadastrar Usuário</a>
                    </li>
                      <li class="nav-item">
                        <a onclick="removerUsuario()" class="nav-link">Remover Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="editarUsuario()" class="nav-link">Editar Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="listarUsuario()" class="nav-link">Listar Usuário</a>
                    </li>
                </ul>

                <div id="cadastrar-usuario" style="display: none;"> 

                    <br><h1>Cadastrar Usuário</h1><br>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputText2">Email</label>
                            <input name="nomeUser" type="text" class="form-control" id="exampleInputText2" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputTipo2">Senha</label>
                          <input name="senhaUser" type="text" class="form-control" id="exampleInputTipo2" placeholder="Senha">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Cadastrar</button>

                      </form>
                </div>

                <div id="remover-usuario" style="display: none;">

                    <br><h1>Remover Usuario</h1><br>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputId">Id Usuário</label>
                            <input type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Remover</button>

                      </form>
                </div>

                <div id="editar-usuario" style="display: none;">

                    <br><h1>Editar Usuário</h1><br>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputId">Id Usuário</label>
                            <input type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Nome</label>
                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="Nome">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputTipo1">Senha</label>
                          <input type="text" class="form-control" id="exampleInputTipo1" placeholder="Tipo">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Editar</button>

                      </form>
                </div>

                <div id="listar-usuario" style="display: block;">

                    <br><h1>Listar Usuário</h1><br>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Senha</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                          </tr>
                        </tbody>
                      </table>
                </div>

            </div>

            <!-- CARD COMPLEMENTOS -->

            <div class="dashboard-card" id="card-complementos" style="display: block;">
                <ul class="nav dash-nav justify-content-center">

                    <li class="nav-item">
                        <a onclick="cadastrarComplemento()" class="nav-link">Cadastrar Complemento</a>
                    </li>
                      <li class="nav-item">
                        <a onclick="removerComplemento()" class="nav-link">Remover Complemento</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="editarComplemento()" class="nav-link">Editar Complemento</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="listarComplemento()" class="nav-link">Listar Complemento</a>
                    </li>
                </ul>

                <div id="cadastrar-complemento" style="display: none;"> 

                    <br><h1>Cadastrar Complemento</h1><br>

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="exampleInputText">Nome</label>
                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="Nome">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputTipo1">Tipo</label>
                          <input type="text" class="form-control" id="exampleInputTipo1" placeholder="Tipo">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPreco1">Preço</label>
                            <input type="text" class="form-control" id="exampleInputPreco1" placeholder="Preço">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputImagem1">Url Imagem</label>
                            <input type="text" class="form-control" id="exampleInputImagem1" placeholder="Url Imagem">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Cadastrar</button>

                      </form>
                </div>

                <div id="remover-complemento" style="display: none;">

                    <br><h1>Remover Complemento</h1><br>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputId">Id Complemento</label>
                            <input type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Remover</button>

                      </form>
                </div>

                <div id="editar-complemento" style="display: none;">

                    <br><h1>Editar Complemento</h1><br>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputId">Id Complemento</label>
                            <input type="text" class="form-control" id="exampleInputId" aria-describedby="emailHelp" placeholder="Id">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Nome</label>
                            <input type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp" placeholder="Nome">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTipo1">Tipo</label>
                            <input type="text" class="form-control" id="exampleInputTipo1" placeholder="Tipo">
                          </div>
  
                        <div class="form-group">
                            <label for="exampleInputPreco1">Preço</label>
                            <input type="text" class="form-control" id="exampleInputPreco1" placeholder="Preço">
                        </div>
  
                        <div class="form-group">
                            <label for="exampleInputImagem1">Url Imagem</label>
                            <input type="text" class="form-control" id="exampleInputImagem1" placeholder="Url Imagem">
                        </div>

                        <br><button type="submit" class="btn btn-primary">Editar</button>

                      </form>
                </div>

                <div id="listar-complemento" style="display: block;">

                    <br><h1>Listar Complemento</h1><br>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Imagem</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>

            <hr class="hr2">

        </div>
    </div>
</body>

<footer class="text-center text-lg-start">
    <div class="p-3" style="background-color: #f8f9fa !important;">
        <a>2024 Copyright Coffee Show ®</a>
    </div>
</footer>

<script>
function login(){
    window.location.href = "http://localhost/Cafeteria/view/index.php";
}

function produtos(){
    document.getElementById("card-produtos").style.display = "block";
    document.getElementById("card-user").style.display = "none";
    document.getElementById("card-complementos").style.display = "none";
}

function usuarios(){
    document.getElementById("card-produtos").style.display = "none";
    document.getElementById("card-user").style.display = "block";
    document.getElementById("card-complementos").style.display = "none";
}

function complementos(){
    document.getElementById("card-produtos").style.display = "none";
    document.getElementById("card-user").style.display = "none";
    document.getElementById("card-complementos").style.display = "block";
}

///PRODUTOS

function cadastrarProduto(){
    document.getElementById("cadastrar-produto").style.display = "block";
    document.getElementById("remover-produto").style.display = "none";
    document.getElementById("editar-produto").style.display = "none";
    document.getElementById("listar-produto").style.display = "none";
}

function removerProduto(){
    document.getElementById("cadastrar-produto").style.display = "none";
    document.getElementById("remover-produto").style.display = "block";
    document.getElementById("editar-produto").style.display = "none";
    document.getElementById("listar-produto").style.display = "none";
}

function editarProduto(){
    document.getElementById("cadastrar-produto").style.display = "none";
    document.getElementById("remover-produto").style.display = "none";
    document.getElementById("editar-produto").style.display = "block";
    document.getElementById("listar-produto").style.display = "none";
}

function listarProduto(){
    document.getElementById("cadastrar-produto").style.display = "none";
    document.getElementById("remover-produto").style.display = "none";
    document.getElementById("editar-produto").style.display = "none";
    document.getElementById("listar-produto").style.display = "block";
}

///USUARIOS

function cadastrarUsuario(){
    document.getElementById("cadastrar-usuario").style.display = "block";
    document.getElementById("remover-usuario").style.display = "none";
    document.getElementById("editar-usuario").style.display = "none";
    document.getElementById("listar-usuario").style.display = "none";
}

function removerUsuario(){
    document.getElementById("cadastrar-usuario").style.display = "none";
    document.getElementById("remover-usuario").style.display = "block";
    document.getElementById("editar-usuario").style.display = "none";
    document.getElementById("listar-usuario").style.display = "none";
}

function editarUsuario(){
    document.getElementById("cadastrar-usuario").style.display = "none";
    document.getElementById("remover-usuario").style.display = "none";
    document.getElementById("editar-usuario").style.display = "block";
    document.getElementById("listar-usuario").style.display = "none";
}

function listarUsuario(){
    document.getElementById("cadastrar-usuario").style.display = "none";
    document.getElementById("remover-usuario").style.display = "none";
    document.getElementById("editar-usuario").style.display = "none";
    document.getElementById("listar-usuario").style.display = "block";
}

///COMPLEMENTOS

function cadastrarComplemento(){
    document.getElementById("cadastrar-complemento").style.display = "block";
    document.getElementById("remover-complemento").style.display = "none";
    document.getElementById("editar-complemento").style.display = "none";
    document.getElementById("listar-complemento").style.display = "none";
}

function removerComplemento(){
    document.getElementById("cadastrar-complemento").style.display = "none";
    document.getElementById("remover-complemento").style.display = "block";
    document.getElementById("editar-complemento").style.display = "none";
    document.getElementById("listar-complemento").style.display = "none";
}

function editarComplemento(){
    document.getElementById("cadastrar-complemento").style.display = "none";
    document.getElementById("remover-complemento").style.display = "none";
    document.getElementById("editar-complemento").style.display = "block";
    document.getElementById("listar-complemento").style.display = "none";
}

function listarComplemento(){
    document.getElementById("cadastrar-complemento").style.display = "none";
    document.getElementById("remover-complemento").style.display = "none";
    document.getElementById("editar-complemento").style.display = "none";
    document.getElementById("listar-complemento").style.display = "block";
}
</script>
</html>