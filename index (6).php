<?php
    include "config.php";
// BUSCA NO BANCO
$consulta="SELECT * FROM produtos";
$dados=$pdo-> query($consulta);
$produtos=$dados-> fetchAll(PDO::FETCH_ASSOC);

// foreach ($produtos as $produto){
//    echo "Nome: ".$produto['nome'];
//    echo "Preco: ".$produto['preco'];    
//}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Do Zé</title>
</head>
<body>

    <h2>Bem-Vindo ao Mercado do Zé</h2>

    <br>
    <!-- a tag "a" cria um hpierlink -->
    <a href="cadastrar.php">Cadastrar Item</a>

    <br>

    <table border="1" width="50%">
    <!-- CADA LINHA DA TABELA É UMA TAG "TR" TABLE ROW -->
        <tr>
            <!-- AS TAGS "td" SÃO AS COLUNAS DA TABELA -->
             <td>ID</td>
             <td>Nome</td>
             <td>Preço</td>
             <td>Ações</td>
        </tr>
            <!-- AQUI VAMOS INSERIR AS LINHAS/REGISTROS DA TABELA -->
             <?php foreach ($produtos as $produto): ?>
        <tr> 
        <td> <?php echo $produto ['id'];?> </td>
        <td> <?php echo $produto ['nome'];?> </td>
        <td> <?php echo $produto ['preco'];?> </td>
        <td>
            <a href="deletar.php?id=<?php echo $produto['id'];?>"> X </a>
            
            <a href="update.php?id=<?php echo $produto['id'];?>">Editar</a>
        </td>
        </tr>
            <?php endforeach; ?>
    </table>

</body>
</html>