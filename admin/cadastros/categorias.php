<!-- formulario com campo id, nome e botao -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                <input type="text" name="id" id="id" class="form-control" value="<?=$id?>" placeholder="Digite o nome:">

                <label for="nome">Nome da Categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="" placeholder="Digite o id:">
                <br>
                <button type="submit" class="btn btn-success">Salvar Dados</button>
            </form>
        </div>
    </div>
</body>

</html>