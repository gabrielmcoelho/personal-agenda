<?php 
include("conexao.php");
$grupo = selectAllPessoa(); // Resultado do Select vindo de conexao.php
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda de contatos</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="stylesheet" type="text/css" href="bstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="display-4">Agenda de Contatos <i class="fas fa-address-book"></i></h1>
            <hr>
            <p class="lead">Matenha seus contatos atualizados com essa simples interface!</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="content">
                        <table class="table" id="mainTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nome</th>
                                    <th>Nascimento</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($grupo as $pessoa){ ?> 

                                <tr>
                                    <td><?=$pessoa["nome"]?></td>
                                    <td><?= formataData($pessoa["nascimento"])?></td>
                                    <td><?=$pessoa["telefone"]?></td>
                                    <td><?=$pessoa["endereco"]?></td>
                                    <td>
                                        <form name="alterar" action="alterar.php" method="POST">
                                            <input type="hidden" name="id" value=<?=$pessoa["id"]?>>
                                            <input type="submit" value="Editar" name="editar">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="excluir" action="conexao.php" method="POST">
                                            <input type="hidden" name="id" value=<?=$pessoa["id"]?>>
                                            <input type="hidden" name="acao" value="excluir">
                                            <input type="submit" name="excluir" value="Excluir">
                                        </form>
                                    </td>
                                </tr>

                                <?php }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="contato"><a class="btn btn-primary" href="inserir.php" role="button">Adicionar contato <i class="fas fa-user-plus"></i></a></div>
        <?php
        function formataData($data){ // Muda o formato da data do MySQL para o formato dd/mm/aaaa
            $array = explode("-", $data);
            //$data = 2018-06-29
            //$array[0] = 2018, $array[1] = 06 e $array[2] = 29 
            $novaData = $array[2]."/".$array[1]."/".$array[0];
            return $novaData;
        }
        ?>
    </body>
</html>
