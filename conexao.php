<?php

if(isset($_POST["acao"])){ // Verifica se algum post com nome "acao" existe
    if ($_POST["acao"]=="inserir"){ // Se ele existe e o valor dele eh "inserir"...
        inserirPessoa();
    }
    if ($_POST["acao"]=="alterar"){ // Se ele existe e o valor dele eh "alterar"...
        alterarPessoa();
    }
    if ($_POST["acao"]=="excluir"){ // Se ele existe e o valor dele eh "excluir"...
        excluirPessoa();
    }
}

function conectarBanco(){ // Faz a conexão com o banco de dados
    $conexao = new mysqli("localhost", "root", "", "agenda"); // variável para conexão com o banco (host, usuario, senha e db)
    return $conexao;
}

function inserirPessoa(){ // Insere dados recebidos do usuário no banco de dados
    $banco = conectarBanco();
    $sql = "INSERT INTO pessoa(nome, nascimento, endereco, telefone)" 
    ." VALUES ('{$_POST["nome"]}', '{$_POST["nascimento"]}', '{$_POST["endereco"]}', '{$_POST["telefone"]}')";
    $banco->query($sql); // Passa a query fornecida em $sql para o banco de dados
    $banco->close(); // Fecha o banco de dados
    voltarMenu(); // Volta para a pagina inicial da agenda
}

function alterarPessoa(){ // Altera os dados da pessoa com o id recebido no post
    $banco = conectarBanco();
    $sql = "UPDATE pessoa SET"
    ." nome='{$_POST["nome"]}', "
    ." nascimento='{$_POST["nascimento"]}', "
    ." endereco='{$_POST["endereco"]}', "
    ." telefone='{$_POST["telefone"]}'"
    ." WHERE id='{$_POST["id"]}'";
    $banco->query($sql); // Passa a query fornecida em $sql para o banco de dados
    $banco->close(); // Fecha o banco de dados
    voltarMenu(); // Volta para a pagina inicial da agenda
}

function excluirPessoa(){ // Exclui a pessoa com o id recebido no post
    $banco = conectarBanco();
    $sql = "DELETE FROM pessoa WHERE id = '{$_POST["id"]}'";
    $banco->query($sql); // Passa a query fornecida em $sql para o banco de dados
    $banco->close(); // Fecha o banco de dados
    voltarMenu(); // Volta para a pagina inicial da agenda
}

function selectIdPessoa($id){ // Mostra as informacoes da pessoa especificada pelo id recebido no post
    $banco = conectarBanco();
    $sql = "SELECT * FROM pessoa WHERE id = ".$id;
    $resultado = $banco->query($sql); // Passa a query fornecida em $sql para o banco de dados e armazena o retorno em $resultado
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado); // Formata o retorno do banco de dados e o armazena em $pessoa
    return $pessoa;
}

function selectAllPessoa(){ // Mostra as informacoes de todas as pessoas
    $banco = conectarBanco();
    $sql = "SELECT * FROM pessoa ORDER BY nome";
    $resultado = $banco->query($sql); // Passa a query fornecida em $sql para o banco de dados e armazena o retorno em $resultado
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) { // Formata o retorno do banco de dados e separa as informações por cada pessoa (row)
        $grupo[] = $row;
    }
    return $grupo; // grupo eh um array, onde cada indice contem as informacoes de uma pessoa
}

function voltarMenu(){ // Retorna para a página web principal
    header("Location:index.php");
}
