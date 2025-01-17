<?php

    $nome = NULL;

    if (!empty($id)){
        //consulta no banco de dados
        $sql = "select * from categoria where id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        $id = $dados->id ?? NULL;
        $nome = $dados->nome ?? NULL;

    }

?>
    <div class="card" style="width: 50%; margin: 0 auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div class="card-header">
            <h2 class="float-left">Cadastros de Categorias</h2>

            <div class="float-right">
                <a href="listar/categorias" class="btn btn-success">
                    Listar Categorias
                </a>
            </div>
        </div>
        <div class="card-body" style="width: 90%">
            <form method="post" action="salvar/categorias">
                <label for="id">ID da Categoria</label>
                <input type="text" name="id" id="id" class="form-control" readonly value="<?=$id?>" placeholder="Digite o id:">

                <label for="nome">Nome da Categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?=$nome?>" placeholder="Digite o nome:">
                <br>
                <button type="submit" class="btn btn-success">Salvar Dados</button>
            </form>
        </div>
    </div>