<html>
    <head>
        <title>Adicionar contato</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="bstrap.css">
        <link rel="stylesheet" type="text/css" href="insalt.css">
    </head>
    <body>
        <div class="container2">
            <form name="dadosPessoa" action="conexao.php" method="POST">
                <div class="form-group">
                    <label for="input1">Nome:</label>
                    <input type="text" name="nome" value="" class="form-control" id="input1" placeholder="Ex: Matheus Oliveira de Freitas">
                </div>
                <div class="form-group">
                    <label for="input2">Nascimento:</label>
                    <input type="date" name="nascimento" value="" class="form-control" id="input2" placeholder="Ex: 15/01/1998">
                </div>
                <div class="form-group">
                    <label for="input3">Telefone:</label>
                    <input type="text" name="telefone" value="" class="form-control" id="input3" placeholder="Ex: (84)99876-5432">
                </div>
                <div class="form-group">
                    <label for="input4">Endereço:</label>
                    <input type="text" name="endereco" value="" class="form-control" id="input4" placeholder="Ex: Rua das Flores, 9999">
                </div>
                <input type="hidden" name="acao" value="inserir">
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
    </body>
</html>
