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
            <input type="text" name="id" id="id" class="form-control" value="" placeholder="Digite o ID">

            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" id="nome" class="form-control" value="" placeholder="Digite o nome">
            <br>
            <button type="submit" class="btn btn-success">Salvar dados</button>
        </form> 
    </div>
</div>
