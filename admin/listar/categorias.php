<?php

    $sql = "SELECT * FROM categoria";
    $con = $pdo->query($sql);
    $dados = $con->fetchAll(PDO::FETCH_OBJ);

?>
<div class="card">
    <div class="card-header">
        <h2 class="float-center">Todas as categorias</h2>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                foreach($dados as $dado){
                    ?>
                    <tr>
                        <th scope="row"><?=$dado->id?></th>
                        <td><?=$dado->nome?></td>

                        <td>
                            <a href="salvar/categorias/<?=$dado->id?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="salvar/categorias/<?=$dado->id?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                            
                        </td>
                    </tr>
                    <?php
                };
                ?>
                
            </tbody>
        </table>
    </div>
</div>