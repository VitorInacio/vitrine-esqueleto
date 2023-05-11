<?php

    if($_POST) {
        //Está pegando o valor do "i"d" e do "nome" que o usuário escreveu o formulário
        $id = $_POST["id"] ?? NULL;
        $nome = $_POST["nome"] ?? NULL;

        //validar, se o nome for vazio lança uma mensagem de erro
        if (empty($nome)){
            mensagemErro("Falta dados.");
        }


        $sql = "SELECT id FROM categoria WHERE nome = :nome AND id <> :id";
        //Aqui meio que "prepara" o SQL para ser executado
        $consulta = $pdo->prepare($sql);
        //Aqui indica qual é o valor de ":nome" no sql
        $consulta->bindParam(":nome", $nome);
        //Aqui indica qual é o valor de ":id" no sql
        $consulta->bindParam(":id", $id);
        //Executa o SQL
        $consulta->execute();

        //Aqui transforma o código em um objetivo, isso faz com que seja possível utilizar o resultado da consulta SQL
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //Se existir algum resultado (id no caso), ele dá a mensagem de erro
        if (!empty($dados->id)) {
            mensagemErro("Já existe uma categoria com esse nome.");
        }

        //Se o usuário colocou valor no ID, ele vai executar esse código do if, que no caso, está alterando o valor de "nome" no banco de dados
        if (!empty($id)) {

            $sql = "UPDATE categoria SET nome = (:nome) WHERE id = (:id)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":nome", $nome);
            $consulta->bindParam(":id", $id);

        //Se o usuário não colocou valor no id, ele vai executar esse código do else, que no caso, está adicionando uma nova categoria no banco de dados
        }else {

            $sql = "insert into categoria (nome) values (:nome)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":nome", $nome);

        }
        //Aqui está verificando se o código está executando certinho, se não estiver, vai executar uma mensagem de erro
        if (!$consulta->execute()) {
            mensagemErro("Não foi possível salvar os dados");
        }
        //Aqui está redirecionando o usuário para a página categorias
        echo "<script>location.href='listar/categorias'</script>";
        exit;
    }

    




