<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Nome da Categoria</td>
                    <td scope="col">Opções</td>
                    <td></td>
                </tr>
            </thead>
                <?php
                $sql = "select * from categoria order by id";
                $consulta = $pdo->prepare($sql);
                $consulta->execute();

                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?=$dados->id ?></td>
                                <td><?=$dados->nome ?></td>
                                <td>
                                    <a href="cadastros/categorias/<?=$dados->id?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:excluir(<?=$dados->id?>)" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                }
                ?>
        </table>
    </div>
</div>
<script>
    function excluir(id){
        Swal.fire({
            title: 'Deseja excluir permanentemente este item?',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            showCancelButton: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed){
                location.href='excluir/categorias/'+id;
            }
        });
    }
</script>