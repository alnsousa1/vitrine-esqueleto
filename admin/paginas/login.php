<?php
    if($_POST){
        $login = $_POST["login"] ?? NULL;
        $senha = $_POST["senha"] ?? NULL;
        
        //este é o SELECT mensionado no index.php, linha 2
        $sql = "SELECT id, nome, login, senha FROM usuario where login = :login and ativo = 'S' limit 1";  
        //este :login, usa-se o : antes pra tratar como um PARAMETRO

        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":login", $login);
        //execute funcionará como se tivesse clicando em EXECUTAR no phpMyAdmin
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        var_dump($dados);
    }
?>

<div class="login">
    <h1 class="text-center">Efetuar Login</h1>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" class="form-control" required placeholder="Por favor, preencha este campo">
        
        <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control" required placeholder="Por favor, preencha este campo">
        <br>

        <button type="submit" class="btn btn-success w-100">Efetuar Login</button>
    </form>
</div>