<?php
include("conexao.php");
$pessoa = selectIdPessoa($_POST["id"]);
?>

<html>
    <head>
        <title>Alterar contato</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="bstrap.css">
        <link rel="stylesheet" type="text/css" href="insalt.css">
    </head>
    <body>
        <div class="container2">
            <form name="dadosPessoa" action="conexao.php" method="POST">
                <div class="form-group">
                    <label for="input1">Nome:</label>
                    <input type="text" name="nome" value="<?=$pessoa["nome"]?>" size="100" class="form-control" id="input1">
                </div>
                <div class="form-group">
                    <label for="input2">Nascimento:</label>
                    <input type="date" name="nascimento" value="<?=$pessoa["nascimento"]?>" class="form-control" id="input2">
                </div>
                <div class="form-group">
                    <label for="input3">Telefone:</label>
                    <input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" size="100" class="form-control" id="input3">
                </div>
                <div class="form-group">
                    <label for="input4">Endereço:</label>
                    <input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" size="100" class="form-control" id="input4">
                </div>
                <input type="hidden" name="acao" value="alterar">
                <input type="hidden" name="id" value="<?=$pessoa["id"]?>">
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
    </body>
</html>



