<?php



    $sql = "select id from categoria where id = :id";


    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    $categoria = $consulta->fetch(PDO::FETCH_OBJ);

    if(empty($categoria->id)){
        mensagemErro("Erro ao tentar deletar produto.");
    }

    $sql = "DELETE from categoria where id = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);

    if($consulta->execute()){
        echo "<script>location.href='listar/categorias'</script>";
        exit;
        
    }
?>