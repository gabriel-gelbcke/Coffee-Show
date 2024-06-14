<?php

include_once 'conexao.php';

class Usuario {
 private $id;
 private $email;
 private $senha;

 public function __construct($id = null, $email = null, $senha = null) {
    $this->id = $id;
    $this->nome = $nome;
    $this->tipo = $tipo;
    $this->preco = $preco;
    $this->img = $img;
}

// Getters e Setters
public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getNome() {
    return $this->nome;
}

public function setNome($nome) {
    $this->nome = $nome;
}

public function getTipo() {
    return $this->tipo;
}

public function setTipo($tipo) {
    $this->tipo = $tipo;
}

public function getPreco() {
    return $this->preco;
}

public function setPreco($preco) {
    $this->preco = $preco;
}

public function getImg() {
    return $this->img;
}

public function setImg($img) {
    $this->img = $img;
}
 
public function cadastrarProduto($nome, $tipo, $preco, $img) {
    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "insert into produtos (id, nome, tipo, preco, img) values ('NULL','$nome','$tipo','$preco','$img')";
    $stmt = $conn->prepare($sql); 

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Produto cadastrado com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao cadastrar produto: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
}
 
public function removerProduto($id) {

    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "DELETE FROM produtos WHERE id = '$id'";
    $stmt = $conn->prepare($sql);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Produto removido com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao remover produto: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
}
 
public function editarProduto($id, $nome, $tipo, $preco, $img) {

    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "UPDATE produtos SET nome = '$nome', tipo = '$tipo', preco = '$preco', img = '$img' WHERE id = '$id'";
    $stmt = $conn->prepare($sql);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao atualizar produto: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
}
 
public function ListarProdutos() {
    try {
        // Conectar ao banco de dados
        $conn = new PDO("mysql:host=localhost; dbname=cafeteria", "root", "");
        // Definir o modo de erro para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar a consulta SQL
        $sql = "SELECT * FROM produtos";
        $stmt = $conn->prepare($sql);

        // Executar a consulta
        $stmt->execute();

        // Obter os resultados da consulta
        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produto = new Produto();
            $produto->setId($row["id"]);
            $produto->setNome($row["nome"]);
            $produto->setTipo($row["tipo"]);
            $produto->setPreco($row["preco"]);
            $produto->setImg($row["img"]);

            $produtos[] = $produto;

        }
        // Fechar a conexão com o banco de dados
        $conn = null;

        // Retornar o array de produtos
        return $produtos;
    } catch (PDOException $e) {
        // Exibir mensagem de erro se a conexão falhar
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        return [];
    }
}
}
?>