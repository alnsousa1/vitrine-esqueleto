<?php

//primeiro, verifica se $_POST existe e depois pega do POST o valor do campo nome ou seja, gravar numa variavel
if ($_POST) {
    $id = $_POST["id"] ?? NULL;
    //pegando o valor cadastrado no campo "id" e salvando na variável $id
    $nome = $_POST["nome"] ?? NULL;
    //pegando o valor cadastrado no campo "nome" e salvando na variável $nome

    //validar se o nome for vazio, lançar uma mensagem de erro
    if (empty($nome)) {
        mensagemErro("Preencha o nome da categoria.");
    }

    //fazendo um select para retornar o id, quando o nome for igual o nome guardado na variável $nome e for diferente do id guardado na variável $id
    //  <> significa DIFERENÇA
    $sql = "select id from categoria where nome = :nome and id <> :id";

    //criando uma várivel $consulta e dizendo que ela recebe a variável $pdo, que guarda a conexão com o banco de dados, e faz ela preparar o $sql para ser interpretado pelo php
    $consulta = $pdo->prepare($sql);
    //substitui o :nome (que é o nome digitado no formulário) pela variável $nome
    $consulta->bindParam(":nome", $nome);
    //substitui o :id (que é o id digitado no formulário) pela variável $id
    $consulta->bindParam(":id", $id);
    //executa o sql, que é como se eu tivesse clicado em EXECUTAR lá no phpMyAdmin
    $consulta->execute();

    //na linha abaixo, estou pegando os dados da consulta que retornou ao dar um EXECUTE no phpMyAdmin, transformando esses dados em objeto, para poder ser acessado pelo php. Se nao transformar, nao consegue
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    //verificando se dentro da variável $dados, o campo "id" está vazio ou não. Se não estiver vazio, significa que já existe uma categoria cadastrada com esse nome, então retorna uma mensagem de erro
    if (!empty($dados->id)) {
        mensagemErro("Já existe uma categoria cadastrada com esse nome.");
    }
    
    //verifica se a variável $id está vazia, se estiver, executa o INSERT para inserir na tabela, se não estiver, executa o bloco de código do ELSE, que é o UPDATE, ou seja, atualiza o conteúdo já existente na tabela
        if (empty($id)) {
            //a linha seguinte significa: insira dentro da tabela CATEGORIA, na coluna NOME, o valor da variavel NOME
            $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
            //criando uma várivel $consulta e dizendo que ela recebe a variável $pdo, que guarda a conexão com o banco de dados, e faz ela preparar o $sql para ser interpretado pelo php
            $consulta = $pdo->prepare($sql);
            //substitui o ":nome", pela variável $nome
            $consulta->bindParam(":nome", $nome);
        }else{
            $sql = "update categoria set nome = :nome where id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":nome", $nome);
            $consulta->bindParam(":id", $id);
        }

        //se NÃO executar a $consulta corretamente, estoura uma mensagem de erro
        if(!$consulta->execute()) {
            mensagemErro("Não foi possível salvar os dados.");
        }
        //redireciona para um arquivo chamado "categorias", dentro da pasta "listas"
        // echo "<script>location.href='listas/categorias'</script>";
        echo "<script>location.href='listar/categorias'</script>";
        exit;
}

