<?php

include_once 'conexao.php';

class Complemento {
 private $id;
 private $nome;
 private $tipo;
 private $preco;
 private $img;

 public function __construct($id = null, $nome = null, $tipo = null, $preco = null, $img = null) {
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
 
public function cadastrarComplemento($nome, $tipo, $preco, $img) {
    try {
    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "insert into complementos (id, nome, tipo, preco, img) values ('NULL','$nome','$tipo','$preco','$img')";
    $stmt = $conn->prepare($sql); 

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Complemento cadastrado com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao cadastrar complemento: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
} catch (PDOException $e) {
    // Exibir mensagem de erro se a conexão falhar
    echo "Erro ao cadastrar complemento! " . $e->getMessage();
    return [];
}
}
 
public function removerComplemento($id) {
    try {
    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "DELETE FROM complementos WHERE id = '$id'";
    $stmt = $conn->prepare($sql);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Complemento removido com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao remover complemento: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
} catch (PDOException $e) {
    // Exibir mensagem de erro se a conexão falhar
    echo "Erro ao remover complemento! " . $e->getMessage();
    return [];
}
}
 
public function editarComplemento($id, $nome, $tipo, $preco, $img) {
    try {
    $conn = Conexao::conectar();

    // Preparar a consulta SQL
    $sql = "UPDATE complementos SET nome = '$nome', tipo = '$tipo', preco = '$preco', img = '$img' WHERE id = '$id'";
    $stmt = $conn->prepare($sql);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Complemento atualizado com sucesso!";
        echo "<br><br><a href='http://localhost/Cafeteria/view/dashboard.php'>Voltar</a>";
    } else {
        echo "Erro ao atualizar complemento: " . $stmt->errorInfo()[2];
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
} catch (PDOException $e) {
    // Exibir mensagem de erro se a conexão falhar
    echo "Erro ao editar complemento! " . $e->getMessage();
    return [];
}
}
 
public function ListarComplementos() {
    try {
        $conn = Conexao::conectar();

        // Preparar a consulta SQL
        $sql = "SELECT * FROM complementos ORDER BY id";
        $stmt = $conn->prepare($sql);

        // Executar a consulta
        $stmt->execute();

        // Obter os resultados da consulta
        $complementos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $complemento = new Complemento();
            $complemento->setId($row["id"]);
            $complemento->setNome($row["nome"]);
            $complemento->setTipo($row["tipo"]);
            $complemento->setPreco($row["preco"]);
            $complemento->setImg($row["img"]);

            $complementos[] = $complemento;

        }
        // Fechar a conexão com o banco de dados
        $conn = null;

        // Retornar o array de complementos
        return $complementos;
    } catch (PDOException $e) {
        // Exibir mensagem de erro se a conexão falhar
        echo "Erro ao listar complementos! " . $e->getMessage();
        return [];
    }
}
}
?>