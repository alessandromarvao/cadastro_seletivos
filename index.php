<?php
session_start();

include_once "bootstrap.php";

use Controller\Classes\SessionController;

SessionController::close();

/*
*   Cabeçalho da página
*/
include_once "views/default/header.php";
echo "\n";
?>
<div class="container">
    <div class="page-title">
        <h1>Acesso ao Sistema de Cadastro de Fiscais - Seletivo IFMA 2019</h1>
    </div>
    <hr />
    <div class="page">
        <form method="POST" action="/cadastro_seletivos/controller/Acessos/login.php" class="form-left">
            <div class="form-group">
                <label for="inputUsuario"><h2>Usuário:</h2></label>
                <input type="text" name="inputUsuario" class="form-control" id="inputUsuario" autocomplete="off" placeholder="Digite sua matrícula do SUAP">
            </div>
            <div class="form-group">
                <label for="inputSenha"><h2>Senha:</h2></label>
                <input type="password" name="inputSenha" class="form-control" id="inputSenha" placeholder="Digite sua senha de acesso ao SUAP">
            </div>
            <?php
            $msg = "";

            if(!empty($_GET['m'])){
                $msg = $_GET['m'];
            }

            switch($msg){
                case 'error':
                    echo "<div class='alert alert-danger'>Usuário ou senha incorreto</div>";
                    break;
                case 'success':
                    echo "<div class='alert alert-success'>Seu cadastro foi realizado com sucesso!</div>";
                    break;
            }
            ?>
            <br>
            <button type="submit" class="btn btn-success btn-large">Enviar</button>
        </form>
        <div class="form-right">
            <br>
            <h2>Não possui acesso ao SUAP?</h2>
            <a href="acesso_visitantes.php" class="btn btn-danger">Clique aqui</a>
        </div>
    </div>
</div>

<?php
/*
*   Rodapé da página
*/
include_once "views/default/footer.php";
?>
