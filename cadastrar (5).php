<?php 
    include "config.php";

    // VERIFICAR SE FOI CLICADO EM ADICIONAR
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        // GUARDA AS INFORMAÇÕES DO FORMULARIO EM VARIÁVEIS
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // echo "Nome: ".$nome;
        // echo "<br>Preço: ".$preco;
        try {
            // PREPARAR COMANDO DE INSERÇÃO NO BANCO 
            $cadastrar="INSERT INTO produtos (nome,preco) VALUES ('$nome',$preco)";
            $env=$pdo->prepare($cadastrar);
            $env->execute();

            // REDIRECIONA PARA ALGUM LUGAR
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Zé</title>
</head>
<body>
    <h2>Cadastrar Novos Itens</h2>
    <br>
    <a href="index.php">Voltar ao Início</a>
    <br>
    <!-- CRIAR FORMULÁRIO DE CADASTRO -->
     <form method="POST" action="cadastrar.php">
        <laberl>Nome:</label>
        <input type="text" name="nome" required>
        <laberl>Preço:</label>
        <input type="number" name="preco" required>
        <button type="Submit">Cadastrar</button>
     </form>
</body>
</html>