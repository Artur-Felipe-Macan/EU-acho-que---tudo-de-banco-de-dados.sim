<?php 
    include "config.php";

    // BUSCAR INFORMAÇÕES DO ITEM COM O ID RECEBIDO NA URL
    // isset serve para verificar se algo existe
    // $_GET serve para pegar uma informação da URL
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        // MONTAR A CONSULTA DO BANCO
        $buscar="SELECT*FROM produtos WHERE id=$id";
        $env=$pdo->prepare($buscar);
        $env->execute();

        $produto=$env->fetch(PDO::FETCH_ASSOC);
        
    }
    // VERIFICAR SE FOI CLICADO EM SALVAR

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        // GUARDA AS INFORMAÇÕES DO FORMULARIO EM VARIÁVEIS
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // echo "Nome: ".$nome;
        // echo "<br>Preço: ".$preco;
        try {
            // PREPARAR COMANDO DE INSERÇÃO NO BANCO 
            $salvar="UPDATE produtos SET nome='$nome',preco=$preco WHERE id=$id";
            $env=$pdo->prepare($salvar);
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
    <title>Editar Mercado do Zé</title>
</head>
<body>
    <h2>Edição de Itens</h2>
    <br>
    <a href="index.php">Voltar ao Início</a>
    <br>
    <!-- CRIAR FORMULÁRIO DE UPDATE -->
    <form method="POST" action="update.php">
    <!-- TRAZER O ID APENAS PARA PODER PASSAR ELE VIA POST PARA O UPDATE -->
    <input type="hidden" name="id" value="<?php echo $produto['id'];?>" >

        <laberl>Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome'];?>" required>
        <laberl>Preço:</label>
        <input type="number" name="preco" value="<?php echo $produto['preco'];?>" required>
        <button type="Submit">Salvar Alteração</button>
     </form>
</body>
</html>