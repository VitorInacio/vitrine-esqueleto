<?php

    $nome = NULL;

    if (!empty($id)) {
        //consulta no banco de dados
        $sql = "SELECT * FROM categoria WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        $id = $dados->id ?? NULL;
        $nome = $dados->nome ?? NULL;

    }



?>

<div class="card">
    <div class="card-header">
        <h2 class="float-left">Cadastro de categorias</h2>
        
        <div class="float-right">
            <a href="listar/categorias" class="btn btn-success">
                Listar Categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="salvar/categorias">
            <label for="id">ID da categoria</label>
            <input type="text" name="id" id="id" class="form-control" readonly value="<?=$id?>" placeholder="Digite o ID">

            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>" placeholder="Digite o nome">
            <br>
            <button type="submit" class="btn btn-success">Salvar dados</button>
        </form> 
    </div>
</div>
